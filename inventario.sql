--
-- PostgreSQL database dump
--

-- Dumped from database version 11.22 (Debian 11.22-0+deb10u2)
-- Dumped by pg_dump version 11.22 (Debian 11.22-0+deb10u2)

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

SET default_with_oids = false;

--
-- Name: productos_prov; Type: TABLE; Schema: public; Owner: inventariosur
--

CREATE TABLE public.productos_prov (
    id integer NOT NULL,
    tipo character varying(50) NOT NULL,
    marca character varying(50) NOT NULL,
    modelo character varying(50) NOT NULL,
    sn character varying(50) NOT NULL,
    mac character varying(30),
    hostname character varying(30),
    estado character varying(20) NOT NULL,
    asignado character varying(20) NOT NULL,
    funcionario character varying(50),
    usuario character varying(50),
    edificio character varying(50),
    unidad_fl character varying(50),
    piso integer,
    fecha_asignacion date,
    fecha_baja date,
    descripcion text
);


ALTER TABLE public.productos_prov OWNER TO inventariosur;

--
-- Name: inventario_prov_id_seq; Type: SEQUENCE; Schema: public; Owner: inventariosur
--

CREATE SEQUENCE public.inventario_prov_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inventario_prov_id_seq OWNER TO inventariosur;

--
-- Name: inventario_prov_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: inventariosur
--

ALTER SEQUENCE public.inventario_prov_id_seq OWNED BY public.productos_prov.id;


--
-- Name: productos; Type: TABLE; Schema: public; Owner: inventariosur
--

CREATE TABLE public.productos (
    id integer NOT NULL,
    tipo character varying(50) NOT NULL,
    marca character varying(50) NOT NULL,
    modelo character varying(50) NOT NULL,
    sn character varying(50) NOT NULL,
    estado character varying(20) NOT NULL,
    asignado character varying(20) NOT NULL,
    usuario character varying(50),
    edificio character varying(50),
    unidad_fl character varying(50),
    piso integer,
    fecha_asignacion date,
    fecha_baja date,
    descripcion text
);


ALTER TABLE public.productos OWNER TO inventariosur;

--
-- Name: productos_id_seq; Type: SEQUENCE; Schema: public; Owner: inventariosur
--

CREATE SEQUENCE public.productos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.productos_id_seq OWNER TO inventariosur;

--
-- Name: productos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: inventariosur
--

ALTER SEQUENCE public.productos_id_seq OWNED BY public.productos.id;


--
-- Name: productos id; Type: DEFAULT; Schema: public; Owner: inventariosur
--

ALTER TABLE ONLY public.productos ALTER COLUMN id SET DEFAULT nextval('public.productos_id_seq'::regclass);


--
-- Name: productos_prov id; Type: DEFAULT; Schema: public; Owner: inventariosur
--

ALTER TABLE ONLY public.productos_prov ALTER COLUMN id SET DEFAULT nextval('public.inventario_prov_id_seq'::regclass);


--
-- Data for Name: productos; Type: TABLE DATA; Schema: public; Owner: inventariosur
--

COPY public.productos (id, tipo, marca, modelo, sn, estado, asignado, usuario, edificio, unidad_fl, piso, fecha_asignacion, fecha_baja, descripcion) FROM stdin;
3	cpu	Lenovo	ThinkCentre M80s Gen3	1q2w3e4r5t	Usado	Asignado	rquilodran	San_miguel	UGI	3	2019-08-09	2025-04-01	
9	Cámara web	Logitech	C2336	1q2w3e4r5t	Usado	Asignado	rquilodran	San_miguel	UGI	3	2025-04-01	2025-04-02	
10	Notebook	HP	1000	1q2w3e4r5t	Defectuoso	no-asignado		San_miguel	UGI	3	\N	\N	
11	Notebook	HP	1000	1q2w3e4r5t	Defectuoso	no-asignado		San_miguel	UGI	3	\N	\N	
2	Notebook	Logitech	C2336	1122334455	Defectuoso	Asignado	rquilodran	San_miguel	UGI	3	2025-03-31	2025-04-01	
12	Notebook	Lenovo	HP1000	789456123	Usado	no-asignado		San_miguel	UGI	1	\N	\N	en bodega
13	Notebook	HP	1000	789456123	Defectuoso	no-asignado		San_miguel	UGI	1	\N	\N	en bodega
\.


--
-- Data for Name: productos_prov; Type: TABLE DATA; Schema: public; Owner: inventariosur
--

COPY public.productos_prov (id, tipo, marca, modelo, sn, mac, hostname, estado, asignado, funcionario, usuario, edificio, unidad_fl, piso, fecha_asignacion, fecha_baja, descripcion) FROM stdin;
1	cpu	Lenovo	ThinkCentre M80s Gen3	789456123	04-7C-16-5F-39-F6	RF17005F39F6	Usado	Asignado	Ricardo Quilodran	rquilodran	San_miguel	UGI	3	2025-03-31	\N	
\.


--
-- Name: inventario_prov_id_seq; Type: SEQUENCE SET; Schema: public; Owner: inventariosur
--

SELECT pg_catalog.setval('public.inventario_prov_id_seq', 1, true);


--
-- Name: productos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: inventariosur
--

SELECT pg_catalog.setval('public.productos_id_seq', 13, true);


--
-- Name: productos_prov inventario_prov_sn_key; Type: CONSTRAINT; Schema: public; Owner: inventariosur
--

ALTER TABLE ONLY public.productos_prov
    ADD CONSTRAINT inventario_prov_sn_key UNIQUE (sn);


--
-- Name: productos productos_pkey; Type: CONSTRAINT; Schema: public; Owner: inventariosur
--

ALTER TABLE ONLY public.productos
    ADD CONSTRAINT productos_pkey PRIMARY KEY (id);


--
-- Name: productos_prov productos_prov_pkey; Type: CONSTRAINT; Schema: public; Owner: inventariosur
--

ALTER TABLE ONLY public.productos_prov
    ADD CONSTRAINT productos_prov_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

