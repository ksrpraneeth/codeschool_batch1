CREATE TABLE employee_details(
    emp_id VARCHAR(10) PRIMARY KEY,
    employee_name VARCHAR(50) NOT NULL,
    designation VARCHAR(50) NOT NULL,
    reporting_Manager VARCHAR(50) NOT NULL,
    ph_no VARCHAR(10) UNIQUE ,
    gender VARCHAR(10) NOT NULL
);

INSERT INTO employee_details VALUES('101','Pavan Sai','Full-Stack-Developer','sampath','1234567891','M');
INSERT INTO employee_details VALUES('102','Sampath','Full-Stack-Developer','Karthik','1234567851','M');
INSERT INTO employee_details VALUES('103','Karthik','Tester','Sai Ram','1234567822','M');
INSERT INTO employee_details VALUES('104','Shyam','HR','Pavan Kumar','1234567866','M');
INSERT INTO employee_details VALUES('105','Prashanth','Android Developer','Manish','8541023654','M');
INSERT INTO employee_details VALUES('107','max','Marketing Manager','Vamshi','8834567851','F');
INSERT INTO employee_details VALUES('108','Sai Krishna','Manager','Krishna','9934567822','M');
INSERT INTO employee_details VALUES('109','Alex','SQL Developer','Vineeth','7734567866','F');

alter TABLE employee_details add column salary integer ;
update employee_details set salary='120000' where emp_id='101';
update employee_details set salary='32000' where emp_id='102';
update employee_details set salary='72000' where emp_id='103';
update employee_details set salary='100000' where emp_id='104';
update employee_details set salary='110000' where emp_id='105';
update employee_details set salary='45000' where emp_id='107';
update employee_details set salary='50000' where emp_id='108';
update employee_details set salary='80000' where emp_id='109';

alter TABLE employee_details drop column designation;
alter TABLE employee_details drop column reporting_Manager;
alter TABLE employee_details add column designation_id varchar(10) REFERENCES job_role(id);
alter TABLE employee_details add column reports_to varchar(10) REFERENCES employee_details(emp_id);
update employee_details set reports_to='105' where emp_id='101';
update employee_details set reports_to='103' where emp_id='102';
update employee_details set reports_to='104' where emp_id='103';
update employee_details set reports_to='105' where emp_id='104';
update employee_details set reports_to='107' where emp_id='105';
update employee_details set reports_to='105' where emp_id='107';
update employee_details set reports_to='102' where emp_id='108';
update employee_details set reports_to='104' where emp_id='109';

CREATE TABLE job_role(
    id VARCHAR(10) primary key,
    designation VARCHAR(50)
)

INSERT INTO job_role values('301','Full-Stack-Developer');
INSERT INTO job_role values('302','Tester');
INSERT INTO job_role values('303','Web Developer');
INSERT INTO job_role values('304','HR');
INSERT INTO job_role values('305','Marketing-Manager');
INSERT INTO job_role values('306','HR-Head');
INSERT INTO job_role values('307','Administrator');
INSERT INTO job_role values('308','Data Analyst');



CREATE TABLE project(
    project_id VARCHAR(20) primary key,
    project_name VARCHAR(50),
    emp_id VARCHAR(10) REFERENCES employee_details(emp_id)
);

INSERT INTO project VALUES('2201','Amazon','101');
INSERT INTO project VALUES('2202','HP','101');
INSERT INTO project VALUES('2203','Govt','103');
INSERT INTO project VALUES('2204','Microsoft','104');
INSERT INTO project VALUES('2205','google','107');
INSERT INTO project VALUES('2206','Dell','102');
INSERT INTO project VALUES('2207','lenovo','101');
INSERT INTO project VALUES('2208','Microsoft','105');

alter TABLE project drop column emp_id;
alter TABLE project add column client varchar(50);
alter TABLE project add column description varchar(50);
alter TABLE project add column duration_in_months integer;

update project set client='Pixelvide',description='Creating a web page',duration_in_months='3' where project_id='2201';
update project set client='hcl',description='Adding the Payment option',duration_in_months='2' where project_id='2202';
update project set client='TCS',description='Adding the menu button with popup',duration_in_months='1' where project_id='2203';
update project set client='Wipro',description='Adding the Payment option',duration_in_months='2' where project_id='2204';
update project set client='Infosys',description='Building Employee PayRoll App',duration_in_months='5' where project_id='2205';
update project set client='Acc',description='New Options',duration_in_months='3' where project_id='2206';
update project set client='CTS',description='New App for Easy Onboarding',duration_in_months='4' where project_id='2207';
update project set client='Capgemini',description='Exam Text Link for freshers',duration_in_months='5' where project_id='2208';

