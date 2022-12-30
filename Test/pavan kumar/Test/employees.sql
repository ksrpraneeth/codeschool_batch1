 create  database employees;

CREATE TABLE users(
    id bigserial primary key,
    username varchar(50) not null UNIQUE,
    password varchar(50) not null,
    email varchar(50) not null UNIQUE,
    dateofbirth date not null,
    token varchar(50)
);

CREATE TABLE employees_details(
    employeeid int primary key,
    name varchar(50) not null  
);

CREATE TABLE employees_address(
    id bigserial primary key,
    employeeid int references employees_details(employeeid),
    address varchar(200) not null  
);
