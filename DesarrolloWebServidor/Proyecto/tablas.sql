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
    perfil ENUM('usuario', 'administrador') NOT NULL DEFAULT 'normal'
);

-- Crear la tabla de productos
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    precio DECIMAL(10,2) NOT NULL
);

-- Insertar usuarios de ejemplo
INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `contrasena`, `email`, `direccion`, `perfil`) 
VALUES
    (1, 'Usuario Default', 'usuario', '$2a$12$78aEJHTD0qaH6MvfsKCGkev2MLMhR8eCCo0ccUb7acvDcyXNIGxgK', 'normal'),
    (2, 'Administrador', 'admin', '$2a$12$tjWR7yqs388DwkHg0jmp3./TIU7tKN/.3I76zNWtOevlldWNs3wR.', 'administrador');

-- Insertar productos de ejemplo
INSERT INTO productos (nombre, imagen, descripcion, precio) 
VALUES 
    ('Leña de roble', 'imagen_roble.jpg', 'Leña de roble seca, ideal para chimeneas y estufas.', '49.99'),
    ('Leña de pino', 'imagen_pino.jpg', 'Leña de pino cortada y lista para usar en fogatas y barbacoas.', '39.99'),
    ('Leña de haya', 'imagen_haya.jpg', 'Leña de haya de alta calidad, perfecta para calefacción y cocinar.', '60.00'),
    ('Leña de olivo', 'imagen_olivo.jpg', 'Leña de olivo seca y densa, proporciona un aroma único para asados y ahumados.', '45.99');
