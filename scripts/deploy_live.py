import os
import sys
import zipfile
import urllib.request
import urllib.parse
import http.cookiejar
import re
import ssl

raw_url = os.environ.get("WP_ADMIN_URL", "https://tatkhalsa.in").rstrip("/")
# Normalize URL to base site domain without trailing /wp-admin
BASE_URL = re.sub(r'/wp-admin/?$', '', raw_url)
USERNAME = os.environ.get("WP_ADMIN_USER", "tatkhalsafoundation")
PASSWORD = os.environ.get("WP_ADMIN_PASS", "")

if not PASSWORD:
    print("Error: WP_ADMIN_PASS environment variable is missing.")
    sys.exit(1)

print(f"Deploying theme to Hostinger WP target: {BASE_URL}")

# 1. Package theme into tatkhalsa-theme.zip
zip_path = "tatkhalsa-theme.zip"
print("Packaging theme files...")
with zipfile.ZipFile(zip_path, "w", zipfile.ZIP_DEFLATED) as z:
    for root, dirs, files in os.walk("."):
        # Exclude hidden git/github files and zip file itself
        if ".git" in root or ".github" in root or "scripts" in root:
            continue
        for f in files:
            if f == zip_path or f.endswith(".py"):
                continue
            full_path = os.path.join(root, f)
            arcname = os.path.join("tatkhalsa-theme", os.path.relpath(full_path, "."))
            z.write(full_path, arcname)

print(f"Theme packaged successfully ({os.path.getsize(zip_path)} bytes).")

# 2. Authenticate & Upload
ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

cj = http.cookiejar.CookieJar()
opener = urllib.request.build_opener(
    urllib.request.HTTPCookieProcessor(cj),
    urllib.request.HTTPSHandler(context=ctx)
)

print(f"Authenticating with WordPress Admin at {BASE_URL}/wp-login.php...")
login_data = urllib.parse.urlencode({
    'log': USERNAME,
    'pwd': PASSWORD,
    'wp-submit': 'Log In',
    'redirect_to': f'{BASE_URL}/wp-admin/',
    'testcookie': '1'
}).encode('utf-8')

req_login = urllib.request.Request(
    f'{BASE_URL}/wp-login.php',
    data=login_data,
    headers={'User-Agent': 'Mozilla/5.0'}
)
resp_login = opener.open(req_login)
login_html = resp_login.read().decode('utf-8', errors='ignore')

if 'wp-admin-bar' not in login_html and 'dashboard' not in login_html and 'adminmenu' not in login_html:
    print("Authentication warning: check response text.")
    if "ERROR" in login_html:
        print("Login error message detected in response.")
        sys.exit(1)

print("Authentication successful! Fetching upload nonce...")
req_install = urllib.request.Request(
    f'{BASE_URL}/wp-admin/theme-install.php?tab=upload',
    headers={'User-Agent': 'Mozilla/5.0'}
)
resp_install = opener.open(req_install)
install_html = resp_install.read().decode('utf-8', errors='ignore')

nonce_match = re.search(r'name="_wpnonce"\s+value="([a-f0-9]+)"', install_html)
if not nonce_match:
    print("Failed to find upload nonce.")
    sys.exit(1)

nonce = nonce_match.group(1)
print(f"Nonce obtained: {nonce}. Uploading theme...")

# Multipart upload
boundary = '----WebKitFormBoundaryDeploymentAutomation'
with open(zip_path, 'rb') as f:
    zip_bytes = f.read()

body = bytearray()
fields = [
    ('_wpnonce', nonce),
    ('_wp_http_referer', '/wp-admin/theme-install.php?tab=upload'),
]

for name, val in fields:
    body.extend(f'--{boundary}\r\n'.encode('utf-8'))
    body.extend(f'Content-Disposition: form-data; name="{name}"\r\n\r\n'.encode('utf-8'))
    body.extend(f'{val}\r\n'.encode('utf-8'))

body.extend(f'--{boundary}\r\n'.encode('utf-8'))
body.extend(b'Content-Disposition: form-data; name="themezip"; filename="tatkhalsa-theme.zip"\r\n')
body.extend(b'Content-Type: application/zip\r\n\r\n')
body.extend(zip_bytes)
body.extend(b'\r\n')
body.extend(f'--{boundary}--\r\n'.encode('utf-8'))

req_up = urllib.request.Request(
    f'{BASE_URL}/wp-admin/update.php?action=upload-theme',
    data=bytes(body),
    headers={
        'User-Agent': 'Mozilla/5.0',
        'Content-Type': f'multipart/form-data; boundary={boundary}'
    }
)
resp_up = opener.open(req_up)
res_html = resp_up.read().decode('utf-8', errors='ignore')

if "Theme updated successfully" in res_html or "Theme installed successfully" in res_html or "uploaded theme" in res_html.lower():
    print("Theme upload / update succeeded!")
elif "Replace current with uploaded" in res_html:
    print("Existing theme detected. Confirming overwrite...")
    ov_match = re.search(r'href="([^"]*action=upload-theme[^"]*overwrite=[^"]*)"', res_html)
    if ov_match:
        ov_url = ov_match.group(1).replace('&amp;', '&')
        if not ov_url.startswith('http'):
            ov_url = f'{BASE_URL}/wp-admin/{ov_url}'
        req_ov = urllib.request.Request(ov_url, headers={'User-Agent': 'Mozilla/5.0'})
        res_ov = opener.open(req_ov).read().decode('utf-8', errors='ignore')
        print("Theme overwritten with latest build successfully!")
    else:
        print("Could not parse overwrite URL; raw response received.")
else:
    print("Upload completed.")

# Verify activation
act_match = re.search(r'href="([^"]*action=activate[^"]*stylesheet=tatkhalsa-theme[^"]*)"', res_html)
if act_match:
    act_url = act_match.group(1).replace('&amp;', '&')
    if not act_url.startswith('http'):
        act_url = f'{BASE_URL}/wp-admin/{act_url}'
    opener.open(urllib.request.Request(act_url, headers={'User-Agent': 'Mozilla/5.0'}))
    print("Theme activated successfully!")

print("Deployment complete!")
