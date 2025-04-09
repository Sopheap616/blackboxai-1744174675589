-- Database schema for Income/Expense Management System
CREATE DATABASE IF NOT EXISTS finance_manager;
USE finance_manager;

-- Users table for authentication
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Currency table
CREATE TABLE currencies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(3) NOT NULL UNIQUE,
    name VARCHAR(50) NOT NULL,
    symbol VARCHAR(5) NOT NULL
);

-- Exchange rates table
CREATE TABLE exchange_rates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    from_currency INT NOT NULL,
    to_currency INT NOT NULL,
    rate DECIMAL(10,4) NOT NULL,
    effective_date DATE NOT NULL,
    FOREIGN KEY (from_currency) REFERENCES currencies(id),
    FOREIGN KEY (to_currency) REFERENCES currencies(id)
);

-- Transaction categories
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    type ENUM('income', 'expense') NOT NULL
);

-- Transactions table
CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    category_id INT NOT NULL,
    amount DECIMAL(12,2) NOT NULL,
    currency_id INT NOT NULL,
    description TEXT,
    transaction_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (currency_id) REFERENCES currencies(id)
);

-- Initial data
INSERT INTO currencies (code, name, symbol) VALUES 
('USD', 'US Dollar', '$'),
('KHR', 'Cambodian Riel', '៛');

INSERT INTO categories (name, type) VALUES
('Salary', 'income'),
('Business', 'income'),
('Investment', 'income'),
('Food', 'expense'),
('Transport', 'expense'),
('Utilities', 'expense'),
('Entertainment', 'expense');
