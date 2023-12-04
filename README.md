# inventory.php

## Live demo

- [rahcode](https://8a42-2806-2f0-5521-fe9e-55ed-394d-9698-7f10.ngrok-free.app)
- Username: admin
- Password: admin

## Overview
**Inventory.php** is a straightforward inventory management application designed to help you organize and track your inventory. This simple PHP-based system allows you to manage products and users efficiently. Follow the instructions below to set up and start using the app.

## Instructions

### Installation
1. **Download:**
   - Download the application from [here](https://github.com/milosnowcat/inventory.php/releases/latest).
  
2. **Database Setup:**
   - Upload the provided SQL file to your database.
  
3. **Database Connection:**
   - Create a database connection file named `conn.php`.
   - Edit `conn.php` and set your database connection details:

     ```php
     <?php
     $dbHost = "";
     $dbUser = "";
     $dbPass = "";
     $dbName = "";
     ?>
     ```

   - Save the file.

4. **User Creation:**
   - In your database, create user accounts using the INSERT statement.

5. **SuperUser Configuration:**
   - Edit the `superuser.php` file.
   - Set your SuperUser ID:

     ```php
     <?php
     $superuser = "";
     ?>
     ```

   - Save the file.

6. **Host Upload:**
   - Upload all PHP files to your hosting server.

### Usage
1. Your application is now ready to use.

### Database Update
- If you need to update the database:
   - Make a backup of your current database.
   - Delete the old database.
   - Upload the new database.
   - Insert the backup to restore your data.

## Support
For any assistance or queries, contact me at [ramiro.alvarez@rahcode.com](mailto:ramiro.alvarez@rahcode.com).

Thank you for choosing Inventory.php for your inventory management needs!
