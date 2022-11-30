CREATE DATABASE hospital_management;

CREATE type Gender as enum('male', 'female', 'other');

CREATE TABLE doctors(
    id int primary key,
    name varchar(50) not null,
    gender Gender not null,
    specialization varchar(10) not null
);

INSERT INTO
    doctors(id, name, gender, specialization)
VALUES
    (1, 'Dr. Vijay Dikshit', 'male', 'MBBS');

INSERT INTO
    doctors(id, name, gender, specialization)
VALUES
    (2, 'Dr. Nalini Yadala', 'female', 'MBBS');

INSERT INTO
    doctors(id, name, gender, specialization)
VALUES
    (3, 'Dr. Victor Vinod Babu', 'male', 'MS');

INSERT INTO
    doctors(id, name, gender, specialization)
VALUES
    (4, 'Dr. EC Vinaya Kumar', 'male', 'DLO');

INSERT INTO
    doctors(id, name, gender, specialization)
VALUES
    (5, 'Dr. Sanjay Kumar Agarwal', 'male', 'MS');

INSERT INTO
    doctors(id, name, gender, specialization)
VALUES
    (6, 'Dr. Raghava Dutt Mulukatla', 'male', 'FRCS');

INSERT INTO
    doctors(id, name, gender, specialization)
VALUES
    (7, 'Dr. G Kondal Rao', 'male', 'MD');

INSERT INTO
    doctors(id, name, gender, specialization)
VALUES
    (8, 'Dr. Sunil Kumar', 'male', 'MBBS');

INSERT INTO
    doctors(id, name, gender, specialization)
VALUES
    (9, 'Dr. Mangathayaru', 'female', 'MBBS');

CREATE TABLE patients(
    id int primary key,
    name varchar(50) not null,
    age int not null,
    gender Gender not null,
    address varchar(100) not null,
    phonenumber varchar(10) unique not null,
);

INSERT INTO
    patients(id, name, age, gender, address, phonenumber)
VALUES
    (1, 'ganesh', 20, 'male', 'khammam', '1234567890');

INSERT INTO
    patients(id, name, age, gender, address, phonenumber)
VALUES
    (
        2,
        'sathish',
        25,
        'male',
        'kothagudem',
        '1234509876'
    );

INSERT INTO
    patients(id, name, age, gender, address, phonenumber)
VALUES
    (
        3,
        'seetha',
        18,
        'female',
        'yellandhu',
        '0987654321'
    );

INSERT INTO
    patients(id, name, age, gender, address, phonenumber)
VALUES
    (4, 'ram', 27, 'male', 'warangal', '1234567891');

INSERT INTO
    patients(id, name, age, gender, address, phonenumber)
VALUES
    (
        5,
        'prashanth',
        28,
        'male',
        'mulugu',
        '1234509877'
    );

INSERT INTO
    patients(id, name, age, gender, address, phonenumber)
VALUES
    (
        6,
        'lavan',
        29,
        'male',
        'manuguru',
        '1234567892',
    );

INSERT INTO
    patients(id, name, age, gender, address, phonenumber)
VALUES
    (7, 'sanjana', 24, 'female', 'hyd', '1234577890');

INSERT INTO
    patients(id, name, age, gender, address, phonenumber)
VALUES
    (8, 'umran', 23, 'male', 'vizag', '1234568890');

INSERT INTO
    patients(id, name, age, gender, address, phonenumber)
VALUES
    (
        9,
        'samad',
        20,
        'male',
        'vijayawada',
        '1233567890'
    );

INSERT INTO
    patients(id, name, age, gender, address, phonenumber)
VALUES
    (
        10,
        'john',
        22,
        'male',
        'tekullapally',
        '1234667890'
    );

INSERT INTO
    patients(id, name, age, gender, address, phonenumber)
VALUES
    (11, 'stella', 19, 'female', 'bodu', '1224567890');

INSERT INTO
    patients(id, name, age, gender, address, phonenumber)
VALUES
    (
        12,
        'janaki',
        21,
        'female',
        'muratla',
        '1134567890'
    );

INSERT INTO
    patients(id, name, age, gender, address, phonenumber)
VALUES
    (
        13,
        'vishnu',
        22,
        'male',
        'kothagudem',
        '1234567990'
    );

INSERT INTO
    patients(id, name, age, gender, address, phonenumber)
VALUES
    (14, 'peter', 23, 'male', 'khammam', '1234557890');

INSERT INTO
    patients(id, name, age, gender, address, phonenumber)
