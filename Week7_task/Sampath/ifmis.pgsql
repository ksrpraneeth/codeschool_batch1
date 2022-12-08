--
-- PostgreSQL database dump
--

-- Dumped from database version 15.1
-- Dumped by pg_dump version 15.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: adding_types; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.adding_types (
    id integer NOT NULL,
    type character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    cannot_delete boolean DEFAULT false NOT NULL
);


ALTER TABLE public.adding_types OWNER TO postgres;

--
-- Name: adding_types_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.adding_types ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.adding_types_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: bill_addings; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.bill_addings (
    id integer NOT NULL,
    s_bill_id integer NOT NULL,
    s_bill_emp_map_id integer NOT NULL,
    adding_type_id integer NOT NULL,
    amount integer NOT NULL
);


ALTER TABLE public.bill_addings OWNER TO postgres;

--
-- Name: bill_addings_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.bill_addings ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.bill_addings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: bill_ids; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.bill_ids (
    id integer NOT NULL,
    user_id integer NOT NULL,
    name character varying(255) NOT NULL
);


ALTER TABLE public.bill_ids OWNER TO postgres;

--
-- Name: bill_ids_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.bill_ids ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.bill_ids_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: employee; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.employee (
    id integer NOT NULL,
    bill_id integer NOT NULL,
    name character varying(255) NOT NULL,
    emp_code character varying(255) NOT NULL,
    father_name character varying(255) NOT NULL,
    bank_ac_no character varying(255) NOT NULL,
    ifsccode character varying(255),
    department character varying(255),
    designation character varying(255)
);


ALTER TABLE public.employee OWNER TO postgres;

--
-- Name: employee_adding_types; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.employee_adding_types (
    id integer NOT NULL,
    emp_id integer NOT NULL,
    adding_type_id integer NOT NULL,
    amount bigint NOT NULL
);


ALTER TABLE public.employee_adding_types OWNER TO postgres;

--
-- Name: employee_adding_types_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.employee_adding_types ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.employee_adding_types_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: employee_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.employee ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.employee_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: modules; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.modules (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    logo character varying(255) NOT NULL,
    url character varying(255) NOT NULL
);


ALTER TABLE public.modules OWNER TO postgres;

--
-- Name: modules_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.modules ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.modules_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: modules_users_map; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.modules_users_map (
    id integer NOT NULL,
    module_id integer NOT NULL,
    user_id integer NOT NULL
);


ALTER TABLE public.modules_users_map OWNER TO postgres;

--
-- Name: modules_users_map_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.modules_users_map ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.modules_users_map_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: s_bill_emp_map; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.s_bill_emp_map (
    id integer NOT NULL,
    s_bill_id integer NOT NULL,
    bill_id integer NOT NULL,
    emp_id integer NOT NULL,
    total_earnings bigint NOT NULL,
    total_deductions bigint NOT NULL,
    month integer NOT NULL,
    year integer NOT NULL
);


ALTER TABLE public.s_bill_emp_map OWNER TO postgres;

