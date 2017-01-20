--
-- u_mctQL database dump
--

-- Dumped from database version 9.4.9
-- Dumped by pg_dump version 9.4.9
-- Started on 2016-12-08 14:33:18 VET

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 1 (class 3079 OID 11861)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2071 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 181 (class 1259 OID 18754)
-- Name: evaluacion; Type: TABLE; Schema: public; Owner: u_mct; Tablespace: 
--

CREATE TABLE evaluacion (
    fecha timestamp without time zone,
    estatus boolean,
    id_usuario integer,
    id integer NOT NULL,
    anno integer,
    periodo character(1)
);


ALTER TABLE evaluacion OWNER TO u_mct;

--
-- TOC entry 180 (class 1259 OID 18740)
-- Name: evaluacion_detalle; Type: TABLE; Schema: public; Owner: u_mct; Tablespace: 
--

CREATE TABLE evaluacion_detalle (
    id integer NOT NULL,
    nombre_completo character varying,
    puntuacion integer,
    rango character varying,
    fecha timestamp without time zone,
    cedula integer,
    id_usuario integer,
    id_evaluacion integer,
    anno integer,
    periodo character(1)
);


ALTER TABLE evaluacion_detalle OWNER TO u_mct;

--
-- TOC entry 182 (class 1259 OID 18762)
-- Name: evaluacion_id_seq; Type: SEQUENCE; Schema: public; Owner: u_mct
--

CREATE SEQUENCE evaluacion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE evaluacion_id_seq OWNER TO u_mct;

--
-- TOC entry 2072 (class 0 OID 0)
-- Dependencies: 182
-- Name: evaluacion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: u_mct
--

ALTER SEQUENCE evaluacion_id_seq OWNED BY evaluacion.id;


--
-- TOC entry 179 (class 1259 OID 18738)
-- Name: evalucion_id_seq; Type: SEQUENCE; Schema: public; Owner: u_mct
--

CREATE SEQUENCE evalucion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE evalucion_id_seq OWNER TO u_mct;

--
-- TOC entry 2073 (class 0 OID 0)
-- Dependencies: 179
-- Name: evalucion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: u_mct
--

ALTER SEQUENCE evalucion_id_seq OWNED BY evaluacion_detalle.id;


--
-- TOC entry 173 (class 1259 OID 18654)
-- Name: trazas_eva_detalle; Type: TABLE; Schema: public; Owner: u_mct; Tablespace: 
--

CREATE TABLE trazas_eva_detalle (
    id integer NOT NULL,
    id_usuario integer,
    fecha timestamp with time zone,
    cedula integer,
    nombre_completo character varying,
    puntuacion integer,
    rango character varying,
    fecha_registro timestamp without time zone,
    anno integer,
    periodo character(1),
    id_evaluacion integer
);


ALTER TABLE trazas_eva_detalle OWNER TO u_mct;

--
-- TOC entry 174 (class 1259 OID 18660)
-- Name: mensaje_enviados_traza_id_seq; Type: SEQUENCE; Schema: public; Owner: u_mct
--

CREATE SEQUENCE mensaje_enviados_traza_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mensaje_enviados_traza_id_seq OWNER TO u_mct;

--
-- TOC entry 2074 (class 0 OID 0)
-- Dependencies: 174
-- Name: mensaje_enviados_traza_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: u_mct
--

ALTER SEQUENCE mensaje_enviados_traza_id_seq OWNED BY trazas_eva_detalle.id;


--
-- TOC entry 175 (class 1259 OID 18664)
-- Name: perfil; Type: TABLE; Schema: public; Owner: u_mct; Tablespace: 
--

CREATE TABLE perfil (
    id integer NOT NULL,
    descripcion character varying,
    fecha timestamp with time zone
);


ALTER TABLE perfil OWNER TO u_mct;

--
-- TOC entry 176 (class 1259 OID 18670)
-- Name: perfiles_id_seq; Type: SEQUENCE; Schema: public; Owner: u_mct
--

CREATE SEQUENCE perfiles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE perfiles_id_seq OWNER TO u_mct;

--
-- TOC entry 2075 (class 0 OID 0)
-- Dependencies: 176
-- Name: perfiles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: u_mct
--

ALTER SEQUENCE perfiles_id_seq OWNED BY perfil.id;


--
-- TOC entry 183 (class 1259 OID 18783)
-- Name: traza_eva; Type: TABLE; Schema: public; Owner: u_mct; Tablespace: 
--

CREATE TABLE traza_eva (
    fecha timestamp without time zone,
    estatus boolean,
    id_usuario integer,
    anno integer,
    fecha_registro timestamp without time zone,
    id integer NOT NULL,
    periodo character(1),
    id_evaluacion integer
);


ALTER TABLE traza_eva OWNER TO u_mct;

--
-- TOC entry 184 (class 1259 OID 18794)
-- Name: traza_eva_id_seq; Type: SEQUENCE; Schema: public; Owner: u_mct
--

CREATE SEQUENCE traza_eva_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE traza_eva_id_seq OWNER TO u_mct;