VALUES
    (
        15,
        'vinnela',
        20,
        'female',
        'yellandhu',
        '1234467890'
    );

CREATE type Room_type as enum('genaral', 'ac', 'icu', 'ward');

CREATE TABLE rooms(
    id int primary key,
    room_name varchar(50) unique not null,
    room_type Room_type unique not null,
    status varchar(50) not null,
    no_of_beds varchar(50) not null
);

INSERT INTO
    rooms(id, room_name, room_type, status, no_of_beds)
VALUES
    (1, 'A', 'genaral', 'full', '10');

INSERT INTO
    rooms(id, room_name, room_type, status, no_of_beds)
VALUES
    (2, 'B', 'ac', 'full', '10');

INSERT INTO
    rooms(id, room_name, room_type, status, no_of_beds)
VALUES
    (3, 'C', 'icu', 'empty', '10');

INSERT INTO
    rooms(id, room_name, room_type, status, no_of_beds)
VALUES
    (4, 'D', 'ward', 'empty', '10');

CREATE TABLE nurses(
    id int primary key,
    name varchar(50) not null,
    gender Gender not null
);

INSERT INTO
    nurses(id, name, gender)
VALUES
    (1, 'sruthi', 'female');

INSERT INTO
    nurses(id, name, gender)
VALUES
    (2, 'vignesh', 'male');

INSERT INTO
    nurses(id, name, gender)
VALUES
    (3, 'pravalika', 'female');

INSERT INTO
    nurses(id, name, gender)
VALUES
    (4, 'rithan', 'male');

INSERT INTO
    nurses(id, name, gender)
VALUES
    (5, 'jamuna', 'female');

INSERT INTO
    nurses(id, name, gender)
VALUES
    (6, 'rajesh', 'male');

INSERT INTO
    nurses(id, name, gender)
VALUES
    (7, 'paradeep', 'male');

INSERT INTO
    nurses(id, name, gender)
VALUES
    (8, 'sushma', 'female');

INSERT INTO
    nurses(id, name, gender)
VALUES
    (9, 'greeshma', 'female');

INSERT INTO
    nurses(id, name, gender)
VALUES
    (10, 'prudhvi', 'male');

CREATE TABLE room_nurse_mapping(
    id int primary key,
    room_id int references rooms(id),
    nurse_id int references nurses(id)
);

INSERT INTO
    room_nurse_mapping(id, room_id, nurse_id)
VALUES
    (1, 1, 1);

INSERT INTO
    room_nurse_mapping(id, room_id, nurse_id)
VALUES
    (2, 1, 2);

INSERT INTO
    room_nurse_mapping(id, room_id, nurse_id)
VALUES
    (3, 2, 3);

INSERT INTO
    room_nurse_mapping(id, room_id, nurse_id)
VALUES
    (4, 2, 4);

INSERT INTO
    room_nurse_mapping(id, room_id, nurse_id)
VALUES
    (5, 3, 5);

INSERT INTO
    room_nurse_mapping(id, room_id, nurse_id)
VALUES
    (6, 3, 6);

INSERT INTO
    room_nurse_mapping(id, room_id, nurse_id)
VALUES
    (7, 4, 7);

INSERT INTO
    room_nurse_mapping(id, room_id, nurse_id)
VALUES
    (8, 4, 8);

INSERT INTO
    room_nurse_mapping(id, room_id, nurse_id)
VALUES
    (9, 2, 9);

INSERT INTO
    room_nurse_mapping(id, room_id, nurse_id)
VALUES
    (10, 3, 10);

CREATE TABLE inwards(
    id int primary key,
    patient_id int references patients(id),
    room_id int references rooms(id),
    status varchar(50),
    total_bill int
);

INSERT INTO
    inwards(id, patient_id, room_id, status, total_bill)
VALUES
    (1, 1, 1, 'admit', 50000);

INSERT INTO
    inwards(id, patient_id, room_id, status, total_bill)
VALUES
    (2, 2, 1, 'discharge', 40000);

INSERT INTO
    inwards(id, patient_id, room_id, status, total_bill)
VALUES
    (3, 3, 1, 'admit', 45000);

INSERT INTO
    inwards(id, patient_id, room_id, status, total_bill)
VALUES
    (4, 4, 2, 'discharge', 60000);

INSERT INTO
    inwards(id, patient_id, room_id, status, total_bill)
VALUES
    (5, 5, 2, 'admit', 65000);

INSERT INTO
    inwards(id, patient_id, room_id, status, total_bill)
