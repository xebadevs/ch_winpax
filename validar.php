<?php

// -------------------- PDO CONNECTION -------------------- //
const DB_DSN = 'mysql:host=127.0.0.1;dbname=prueba_winpax';
const DB_USER = 'root';
const DB_PASSWORD = '';

try {
    $db = new PDO (
        DB_DSN,
        DB_USER,
        DB_PASSWORD
    );
}catch (Exception $e){
    echo 'La conexión a Base de Datos ha fallado' . '<br>' .
    $e->getMessage();
}


// -------------------- VALIDATION -------------------- //

$form_error = NULL;
$email_error = NULL;

// -------------------- E-MAIL SEARCH -------------------- //

try {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    $sql = "SELECT email FROM users WHERE email = '$email'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $email_exists = $stmt->rowCount();

    if($name === '' || $surname === ''){
        throw new Exception('El campo no puede estar vacío');
    }
    if($surname === ''){
        throw new Exception('El campo no puede estar vacío');
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('El email no cumple con los estándares de definición');
    }
    if($email_exists != 0){
        throw new Exception('El email ya se encuentra en uso');
    }
    if($password === ''){
        throw new Exception('El campo no puede estar vacío');
    }
    if($password != $re_password){
        throw new Exception('Las contraseñas deben coincidir');
    }

    $password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (name, surname, email, password) VALUES ('$name', '$surname', '$email', '$password')";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $res = $stmt->fetch();
}catch (Exception $e){
    echo $e->getMessage();
}