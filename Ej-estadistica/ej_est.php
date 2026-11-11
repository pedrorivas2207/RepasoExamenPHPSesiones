<?php
session_start();

if (!isset($_SESSION["cantidad"])) {
    $_SESSION["cantidad"] = 0;
    $_SESSION["suma_impares"] = 0;
    $_SESSION["cantidad_impares"] = 0;
    $_SESSION["mayor_par"] = null;
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = (int) $_POST["numero"];

    if ($numero < 0) {
        $mensaje = "Cantidad de números: " . $_SESSION["cantidad"] . "<br>";

        if ($_SESSION["cantidad_impares"] > 0) {
            $media = $_SESSION["suma_impares"] / $_SESSION["cantidad_impares"];
            $mensaje .= "Media de los impares: " . number_format($media, 2) . "<br>";
        } else {
            $mensaje .= "No has introducido números impares.<br>";
        }

        if ($_SESSION["mayor_par"] !== null) {
            $mensaje .= "Mayor de los pares: " . $_SESSION["mayor_par"];
        } else {
            $mensaje .= "No has introducido números pares.";
        }

        $_SESSION["cantidad"] = 0;
        $_SESSION["suma_impares"] = 0;
        $_SESSION["cantidad_impares"] = 0;
        $_SESSION["mayor_par"] = null;
    } else {
        $_SESSION["cantidad"]++;

        if ($numero % 2 != 0) {
            $_SESSION["suma_impares"] += $numero;
            $_SESSION["cantidad_impares"]++;
        } else {
            if ($_SESSION["mayor_par"] === null || $numero > $_SESSION["mayor_par"]) {
                $_SESSION["mayor_par"] = $numero;
            }
        }

        $mensaje = "Número guardado.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Ejercicio 2</title></head>
<body>
<h1>Estadísticas de números</h1>
<form method="post">
    <label>Introduce un número:</label>
    <input type="number" name="numero" required>
    <button type="submit">Enviar</button>
</form>
<p><?= $mensaje ?></p>
</body>
</html>
