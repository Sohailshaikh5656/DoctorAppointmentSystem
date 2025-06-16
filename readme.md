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
├── admin/                  # Admin panel files
├── clinic/                 # Clinic dashboard and related files
├── common/                 # Shared utilities or functions
├── css/                    # Stylesheets
├── dark/                   # Dark theme assets
├── img/                    # Images and icons
├── js/                     # JavaScript files
├── lib/                    # External libraries
├── other/                  # Miscellaneous files
├── scss/                   # SCSS files for styling
├── 404.html                # Custom 404 error page (HTML)
├── 404.php                 # Custom 404 error page (PHP)
├── LICENSE.txt             # License information
├── READ-ME.txt             # Project documentation
├── about.php               # About page
├── admin_login.php         # Admin login page
├── ajax.php                # AJAX handler
├── appointment.php         # Appointment booking page
├── appointment_viewmore.php# Detailed appointment view
├── booking.php             # Booking functionality
├── calender.php            # Calendar view
├── change_profile.php      # Profile update page
├── changepass.php          # Password change functionality
├── clinic-website-template.jpg # Template image
├── clinic_details.php      # Clinic details page
├── clinic_login.php        # Clinic login page
├── clinic_r.php            # Clinic registration handler
├── clinic_register.php     # Clinic registration page
├── contact.php             # Contact page
├── dashboard.php           # User dashboard
├── doctor.php              # Doctor information page
├── doctor_login.php        # Doctor login page
├── doctor_register.php     # Doctor registration page
├── doctor_viewmore.php     # Detailed doctor view
├── feedback.php            # Feedback form
├── forgot_pass.php         # Password recovery page
├── index.php               # Homepage
├── logout.php              # Logout functionality
├── patient_login.php       # Patient login page
├── patient_register.php    # Patient registration page
├── profile.php             # User profile page
├── search.php              # Search functionality
├── service.php             # Services offered
├── service_viewmore.php    # Detailed service view
└── viewmore.php            # General detailed view page


yaml
Copy
Edit

## 🖥 Application Screenshots

![Screenshot 1](doctor%20appointment%20System/app_1.png)

![Screenshot 2](doctor%20appointment%20System/app_2.png)


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


