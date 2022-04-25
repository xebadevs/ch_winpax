<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Winpax Test</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>
    <form action="validar.php" method="POST">
        <label for="name"> Nombre </label><br>
        <input
            type="text"
            id="name"
            name="name"
            minlength="6"
            maxlength="20"
            placeholder="Por favor, ingrese su nombre"
            pattern="[^a-ZA-Z]"
            required
        ><br><br>
        <label for="surname"> Apellido </label><br>
        <input
            type="text"
            id="surname"
            name="surname"
            minlength="6"
            maxlength="20"
            placeholder="Por favor, ingrese su apellido"
            pattern="[^a-ZA-Z]"
            required
        ><br><br>
        <label for="email"> Correo </label><br>
        <input
            type="email"
            id="email"
            name="email"
            placeholder="Por favor, ingrese su correo"
            required
        ><br><br>
        <label for="password"> Contraseña </label><br>
        <input
            type="password"
            id="password"
            name="password"
            placeholder="Por favor, ingrese su contraseña"
            required
        ><br><br>
        <label for="re_password"> Repita su contraseña </label><br>
        <input
            type="password"
            id="re_password"
            name="re_password"
            placeholder="Por favor, repita su contraseña"
            required
        ><br><br>
        <button type="submit"> Enviar Formulario </button>
    </form>
</body>
</html>
