CREATE TABLE customers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  phone VARCHAR(15),
  email VARCHAR(100),
  address VARCHAR(255)
);

CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  customer_id INT,
  order_date DATETIME,
  status VARCHAR(50),
  total_amount DECIMAL(10, 2)
);

CREATE TABLE menu_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  description TEXT,
  price DECIMAL(10, 2),
  category VARCHAR(100)
);

CREATE TABLE order_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT,
  menu_item_id INT,
  quantity INT,
  price DECIMAL(10, 2)
);

CREATE TABLE employees (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  role VARCHAR(50),
  hire_date DATE,
  phone VARCHAR(15)
);


-- Insert into customers table
INSERT INTO customers (name, phone, email, address) VALUES
('John Doe', '555-1234', 'johndoe@example.com', '123 Maple Street'),
('Jane Smith', '555-5678', 'janesmith@example.com', '456 Oak Avenue'),
('Alice Brown', '555-9101', 'alicebrown@example.com', '789 Pine Road');

-- Insert into menu_items table
INSERT INTO menu_items (name, description, price, category) VALUES
('Cheeseburger', 'Beef patty with cheese, lettuce, and tomato', 8.99, 'Main Course'),
('Caesar Salad', 'Fresh romaine lettuce with Caesar dressing', 6.49, 'Appetizers'),
('Chocolate Cake', 'Rich chocolate cake with ganache', 4.99, 'Desserts');

-- Insert into orders table
INSERT INTO orders (customer_id, order_date, status, total_amount) VALUES
(1, '2024-09-08 12:30:00', 'completed', 15.48),
(2, '2024-09-08 13:00:00', 'pending', 4.99);

-- Insert into order_items table
INSERT INTO order_items (order_id, menu_item_id, quantity, price) VALUES
(1, 1, 1, 8.99),
(1, 2, 1, 6.49),
(2, 3, 1, 4.99);

-- Insert into employees table
INSERT INTO employees (name, role, hire_date, phone) VALUES
('Michael Johnson', 'Waiter', '2023-08-15', '555-1212'),
('Sarah Lee', 'Chef', '2021-05-20', '555-3434');