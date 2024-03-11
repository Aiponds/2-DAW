USE tienda_lena;

-- Eliminar las tablas si existen
DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS productos;

-- Crear la tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    usuario VARCHAR(25) UNIQUE NOT NULL,
    contrasena VARCHAR(30) NOT NULL,
    perfil ENUM('usuario', 'administrador') NOT NULL
);

-- Crear la tabla de productos
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL
);

-- Insertar usuarios de ejemplo
INSERT INTO usuarios (nombre, usuario, contrasena, perfil) 
VALUES 
    ('Usuario', 'usuario', 'usuario', 'usuario'),
    ('Administrador', 'admin', 'admin', 'administrador');

-- Insertar productos de ejemplo
INSERT INTO productos (nombre, imagen, descripcion) 
VALUES 
    ('Leña de roble', 'imagen_roble.jpg', 'Leña de roble seca, ideal para chimeneas y estufas.'),
    ('Leña de pino', 'imagen_pino.jpg', 'Leña de pino cortada y lista para usar en fogatas y barbacoas.'),
    ('Leña de haya', 'imagen_haya.jpg', 'Leña de haya de alta calidad, perfecta para calefacción y cocinar.'),
    ('Leña de olivo', 'imagen_olivo.jpg', 'Leña de olivo seca y densa, proporciona un aroma único para asados y ahumados.');
