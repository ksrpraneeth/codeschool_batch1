CREATE DATABASE company;
CREATE TABLE employeedetails(
      employeeid int PRIMARY KEY ,
      firstname VARCHAR (50)  NOT NULL,
      Lastname VARCHAR (50) NOT NULL,
      gender VARCHAR (20) NOT NULL,
      Age integer NOT NULL
);
 INSERT INTO employeedetails(employeeid,firstname,Lastname,gender,Age) VALUES ('1','shiva','ram','male','27');
 INSERT INTO employeedetails(employeeid,firstname,Lastname,gender,Age) VALUES ('2','prem','kumar','male','25');
INSERT INTO employeedetails(employeeid,firstname,Lastname,gender,Age) VALUES ('3','hari','charam','male','25');
 INSERT INTO employeedetails(employeeid,firstname,Lastname,gender,Age) VALUES ('4','krishna','kumari','female','24');
 INSERT INTO employeedetails(employeeid,firstname,Lastname,gender,Age) VALUES ('5','hemanth','chandra','male','25');
 INSERT INTO employeedetails(employeeid,firstname,Lastname,gender,Age) VALUES ('6','praneeth','ram','male','25');
 INSERT INTO employeedetails(employeeid,firstname,Lastname,gender,Age) VALUES ('7','shyam','nandhan','male','28');
 INSERT INTO employeedetails(employeeid,firstname,Lastname,gender,Age) VALUES ('8','abdul','sattar','male','32');
 INSERT INTO employeedetails(employeeid,firstname,Lastname,gender,Age) VALUES ('9','satya','sri','female','24');
 INSERT INTO employeedetails(employeeid,firstname,Lastname,gender,Age) VALUES ('10','arjun','sharma','male','20');

CREATE TABLE employeecontactlist(
      employeeid INT references employeedetails(employeeid),
     address VARCHAR (50) NOT NULL,
     email varchar(50) NOT NULL,
     phonenumber VARCHAR (50) NOT NULL,
     managerid VARCHAR (50) NOT NULL

);
   INSERT INTO employeecontactlist(employeeid,address,email,phonenumber,managerid) VALUES ('1','hyderabad','prem@gmail.com','9985660529','120');
   INSERT INTO employeecontactlist(employeeid,address,email,phonenumber,managerid) VALUES ('2','kukatapally','shiva@gmail.com','9985660529','120');
   INSERT INTO employeecontactlist(employeeid,address,email,phonenumber,managerid) VALUES ('3','ammeerpet','hari@gmail.com','9985660528','120');
   INSERT INTO employeecontactlist(employeeid,address,email,phonenumber,managerid) VALUES ('4','miyapur','krishna@gmail.com','9885660527','120');
   INSERT INTO employeecontactlist(employeeid,address,email,phonenumber,managerid) VALUES ('5','kachiguda','hemanth@gmail.com','9875660527','120');
   INSERT INTO employeecontactlist(employeeid,address,email,phonenumber,managerid) VALUES ('6','gachibwli','praneeth@gmail.com','9985660527','120');
   INSERT INTO employeecontactlist(employeeid,address,email,phonenumber,managerid) VALUES ('7','madhapur','madhapur','abdul@gmail.com','6301239775','120');
   INSERT INTO employeecontactlist(employeeid,address,email,phonenumber,managerid) VALUES ('8','khammam','abdul@gmail.com','6301239775','120');
   INSERT INTO employeecontactlist(employeeid,address,email,phonenumber,managerid) values ('9','Hyderabad','satya@gmail.com','996688027','120');
   INSERT INTO employeecontactlist(employeeid,address,email,phonenumber,managerid) values ('10','jublieehills','arjun@gmail.com','9966880147','120');