--
-- Name: s_bill_emp_map_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.s_bill_emp_map ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.s_bill_emp_map_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: sessions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sessions (
    id integer NOT NULL,
    user_id integer NOT NULL,
    session_id character varying(255) NOT NULL,
    expiry_time timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    createaddate timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.sessions OWNER TO postgres;

--
-- Name: sessions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.sessions ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.sessions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: sidebar_menu; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sidebar_menu (
    id integer NOT NULL,
    module_id integer NOT NULL,
    name character varying(255) NOT NULL,
    logo character varying(255) NOT NULL,
    url character varying(255) NOT NULL
);


ALTER TABLE public.sidebar_menu OWNER TO postgres;

--
-- Name: sidebar_menu_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.sidebar_menu ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.sidebar_menu_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: supplementary_bills; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.supplementary_bills (
    id bigint NOT NULL,
    user_id integer NOT NULL,
    bill_date timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    total_earnings bigint NOT NULL,
    total_deductions bigint NOT NULL
);


ALTER TABLE public.supplementary_bills OWNER TO postgres;

--
-- Name: supplementary_bills_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.supplementary_bills ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.supplementary_bills_id_seq
    START WITH 400000
    INCREMENT BY 20
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    ddocode character varying(255) DEFAULT ''::character varying NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.users ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Data for Name: adding_types; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.adding_types (id, type, name, cannot_delete) FROM stdin;
1	DEDUCTION	Insurance	f
2	DEDUCTION	Home Loan	f
3	DEDUCTION	Deduction Temp 1	f
4	DEDUCTION	Deduction Temp 2	f
5	DEDUCTION	Deduction Temp 3	f
7	EARNING	Incentivies	f
8	EARNING	Earning Temp 1	f
9	EARNING	Earning Temp 2	f
10	EARNING	Earning Temp 3	f
6	EARNING	Basic Pay	t
\.


--
-- Data for Name: bill_addings; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.bill_addings (id, s_bill_id, s_bill_emp_map_id, adding_type_id, amount) FROM stdin;
1	400040	3	6	10000
2	400040	3	2	5000
3	400060	4	7	10000
4	400060	4	4	1000
5	400060	5	6	10000
6	400060	5	2	1000
7	400080	6	6	1000
8	400080	6	2	1000
9	400080	7	6	1000
10	400080	7	7	10000
11	400080	7	2	500
12	400080	7	4	600
13	400140	10	8	1000
14	400140	10	6	1000
15	400140	10	2	1000
\.


--
-- Data for Name: bill_ids; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.bill_ids (id, user_id, name) FROM stdin;
1	3	Bill 01
2	3	Bill 02
3	3	Bill 03
\.


--
-- Data for Name: employee; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.employee (id, bill_id, name, emp_code, father_name, bank_ac_no, ifsccode, department, designation) FROM stdin;
1	1	Sampath Bandla	E001	Saidulu	1234567890	\N	\N	\N
2	1	Sandeep Bandla	E002	Saidulu	1234567891	\N	\N	\N
3	1	Usha Bandla	E003	Saidulu	1234567892	\N	\N	\N
\.


--
-- Data for Name: employee_adding_types; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.employee_adding_types (id, emp_id, adding_type_id, amount) FROM stdin;
16	1	2	1000
26	1	6	10000
37	2	7	1000
38	2	4	1000
39	2	6	10000
40	2	2	1000
41	1	8	100
\.


--
-- Data for Name: modules; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.modules (id, name, logo, url) FROM stdin;
1	Bills Section	currency-dollar	./modules/billSection.php
2	HR Section	person	./modules/hrSection.php
\.


--
-- Data for Name: modules_users_map; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.modules_users_map (id, module_id, user_id) FROM stdin;
2	1	3
3	2	3
4	1	5
5	2	5
\.


--
-- Data for Name: s_bill_emp_map; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.s_bill_emp_map (id, s_bill_id, bill_id, emp_id, total_earnings, total_deductions, month, year) FROM stdin;
1	400000	1	1	0	0	12	2022
2	400020	1	1	0	0	11	2022
3	400040	1	1	10000	5000	12	2022
4	400060	1	2	10000	1000	12	2022
5	400060	1	1	10000	1000	12	2022
6	400080	1	1	1000	1000	12	2022
7	400080	1	2	11000	1100	12	2022
8	400100	1	1	0	0	12	2022
9	400120	1	1	0	0	12	2022
10	400140	1	1	2000	1000	12	2022
11	400160	1	1	0	0	12	2022
\.


--
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sessions (id, user_id, session_id, expiry_time, createaddate) FROM stdin;
1	3	gcf2sibf9fbdn43m2dd06c03l4	2022-12-03 06:31:15	2022-12-02 11:01:15.571951
2	3	lhnc7irrn8pl6ct8q5s0ufjfpq	2022-12-03 10:49:39	2022-12-02 15:19:39.381331
3	3	n3c6seskc9ork9n4gp8if6oa5s	2022-12-03 11:05:09	2022-12-02 15:35:09.233923
4	3	l25ctoamjm6tjbkdhs5cr8ve5v	2022-12-04 11:18:45	2022-12-03 15:48:45.390756
5	3	ng9ibh9s5l2d3mtrvm4vr41uca	2022-12-04 14:29:03	2022-12-03 18:59:03.656879
6	3	qpbmkcbj71qdpnido7s0tirdhj	2022-12-04 14:39:35	2022-12-03 19:09:35.73524
7	3	a8253rt2at1f6qq0vpm5ao0l5e	2022-12-04 16:55:15	2022-12-03 21:25:15.333793
8	3	nopgud94869jhfgc7jiaf12ghm	2022-12-06 05:40:58	2022-12-05 10:10:58.778418
9	5	unf8fm9vnrra0roqkjmjv37q61	2022-12-06 05:46:23	2022-12-05 10:16:23.171007
10	3	qjlp3gae1qdohafv9gf1pqepdr	2022-12-06 06:07:10	2022-12-05 10:37:10.883765
11	5	nealdrodiv68a5fsta2sllqhof	2022-12-06 06:12:21	2022-12-05 10:42:21.891331
12	3	l6q40ni95jcdkkuvg1ushpro6b	2022-12-06 06:16:35	2022-12-05 10:46:35.510542
\.


--
-- Data for Name: sidebar_menu; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sidebar_menu (id, module_id, name, logo, url) FROM stdin;
1	1	Bill Entry	receipt	/modules/menu/billEntry.php
2	2	Employee Master	users	/modules/menu/masterEmployee.php
4	1	View Bill	eye	/modules/menu/viewBill.php
\.


--
-- Data for Name: supplementary_bills; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.supplementary_bills (id, user_id, bill_date, total_earnings, total_deductions) FROM stdin;
400000	3	2022-12-02 22:34:58.398365	0	0
400020	3	2022-12-02 22:35:28.624726	0	0
400040	3	2022-12-03 13:44:03.951712	10000	5000
400060	3	2022-12-03 13:53:40.404323	20000	2000
400080	3	2022-12-03 13:55:57.330863	12000	2100
400100	3	2022-12-03 19:00:54.090707	0	0
400120	3	2022-12-03 19:10:37.508464	0	0
400140	3	2022-12-03 20:02:06.651862	2000	1000
400160	3	2022-12-03 21:08:12.002608	0	0
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, username, password, ddocode) FROM stdin;
3	Admin	admin	21232f297a57a5a743894a0e4a801fc3	25001002016
5	sam	sam	332532dcfaa1cbf61e2a266bd723612c	
6	pavan	pavan	141bc86dfd5c40e3cc37219c18d471ca	
\.


