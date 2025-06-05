# 🏥 Klinic - Doctor Appointment System (Core PHP)

Klinic is a simple web-based doctor appointment booking system built using **Core PHP** and **MySQL**. It allows patients to book appointments with doctors, and enables admin and doctors to manage appointments, schedules, and patient records efficiently.

---

## 🚀 Features

- 👤 User Registration and Login (Patients)
- 👨‍⚕️ Doctor Login and Dashboard
- 📅 Book Appointment by Date, Time, and Doctor
- 📄 View Appointment History and Status
- 🧑‍💻 Admin Panel to Manage:
  - Doctors
  - Patients
  - Appointments
  - Time Slots
- 📧 Email Notifications (optional if added)
- 🗓️ Schedule Management for Doctors
- 🔐 Session-Based Authentication
- ✅ Simple and Clean UI using HTML/CSS/Bootstrap

---

## 🛠️ Tech Stack

| Technology | Description |
|------------|-------------|
| **Core PHP** | Backend development |
| **MySQL** | Database management |
| **HTML/CSS/Bootstrap** | Frontend |
| **JavaScript/jQuery** | UI interactions |
| **PHPMailer (optional)** | For sending confirmation emails |

---

## 📂 Folder Structure (Example)

DoctorAppointmentSystem/
├── admin/
│ ├── manage_doctors.php
│ ├── manage_patients.php
│ └── dashboard.php
├── doctor/
│ ├── appointments.php
│ └── schedule.php
├── patient/
│ ├── book_appointment.php
│ └── my_appointments.php
├── includes/
│ ├── db.php
│ ├── functions.php
│ └── auth_check.php
├── assets/
│ └── css/, js/, images/
├── index.php
└── login.php

yaml
Copy
Edit

---

## 🧑‍💻 How to Run the Project Locally

```bash
# Step 1: Clone the repository
git clone https://github.com/Sohailshaikh5656/DoctorAppointmentSystem.git

# Step 2: Move the project to your XAMPP/htdocs folder
mv DoctorAppointmentSystem/ /path-to-xampp/htdocs/

# Step 3: Start Apache and MySQL from XAMPP Control Panel

# Step 4: Create a MySQL Database
# Import the SQL file if provided (like database.sql or klinic.sql)

# Step 5: Update DB credentials in db.php
/DoctorAppointmentSystem/includes/db.php

# Step 6: Open in browser
http://localhost/DoctorAppointmentSystem/
🙋‍♂️ Author
Shaikh Sohel
🎓 MCA @ LJ Campus | BCA @ Govt. K.K. Shastri College
💻 Skilled in PHP, Laravel, Django, Node.js, Flutter
🔗 GitHub

📜 License
This project is open-source and available for educational purposes.

