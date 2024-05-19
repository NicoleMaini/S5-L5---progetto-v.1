<?php
include_once __DIR__ . '/classes/Login.php';

$_SESSION = [];

session_unset();
session_destroy();
header('Location: /S5-L5%20-%20progetto%20v.1/index.php');
