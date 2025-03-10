CREATE DATABASE smarttech;

USE smarttech;

-- Table pour les employés
CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    position VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table pour les clients
CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table pour les documents
CREATE TABLE documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (uploaded_by) REFERENCES employees(id)
);