--
-- TOC entry 2076 (class 0 OID 0)
-- Dependencies: 184
-- Name: traza_eva_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: u_mct
--

ALTER SEQUENCE traza_eva_id_seq OWNED BY traza_eva.id;


--
-- TOC entry 177 (class 1259 OID 18681)
-- Name: usuario; Type: TABLE; Schema: public; Owner: u_mct; Tablespace: 
--

CREATE TABLE usuario (
    id integer NOT NULL,
    cedula integer,
    estatus boolean,
    fecha time without time zone,
    id_perfil integer,
    nombre_apellido character varying
);


ALTER TABLE usuario OWNER TO u_mct;

--
-- TOC entry 178 (class 1259 OID 18687)
-- Name: usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: u_mct
--

CREATE SEQUENCE usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE usuario_id_seq OWNER TO u_mct;

--
-- TOC entry 2077 (class 0 OID 0)
-- Dependencies: 178
-- Name: usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: u_mct
--

ALTER SEQUENCE usuario_id_seq OWNED BY usuario.id;


--
-- TOC entry 1923 (class 2604 OID 18764)
-- Name: id; Type: DEFAULT; Schema: public; Owner: u_mct
--

ALTER TABLE ONLY evaluacion ALTER COLUMN id SET DEFAULT nextval('evaluacion_id_seq'::regclass);


--
-- TOC entry 1922 (class 2604 OID 18743)
-- Name: id; Type: DEFAULT; Schema: public; Owner: u_mct
--

ALTER TABLE ONLY evaluacion_detalle ALTER COLUMN id SET DEFAULT nextval('evalucion_id_seq'::regclass);


--
-- TOC entry 1920 (class 2604 OID 18692)
-- Name: id; Type: DEFAULT; Schema: public; Owner: u_mct
--

ALTER TABLE ONLY perfil ALTER COLUMN id SET DEFAULT nextval('perfiles_id_seq'::regclass);


--
-- TOC entry 1924 (class 2604 OID 18796)
-- Name: id; Type: DEFAULT; Schema: public; Owner: u_mct
--

ALTER TABLE ONLY traza_eva ALTER COLUMN id SET DEFAULT nextval('traza_eva_id_seq'::regclass);


--
-- TOC entry 1919 (class 2604 OID 18691)
-- Name: id; Type: DEFAULT; Schema: public; Owner: u_mct
--

ALTER TABLE ONLY trazas_eva_detalle ALTER COLUMN id SET DEFAULT nextval('mensaje_enviados_traza_id_seq'::regclass);


--
-- TOC entry 1921 (class 2604 OID 18694)
-- Name: id; Type: DEFAULT; Schema: public; Owner: u_mct
--

ALTER TABLE ONLY usuario ALTER COLUMN id SET DEFAULT nextval('usuario_id_seq'::regclass);


--
-- TOC entry 2060 (class 0 OID 18754)
-- Dependencies: 181
-- Data for Name: evaluacion; Type: TABLE DATA; Schema: public; Owner: u_mct
--



--
-- TOC entry 2059 (class 0 OID 18740)
-- Dependencies: 180
-- Data for Name: evaluacion_detalle; Type: TABLE DATA; Schema: public; Owner: u_mct
--



--
-- TOC entry 2078 (class 0 OID 0)
-- Dependencies: 182
-- Name: evaluacion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: u_mct
--

SELECT pg_catalog.setval('evaluacion_id_seq', 45, true);


--
-- TOC entry 2079 (class 0 OID 0)
-- Dependencies: 179
-- Name: evalucion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: u_mct
--

SELECT pg_catalog.setval('evalucion_id_seq', 98, true);


--
-- TOC entry 2080 (class 0 OID 0)
-- Dependencies: 174
-- Name: mensaje_enviados_traza_id_seq; Type: SEQUENCE SET; Schema: public; Owner: u_mct
--

SELECT pg_catalog.setval('mensaje_enviados_traza_id_seq', 136, true);


--
-- TOC entry 2054 (class 0 OID 18664)
-- Dependencies: 175
-- Data for Name: perfil; Type: TABLE DATA; Schema: public; Owner: u_mct
--

INSERT INTO perfil (id, descripcion, fecha) VALUES (1, 'ADMINISTRADOR', '2016-10-20 17:30:46.846218-04:30');
INSERT INTO perfil (id, descripcion, fecha) VALUES (4, 'Analista', '2016-11-24 10:44:24.133811-04:30');


--
-- TOC entry 2081 (class 0 OID 0)
-- Dependencies: 176
-- Name: perfiles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: u_mct
--

SELECT pg_catalog.setval('perfiles_id_seq', 5, true);


--
-- TOC entry 2062 (class 0 OID 18783)
-- Dependencies: 183
-- Data for Name: traza_eva; Type: TABLE DATA; Schema: public; Owner: u_mct
--



--
-- TOC entry 2082 (class 0 OID 0)
-- Dependencies: 184
-- Name: traza_eva_id_seq; Type: SEQUENCE SET; Schema: public; Owner: u_mct
--

SELECT pg_catalog.setval('traza_eva_id_seq', 41, true);