VALUES
    (6, 6, 2, 'discharge', 70000);

INSERT INTO
    inwards(id, patient_id, room_id, status, total_bill)
VALUES
    (7, 7, 3, 'admit', 80000);

INSERT INTO
    inwards(id, patient_id, room_id, status, total_bill)
VALUES
    (8, 8, 3, 'discharge', 85000);

INSERT INTO
    inwards(id, patient_id, room_id, status, total_bill)
VALUES
    (9, 9, 4, 'admit', 55000);

INSERT INTO
    inwards(id, patient_id, room_id, status, total_bill)
VALUES
    (10, 10, 4, 'discharge', 60000);

INSERT INTO
    inwards(id, patient_id, room_id, status, total_bill)
VALUES
    (11, 11, 4, 'admit', 65000);

INSERT INTO
    inwards(id, patient_id, room_id, status, total_bill)
VALUES
    (12, 12, 4, 'admit', 80000);

INSERT INTO
    inwards(id, patient_id, room_id, status, total_bill)
VALUES
    (13, 13, 1, 'discharge', 90000);

INSERT INTO
    inwards(id, patient_id, room_id, status, total_bill)
VALUES
    (14, 14, 2, 'admit', 80000);

INSERT INTO
    inwards(id, patient_id, room_id, status, total_bill)
VALUES
    (15, 15, 3, 'discharge', 60000);

alter table
    inwards
add
    disease varchar(50);

update
    inwards
set
    disease = ' Fever'
where
    id < 5;

update
    inwards
set
    disease = ' HeadAche'
where
    id > 4
    and id < 10;

update
    inwards
set
    disease = 'cold'
where
    id > 10
    and id < 15;

update
    inwards
set
    disease = ' HeadAche'
where
    id = 10;

update
    inwards
set
    disease = 'cold'
where
    id = 15;

CREATE TABLE doctor_inwards(
    id int primary key,
    doctor_id int references doctors(id),
    inward_id int references inwards(id),
    status varchar(15) not null
);

INSERT INTO
    doctor_inwards(id, doctor_id, inward_id, status)
VALUES
    (1, 1, 1, 'treating');

INSERT INTO
    doctor_inwards(id, doctor_id, inward_id, status)
VALUES
    (2, 1, 2, 'treated');

INSERT INTO
    doctor_inwards(id, doctor_id, inward_id, status)
VALUES
    (3, 2, 3, 'treating');

INSERT INTO
    doctor_inwards(id, doctor_id, inward_id, status)
VALUES
    (4, 2, 4, 'treated');

INSERT INTO
    doctor_inwards(id, doctor_id, inward_id, status)
VALUES
    (5, 3, 5, 'treating');

INSERT INTO
    doctor_inwards(id, doctor_id, inward_id, status)
VALUES
    (6, 3, 6, 'treated');

INSERT INTO
    doctor_inwards(id, doctor_id, inward_id, status)
VALUES
    (7, 4, 7, 'treating');

INSERT INTO
    doctor_inwards(id, doctor_id, inward_id, status)
VALUES
    (8, 4, 8, 'treated');

INSERT INTO
    doctor_inwards(id, doctor_id, inward_id, status)
VALUES
    (9, 5, 9, 'treating');

INSERT INTO
    doctor_inwards(id, doctor_id, inward_id, status)
VALUES
    (10, 6, 10, 'treated');

INSERT INTO
    doctor_inwards(id, doctor_id, inward_id, status)
VALUES
    (11, 6, 11, 'treating');

INSERT INTO
    doctor_inwards(id, doctor_id, inward_id, status)
VALUES
    (12, 7, 12, 'treated');

INSERT INTO
    doctor_inwards(id, doctor_id, inward_id, status)
VALUES
    (13, 7, 13, 'treating');

INSERT INTO
    doctor_inwards(id, doctor_id, inward_id, status)
VALUES
    (14, 8, 14, 'treated');

INSERT INTO
    doctor_inwards(id, doctor_id, inward_id, status)
VALUES
    (15, 8, 15, 'treating');

CREATE TABLE inward_bill_particulars(
    id int primary key,
    inward_id int references inwards(id),
    bill_discription varchar(200),
    price float
);

INSERT INTO
    inward_bill_particulars(id, inward_id, bill_discription, price)
VALUES
    (1, 1, 'Surgery,medicines,consultation', 50000);

INSERT INTO
    inward_bill_particulars(id, inward_id, bill_discription, price)
VALUES
    (2, 2, 'Surgery,medicines,consultation', 40000);

