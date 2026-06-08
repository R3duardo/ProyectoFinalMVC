-- =====================================================
-- Script SQL para el Sistema MVC con PHP
-- Tienda MVC - Base de Datos
-- =====================================================

CREATE DATABASE IF NOT EXISTS tienda_mvc CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE tienda_mvc;

-- Tabla de usuarios (administradores)
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nombre_completo VARCHAR(100) NOT NULL
);

-- Tabla de productos
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sku VARCHAR(50) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    precio_compra DECIMAL(10,2) NOT NULL,
    precio_venta DECIMAL(10,2) NOT NULL,
    existencia INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insertar usuario administrador
-- Contraseña: admin123 (hash bcrypt)
-- Para generar el hash ejecutar: php -r "echo password_hash('admin123', PASSWORD_DEFAULT);"
INSERT INTO usuarios (username, password, nombre_completo)
VALUES ('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrador General');

-- Datos de ejemplo para productos
INSERT INTO productos (sku, nombre, descripcion, precio_compra, precio_venta, existencia) VALUES
('SKU-001', 'Laptop HP ProBook', 'Laptop HP ProBook 450 G8, Intel Core i5, 8GB RAM, 256GB SSD', 12000.00, 15999.99, 10),
('SKU-002', 'Mouse Logitech MX Master', 'Mouse inalámbrico ergonómico Logitech MX Master 3S', 800.00, 1299.99, 25),
('SKU-003', 'Teclado Mecánico Corsair', 'Teclado mecánico Corsair K70 RGB, switches Cherry MX Red', 1500.00, 2499.99, 15),
('SKU-004', 'Monitor Samsung 27"', 'Monitor Samsung 27 pulgadas, resolución 4K UHD, panel IPS', 5000.00, 7499.99, 8),
('SKU-005', 'Audífonos Sony WH-1000XM5', 'Audífonos inalámbricos con cancelación de ruido activa', 4500.00, 6999.99, 12);
