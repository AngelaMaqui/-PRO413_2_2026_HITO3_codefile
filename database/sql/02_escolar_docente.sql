CREATE TABLE IF NOT EXISTS docentes (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ci VARCHAR(20) NOT NULL UNIQUE,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    especialidad VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS gestion_academica (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    anio INT NOT NULL,
    periodo VARCHAR(20) NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
    activa TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS aulas (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(20) NOT NULL UNIQUE,
    edificio VARCHAR(50) NOT NULL,
    capacidad INT NOT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS asignacion_docentes (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    docente_id BIGINT UNSIGNED NOT NULL,
    asignatura_id BIGINT UNSIGNED NOT NULL,
    gestion_id BIGINT UNSIGNED NOT NULL,
    aula_id BIGINT UNSIGNED NOT NULL,
    horario VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_asig_docente FOREIGN KEY (docente_id) REFERENCES docentes(id) ON DELETE CASCADE,
    CONSTRAINT fk_asig_gestion FOREIGN KEY (gestion_id) REFERENCES gestion_academica(id) ON DELETE CASCADE,
    CONSTRAINT fk_asig_aula FOREIGN KEY (aula_id) REFERENCES aulas(id) ON DELETE CASCADE
);

INSERT INTO docentes (ci, nombres, apellidos, email, especialidad) VALUES
('1234567', 'Carlos', 'Mendoza', 'carlos.mendoza@colegio.edu', 'Matemáticas'),
('7654321', 'Ana', 'Gómez', 'ana.gomez@colegio.edu', 'Programación');

INSERT INTO gestion_academica (anio, periodo, fecha_inicio, fecha_fin, activa) VALUES
(2026, '1/2026', '2026-02-01', '2026-06-30', 1);

INSERT INTO aulas (codigo, edificio, capacidad) VALUES
('A-101', 'Edificio Central', 35),
('LAB-02', 'Edificio Tecnología', 25);

INSERT INTO asignacion_docentes (docente_id, asignatura_id, gestion_id, aula_id, horario) VALUES
(1, 1, 1, 1, 'Lun-Mie 08:00-10:00'),
(2, 2, 1, 2, 'Mar-Jue 10:00-12:00');