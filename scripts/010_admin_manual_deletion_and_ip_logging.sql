-- ==============================================================================
-- Tatkhalsa Foundation: Phase 25 Supabase Migration
-- Migration: 010_admin_manual_deletion_and_ip_logging.sql
-- Goal: Explicit DELETE RLS policies for Authenticated Admin + IP Audit Tracking
-- ==============================================================================

-- 1. Ensure IP address audit columns exist across intake tables
ALTER TABLE IF EXISTS public.tkf_donors
    ADD COLUMN IF NOT EXISTS ip_address TEXT;

ALTER TABLE IF EXISTS public.tkf_blood_requests
    ADD COLUMN IF NOT EXISTS ip_address TEXT;

CREATE INDEX IF NOT EXISTS idx_tkf_donors_ip 
    ON public.tkf_donors(ip_address, created_at DESC);

CREATE INDEX IF NOT EXISTS idx_tkf_blood_requests_ip 
    ON public.tkf_blood_requests(ip_address, created_at DESC);

-- 2. Ensure RLS is enabled on all tables
ALTER TABLE IF EXISTS public.tkf_donors ENABLE ROW LEVEL SECURITY;
ALTER TABLE IF EXISTS public.tkf_blood_requests ENABLE ROW LEVEL SECURITY;
ALTER TABLE IF EXISTS public.tkf_volunteers ENABLE ROW LEVEL SECURITY;
ALTER TABLE IF EXISTS public.tkf_grievance_tickets ENABLE ROW LEVEL SECURITY;

-- 3. Explicit DELETE policies for tkf_donors
DROP POLICY IF EXISTS "allow_authenticated_delete_donors" ON public.tkf_donors;
CREATE POLICY "allow_authenticated_delete_donors"
ON public.tkf_donors
FOR DELETE
TO authenticated, service_role
USING (true);

-- 4. Explicit DELETE policies for tkf_blood_requests
DROP POLICY IF EXISTS "allow_authenticated_delete_blood_requests" ON public.tkf_blood_requests;
CREATE POLICY "allow_authenticated_delete_blood_requests"
ON public.tkf_blood_requests
FOR DELETE
TO authenticated, service_role
USING (true);

-- 5. Explicit DELETE policies for tkf_volunteers
DROP POLICY IF EXISTS "allow_authenticated_delete_volunteers" ON public.tkf_volunteers;
CREATE POLICY "allow_authenticated_delete_volunteers"
ON public.tkf_volunteers
FOR DELETE
TO authenticated, service_role
USING (true);

-- 6. Explicit DELETE policies for tkf_grievance_tickets
DROP POLICY IF EXISTS "allow_authenticated_delete_grievances" ON public.tkf_grievance_tickets;
CREATE POLICY "allow_authenticated_delete_grievances"
ON public.tkf_grievance_tickets
FOR DELETE
TO authenticated, service_role
USING (true);

-- 7. Grant standard table-level DML permissions to roles
GRANT SELECT, INSERT, UPDATE, DELETE ON public.tkf_donors TO authenticated, service_role;
GRANT SELECT, INSERT, UPDATE, DELETE ON public.tkf_blood_requests TO authenticated, service_role;
GRANT SELECT, INSERT, UPDATE, DELETE ON public.tkf_volunteers TO authenticated, service_role;
GRANT SELECT, INSERT, UPDATE, DELETE ON public.tkf_grievance_tickets TO authenticated, service_role;

GRANT SELECT, INSERT ON public.tkf_donors TO anon;
GRANT SELECT, INSERT ON public.tkf_blood_requests TO anon;
GRANT SELECT, INSERT ON public.tkf_volunteers TO anon;
GRANT SELECT, INSERT ON public.tkf_grievance_tickets TO anon;
