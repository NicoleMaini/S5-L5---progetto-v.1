<?php

// Configurazione del database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 's5_l5_progetto';

try {
    // Connessione al database
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Gestione degli errori di connessione
    die("Database connection failed: " . $e->getMessage());
}
