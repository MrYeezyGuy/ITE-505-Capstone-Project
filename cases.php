<?php

// Replace the following with your database information
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SPD_Database";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === false) {
    echo "Error creating database: " . $conn->error;
}

// Select database
$conn->select_db($dbname);

// Create tables
$sql = "CREATE TABLE Cases (
    Cas_id INT PRIMARY KEY,
    Cas_time TIME,
    Cas_date DATE,
    Cas_type VARCHAR(255),
    Cas_location VARCHAR(255),
    Off_id INT,
    FOREIGN KEY (Off_id) REFERENCES Officer(Off_id)
);

CREATE TABLE Officer (
    Off_id INT PRIMARY KEY,
    Off_age INT,
    Off_Fname VARCHAR(255),
    Off_Lname VARCHAR(255),
    Off_gender VARCHAR(255)
);

CREATE TABLE Victim (
    Vic_id INT PRIMARY KEY,
    Vic_race VARCHAR(255),
    Vic_gender VARCHAR(255),
    Vic_age INT,
    Vic_Lname VARCHAR(255),
    Vic_Fname VARCHAR(255),
    Cas_id INT,
    Cri_id INT,
    FOREIGN KEY (Cas_id) REFERENCES Cases(Cas_id),
    FOREIGN KEY (Cri_id) REFERENCES Criminal(Cri_id)
);

CREATE TABLE Criminal (
    Cri_id INT PRIMARY KEY,
    Cri_gender VARCHAR(255),
    Cri_age INT,
    Cri_Fname VARCHAR(255),
    Cri_Lname VARCHAR(255),
    Cri_race VARCHAR(255),
    Cas_id INT,
    FOREIGN KEY (Cas_id) REFERENCES Cases(Cas_id)
);

CREATE TABLE History (
    His_id INT PRIMARY KEY,
    His_type VARCHAR(255),
    His_date DATE,
    His_location VARCHAR(255),
    Cas_id INT,
    Off_id INT,
    Vic_id INT,
    Cri_id INT,
    FOREIGN KEY (Cas_id) REFERENCES Cases(Cas_id),
    FOREIGN KEY (Off_id) REFERENCES Officer(Off_id),
    FOREIGN KEY (Vic_id) REFERENCES Victim(Vic_id),
    FOREIGN KEY (Cri_id) REFERENCES Criminal(Cri_id)
)";
if ($conn->multi_query($sql) === false) {
    echo "Error creating tables: " . $conn->error;
}

// Close connection
$conn->close();
?>