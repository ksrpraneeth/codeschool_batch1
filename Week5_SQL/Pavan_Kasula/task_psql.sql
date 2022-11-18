--> Step-1
-->Creating Database

CREATE DATABASE HOTEL_PIXEL;

--->Step -2
--> Creating Rooms
CREATE TABLE Rooms(
    Room_No VARCHAR(40) REFERENCES Room_Type(Room_no) NOT NULL ,
    Room_Type_ID VARCHAR(30) NOT NULL,
);

INSERT INTO
    Rooms
VALUES
    ('101', 'R01');

INSERT INTO
    Rooms
VALUES
    ('201', 'RO2');

INSERT INTO
    Rooms
VALUES
    ('401', 'R04');

INSERT INTO
    Rooms
VALUES
    ('202', 'R02');

INSERT INTO
    Rooms
VALUES
    ('301', 'R03');

INSERT INTO
    Rooms
VALUES
    ('402', 'R04');

INSERT INTO
    Rooms
VALUES
    ('501', 'R05');

--->Step-3
---> Creating Room Types

CREATE TABLE Room_Type(
    Room_Type_ID VARCHAR(30) NOT NULL,
    Room_Type VARCHAR(30) NOT NULL,
    Room_no VARCHAR(30) PRIMARY KEY NOT NULL,
    Price VARCHAR(30) NOT NULL,
    Floor_ID VARCHAR(30) NOT NULL
);

INSERT INTO
    Room_Type
VALUES
('R01', 'Single_Room', '101', '2500', '1');

INSERT INTO
    Room_Type
VALUES
('R01', 'Single_Room', '102', '2500', '1');

INSERT INTO
    Room_Type
VALUES
('R01', 'Single_Room', '103', '2500', '1');

INSERT INTO
    Room_Type
VALUES
('R02', 'Double_Room', '201', '5000', '2');

INSERT INTO
    Room_Type
VALUES
('R02', 'Double_Room', '202', '5000', '2');

INSERT INTO
    Room_Type
VALUES
('R02', 'Double_Room', '203', '5000', '2');

INSERT INTO
    Room_Type
VALUES
('R03', 'Deluxe_Room', '301', '7500', '3');

INSERT INTO
    Room_Type
VALUES
('R03', 'Deluxe_Room', '302', '7500', '3');

INSERT INTO
    Room_Type
VALUES
('R03', 'Deluxe_Room', '303', '7500', '3');

INSERT INTO
    Room_Type
VALUES
('R04', 'Suit', '401', '10,000', '4');

INSERT INTO
    Room_Type
VALUES
('R04', 'Suit', '402', '10,000', '4');

INSERT INTO
    Room_Type
VALUES
('R05', 'Presidential_Suit', '501', '20,000', '5');

--->Step-4
---> Creating Staff Details

CREATE TABLE Staff_Details(
    Staff_ID VARCHAR(25) PRIMARY KEY NOT NULL,
    Staff_Name VARCHAR(25) NOT NULL,
    Staff_Gender VARCHAR(10) NOT NULL,
    Staff_Position VARCHAR(25) NOT NULL,
    staf_Contact_Number VARCHAR(30) NOT NULL,
    Staff_EmailID VARCHAR(25) NOT NULL
);

INSERT INTO
    Staff_Details
VALUES
    (
        'S01',
        'Max',
        'Female',
        'Manager',
        '+91 9152322323',
        'max@gmail.com'
    );

INSERT INTO
    Staff_Details
VALUES
    (
        'S02',
        'John',
        'Male',
        'Asst Manager',
        '+91 9155275423',
        'john@gmail.com'
    );

INSERT INTO
    Staff_Details
VALUES
    (
        'S03',
        'Harry',
        'Female',
        'Asst Manager',
        '+91 9173648534',
        'Harry@gmail.com'
    );

INSERT INTO
    Staff_Details
VALUES
    (
        'S04',
        'wilson',
        'Female',
        'Asst Manage',
        '+91 91232328783',
        'wilson@gmail.com'
    );

INSERT INTO
    Staff_Details
VALUES
    (
        'S05',
        'Steve',
        'Male',
        'Asst Manager',
        '+91 9198922345',
        'Steve@gmail.com'
    );

INSERT INTO
    Staff_Details
VALUES
    (
        'S06',
        'zayn',
        'Male',
        'Bell boy',
        '+91 9134532244',
        'zayn@gmail.com'
    );

INSERT INTO
    Staff_Details
VALUES
    (
        'S07',
        'biden',
        'Male',
        'Bell boy',
        '+91 918374638723',
        'biden@gmail.com'
    );



--->Step-5
---->Creating Guest  table 

CREATE TABLE Guest_Details(
    Guest_ID VARCHAR(25) PRIMARY KEY NOT NULL,
    Guest_First_Name VARCHAR(25) NOT NULL,
    Guest_Last_Name VARCHAR(25) NOT NULL,
    Guest_Gender VARCHAR(25) NOT NULL,
    Guest_ID_Proof VARCHAR(25) NOT NULL,
    Guest_Email VARCHAR(30) NOT NULL,
    Guest_Address VARCHAR(30) NOT NULL
);

