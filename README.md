# almacen_libros

Link de acceso a la Prueba: http://almacen-libros.ddns.net/

desde este link podra ingresar a revisar la prueba solicitada (Servidor privado).

Proyecto realizado con:

    Symfony
    Postgresql
    Bootstrap
    Doctrine
    Easyadmin
    

*En cuanto a la configuracion de la BD fue creada con el motor POSTGRESQL
con el siguiente script de creacion

-- Table: public.autor

    CREATE TABLE IF NOT EXISTS public.autor
    (
        id integer NOT NULL,
        nombre character varying(255) COLLATE pg_catalog."default" NOT NULL,
        sexo character varying(1) COLLATE pg_catalog."default" NOT NULL,
        fecha_nacimiento timestamp(0) without time zone NOT NULL,
        nacionalidad character varying(255) COLLATE pg_catalog."default" NOT NULL,
        apellido character varying(255) COLLATE pg_catalog."default" NOT NULL,
        CONSTRAINT autor_pkey PRIMARY KEY (id)
    )

    TABLESPACE pg_default;

    ALTER TABLE IF EXISTS public.autor
        OWNER to postgres;

-- Table: public.libro

    -- DROP TABLE IF EXISTS public.libro;

    CREATE TABLE IF NOT EXISTS public.libro
    (
        id integer NOT NULL,
        isbn character varying(255) COLLATE pg_catalog."default" NOT NULL,
        titulo character varying(255) COLLATE pg_catalog."default" NOT NULL,
        numero_paginas integer NOT NULL,
        descripcion text COLLATE pg_catalog."default" NOT NULL,
        portada character varying(255) COLLATE pg_catalog."default" NOT NULL,
        categoria_relacion_id integer,
        categoria integer NOT NULL,
        CONSTRAINT libro_pkey PRIMARY KEY (id),
        CONSTRAINT fk_5799ad2b8f687f84 FOREIGN KEY (categoria_relacion_id)
            REFERENCES public.categoria_libro (id) MATCH SIMPLE
            ON UPDATE NO ACTION
            ON DELETE NO ACTION
    )

    TABLESPACE pg_default;

    ALTER TABLE IF EXISTS public.libro
        OWNER to postgres;
    -- Index: idx_5799ad2b8f687f84

    -- DROP INDEX IF EXISTS public.idx_5799ad2b8f687f84;

    CREATE INDEX IF NOT EXISTS idx_5799ad2b8f687f84
        ON public.libro USING btree
        (categoria_relacion_id ASC NULLS LAST)
        TABLESPACE pg_default;

-- Table: public.autor_libro

    -- DROP TABLE IF EXISTS public.autor_libro;

    CREATE TABLE IF NOT EXISTS public.autor_libro
    (
        id integer NOT NULL,
        autor_id integer NOT NULL,
        libro_id integer NOT NULL,
        CONSTRAINT autor_libro_pkey PRIMARY KEY (id)
    )

    TABLESPACE pg_default;

    ALTER TABLE IF EXISTS public.autor_libro
        OWNER to postgres
        
-- Table: public.categoria_libro

    -- DROP TABLE IF EXISTS public.categoria_libro;

    CREATE TABLE IF NOT EXISTS public.categoria_libro
    (
        id integer NOT NULL,
        nombre_categoria character varying(255) COLLATE pg_catalog."default" NOT NULL,
        CONSTRAINT categoria_libro_pkey PRIMARY KEY (id)
    )

    TABLESPACE pg_default;

    ALTER TABLE IF EXISTS public.categoria_libro
        OWNER to postgres;

-- Table: public.usuario

    -- DROP TABLE IF EXISTS public.usuario;

    CREATE TABLE IF NOT EXISTS public.usuario
    (
        id integer NOT NULL,
        email character varying(180) COLLATE pg_catalog."default" NOT NULL,
        roles json NOT NULL,
        password character varying(255) COLLATE pg_catalog."default" NOT NULL,
        CONSTRAINT usuario_pkey PRIMARY KEY (id)
    )

    TABLESPACE pg_default;

    ALTER TABLE IF EXISTS public.usuario
        OWNER to postgres;
