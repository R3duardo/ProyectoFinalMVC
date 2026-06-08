USE tienda_mvc;

-- Agregar columna de imagen a productos
ALTER TABLE productos ADD COLUMN imagen VARCHAR(255) DEFAULT NULL AFTER existencia;

-- Tabla de bitácora (log de acciones del admin)
CREATE TABLE IF NOT EXISTS logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    usuario_nombre VARCHAR(100) NOT NULL,
    accion VARCHAR(255) NOT NULL,
    detalle TEXT,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