--
-- Name: adding_types_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.adding_types_id_seq', 10, true);


--
-- Name: bill_addings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.bill_addings_id_seq', 15, true);


--
-- Name: bill_ids_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.bill_ids_id_seq', 3, true);


--
-- Name: employee_adding_types_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.employee_adding_types_id_seq', 43, true);


--
-- Name: employee_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.employee_id_seq', 3, true);


--
-- Name: modules_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.modules_id_seq', 2, true);


--
-- Name: modules_users_map_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.modules_users_map_id_seq', 5, true);


--
-- Name: s_bill_emp_map_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.s_bill_emp_map_id_seq', 11, true);


--
-- Name: sessions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sessions_id_seq', 12, true);


--
-- Name: sidebar_menu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sidebar_menu_id_seq', 4, true);


--
-- Name: supplementary_bills_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.supplementary_bills_id_seq', 400160, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 6, true);


--
-- Name: adding_types adding_types_name_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.adding_types
    ADD CONSTRAINT adding_types_name_key UNIQUE (name);


--
-- Name: adding_types adding_types_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.adding_types
    ADD CONSTRAINT adding_types_pkey PRIMARY KEY (id);


--
-- Name: bill_addings bill_addings_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bill_addings
    ADD CONSTRAINT bill_addings_pkey PRIMARY KEY (id);


--
-- Name: bill_ids bill_ids_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bill_ids
    ADD CONSTRAINT bill_ids_pkey PRIMARY KEY (id);


--
-- Name: employee_adding_types employee_adding_types_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employee_adding_types
    ADD CONSTRAINT employee_adding_types_pkey PRIMARY KEY (id);


--
-- Name: employee employee_bank_ac_no_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employee
    ADD CONSTRAINT employee_bank_ac_no_key UNIQUE (bank_ac_no);


--
-- Name: employee employee_emp_code_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employee
    ADD CONSTRAINT employee_emp_code_key UNIQUE (emp_code);


