

create table pay_roll(emp_id varchar(20) references emp_table(emp_id),month varchar(20),no_of_working_days integer,salary_credited bigint);
select e.emp_id,e.emp_name,(select month from pay_roll),(select no_of_working_days from pay_roll),(select salary_credited from pay_roll),count(a.status) total_days_present from emp_table e,emp_attendence a,pay_roll p where e.emp_id=a.emp_id and e.emp_id=p.emp_id and a.status='t' group by e.emp_id,p.month ;

 select e.emp_id,e.emp_name,p.month, p.no_of_working_days,p.salary_credited,a.count total_days_present FROM emp_table e, pay_roll p, (select emp_id, count(status) count FROM  emp_attendence GROUP BY emp_id) a where e.emp_id=a.emp_id and p.emp_id=e.emp_id;

create table project_details(projec_id varchar(20) references projects(project_id) on delete set null,Description varchar(500),start_date date,end_date date,budget bigint);
insert into project_details values('2201','Hosting applications is easy with Lightsail. You can launch a pre-configured development stack with just a few clicks, including LAMP, LEMP (Nginx), MEAN, and Node.js. Or you can use Lightsail to run open source or commercial software for yourself or your business, like file storage and sharing, backup, financial and accounting software, and much more.','02-02-2022','02-05-2022','500000');
insert into project_details values('2203','WordPress is one of the most popular platforms to run websites, blogs, online stores, and more. With Lightsail, you can install WordPress on your own VPS with just a few clicks. Lightsail WordPress instances are launched preconfigured and optimized for fast performance and security.','12-5-2022','02-10-2022','520000');
