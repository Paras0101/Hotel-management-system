# Hotel Management System

Welcome to the Hotel Management System for small size hotel! This project is a simple yet effective solution for managing hotel operations, including guest management, reservations, and reporting. The system is built using PHP for the backend and HTML for the frontend, with a MySQL database for storing data. Additionally, a Python script is included for generating reservation reports.


This Hotel Management System is designed to streamline the management of a hotel’s operations. Key features include:

- **Guest Management:** Add and view guest details.
- **Reservation Management:** Make and view reservations.
- **Reporting:** Generate and download reservation reports using a Python script.

### Getting Started

To get started with this project, follow these steps:

1. **Clone the repository:**

    ```bash
    git clone https://github.com/yourusername/hotel-management-system.git
    cd hotel-management-system
    ```

2. **Set up the database:**

    Use the provided SQL script to create the necessary database and tables.

    ```sql
    CREATE DATABASE hotel_management;

    USE hotel_management;

    CREATE TABLE guests (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        email VARCHAR(100),
        phone VARCHAR(15)
    );

    CREATE TABLE reservations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        guest_id INT,
        room VARCHAR(10),
        check_in DATE,
        check_out DATE,
        FOREIGN KEY (guest_id) REFERENCES guests(id)
    );
    ```

3. **Configure the database connection:**

    Update the `config.php` file with your database credentials.

    ```php
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "hotel_management";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
    ```

4. **Run the application:**

    Ensure you have a local web server (such as XAMPP, MAMP, or WAMP) running to serve the PHP files. Place the project files in the web server's root directory (e.g., `htdocs` for XAMPP).

5. **Generate the report:**

    Run the Python script to generate a CSV report of all reservations.

    ```bash
    python report.py
    ```

### License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

### Acknowledgements


Feel free to explore the code, use it as a foundation for your own projects, and contribute to its improvement!

---

Thank you for visiting my GitHub repository. If you have any questions or feedback, please don't hesitate to reach out at Paras.25@outlook.com

