-- Create database
CREATE DATABASE my_webpage;

-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    form INT NOT NULL,
    school VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL
);

-- Create messages table
CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender_name VARCHAR(255) NOT NULL,
    sender_email VARCHAR(255) NOT NULL,
    subject_line VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create projects table
CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE
);

-- Create products table
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create a dummy data for testing purposes
INSERT INTO users (fullname, gender, password, email, form, school, phone) VALUES
('Fling Smith', 'Male', 'halleluyah.1', 'fling.smith@gmail.com', 4, 'Sample School', '1234567890');

INSERT INTO projects (project_name, description, start_date, end_date) VALUES
('Project 1', 'Description for project 1', '2025-01-01', '2025-06-30'),
('Project 2', 'Description for project 2', '2025-07-01', NULL);

INSERT INTO products (product_name, description, price, stock) VALUES
('Product A', 'Description for product A', 1000, 5000),
('Product B', 'Description for product B', 2000, 300);

INSERT INTO messages (sender_name, sender_email, subject_line, message) VALUES
('Bling  Hats', 'bling.hats@gmail.com', 'Inquiry', 'This is a message for inquiry.');