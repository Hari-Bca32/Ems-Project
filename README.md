# 📌 Employee Management System (EMS)

## 🏢 Overview

The **Employee Management System (EMS)** is a full-stack web-based application designed to efficiently manage employee records, attendance, leave requests, project assignments, and payroll-related activities. This system helps organizations automate HR operations and reduce manual workload using a simple and user-friendly interface.

---

## 🚀 Features

* 👨‍💼 Employee registration and management
* 🔐 Admin and employee login system
* 📋 Leave application and approval system
* 📊 Project assignment and tracking
* 🧾 Employee profile management
* 💰 Salary management module
* 🗂️ CRUD operations for employee records
* 📱 Responsive UI for better user experience

---

## 🛠️ Tech Stack

**Frontend:**

* HTML5
* CSS3
* JavaScript

**Backend:**

* PHP

**Database:**

* MySQL

**Tools Used:**

* XAMPP / Apache Server
* phpMyAdmin
* Git & GitHub

---

## 📁 Project Structure

```
Employee Management System/
│
├── css/                  # Stylesheets
├── process/              # Backend logic (PHP files)
├── database/             # SQL database file
├── images/              # Project images
│
├── index.html           # Home page
├── alogin.html          # Admin login
├── elogin.html          # Employee login
├── viewemp.php          # View employees
├── addemp.php           # Add employee
└── ...other modules
```

---

## ⚙️ Installation & Setup

### 🔹 Step 1: Clone Repository

```bash
git clone https://github.com/your-username/ems-project.git
```

---

### 🔹 Step 2: Setup Local Server

* Install **XAMPP**
* Start:

  * Apache
  * MySQL

---

### 🔹 Step 3: Import Database

* Open `phpMyAdmin`
* Create new database: `ems`
* Import:

```
database/newems.sql
```

---

### 🔹 Step 4: Configure Database Connection

Update file:

```
process/dbh.php
```

Set:

```php
$conn = mysqli_connect("localhost", "root", "", "ems");
```

---

### 🔹 Step 5: Run Project

Open browser:

```
http://localhost/Employee%20Management%20System/index.html
```

---

## 📸 Screenshots

*(Add your project screenshots here for better presentation)*

---

## 🎯 Future Improvements

* React-based frontend upgrade
* Role-based access control (RBAC)
* Cloud deployment
* Email notifications for leave approval
* REST API integration

---

## 👨‍💻 Author

**Hari M**
📍 India
💼 Aspiring Full Stack Developer

---

## 📜 License

This project is created for educational purposes. You are free to use and modify it.

---

# ⭐ If you like this project

Give a ⭐ on the repository to support development!

---

Just tell 👍
