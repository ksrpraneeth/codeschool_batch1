CREATE TABLE IF NOT EXISTS users(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    usernames VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

--  Modules
CREATE TABLE IF NOT EXISTS modules(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    logo VARCHAR(255) NOT NULL,
    url VARCHAR(255) NOT NULL
);

-- Sidebar
CREATE TABLE IF NOT EXISTS sidebar_menu(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    module_id INTEGER REFERENCES modules(id) NOT NULL,
    name VARCHAR(255) NOT NULL,
    logo VARCHAR(255) NOT NULL,
    url VARCHAR(255) NOT NULL
);

-- bill_ids
CREATE TABLE IF NOT EXISTS bill_ids(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    user_id INTEGER REFERENCES users(id) NOT NULL,
    name VARCHAR(255) NOT NULL
);

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

-- Example
INSERT INTO employee (bill_id, name, emp_code, father_name, bank_ac_no) VALUES (1, 'Sampath Bandla', 'E001', 'Saidulu', '1234567890');

-- Earning Types
CREATE TABLE IF NOT EXISTS earning_types(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE
);

-- Employee Earning Types
CREATE TABLE IF NOT EXISTS employee_earning_types(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    emp_id INTEGER REFERENCES employee(id) NOT NULL,
    earning_type_id INTEGER REFERENCES earning_types(id) NOT NULL
);

-- Deduction Types
CREATE TABLE IF NOT EXISTS deduction_types(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE
);

-- Employee Deduction Types
CREATE TABLE IF NOT EXISTS employee_deduction_types(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    emp_id INTEGER REFERENCES employee(id) NOT NULL,
    deduction_type_id INTEGER REFERENCES deduction_types(id) NOT NULL
);

--========================== BIll Section ===================================

-- Supplementary_bills
CREATE TABLE IF NOT EXISTS supplementary_bills(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    user_id INTEGER REFERENCES users(id) NOT NULL,
    month INTEGER NOT NULL,
    year INTEGER NOT NULL,
    total_earnings BIGINT NOT NULL,
    total_deductions BIGINT NOT NULL
);

CREATE TABLE IF NOT EXISTS s_bill_emp_map(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    s_bill_id INTEGER REFERENCES supplementary_bills(id) NOT NULL,
    bill_id INTEGER REFERENCES bill_ids(id) NOT NULL,
    emp_id INTEGER REFERENCES employee(id) NOT NULL,
    total_earnings BIGINT NOT NULL,
    total_deductions BIGINT NOT NULL
);

-- Bill Earnings
CREATE TABLE IF NOT EXISTS bill_earnings(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    s_bill_id INTEGER REFERENCES supplementary_bills(id) NOT NULL,
    s_bill_emp_map_id INTEGER REFERENCES s_bill_emp_map(id) NOT NULL,
    earning_type_id INTEGER REFERENCES earning_types(id) NOT NULL,
    amount INTEGER NOT NULL
);

-- Bill Deductions
CREATE TABLE IF NOT EXISTS bill_deductions(
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    s_bill_id INTEGER REFERENCES supplementary_bills(id) NOT NULL,
    s_bill_emp_map_id INTEGER REFERENCES s_bill_emp_map(id) NOT NULL,
    deduction_type_id INTEGER REFERENCES deduction_types(id) NOT NULL,
    amount INTEGER NOT NULL
);