--
-- TOC entry 2052 (class 0 OID 18654)
-- Dependencies: 173
-- Data for Name: trazas_eva_detalle; Type: TABLE DATA; Schema: public; Owner: u_mct
--



--
-- TOC entry 2056 (class 0 OID 18681)
-- Dependencies: 177
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: u_mct
--

INSERT INTO usuario (id, cedula, estatus, fecha, id_perfil, nombre_apellido) VALUES (18, 17300068, true, '14:14:59.693613', 4, 'Yuddelia Solis');
INSERT INTO usuario (id, cedula, estatus, fecha, id_perfil, nombre_apellido) VALUES (1, 19163767, true, '09:03:53.781947', 1, 'jsoto');
INSERT INTO usuario (id, cedula, estatus, fecha, id_perfil, nombre_apellido) VALUES (19, 13156604, true, '15:24:14.252538', 1, 'Nairobi Josefina Manrique Rojas');
INSERT INTO usuario (id, cedula, estatus, fecha, id_perfil, nombre_apellido) VALUES (17, 14768735, false, '09:48:32.413353', 1, 'Ana Navarro');


--
-- TOC entry 2083 (class 0 OID 0)
-- Dependencies: 178
-- Name: usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: u_mct
--

SELECT pg_catalog.setval('usuario_id_seq', 19, true);


--
-- TOC entry 1932 (class 2606 OID 18748)
-- Name: evaluacion_pkey; Type: CONSTRAINT; Schema: public; Owner: u_mct; Tablespace: 
--

ALTER TABLE ONLY evaluacion_detalle
    ADD CONSTRAINT evaluacion_pkey PRIMARY KEY (id);


--
-- TOC entry 1934 (class 2606 OID 18769)
-- Name: evaluacion_pkey1; Type: CONSTRAINT; Schema: public; Owner: u_mct; Tablespace: 
--

ALTER TABLE ONLY evaluacion
    ADD CONSTRAINT evaluacion_pkey1 PRIMARY KEY (id);


--
-- TOC entry 1928 (class 2606 OID 18702)
-- Name: perfiles_pkey; Type: CONSTRAINT; Schema: public; Owner: u_mct; Tablespace: 
--

ALTER TABLE ONLY perfil
    ADD CONSTRAINT perfiles_pkey PRIMARY KEY (id);


--
-- TOC entry 1936 (class 2606 OID 18801)
-- Name: traza_eva_pkey; Type: CONSTRAINT; Schema: public; Owner: u_mct; Tablespace: 
--

ALTER TABLE ONLY traza_eva
    ADD CONSTRAINT traza_eva_pkey PRIMARY KEY (id);


--
-- TOC entry 1926 (class 2606 OID 18793)
-- Name: trazas_eva_detalle_pkey; Type: CONSTRAINT; Schema: public; Owner: u_mct; Tablespace: 
--

ALTER TABLE ONLY trazas_eva_detalle
    ADD CONSTRAINT trazas_eva_detalle_pkey PRIMARY KEY (id);


--
-- TOC entry 1930 (class 2606 OID 18706)
-- Name: usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: u_mct; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);


--
-- TOC entry 1940 (class 2606 OID 18770)
-- Name: evaluacion_detalle_id_evaluacion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: u_mct
--

ALTER TABLE ONLY evaluacion_detalle
    ADD CONSTRAINT evaluacion_detalle_id_evaluacion_fkey FOREIGN KEY (id_evaluacion) REFERENCES evaluacion(id);


--
-- TOC entry 1939 (class 2606 OID 18749)
-- Name: evaluacion_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: u_mct
--

ALTER TABLE ONLY evaluacion_detalle
    ADD CONSTRAINT evaluacion_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES usuario(id);


--
-- TOC entry 1941 (class 2606 OID 18757)
-- Name: evaluacion_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: u_mct
--

ALTER TABLE ONLY evaluacion
    ADD CONSTRAINT evaluacion_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES usuario(id);


--
-- TOC entry 1942 (class 2606 OID 18787)
-- Name: evaluacion_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: u_mct
--

ALTER TABLE ONLY traza_eva
    ADD CONSTRAINT evaluacion_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES usuario(id);


--
-- TOC entry 1937 (class 2606 OID 18717)
-- Name: mensaje_enviados_traza_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: u_mct
--

ALTER TABLE ONLY trazas_eva_detalle
    ADD CONSTRAINT mensaje_enviados_traza_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES usuario(id);


--
-- TOC entry 1938 (class 2606 OID 18732)
-- Name: usuario_id_perfil_fkey; Type: FK CONSTRAINT; Schema: public; Owner: u_mct
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_id_perfil_fkey FOREIGN KEY (id_perfil) REFERENCES perfil(id);


--
-- TOC entry 2070 (class 0 OID 0)
-- Dependencies: 7
-- Name: public; Type: ACL; Schema: -; Owner: u_mct
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM u_mct;
GRANT ALL ON SCHEMA public TO u_mct;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2016-12-08 14:33:18 VET

--
-- u_mctQL database dump complete
--

