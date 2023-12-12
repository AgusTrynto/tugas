<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tugas_php";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Buat database
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Database berhasil dibuat atau sudah ada.";
} else {
    echo "Error creating database: " . $conn->error;
}

// Pilih database yang akan digunakan
$conn->select_db($dbname);

// Buat tabel
$sql_create_table = "CREATE TABLE IF NOT EXISTS nama_tabel (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(30) NOT NULL,
    alamat VARCHAR(50),
    telepon VARCHAR(15)
)";
if ($conn->query($sql_create_table) === TRUE) {
    echo "Tabel berhasil dibuat atau sudah ada.";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert data ke tabel
$sql_insert_data = "INSERT INTO nama_tabel (nama, alamat, telepon) VALUES
    ('John Doe', 'Jl. Contoh No. 123', '081234567890'),
    ('Jane Smith', 'Jl. Contoh No. 456', '087654321098')";
if ($conn->query($sql_insert_data) === TRUE) {
    echo "Data berhasil ditambahkan.";
} else {
    echo "Error inserting data: " . $conn->error;
}

// Update data di dalam tabel
$sql_update_data = "UPDATE nama_tabel SET alamat='Jl. Baru No. 789' WHERE nama='John Doe'";
if ($conn->query($sql_update_data) === TRUE) {
    echo "Data berhasil diperbarui.";
} else {
    echo "Error updating data: " . $conn->error;
}

// Tutup koneksi
$conn->close();
?>