create table pay_roll(
    emp_id varchar(20) references emp_table(emp_id),
    month varchar(20),
    no_of_working_days integer,
    salary_credited bigint
);

select
    e.emp_id,
    e.emp_name,
    (
        select
            month
        from
            pay_roll
    ),
    (
        select
            no_of_working_days
        from
            pay_roll
    ),
    (
        select
            salary_credited
        from
            pay_roll
    ),
    count(a.status) total_days_present
from
    emp_table e,
    emp_attendence a,
    pay_roll p
where
    e.emp_id = a.emp_id
    and e.emp_id = p.emp_id
    and a.status = 't'
group by
    e.emp_id,
    p.month;

select
    e.emp_id,
    e.emp_name,
    p.month,
    p.no_of_working_days,
    p.salary_credited,
    a.count total_days_present
FROM
    emp_table e,
    pay_roll p,
    (
        select
            emp_id,
            count(status) count
        FROM
            emp_attendence
        GROUP BY
            emp_id
    ) a
where
    e.emp_id = a.emp_id
    and p.emp_id = e.emp_id;

create table project_details(
    projec_id varchar(20) references projects(project_id) on delete
    set
        null,
        Description varchar(500),
        start_date date,
        end_date date,
        budget bigint
);

insert into
    project_details
values
    (
        '2201',
        'Hosting applications is easy with Lightsail. You can launch a pre-configured development stack with just a few clicks, including LAMP, LEMP (Nginx), MEAN, and Node.js. Or you can use Lightsail to run open source or commercial software for yourself or your business, like file storage and sharing, backup, financial and accounting software, and much more.',
        '02-02-2022',
        '02-05-2022',
        '500000'
    );

insert into
    project_details
values
    (
        '2203',
        'WordPress is one of the most popular platforms to run websites, blogs, online stores, and more. With Lightsail, you can install WordPress on your own VPS with just a few clicks. Lightsail WordPress instances are launched preconfigured and optimized for fast performance and security.',
        '12-5-2022',
        '02-10-2022',
        '520000'
    );

select
    e.emp_name,
    t.to_empid,
    t.message_date,
    f.from_empid,
    f.message_date
from
    employee e,
    messages t,
    messages f
where
    e.emp_id = f.from_empid
    and e.emp_id = t.to_empid
    and t.to_empid = '101'
    and f.from_empid = '102';

SELECT
    from_emp.emp_name,
    m.from_empid,
    m.message,
    m.message_date,
    to_emp.emp_name,
    m.to_empid
FROM
    employee from_emp,
    employee to_emp,
    messages m
WHERE
    m.from_empid = from_emp.emp_id
    AND m.to_empid = to_emp.emp_id;

select
    LAST_VALUE(message) OVER(
        order by
            msg_id
    ),
    to_empid
from
    messages
where
    from_empid = '102'
group by
    to_empid,
    message;

select
    distinct on (to_empid) *
from
    messages
where
    from_empid = '102'
order by
    to_empid,
    msg_id DESC;

(
    SELECT
        *
    FROM
        messages
    WHERE
        from_empid = '102'
        AND to_empid = '101'
    UNION
    SELECT
        *
    FROM
        messages
    WHERE
        to_empid = '102'
        AND from_empid = '101'
)
ORDER BY
    msg_id DESC;

create table employee_details(emp_id varchar(20) references employee(emp_id),first_name varchar(200),last_name varchar(200),dob date,address varchar(200),date_joined date);
 alter table employee add column date_joined date;

 select e.emp_id,e.emp_name,extract(month from a.date),count(a.status),((e.salary/30)*count(a.status)) salary_credited from employee e,emp_attendance a where a.emp_id=e.emp_id and a.status='t' group by e.emp_id,extract(month from a.date) order by extract(month from a.date) desc;
 
    select e.emp_id,e.emp_name,extract(month from a.date) credited_month,extract(year from a.date) credited_year,count(a.status) total_days_present,((e.salary/30)*count(a.status)) salary_credited ,case when a.date<current_date then 'credited'end status
    from employee e,emp_attendance a where a.emp_id=e.emp_id  and a.status='t' group by e.emp_id,extract(month from a.date),extract(year from a.date),a.date order by (extract(month from a.date),extract(year from a.date)) desc;


SELECT sv.*, es.id FROM emp_salary_view sv
LEFT JOIN emp_salary_status es
    ON sv.emp_id=es.emp_id AND sv.credited_month = extract(month from es.date_paid)
    AND sv.credited_year = extract(year from es.date_paid)
WHERE es.id IS NOT NULL;