<?php
session_start();

$usuarioCorrecto = "alumno";
$contrasenaCorrecta = "1234";
$error = "";

if (isset($_GET["salir"])) {
    $_SESSION = [];
    session_destroy();
    header("Location: ejercicio4_login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_SESSION["usuario"])) {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    if ($usuario == $usuarioCorrecto && $contrasena == $contrasenaCorrecta) {
        $_SESSION["usuario"] = $usuario;
        $_SESSION["numeros"] = [];
        header("Location: ejercicio4_login.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}

if (isset($_SESSION["usuario"]) && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["numero"])) {
    $numero = (float) $_POST["numero"];

    if ($numero < 0) {
        if (count($_SESSION["numeros"]) > 0) {
            $media = array_sum($_SESSION["numeros"]) / count($_SESSION["numeros"]);
            $_SESSION["resultado"] = "La media es: " . number_format($media, 2);
        } else {
            $_SESSION["resultado"] = "No has introducido números positivos.";
        }
        $_SESSION["numeros"] = [];
    } else {
        $_SESSION["numeros"][] = $numero;
        $_SESSION["resultado"] = "Número guardado. Llevas " . count($_SESSION["numeros"]) . " números.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Ejercicio 4 - Login</title></head>
<body>
<?php if (!isset($_SESSION["usuario"])): ?>
    <h1>Iniciar sesión</h1>
    <form method="post">
        <label>Usuario:</label>
        <input type="text" name="usuario" required>
        <br><br>
        <label>Contraseña:</label>
        <input type="password" name="contrasena" required>
        <br><br>
        <button type="submit">Entrar</button>
    </form>
    <p><?= htmlspecialchars($error) ?></p>
    <p>Usuario de prueba: alumno | Contraseña: 1234</p>
<?php else: ?>
    <h1>Ejercicio 1 protegido</h1>
    <p>Has iniciado sesión como <?= htmlspecialchars($_SESSION["usuario"]) ?>.</p>
    <form method="post">
        <label>Introduce un número:</label>
        <input type="number" name="numero" step="any" required>
        <button type="submit">Enviar</button>
    </form>
    <p><?= htmlspecialchars($_SESSION["resultado"] ?? "") ?></p>
    <p><a href="ejercicio4_login.php?salir=1">Cerrar sesión</a></p>
<?php endif; ?>
</body>
</html>
