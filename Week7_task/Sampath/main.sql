CREATE TABLE IF NOT EXISTS users(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    usernames VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
ALTER TABLE users RENAME COLUMN usernames TO username;
ALTER TABLE users ADD COLUMN ddoCode VARCHAR(255) NOT NULL DEFAULT '';
DELETE FROM users;
INSERT INTO users (name, username, password, ddocode) VALUES ('Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '25001002016');
--  Modules
CREATE TABLE IF NOT EXISTS modules(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    logo VARCHAR(255) NOT NULL,
    url VARCHAR(255) NOT NULL
);
INSERT INTO modules (name, logo, url) VALUES ('Bills Section', 'currency-dollar', './modules/billSection.php');
INSERT INTO modules (name, logo, url) VALUES ('HR Section', 'person', './modules/hrSection.php');

-- Modules Users Map
CREATE TABLE IF NOT EXISTS modules_users_map(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    module_id INTEGER REFERENCES modules(id) NOT NULL,
    user_id INTEGER REFERENCES users(id) NOT NULL
);

INSERT INTO modules_users_map(module_id, user_id) VALUES (1, 5);
INSERT INTO modules_users_map(module_id, user_id) VALUES (2, 5);

SELECT modules.* FROM modules, modules_users_map WHERE modules_users_map.module_id = modules.id AND modules_users_map.user_id = 3;

-- Sidebar
CREATE TABLE IF NOT EXISTS sidebar_menu(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    module_id INTEGER REFERENCES modules(id) NOT NULL,
    name VARCHAR(255) NOT NULL,
    logo VARCHAR(255) NOT NULL,
    url VARCHAR(255) NOT NULL
);

ALTER TABLE sidebar_menu ADD COLUMN custom_classes VARCHAR(255);

INSERT INTO sidebar_menu (module_id, name, logo, url) VALUES (1, 'Bill Entry', 'receipt', '/modules/menu/billEntry.php');
INSERT INTO sidebar_menu (module_id, name, logo, url) VALUES (2, 'Employee Master', 'users', '/modules/menu/masterEmployee.php');
INSERT INTO sidebar_menu (module_id, name, logo, url) VALUES (1, 'View Bill', 'eye', '/modules/menu/viewBill.php');

-- bill_ids
CREATE TABLE IF NOT EXISTS bill_ids(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    user_id INTEGER REFERENCES users(id) NOT NULL,
    name VARCHAR(255) NOT NULL
);

INSERT INTO bill_ids (user_id, name) VALUES (3, 'Bill 01');
INSERT INTO bill_ids (user_id, name) VALUES (3, 'Bill 02');
INSERT INTO bill_ids (user_id, name) VALUES (3, 'Bill 03');

-- Employee
CREATE TABLE IF NOT EXISTS employee(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    bill_id INTEGER REFERENCES bill_ids(id) NOT NULL, 
    name VARCHAR(255) NOT NULL,
    emp_code VARCHAR(255) NOT NULL UNIQUE,
    father_name VARCHAR(255) NOT NULL,
    bank_ac_no VARCHAR(255) NOT NULL UNIQUE,
    ifsccode VARCHAR(255),
    department VARCHAR(255),
    designation VARCHAR(255)
);

SELECT e.* FROM employee e, bill_ids b, users u
WHERE e.bill_id = b.id AND b.user_id = u.id
AND e.id = ? AND u.id = ?;

SELECT e.* FROM employee e, bill_ids b, users u
WHERE e.bill_id = b.id AND b.user_id = u.id
AND e.emp_code = 'E001' AND u.id = 3;

SELECT e.* FROM employee e, bill_ids b 
WHERE e.bill_id = b.id
AND e.bill_id = '1' AND b.user_id = '3';

-- Example
INSERT INTO employee 
(bill_id, name, emp_code, father_name, bank_ac_no) VALUES 
(1, 'Sampath Bandla', 'E001', 'Saidulu', '1234567890');
INSERT INTO employee 
(bill_id, name, emp_code, father_name, bank_ac_no) VALUES 
(1, 'Sandeep Bandla', 'E002', 'Saidulu', '1234567891');
INSERT INTO employee 
(bill_id, name, emp_code, father_name, bank_ac_no) VALUES 
(1, 'Usha Bandla', 'E003', 'Saidulu', '1234567892');

-- Adding Types
CREATE TABLE IF NOT EXISTS adding_types(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    type VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL UNIQUE
);

ALTER TABLE adding_types ADD COLUMN cannot_delete BOOLEAN NOT NULL DEFAULT FALSE;

INSERT INTO adding_types (type, name) VALUES ('DEDUCTION', 'Insurance'); 
INSERT INTO adding_types (type, name) VALUES ('DEDUCTION', 'Home Loan'); 
INSERT INTO adding_types (type, name) VALUES ('DEDUCTION', 'Deduction Temp 1'); 
INSERT INTO adding_types (type, name) VALUES ('DEDUCTION', 'Deduction Temp 2'); 
INSERT INTO adding_types (type, name) VALUES ('DEDUCTION', 'Deduction Temp 3'); 

INSERT INTO adding_types (type, name) VALUES ('EARNING', 'Basic Pay'); 
INSERT INTO adding_types (type, name) VALUES ('EARNING', 'Incentivies'); 
INSERT INTO adding_types (type, name) VALUES ('EARNING', 'Earning Temp 1'); 
INSERT INTO adding_types (type, name) VALUES ('EARNING', 'Earning Temp 2'); 
INSERT INTO adding_types (type, name) VALUES ('EARNING', 'Earning Temp 3'); 

-- Employee Adding Types
CREATE TABLE IF NOT EXISTS employee_adding_types(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    emp_id INTEGER REFERENCES employee(id) NOT NULL,
    adding_type_id INTEGER REFERENCES adding_types(id) NOT NULL,
    amount BIGINT NOT NULL
);

ALTER TABLE employee_adding_types ADD COLUMN amount BIGINT NOT NULL DEFAULT 0;
--========================== BIll Section ===================================

-- Supplementary_bills
CREATE TABLE IF NOT EXISTS supplementary_bills(
    id BIGINT GENERATED ALWAYS AS IDENTITY (START WITH 400000 INCREMENT BY 20 ) PRIMARY KEY,
    user_id INTEGER REFERENCES users(id) NOT NULL,
    bill_date DATE NOT NULL,
    total_earnings BIGINT NOT NULL,
    total_deductions BIGINT NOT NULL
);

ALTER TABLE supplementary_bills ALTER COLUMN bill_date TYPE TIMESTAMP;
ALTER TABLE supplementary_bills ALTER COLUMN bill_date  SET DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE supplementary_bills ADD COLUMN bill_date DATE NOT NULL DEFAULT CURRENT_TIMESTAMP;

CREATE TABLE IF NOT EXISTS s_bill_emp_map(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    s_bill_id INTEGER REFERENCES supplementary_bills(id) NOT NULL,
    bill_id INTEGER REFERENCES bill_ids(id) NOT NULL,
    emp_id INTEGER REFERENCES employee(id) NOT NULL,
    total_earnings BIGINT NOT NULL,
    total_deductions BIGINT NOT NULL,
    month INTEGER NOT NULL,
    year INTEGER NOT NULL
);

-- Bill Earnings
CREATE TABLE IF NOT EXISTS bill_addings(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    s_bill_id INTEGER REFERENCES supplementary_bills(id) NOT NULL,
    s_bill_emp_map_id INTEGER REFERENCES s_bill_emp_map(id) NOT NULL,
    adding_type_id INTEGER REFERENCES adding_types(id) NOT NULL,
    amount INTEGER NOT NULL
);



-- ========================= SESSION ==========================

CREATE TABLE IF NOT EXISTS sessions(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    user_id INTEGER REFERENCES users(id) NOT NULL,
    session_id VARCHAR(255) NOT NULL UNIQUE,
    expiry_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    createadDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- INSERTING INTO ADDING TYPES
INSERT INTO adding_types (type, name)  VALUES ('EARNING', 'Basic Pay'),('EARNING', 'Allowance');
INSERT INTO adding_types (type, name)  VALUES ('DEDUCTIONS', 'Insurance'),('DEDUCTIONS', 'Home Loan');

INSERT INTO employee_adding_types (emp_id, adding_type_id) VALUES (2, 1);
INSERT INTO employee_adding_types (emp_id, adding_type_id) VALUES (2, 2);
INSERT INTO employee_adding_types (emp_id, adding_type_id) VALUES (2, 3);
INSERT INTO employee_adding_types (emp_id, adding_type_id) VALUES (2, 4);
INSERT INTO employee_adding_types (emp_id, adding_type_id) VALUES (2, 5);
INSERT INTO employee_adding_types (emp_id, adding_type_id) VALUES (2, 6);
INSERT INTO employee_adding_types (emp_id, adding_type_id) VALUES (2, 7);
INSERT INTO employee_adding_types (emp_id, adding_type_id) VALUES (2, 8);
INSERT INTO employee_adding_types (emp_id, adding_type_id) VALUES (2, 9);
INSERT INTO employee_adding_types (emp_id, adding_type_id) VALUES (2, 10);



SELECT a.name, sum(ba.amount) as amount 
FROM adding_types a, bill_addings ba
WHERE a.id = ba.adding_type_id
AND a.type = 'DEDUCTION'
AND ba.s_bill_id = 400080
GROUP BY a.name;

SELECT e.name, e.bank_ac_no, eb.total_earnings, eb.total_deductions
FROM employee e, s_bill_emp_map eb
WHERE eb.emp_id = e.id
AND s_bill_id = 400080;

SELECT e.name, e.emp_code, a.sum
FROM employee e, (SELECT sb.emp_id, sum(ba.amount) 
FROM s_bill_emp_map sb, bill_addings ba
WHERE sb.id = ba.s_bill_emp_map_id
AND sb.s_bill_id = 400080
GROUP BY sb.emp_id) as a
WHERE e.id = a.emp_id;

SELECT e.* FROM employee e, s_bill_emp_map as sbill
WHERE sbill.emp_id = e.id
AND sbill.s_bill_id = 400080;

SELECT sbill.emp_id, a.* FROM s_bill_emp_map sbill, ( SELECT ba.*, a.name, a.type
FROM bill_addings ba, adding_types a
WHERE ba.adding_type_id = a.id
AND ba.s_bill_id = 400080) as a
WHERE a.s_bill_emp_map_id = sbill.id;