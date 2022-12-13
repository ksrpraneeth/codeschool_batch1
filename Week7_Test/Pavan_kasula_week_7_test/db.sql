create database company;

create table users(
    id bigserial primary key not null,
    username varchar(55) not null,
    password varchar(55) not null,
    email varchar(55) not null,
    phonenumber varchar(55) not null,
    tokens varchar(25)
    );

   ----   drop table users;

   insert into users(username, password, email,phonenumber) values ('pavan','141bc86dfd5c40e3cc37219c18d471ca','pavan@gmail.com','7013309894');

   create table employee_details(
    id bigserial primary key ,
    user_name varchar(55) ,
    first_name varchar(55) not null,
    last_name varchar(55) not null,
    aadhar_number varchar(55) not null,
    phone_number varchar(55) not null,
    department_id varchar(255) not null,
    designation varchar(255) not null
   );
   
   drop table  employee_details;

   insert into employee_details(first_name, last_name, aadhar_number,phone_number,department_id,designation

   create table designations(
    id bigserial primary key ,
    designation varchar(55) not null,
    department_id varchar(44) references departments(id)
   );
 

 insert into designations(designation,department_id) values('Senior Developer','1');
 insert into designations(designation,department_id) values('Junior Developer','1');
 insert into designations(designation,department_id) values('Associate Developer','1');

 insert into designations(designation,department_id) values('Senior Software Tester','2');
 insert into designations(designation,department_id) values('Junior Software Tester','2');
 insert into designations(designation,department_id) values('Quality Head','2');

 insert into designations(designation,department_id) values('UI Designer','3');
 insert into designations(designation,department_id) values('UX Designer','3');
 insert into designations(designation,department_id) values('Editor','3');

   insert into designations(designation,department_id) values('Senior Operations Head','4');
   insert into designations(designation,department_id) values('Junior Operations Head','4');
   insert into designations(designation,department_id) values('Delivery Head','4');

insert into designations(designation,department_id) values('HR head','5');
insert into designations(designation,department_id) values('HR junior','5');


insert into designations(designation,department_id) values('Senior legal advisor','6');
insert into designations(designation,department_id) values('Junior legal advisor','6');
insert into designations(designation,department_id) values('Senior legal associate','6');
insert into designations(designation,department_id) values('Junior legal associate','6');
insert into designations(designation,department_id) values('Lawyer','6');



   create table departments(
    id varchar(55) primary key ,
    department_name varchar(55) not null
   );
insert into departments(id,department_name) values('1','Develeper Department');
insert into departments(id,department_name) values('2','Testing Department');
insert into departments(id,department_name) values('3','Frontend Developers');
insert into departments(id,department_name) values('4','Operations Department');
insert into departments(id,department_name) values('5','Human Resources Department');
insert into departments(id,department_name) values('6','Legal Department');

drop table departments;