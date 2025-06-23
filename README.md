# PHP Authentication System

This is a user authentication system built using PHP and MySQL. It allows users to register, log in, and be redirected based on their assigned roles (User or Admin). Passwords are securely stored using PHP's `password_hash` function.

## 🚀 Features

- ✅ User Registration with password confirmation
- 🔐 Passwords securely hashed
- 🔑 Login system with role-based redirection (User/Admin)
- 🔄 Error messages for invalid login or duplicate users
- 🎨 Clean and responsive interface styled with Bootstrap and custom CSS

## 📂 Project Structure

```
authentication-system/
├── connection.php
├── login.php
├── register.php
├── user.php
├── admin.php
├── logout.php
├── style.css
└── README.md
```

## 🛠️ Technologies Used

- PHP
- MySQL (via XAMPP)
- HTML & CSS
- Bootstrap
- Git & GitHub

## 🧪 Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/authentication-system.git
```

### 2. Move the Project to XAMPP

Place the project in:

```
C:\xampp\htdocs\
```

### 3. Start Apache and MySQL in XAMPP

### 4. Create the Database and Table

Open **phpMyAdmin** at [http://localhost/phpmyadmin](http://localhost/phpmyadmin)

- Create a new database named:

  ```
  authentication_db
  ```

- Run this SQL to create the users table:

```sql
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL UNIQUE,
  `user_type` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);
```

✅ Ensure your `connection.php` uses the correct DB:

```php
$conn = mysqli_connect('localhost', 'root', '', 'authentication_db');
```

### 5. Access the App in Browser

Go to:

```
http://localhost/authentication-system
```

Register a new user and log in.

## 🙌 Acknowledgments

This project is part of a learning journey to build secure login systems using PHP and MySQL.

## 📄 License

This project is open-source and available under the MIT License.