INSERT INTO
    Guest_Detials
VALUES
    (
        'G01',
        'Ram',
        'Sai',
        'Male',
        'aadhar',
        'sairam@gmail.com',
        'Ameerpet,Hyderabad'
    );

INSERT INTO
    Guest_Detials
VALUES
    (
        'G02',
        'Pavan',
        'kumar',
        'Male',
        'aadhar',
        'pavankumar@gmail.com',
        'Kukatpally,Hyderabad'
    );

INSERT INTO
    Guest_Detials
VALUES
    (
        'G03',
        'Karthik',
        'Sai',
        'Male',
        'pancard',
        'karthiksai@gmail.com',
        'S.R.Ngar,Hyderabad'
    );

INSERT INTO
    Guest_Detials
VALUES
    (
        'G04',
        'Sampath',
        'sam',
        'Male',
        'passport',
        'sampathsam@gmail.com',
        'ECIL,Hyderabad'
    );

INSERT INTO
    Guest_Detials
VALUES
    (
        'G05',
        'Sita',
        'sharma',
        'Female',
        'pancard',
        'sitasharma@gmail.com',
        'moulali,Hyderabad'
    );

INSERT INTO
    Guest_Detials
VALUES
    (
        'G06',
        'virat',
        'kohli',
        'Male',
        'DL',
        'viratkohli@gmail.com',
        'Tarnaka,Hyderabad'
    );

INSERT INTO
    Guest_Detials
VALUES
    (
        'G07',
        'dhoni',
        'Sai',
        'Male',
        'Passport',
        'dhonisai@gmail.com',
        'Shadhnagar,Hyderabad'
    );

---->Step-6
---->Creating Payment Details

CREATE TABLE Payment_Details(
    Payment_ID VARCHAR(25) PRIMARY KEY NOT NULL,
    Payment_Type VARCHAR(25) NOT NULL,
    Amount VARCHAR(25) NOT NULL, 
    Amount_in_Detail VARCHAR(30) NOT NULL
);

INSERT INTO
    Payment_Details
VALUES
    ('P-0012', 'Card', '5,000', '2500*2');

INSERT INTO
    Payment_Details
VALUES
    ('P-0013', 'Cash', '10,000', '5000*2');

INSERT INTO
    Payment_Details
VALUES
    ('P-0014', 'Card', '40,000', '10,000*4');

INSERT INTO
    Payment_Details
VALUES
    ('P-0015', 'UPI', '25,000', '5000*5');

INSERT INTO
    Payment_Details
VALUES
    ('P-0016', 'UPI', '15,000', '7500*2');

INSERT INTO
    Payment_Details
VALUES
    ('P-0017', 'Card', '10,000', '10,000*1');

INSERT INTO
    Payment_Details
VALUES
    ('P-0018', 'Cash', '120,000', '20,000*6');


--->Step-7
---> Creating Booking Details

    CREATE TABLE Booking_Details(
    Booking_ID VARCHAR(10) PRIMARY KEY NOT NULL,
    Guest_ID VARCHAR(25) REFERENCES Guest_Detials(Guest_ID) NOT NULL,
    Room_No VARCHAR(40) REFERENCES Room_Type(Room_No) NOT NULL,
    Staff_ID VARCHAR(25) REFERENCES Staff_Details(Staff_ID) NOT NULL,
    Arrival_Date DATE NOT NULL,
    Departurte_Date DATE NOT NULL,
    Payment_ID VARCHAR(25) REFERENCES Payment_Details(Payment_ID) NOT NULL
);

INSERT INTO
    Booking_Details
VALUES
(
        'B101',
        'G01',
        '101',
        'S02',
        '2022-05-15',
        '2022-05-17',
        'P-0012'
    );

INSERT INTO
    Booking_Details
VALUES
(
        'B102',
        'G02',
        '201',
        'S04',
        '2022-05-16',
        '2022-05-18',
        'P-0013'
    );

INSERT INTO
    Booking_Details
VALUES
(
        'B103',
        'G03',
        '401',
        'S06',
        '2022-05-16',
        '2022-05-20',
        'P-0014'
    );

INSERT INTO
    Booking_Details
VALUES
(
        'B104',
        'G04',
        '202',
        'S01',
        '2022-05-17',
        '2022-05-22',
        'P-0015'
    );

INSERT INTO
    Booking_Details
VALUES
(
        'B105',
        'G05',
        '301',
        'S04',
        '2022-05-17',
        '2022-05-19',
        'P-0016'
    );

INSERT INTO
    Booking_Details
VALUES
(
        'B106',
        'G06',
        '402',
        'S03',
        '2022-05-18',
        '2022-05-19',
        'P-0017'
    );

INSERT INTO
    Booking_Details
VALUES
(
        'B107',
        'G07',
        '501',
        'S07',
        '2022-05-19',
        '2022-05-25',
        'P-0018'
    );