CREATE table Project_mapping(
    project_id varchar(10) REFERENCES project(project_id),
    employee_id varchar(10) REFERENCES employee_details(emp_id)
)

INSERT into Project_mapping values('2201','101');
INSERT into Project_mapping values('2202','102');
INSERT into Project_mapping values('2203','103');
INSERT into Project_mapping values('2202','105');
INSERT into Project_mapping values('2203','106');
INSERT into Project_mapping values('2202','107');
INSERT into Project_mapping values('2205','108');
INSERT into Project_mapping values('2207','101');
INSERT into Project_mapping values('2206','102');
INSERT into Project_mapping values('2208','101');
INSERT into Project_mapping values('2202','103');
INSERT into Project_mapping values('2206','101');
INSERT into Project_mapping values('2205','102');
INSERT into Project_mapping values('2202','105');
INSERT into Project_mapping values('2204','105');


CREATE TABLE salary(
    emp_id VARCHAR(10) REFERENCES employee_details(emp_id),
    total_working_days INTEGER,
    days_on_leave INTEGER,
    salary_credited INTEGER,
    salary  INTEGER
);

INSERT INTO salary VALUES('101','25','20','100000','120000');
INSERT INTO salary VALUES('102','25','19','25000','32000');
INSERT INTO salary VALUES('103','25','22','35000','72000');
INSERT INTO salary VALUES('104','25','15','60000','100000');
INSERT INTO salary VALUES('105','25','20','125000','100000');
INSERT INTO salary VALUES('107','25','21','50000','45000');
INSERT INTO salary VALUES('108','25','18','60000','50000');
INSERT INTO salary VALUES('109','25','16','100000','80000');

alter table salary drop column salary;
alter table salary add column month varchar(10);
update salary set month='November' where emp_id is not null;

CREATE TABLE groups(
    group_id VARCHAR(10) primary key,
    group_name VARCHAR(50)
);

INSERT INTO groups VALUES('201','Operations');
INSERT INTO groups VALUES('202','Testing');
INSERT INTO groups VALUES('203','Human Resources');
INSERT INTO groups VALUES('205','Marketing');


CREATE TABLE group_mapping(
    group_id VARCHAR(10) REFERENCES groups(group_id),
    emp_id VARCHAR(10) REFERENCES employee_details(emp_id),
    ad_min VARCHAR(10) REFERENCES employee_details(emp_id)
);
INSERT INTO group_mapping VALUES('201','101','101');
INSERT INTO group_mapping VALUES('202','101','103');
INSERT INTO group_mapping VALUES('201','102','104');
INSERT INTO group_mapping VALUES('203','102','102');
INSERT INTO group_mapping VALUES('205','103','103');
INSERT INTO group_mapping VALUES('202','103','101');
INSERT INTO group_mapping VALUES('201','104','104');
INSERT INTO group_mapping VALUES('203','104','102');

CREATE TABLE group_messages(
    msg_id VARCHAR(20) primary key,
    from_emp_id VARCHAR(10) REFERENCES employee_details(emp_id),
    messages VARCHAR(100),
    to_emp_id VARCHAR(10) REFERENCES employee_details(emp_id)
);

INSERT INTO messages VALUES('1201','101','Error Detected','104');
INSERT INTO messages VALUES('202','102','Invalid output','101');
INSERT INTO messages VALUES('203','103','Not Responsive','102');
INSERT INTO messages VALUES('205','104','urgent','101');

alter table messages add column msg_date date;
update messages set msg_date='24-12-2022' where msg_id='1201';
update messages set msg_date='27-12-2022' where msg_id='202';
update messages set msg_date='26-12-2022' where msg_id='203';
update messages set msg_date='25-12-2022' where msg_id='205';


CREATE TABLE group_mapping(
    emp_id VARCHAR(10) REFERENCES employee_details(emp_id),
    group_id VARCHAR(10) REFERENCES groups(group_id)
);
INSERT INTO group_mapping VALUES('101','201');
INSERT INTO group_mapping VALUES('102','201');
INSERT INTO group_mapping VALUES('101','202');
INSERT INTO group_mapping VALUES('103','203');


CREATE TABLE attendence(
    id bigserial primary key,
    emp_id VARCHAR(10) REFERENCES employee_details(emp_id),
    dates DATE,
    status BOOLEAN 
);