INSERT INTO
    inward_bill_particulars(id, inward_id, bill_discription, price)
VALUES
    (3, 3, 'Surgery,medicines,consultation', 45000);

INSERT INTO
    inward_bill_particulars(id, inward_id, bill_discription, price)
VALUES
    (4, 4, 'Surgery,medicines,consultation', 60000);

INSERT INTO
    inward_bill_particulars(id, inward_id, bill_discription, price)
VALUES
    (5, 5, 'Surgery,medicines,consultation', 65000);

INSERT INTO
    inward_bill_particulars(id, inward_id, bill_discription, price)
VALUES
    (6, 6, 'Surgery,medicines,consultation', 70000);

INSERT INTO
    inward_bill_particulars(id, inward_id, bill_discription, price)
VALUES
    (7, 7, 'Surgery,medicines,consultation', 80000);

INSERT INTO
    inward_bill_particulars(id, inward_id, bill_discription, price)
VALUES
    (8, 8, 'Surgery,medicines,consultation', 85000);

INSERT INTO
    inward_bill_particulars(id, inward_id, bill_discription, price)
VALUES
    (9, 9, 'Surgery,medicines,consultation', 55000);

INSERT INTO
    inward_bill_particulars(id, inward_id, bill_discription, price)
VALUES
    (10, 10, 'Surgery,medicines,consultation', 60000);

INSERT INTO
    inward_bill_particulars(id, inward_id, bill_discription, price)
VALUES
    (11, 11, 'Surgery,medicines,consultation', 65000);

INSERT INTO
    inward_bill_particulars(id, inward_id, bill_discription, price)
VALUES
    (12, 12, 'Surgery,medicines,consultation', 80000);

INSERT INTO
    inward_bill_particulars(id, inward_id, bill_discription, price)
VALUES
    (13, 13, 'Surgery,medicines,consultation', 90000);

INSERT INTO
    inward_bill_particulars(id, inward_id, bill_discription, price)
VALUES
    (14, 14, 'Surgery,medicines,consultation', 80000);

INSERT INTO
    inward_bill_particulars(id, inward_id, bill_discription, price)
VALUES
    (15, 15, 'Surgery,medicines,consultation', 60000);

CREATE TABLE users(
    id int primary key,
    name varchar(100),
    username varchar(30),
    mobile varchar(10),
    email varchar(50),
    password varchar(200),
    status int default 1
);

INSERT INTO
    users(
        id,
        name,
        username,
        mobile,
        email,
        password,
        status
    )
VALUES
(
        1,
        'Pavan kumar',
        'Pavan095',
        '8106154818',
        'pillipavankumar095@gmail.com',
        'Pavankumar@095',
        1
    );

CREATE TABLE diseases(
    id int primary key,
    name varchar(100),
    disease varchar(50)
);

insert into
    diseases(id, name, disease)
values
('1', 'ganesh', 'fever');

insert into
    diseases(id, name, disease)
values
('2', 'sathish', 'cold');

insert into
    diseases(id, name, disease)
values
('3', 'seetha', 'cough');

insert into
    diseases(id, name, disease)
values
('4', 'ram', 'corona');

insert into
    diseases(id, name, disease)
values
('5', 'prashanth', 'alcer');

insert into
    diseases(id, name, disease)
values
('6', 'lavan', 'cancer');

insert into
    diseases(id, name, disease)
values
('7', 'sanjana', 'diabetes');

insert into
    diseases(id, name, disease)
values
('8', 'umran', 'bloodpressure');

insert into
    diseases(id, name, disease)
values
('9', 'samad', 'Heartattack');

insert into
    diseases(id, name, disease)
values
('10', 'john', 'fever');

insert into
    diseases(id, name, disease)
values
('11', 'stella', 'cold');

insert into
    diseases(id, name, disease)
values
('12', 'janaki', 'cough');

insert into
    diseases(id, name, disease)
values
('13', 'vishnu', 'corona');

insert into
    diseases(id, name, disease)
values
('14', 'peter', 'cancer');

insert into
    diseases(id, name, disease)
values
('15', 'vinnela', 'diabetes');

CREATE SEQUENCE inwards_id_seq;
ALTER TABLE inwards ALTER COLUMN id SET DEFAULT nextval('inwards_id_seq');
ALTER TABLE inwards ALTER COLUMN id SET NOT NULL;
ALTER SEQUENCE inwards_id_seq OWNED BY inwards.id;

SELECT setval('inwards_id_seq', 16, true);