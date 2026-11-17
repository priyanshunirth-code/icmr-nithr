USE intranet_it_dashboard;

-- Development-only sample records. Do not import this file into production.
INSERT INTO it_inventory (asset_id, device_name, category, brand, model, serial_number, assigned_to, department, location, ip_address, status) VALUES
('NIHR-LT-0427','NIHR-LT-0427','Laptop','Dell','Latitude 5420','DEV-SN-0427','Dr. A. Sharma','R&D','Lab-1','10.10.5.121','Assigned'),
('NIHR-PC-0319','NIHR-PC-0319','Desktop','HP','ProDesk 400','DEV-SN-0319','IT Section','IT','Server Room','10.10.5.122','Assigned'),
('NIHR-PR-0108','NIHR-PR-0108','Printer','Canon',' imageRUNNER','DEV-SN-0108','Accounts','Accounts','Admin Block','10.10.7.010','Available');

INSERT INTO ip_directory (ip_address, hostname, device_type, ad_status, department, location, device_status) VALUES
('10.10.5.121','NIHR-LT-0427','Laptop','AD Registered','R&D','Lab-1','Online'),
('10.10.5.122','NIHR-PC-0319','Desktop','AD Registered','IT','Server Room','Online'),
('10.10.6.045','NIHR-LT-0426','Laptop','Non-AD','R&D','Lab-1','Unknown'),
('10.10.5.118','NIHR-PC-0318','Desktop','AD Registered','Accounts','Admin Block','Online');