--
-- Name: employee employee_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employee
    ADD CONSTRAINT employee_pkey PRIMARY KEY (id);


--
-- Name: modules modules_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.modules
    ADD CONSTRAINT modules_pkey PRIMARY KEY (id);


--
-- Name: modules_users_map modules_users_map_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.modules_users_map
    ADD CONSTRAINT modules_users_map_pkey PRIMARY KEY (id);


--
-- Name: s_bill_emp_map s_bill_emp_map_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.s_bill_emp_map
    ADD CONSTRAINT s_bill_emp_map_pkey PRIMARY KEY (id);


--
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- Name: sessions sessions_session_id_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_session_id_key UNIQUE (session_id);


--
-- Name: sidebar_menu sidebar_menu_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sidebar_menu
    ADD CONSTRAINT sidebar_menu_pkey PRIMARY KEY (id);


--
-- Name: supplementary_bills supplementary_bills_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.supplementary_bills
    ADD CONSTRAINT supplementary_bills_pkey PRIMARY KEY (id);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: users users_usernames_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_usernames_key UNIQUE (username);


--
-- Name: bill_addings bill_addings_adding_type_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bill_addings
    ADD CONSTRAINT bill_addings_adding_type_id_fkey FOREIGN KEY (adding_type_id) REFERENCES public.adding_types(id);


--
-- Name: bill_addings bill_addings_s_bill_emp_map_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bill_addings
    ADD CONSTRAINT bill_addings_s_bill_emp_map_id_fkey FOREIGN KEY (s_bill_emp_map_id) REFERENCES public.s_bill_emp_map(id);


--
-- Name: bill_addings bill_addings_s_bill_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bill_addings
    ADD CONSTRAINT bill_addings_s_bill_id_fkey FOREIGN KEY (s_bill_id) REFERENCES public.supplementary_bills(id);


--
-- Name: bill_ids bill_ids_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bill_ids
    ADD CONSTRAINT bill_ids_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- Name: employee_adding_types employee_adding_types_adding_type_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employee_adding_types
    ADD CONSTRAINT employee_adding_types_adding_type_id_fkey FOREIGN KEY (adding_type_id) REFERENCES public.adding_types(id);


--
-- Name: employee_adding_types employee_adding_types_emp_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employee_adding_types
    ADD CONSTRAINT employee_adding_types_emp_id_fkey FOREIGN KEY (emp_id) REFERENCES public.employee(id);


--
-- Name: employee employee_bill_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employee
    ADD CONSTRAINT employee_bill_id_fkey FOREIGN KEY (bill_id) REFERENCES public.bill_ids(id);


--
-- Name: modules_users_map modules_users_map_module_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.modules_users_map
    ADD CONSTRAINT modules_users_map_module_id_fkey FOREIGN KEY (module_id) REFERENCES public.modules(id);


--
-- Name: modules_users_map modules_users_map_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.modules_users_map
    ADD CONSTRAINT modules_users_map_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- Name: s_bill_emp_map s_bill_emp_map_bill_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.s_bill_emp_map
    ADD CONSTRAINT s_bill_emp_map_bill_id_fkey FOREIGN KEY (bill_id) REFERENCES public.bill_ids(id);


--
-- Name: s_bill_emp_map s_bill_emp_map_emp_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.s_bill_emp_map
    ADD CONSTRAINT s_bill_emp_map_emp_id_fkey FOREIGN KEY (emp_id) REFERENCES public.employee(id);


--
-- Name: s_bill_emp_map s_bill_emp_map_s_bill_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.s_bill_emp_map
    ADD CONSTRAINT s_bill_emp_map_s_bill_id_fkey FOREIGN KEY (s_bill_id) REFERENCES public.supplementary_bills(id);


--
-- Name: sessions sessions_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- Name: sidebar_menu sidebar_menu_module_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sidebar_menu
    ADD CONSTRAINT sidebar_menu_module_id_fkey FOREIGN KEY (module_id) REFERENCES public.modules(id);


--
-- Name: supplementary_bills supplementary_bills_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.supplementary_bills
    ADD CONSTRAINT supplementary_bills_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- PostgreSQL database dump complete
--

