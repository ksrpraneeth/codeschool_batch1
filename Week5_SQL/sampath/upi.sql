-- Creating new upi database
CREATE DATABASE upi;

-- Table Creations
{
    -- Creating new bank table
    CREATE TABLE bank (
        id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        bank_name VARCHAR(100) NOT NULL UNIQUE,
        address VARCHAR(225) NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    -- Creating bank branch table
    CREATE TABLE bank_branch (
        id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        bank_id INTEGER REFERENCES bank(id),
        branch_name VARCHAR(100) NOT NULL,
        ifsc_code VARCHAR(11) NOT NULL UNIQUE,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        UNIQUE (bank_id, branch_name)
    );

    -- Creating Customers table
    CREATE TABLE bank_customer (
        id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        bank_id INTEGER REFERENCES bank(id),
        first_name VARCHAR(100) NOT NULL,
        last_name VARCHAR(100) NOT NULL,
        phone_number VARCHAR(10) NOT NULL UNIQUE,
        upi_status BOOLEAN NOT NULL DEFAULT TRUE,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    -- Creating accounts table
    CREATE TABLE bank_account (
        id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        bank_id INTEGER REFERENCES bank(id) NOT NULL,
        branch_id INTEGER REFERENCES bank_branch(id) NOT NULL,
        customer_id INTEGER REFERENCES bank_customer(id) NOT NULL,
        account_number VARCHAR(20) NOT NULL UNIQUE,
        balance INTEGER NOT NULL DEFAULT 0,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    -- Creating bank account cards table
    CREATE TABLE bank_account_card (
        id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        bank_account_id INTEGER REFERENCES bank_account(id),
        card_number VARCHAR(16) NOT NULL UNIQUE,
        cvv VARCHAR(3) NOT NULL,
        expiry_month VARCHAR(2) NOT NULL,
        expiry_year VARCHAR(2) NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    -- Creating bank transaction table
    CREATE TABLE bank_transaction (
        id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        transaction_from_id INTEGER REFERENCES bank_account(id) NOT NULL,
        transaction_to_bank_id INTEGER REFERENCES bank(id) NOT NULL,
        transaction_to_id INTEGER REFERENCES bank_account(id) NOT NULL,
        transcation_amount INTEGER NOT NULL,
        transaction_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) 

    -- Creating NPCI Bank Link Table
    CREATE TABLE npci_bank_map (
        id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        bank_id INTEGER REFERENCES bank(id) UNIQUE NOT NULL,
        verified_status BOOLEAN NOT NULL DEFAULT FALSE,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )

    -- Creating NPCI Extensions
    CREATE TABLE npci_extension (
        id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        extension VARCHAR(10) NOT NULL UNIQUE,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )

    -- Creating APP Table
    CREATE TABLE app (
        id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        app_name VARCHAR(20) UNIQUE NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )

    -- Creating NPCI App Map Table
    CREATE TABLE npci_app_map (
        id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        app_id INTEGER REFERENCES app(id) UNIQUE NOT NULL,
        verified BOOLEAN DEFAULT FALSE NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )

    -- Creating APP extension Table
    CREATE TABLE npci_app_extension (
        id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        app_id INTEGER REFERENCES app(id) NOT NULL,
        extension_id INTEGER REFERENCES npci_extension(id) NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        UNIQUE (app_id, extension_id)
    )


    -- Creating APP user table
    CREATE TABLE app_user (
        id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        phone_number VARCHAR(10) NOT NULL UNIQUE,
        app_id INTEGER REFERENCES app(id) NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    -- Creating User Account Map
    CREATE TABLE app_user_account (
        id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        bank_account_id INTEGER REFERENCES bank_account(id) NOT NULL UNIQUE,
        app_user_id INTEGER REFERENCES app_user(id) NOT NULL,
        verified_status BOOLEAN NOT NULL DEFAULT FALSE,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
    );

    -- Creating UPI table
    CREATE TABLE app_upi (
        id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        app_user_id INTEGER REFERENCES app_user(id),
        app_upi_username VARCHAR(30) NOT NULL,
        app_upi_extension_id INTEGER REFERENCES npci_app_extension(id) NOT NULL,
        app_user_account_id INTEGER REFERENCES app_user_account(id) NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        UNIQUE (app_upi_username, app_upi_extension_id)
    );

    -- Creating App transaction table
    CREATE TABLE app_transaction (
        id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        from_user_account_id INTEGER REFERENCES app_user_account(id) NOT NULL,
        to_user_account_id INTEGER REFERENCES app_user_account(id) NOT NULL,
        amount INTEGER NOT NULL DEFAULT 0,
        bank_transaction_id INTEGER REFERENCES bank_transaction(id) NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    -- Creating a table which stores UPI and bank accounts in npci
    CREATE TABLE upci_app_upi_map (
        id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        upi_username VARCHAR(255) NOT NULL NOT NULL,
        upi_extension INTEGER REFERENCES npci_extension(id) NOT NULL,
        bank_id INTEGER REFERENCES npci_bank_map(id) NOT NULL,
        bank_account VARCHAR(20) NOT NULL, 
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
}

-- Insertion
{
    -- Let's Create some banks
    INSERT INTO bank 
    (bank_name, address) 
    VALUES 
    ('State Bank Of India', 'Hyderabad');


    INSERT INTO bank 
    (bank_name, address) 
    VALUES 
    ('Axis Bank', 'Khammam');


    INSERT INTO bank 
    (bank_name, address) 
    VALUES 
    ('ICICI Bank', 'Warangal');


    INSERT INTO bank 
    (bank_name, address) 
    VALUES 
    ('IOB', 'Chennai');

    -- ========== Let's Create branches for banks =========

    INSERT INTO bank_branch 
    (bank_id, branch_name, ifsc_code) 
    VALUES 
    (1, 'Madhapur Branch', 'SBIN0123456');


    INSERT INTO bank_branch 
    (bank_id, branch_name, ifsc_code) 
    VALUES 
    (1, 'LB Nagar', 'SBIN0123457');


    INSERT INTO bank_branch 
    (bank_id, branch_name, ifsc_code) 
    VALUES 
    (2, 'Jubliee Hills', 'AXIS0135791');


    INSERT INTO bank_branch 
    (bank_id, branch_name, ifsc_code) 
    VALUES 
    (2, 'Banjara Hills', 'AXIS0135792');


    INSERT INTO bank_branch 
    (bank_id, branch_name, ifsc_code) 
    VALUES 
    (3, 'Banjara Hills', 'ICIC0246802');


    INSERT INTO bank_branch 
    (bank_id, branch_name, ifsc_code) 
    VALUES 
    (3, 'Vanasthallipuram', 'ICIC0246804');


    INSERT INTO bank_branch 
    (bank_id, branch_name, ifsc_code) 
    VALUES 
    (4, 'Rotary Nagar', 'IOBB0000000');


    INSERT INTO bank_branch 
    (bank_id, branch_name, ifsc_code) 
    VALUES 
    (4, 'Madhura Nagar', 'IOBB0000001');



    -- ===== Let's create some customers ========

    INSERT INTO bank_customer 
    (bank_id, first_name, last_name, phone_number) 
    VALUES 
    (1, 'Sampath', 'Bandla', '7036774550');


    -- ====== Let's Create account to that customer ====

    INSERT INTO bank_account 
    (bank_id, branch_id, customer_id, account_number) 
    VALUES 
    (1, 15, 1, '12345');

    -- ===== Let's Create card to that account ===========

    INSERT INTO bank_account_card 
    (bank_account_id, card_number, cvv, expiry_month, expiry_year)
    VALUES
    (2, '1234567890123456', '232', '11', '99');


    -- =========== Let's map bank of customer with npci ===========

    INSERT INTO npci_bank_map 
    (bank_id)
    VALUES
    (1);

    -- ============ Let's Create a NPCI UPI extensions ===============

    INSERT INTO npci_extension 
    (extension) 
    VALUES
    ('okaxis');

    -- =========== Let's Create a app ==============================

    INSERT INTO app
    (app_name)
    VALUES
    ('Paytm');

    -- ============ Let's insert NPCI App map =====================

    INSERT INTO npci_app_map
    (app_id)
    VALUES
    (1)

    -- =============== Let's Insert a NPCI App extension =============

    INSERT INTO npci_app_extension
    (app_id, extension_id)
    VALUES
    (1, 1);

    -- ============== Let's Create a app user =====================

    INSERT INTO app_user
    (first_name, last_name, phone_number, app_id)
    VALUES
    ('Sampath', 'Bandla', '7036774550', 1);

    -- ============= Let's Create a app account for user =================

    INSERT INTO app_user_account
    (bank_account_id, app_user_id)
    VALUES
    (2, 1);

    -- ============== Let's Create a UPI for user ==============

    INSERT INTO app_upi 
    (app_user_id, app_upi_username, app_upi_extension_id, app_user_account_id)
    VALUES
    (1, 'sampathbandla', 1, 2);
}


-- Functions
{
    -- ============= Trigger's to Update the updated timestamp for app table ===============
    CREATE  FUNCTION update_updated_on_user_task()
        RETURNS TRIGGER AS $$
        BEGIN
            NEW.modified_at = now();
            RETURN NEW;
        END;
        $$ language 'plpgsql';

        CREATE TRIGGER update_user_task_updated_on
            BEFORE UPDATE
            ON
                app
            FOR EACH ROW
        EXECUTE PROCEDURE update_updated_on_user_task();
}

-- Triggers To Update
{
    
    -- App Transaction Trigger
    CREATE TRIGGER update_user_task_updated_on
        BEFORE UPDATE
        ON
            app_transaction
        FOR EACH ROW
    EXECUTE PROCEDURE update_updated_on_user_task();

    -- App UPI Trigger
    CREATE TRIGGER update_user_task_updated_on
        BEFORE UPDATE
        ON
            app_upi
        FOR EACH ROW
    EXECUTE PROCEDURE update_updated_on_user_task();

    -- App User Trigger
    CREATE TRIGGER update_user_task_updated_on
        BEFORE UPDATE
        ON
            app_user
        FOR EACH ROW
    EXECUTE PROCEDURE update_updated_on_user_task();

    -- App User Account Trigger
    CREATE TRIGGER update_user_task_updated_on
        BEFORE UPDATE
        ON
            app_user_account
        FOR EACH ROW
    EXECUTE PROCEDURE update_updated_on_user_task();

    -- bank Trigger
    CREATE TRIGGER update_user_task_updated_on
        BEFORE UPDATE
        ON
            bank
        FOR EACH ROW
    EXECUTE PROCEDURE update_updated_on_user_task();

    -- bank account Trigger
    CREATE TRIGGER update_user_task_updated_on
        BEFORE UPDATE
        ON
            bank_account
        FOR EACH ROW
    EXECUTE PROCEDURE update_updated_on_user_task();

    -- bank account card Trigger
    CREATE TRIGGER update_user_task_updated_on
        BEFORE UPDATE
        ON
            bank_account_card
        FOR EACH ROW
    EXECUTE PROCEDURE update_updated_on_user_task();

    -- bank branch Trigger
    CREATE TRIGGER update_user_task_updated_on
        BEFORE UPDATE
        ON
            bank_branch
        FOR EACH ROW
    EXECUTE PROCEDURE update_updated_on_user_task();

    -- bank customer Trigger
    CREATE TRIGGER update_user_task_updated_on
        BEFORE UPDATE
        ON
            bank_customer
        FOR EACH ROW
    EXECUTE PROCEDURE update_updated_on_user_task();

    -- bank transaction Trigger
    CREATE TRIGGER update_user_task_updated_on
        BEFORE UPDATE
        ON
            bank_transaction
        FOR EACH ROW
    EXECUTE PROCEDURE update_updated_on_user_task();

    -- npci app map Trigger
    CREATE TRIGGER update_user_task_updated_on
        BEFORE UPDATE
        ON
            npci_app_map
        FOR EACH ROW
    EXECUTE PROCEDURE update_updated_on_user_task();

    -- npci app extension Trigger
    CREATE TRIGGER update_user_task_updated_on
        BEFORE UPDATE
        ON
            npci_app_extension
        FOR EACH ROW
    EXECUTE PROCEDURE update_updated_on_user_task();

    -- npci bank map Trigger
    CREATE TRIGGER update_user_task_updated_on
        BEFORE UPDATE
        ON
            npci_bank_map
        FOR EACH ROW
    EXECUTE PROCEDURE update_updated_on_user_task();

    -- npci extension Trigger
    CREATE TRIGGER update_user_task_updated_on
        BEFORE UPDATE
        ON
            npci_extension
        FOR EACH ROW
    EXECUTE PROCEDURE update_updated_on_user_task();
}

-- Function and trigger to create bank transaction before inserting new app transaction
{

    -- Function
    CREATE OR REPLACE FUNCTION create_bank_transaction_after_upi_transaction()
    RETURNS TRIGGER
        LANGUAGE PLPGSQL
        AS 
    $$
     DECLARE
        from_bank_account INTEGER;
        to_bank_account INTEGER;
        to_bank_id INTEGER;
        bank_transaction_id INTEGER;
    BEGIN
        SELECT bank_account_id INTO from_bank_account
        FROM app_user_account
        WHERE id = NEW.from_user_account_id;

        SELECT bank_account_id INTO to_bank_account
        FROM app_user_account
        WHERE id = NEW.to_user_account_id;
		
		SELECT bank_id INTO to_bank_id
		FROM bank_account
		WHERE id = to_bank_account;

		IF NOT EXISTS(SELECT * FROM npci_bank_map WHERE bank_id = to_bank_id) THEN
			RAISE EXCEPTION 'To Bank does not exist in npci Server';
            RETURN NULL;
        END IF;
            

        INSERT INTO bank_transaction
        (transaction_from_id, transaction_to_id, transaction_to_bank_id, transcation_amount)
        VALUES
        (from_bank_account, to_bank_account, to_bank_id, NEW.amount)
        RETURNING id INTO bank_transaction_id;
        
        NEW.bank_transaction_id = bank_transaction_id;
        RETURN NEW;
    END;
    $$


    -- Trigger
    CREATE TRIGGER trigger_to_update_bank_transaction
        BEFORE INSERT
        ON app_transaction
        FOR EACH ROW
            EXECUTE PROCEDURE create_bank_transaction_after_upi_transaction()
}


-- Customer User Credit's and debit's
{
    -- Checking the transcation
    INSERT INTO app_transaction
    (from_user_account_id, to_user_account_id, amount)
    VALUES
    (3, 2, 1000)

    -- Get User Debit and Credit fron APP
    SELECT transactions.* FROM (
        SELECT uto.first_name || ' ' || uto.last_name AS from, 
        'DEBIT' as TYPE ,
        t.amount,
        t.created_at
        FROM app_user ufrom, app_user uto, app_transaction t, app_user_account ufroma,
        app_user_account utoa
        WHERE
        t.from_user_account_id = ufroma.id AND
        ufroma.app_user_id = ufrom.id AND
        t.to_user_account_id = utoa.id AND
        utoa.app_user_id = uto.id AND
        ufrom.id = 1

        UNION ALL

        SELECT ufrom.first_name || ' ' || ufrom.last_name AS from,
        'CREDIT' as TYPE, 
        t.amount,
        t.created_at
        FROM app_user ufrom, app_user uto, app_transaction t, app_user_account ufroma,
        app_user_account utoa
        WHERE
        t.from_user_account_id = ufroma.id AND
        ufroma.app_user_id = ufrom.id AND
        t.to_user_account_id = utoa.id AND
        utoa.app_user_id = uto.id AND
        uto.id = 1
    ) AS transactions 
    ORDER BY created_at DESC;
    

    -- GET user debit and credit from bank

    SELECT transcations.* FROM (
            SELECT bcto.first_name || ' ' || bcto.last_name AS from, 
            'DEBIT' as TYPE ,
            t.transcation_amount,
            t.transaction_date
            FROM bank_customer bcfrom, bank_customer bcto, 
            bank_transaction t, 
            bank_account bcfroma,
            bank_account bctoa
            WHERE
            t.transaction_from_id = bcfroma.id AND
            bcfroma.customer_id = bcfrom.id AND
            t.transaction_to_id = bctoa.id AND
            bctoa.customer_id = bcto.id AND
            bcfrom.id = 1

            UNION ALL

            SELECT bcfrom.first_name || ' ' || bcfrom.last_name AS from, 
            'CREDIT' as TYPE ,
            t.transcation_amount,
            t.transaction_date
            FROM bank_customer bcfrom, bank_customer bcto, 
            bank_transaction t, 
            bank_account bcfroma,
            bank_account bctoa
            WHERE
            t.transaction_from_id = bcfroma.id AND
            bcfroma.customer_id = bcfrom.id AND
            t.transaction_to_id = bctoa.id AND
            bctoa.customer_id = bcto.id AND
            bcto.id = 1
    ) AS transcations
    ORDER BY transaction_date DESC

}


-- Inserting some sample data
{
    -- Inserting some Bank Customers
    {
        
        INSERT INTO  bank_customer 
        (bank_id, first_name, last_name, phone_number)
        VALUES
        (4, 'Karthik', 'Challaga', '2222222222');

        INSERT INTO  bank_customer 
        (bank_id, first_name, last_name, phone_number)
        VALUES
        (3, 'Nagasai', 'K', '3333333333');

        INSERT INTO  bank_customer 
        (bank_id, first_name, last_name, phone_number)
        VALUES
        (2, 'Praneeth', 'Ch', '4444444444');

        INSERT INTO  bank_customer 
        (bank_id, first_name, last_name, phone_number)
        VALUES
        (1, 'Mukesh', 'A', '5555555555');
    }

    -- Inserting some bank customer accounts data
    {
        INSERT INTO bank_account
        (bank_id, branch_id, customer_id, account_number)
        VALUES
        (3, 19, 3, '1111111');

        INSERT INTO bank_account
        (bank_id, branch_id, customer_id, account_number)
        VALUES
        (4, 21, 5, '2222222');

        INSERT INTO bank_account
        (bank_id, branch_id, customer_id, account_number)
        VALUES
        (3, 20, 6, '3333333');

        INSERT INTO bank_account
        (bank_id, branch_id, customer_id, account_number)
        VALUES
        (2, 17, 7, '4444444');

        INSERT INTO bank_account
        (bank_id, branch_id, customer_id, account_number)
        VALUES
        (1, 16, 8, '5555555');
    }

    -- Inserting some npci bank map
    {
        INSERT INTO npci_bank_map 
        (bank_id)
        VALUES
        (2),(3),(4);
    }

    -- Adding some extensions
    {
        INSERT INTO npci_extension
        (extension)
        VALUES
        ('okicic'),('sbi'),('iob'),('axis'),('ybl');
    }

    -- Adding some extensions to app
    {
        INSERT INTO npci_app_extension
        (app_id, extension_id)
        VALUES
        (1, 2),(1,3);
    }

    -- ADding some app users
    {
        INSERT INTO app_user
        (first_name, last_name, phone_number, app_id)
        VALUES
        ('Rahul', 'Sipligan', '1111111111', '1'),
        ('Karthik', 'Challaga', '2222222222', '1'),
        ('Nagasai', 'K', '3333333333', '1'),
        ('Praneeth', 'Ch', '4444444444', '1'),
        ('Mukesh', 'A', 'Mukesh', '1');
    }

    -- Creating some app user accounts
    {
        INSERT INTO app_user_account
        (bank_account_id, app_user_id)
        VALUES
        (4, 3),
        (5, 4),
        (6, 5),
        (7, 6),
        (8, 7);

    }

    -- Do some app transcations
    {
        INSERT INTO app_transaction
        (from_user_account_id, to_user_account_id, amount)
        VALUES
        (4, 3, 2400),
        (3, 8, 3000),
        (4, 5, 3231),
        (5, 2, 3131),
        (5, 8, 9000),
        (3, 4, 2032),
        (6, 4, 3210);
    }
}

-- Get Users credits and balance View
{
    CREATE VIEW user_balance AS
    SELECT 
    u.id, 
    u.first_name || ' ' || u.last_name AS Name,
    CASE 
    WHEN credits.totalcredits IS NULL THEN 0 
    WHEN credits.totalCredits IS NOT NULL THEN credits.totalCredits END AS Credits, 

    CASE 
    WHEN debits.totaldebits IS NULL THEN 0 
    WHEN debits.totaldebits IS NOT NULL THEN debits.totaldebits END AS Debits,

    CASE
    WHEN debits.totaldebits IS NULL AND credits.totalcredits IS NULL 
    THEN 0

    WHEN debits.totaldebits IS NULL AND credits.totalcredits IS NOT NULL 
    THEN credits.totalcredits

    WHEN debits.totaldebits IS NOT NULL AND credits.totalcredits IS NULL 
    THEN 0 - debits.totaldebits

    WHEN debits.totaldebits IS NOT NULL AND credits.totalcredits IS NOT NULL 
    THEN credits.totalcredits - debits.totaldebits 

    END AS balance
    FROM app_user u
    LEFT JOIN
    (
        SELECT * FROM total_credits
    ) AS credits
    ON u.id = credits.id
    LEFT JOIN
    (
        SELECT * FROM total_debits
    ) AS debits
    ON u.id = debits.id;
}

-- Views
{

    -- Total Credit View
    CREATE VIEW total_credits AS
    SELECT u.id,u.first_name, sum(t.amount) AS totalCredits
    FROM app_user_account ua, app_user u, app_transaction t
    WHERE ua.app_user_id = u.id AND
    t.to_user_account_id = ua.id
    GROUP BY u.id
    ORDER BY id;

    -- Total Debit View
    CREATE VIEW total_debits AS
    SELECT u.id,u.first_name, sum(t.amount) AS totalDebits
    FROM app_user_account ua, app_user u, app_transaction t
    WHERE ua.app_user_id = u.id AND
    t.from_user_account_id = ua.id
    GROUP BY u.id
    ORDER BY id;
}