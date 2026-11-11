<?php
session_start();

if (!isset($_SESSION["numeros"])) {
    $_SESSION["numeros"] = [];
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = (float) $_POST["numero"];

    if ($numero < 0) {
        if (count($_SESSION["numeros"]) > 0) {
            $media = array_sum($_SESSION["numeros"]) / count($_SESSION["numeros"]);
            $mensaje = "La media es: " . number_format($media, 2);
        } else {
            $mensaje = "No has introducido ningún número positivo.";
        }

        $_SESSION["numeros"] = [];
    } else {
        $_SESSION["numeros"][] = $numero;
        $mensaje = "Número guardado. Llevas " . count($_SESSION["numeros"]) . " números.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Ejercicio 1</title></head>
<body>
<h1>Media de números</h1>
<form method="post">
    <label>Introduce un número:</label>
    <input type="number" name="numero" step="any" required>
    <button type="submit">Enviar</button>
</form>
<p><?= htmlspecialchars($mensaje) ?></p>
</body>
</html>
