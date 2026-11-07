<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="registro.php">
        <label for="nombre_completo">Nombre del usuario</label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>

        <label for="login_user">Nombre de usuario</label>
        <input type="text" id="usuario" name="usuario" required>
        <br><br>

        <label for="password">Contraseña</label>
        <input type="text" id="contraseña" name="contraseña" required>
        <br><br>

        <label for="confirm_password">Confirmar contraseña</label>
        <input type="text" id="confirmar" name="confirmar" required>
        <br><br>

        <button type="submit">Registrar</button>

    </form>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $password = $_POST['contraseña'];
    $confirmar = $_POST['confirmar'];
    if ($nombre == "" || $usuario == "" || $password == "" || $confirmar == "") {
            echo "Todos los campos son obligatorios";
    }elseif (strlen($password) < 6) {
            echo "La contraseña debe tener 6 caracteres";
    }elseif ($password !== $confirmar) {
            echo "La contraseña debe coincidir";
    }else{
$hash = password_hash($password, PASSWORD_DEFAULT);
$usuario_r = ['nombre'=>$nombre,'usuario'=>$usuario,'hash'=>$hash];
    echo "El usuario fue registrado";
    echo "Hash generado" . $usuario_r['hash'];
        }
    }
    ?>
</body>
</html>
