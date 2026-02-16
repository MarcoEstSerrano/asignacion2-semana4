CREATE DATABASE Universidad;
USE Universidad;

CREATE TABLE Estudiantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    curso VARCHAR(100),
    nota DECIMAL(4,2)
);

INSERT INTO Estudiantes (nombre, curso, nota) VALUES 
('Manuel Pérez', 'Programacion', 85.50),
('Gerardo Villalobos', 'Programacion', 65.00),
('María López', 'Bases de Datos', 90.00),
('Juan Torres', 'Programacion', 72.00),
('Elena Picado', 'Redes', 58.00);

USE Universidad;

SELECT * FROM Estudiantes;