CREATE TABLE employee_attendance(
    employeeid INT references employeedetails(employeeid),
    date  date,
    presentstatus VARCHAR(20) NOT NULL,
    Intime VARCHAR(20) NOT NULL,
    Outtime varchar(20) NOT NULL,
    Salary varchar(40) NOT NULL
);
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('1','12-11-2022','present','12-11-2022 10:00AM','12-11-2022 5:30PM','20,000');
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('2','12-11-2022','present','12-11-2022 10:05AM','12-11-2022 5:35PM','20,000');
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('3','12-11-2020','absent','','','20,000');
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('4','12-11-2022','present','12-11-2022 09:57AM','12-11-2022 5:20PM','20,000');
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('5','12-11-2022','present','12-11-2022 09:30AM','12-11-2022 5:20PM','20,000');
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('6','12-11-2022','present','12-11-2022 09:44AM','12-11-2022 5:00PM','22,000');
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('7','12-11-2022','present','12-11-2022 10:07AM','12-11-2022 5:35PM','20,000');
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('8','12-11-2022','absent','','','20,000');
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('9','12-11-2022','present','12-11-2022 10:07AM','12-11-2022 5:30PM','20,000');
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('10','12-11-2022','present','12-11-2022 10:15AM','12-11-2022 5:30PM','20,000');
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('1','13-11-2022','present','12-11-2022 10:15AM','13-11-2022 5:30PM','20,000');
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('2','13-11-2022','present','12-11-2022 10:15AM','13-11-2022 5:30PM','20,000');
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('3','13-11-2022','absent','','','20,000');
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('4','13-11-2022','present','12-11-2022 10:15AM','13-11-2022 5:30PM','20,000');
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('5','13-11-2022','present','12-11-2022 10:15AM','13-11-2022 5:30PM','20,000');
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('6','13-11-2022','present','12-11-2022 10:15AM','13-11-2022 5:30PM','20,000');
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('7','13-11-2022','present','12-11-2022 10:15AM','13-11-2022 5:30PM','20,000');
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('8','13-11-2022','absent','','','20,000');
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('9','13-11-2022','present','12-11-2022 10:15AM','13-11-2022 5:30PM','20,000');
INSERT INTO employee_attendance(employeeid,date,presentstatus,Intime,Outtime,salary) VALUES ('10','13-11-2022','present','12-11-2022 10:15AM','13-11-2022 5:30PM','20,000');

CREATE TABLE projects(
    employeeid INT references employeedetails(employeeid),
    projectWorking VARCHAR(40) NOT NULL,
    project_id int PRIMARY KEY
);

INSERT INTO Projects(employeeid,projectWorking,project_id) VALUES ('1','developer','122');
INSERT INTO Projects(employeeid,projectWorking,project_id) VALUES ('3','developer','130');
INSERT INTO Projects(employeeid,projectWorking,project_id) VALUES ('3','management lead','33');
INSERT INTO Projects(employeeid,projectWorking,project_id) VALUES ('4','H.R','31');
INSERT INTO Projects(employeeid,projectWorking,project_id) VALUES ('5','associate manager','90');
INSERT INTO Projects(employeeid,projectWorking,project_id) VALUES ('6','testing','12');
INSERT INTO Projects(employeeid,projectWorking,project_id) VALUES ('7','associate manager','22');
INSERT INTO Projects(employeeid,projectWorking,project_id) VALUES ('8','senior developer','21');
INSERT INTO Projects(employeeid,projectWorking,project_id) VALUES ('9','management department','32');
INSERT INTO Projects(employeeid,projectWorking,project_id) VALUES ('10','testing','10');

SELECT e.employeeid,ea.date, count(presentstatus) from employeedetails e, employee_attendance ea where e.employeeid = ea.employeeid group by
e.employeeid , ea.date order by count(presentstatus) desc;


SELECT e.employeeid,e.firstname,e.lastname,count(p.project_id) from employeedetails e, projects p where e.employeeid = p.employeeid group by e.employeeid;

SELECT e.employeeid,e.firstname,e.lastname,ea.salary from employeedetails e, employee_attendance ea where e.employeeid = ea.employeeid group by
 e. employeeid  order by salary  desc; 
 
1)select e.employeeid,e.firstname,e.Lastname,count(p.project_id) from employeedetails e,  projects p where e.employeeid =p.employeeid group by e.employeeid;
2)Select employeeid,date,presentstatus from employee_attendance order by date desc;
3)SELECT employeeid,employeename,salary
FROM employeesalary order by salary desc;
4)SELECT e.employeeid,e.firstname,e.lastname,p.project_id from employeedetails e, projects p where e.employeeid = p.employeeid order by project_id desc;
5)SELECT employeeid,max(presentstatus)from employee_attendance group by employeeid;
6)SELECT employeeid,employename,salary from employeesalary order by salary desc limit 1;


SELECT e.employeeid,e.firstname,e.lastname,presentstatus,date from employeedetails e, employee_attendance where presentstatus = 'absent';