INSERT INTO attendence(emp_id,dates,status) VALUES('101','12-12-2022','0');
INSERT INTO attendence(emp_id,dates,status) VALUES('102','12-12-2022','1');
INSERT INTO attendence(emp_id,dates,status) VALUES('104','12-12-2022','1');
INSERT INTO attendence(emp_id,dates,status) VALUES('105','12-12-2022','1');
INSERT INTO attendence(emp_id,dates,status) VALUES('107','12-12-2022','1');
INSERT INTO attendence(emp_id,dates,status) VALUES('108','12-12-2022','1');
INSERT INTO attendence(emp_id,dates,status) VALUES('109','12-12-2022','1');
INSERT INTO attendence(emp_id,dates,status) VALUES('101','13-12-2022','1');
INSERT INTO attendence(emp_id,dates,status) VALUES('102','13-12-2022','0');
INSERT INTO attendence(emp_id,dates,status) VALUES('103','13-12-2022','1');
INSERT INTO attendence(emp_id,dates,status) VALUES('104','13-12-2022','1');
INSERT INTO attendence(emp_id,dates,status) VALUES('105','13-12-2022','1');
INSERT INTO attendence(emp_id,dates,status) VALUES('107','13-12-2022','1');
INSERT INTO attendence(emp_id,dates,status) VALUES('108','13-12-2022','1');
INSERT INTO attendence(emp_id,dates,status) VALUES('109','13-12-2022','1');
INSERT INTO attendence(emp_id,dates,status) VALUES('101','14-12-2022','1');
INSERT INTO attendence(emp_id,dates,status) VALUES('102','14-12-2022','0');
INSERT INTO attendence(emp_id,dates,status) VALUES('103','14-12-2022','1');
INSERT INTO attendence(emp_id,dates,status) VALUES('104','14-12-2022','1');
INSERT INTO attendence(emp_id,dates,status) VALUES('105','14-12-2022','0');
INSERT INTO attendence(emp_id,dates,status) VALUES('107','14-12-2022','1');
INSERT INTO attendence(emp_id,dates,status) VALUES('108','14-12-2022','1');
INSERT INTO attendence(emp_id,dates,status) VALUES('109','14-12-2022','0');
INSERT INTO attendence(emp_id,dates,status) VALUES('108','15-12-2022','1');



CREATE TABLE group_messages(
    msg_id VARCHAR(20) primary key,
    from_emp_id VARCHAR(10) REFERENCES employee_details(emp_id),
    messages VARCHAR(100),
    group_id VARCHAR(10) REFERENCES groups(group_id)
);

INSERT INTO group_messages VALUES('1201','101','Error Detected','201');
INSERT INTO group_messages VALUES('202','102','Invalid output','202');
INSERT INTO group_messages VALUES('203','103','Not Responsive','203');
INSERT INTO group_messages VALUES('205','104','urgent','201');

alter table group_messages add column msg_date date;
update group_messages set msg_date='24-12-2022' where msg_id='1201';
update group_messages set msg_date='26-12-2022' where msg_id='202';
update group_messages set msg_date='25-12-2022' where msg_id='203';
update group_messages set msg_date='22-12-2022' where msg_id='205';



get all the employees with details order by salaries permonth desc
(
    select *from employee_details order by salary desc;
)
get all the employee details attendence order by desc
(
    select e.*,count(a.status) total_days_present from  employee_details e ,attendence a where e.emp_id=a.emp_id and a.status='1' group by e.emp_id order by count(a.status) desc;
)
get all the employee details project order by desc(
    select e.*,count(pm.project_id) from employee_details e,Project_mapping pm where pm.employee_id=e.emp_id group by e.emp_id order by count(pm.project_id) desc;
)
get nth(3rd) of employee with highest salary(
    select *from employee_details order by salary desc limit 1 offset 2;
)
get nth(5rd)  employee details attendence order by desc(
    select e.*,count(a.status) total_days_present from  employee_details e ,attendence a where e.emp_id=a.emp_id and a.status='1' group by e.emp_id order by count(a.status) desc limit 1 offset 4;
)



select e1.emp_id ,e1.employee_name,j.designation,e2.employee_name reporting_Manager from employee_details e1, employee_details e2,job_role j where j.id=e1.designation_id and e1.emp_id=e2.reports_to;

select e.emp_id,e.employee_name from employee_details e, attendence a where e.emp_id=a.emp_id and a.status='0' and a.dates='14-12-2022';
select emp_id from attendence where dates='15-12-2022' and status='1';

select emp_id,employee_name from employee_details where emp_id!='108';

select dates,count(emp_id) present,(select count(emp_id) from attendence where status='0' group by dates order by dates) from attendence where status='1' group by dates order by dates ;

