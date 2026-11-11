<?php
session_start();

$productos = [
    1 => ["nombre" => "Auriculares", "descripcion" => "Auriculares para escuchar música.", "precio" => 19.99],
    2 => ["nombre" => "Ratón", "descripcion" => "Ratón óptico para ordenador.", "precio" => 12.50],
    3 => ["nombre" => "Teclado", "descripcion" => "Teclado USB para ordenador.", "precio" => 24.90],
    4 => ["nombre" => "Monitor", "descripcion" => "Monitor para trabajar y estudiar.", "precio" => 129.00],
    5 => ["nombre" => "Memoria USB", "descripcion" => "Memoria USB de 64 GB.", "precio" => 8.99]
];

if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = [];
}

if (isset($_GET["comprar"])) {
    $id = (int) $_GET["comprar"];

    if (isset($productos[$id])) {
        if (isset($_SESSION["carrito"][$id])) {
            $_SESSION["carrito"][$id]++;
        } else {
            $_SESSION["carrito"][$id] = 1;
        }
    }

    header("Location: ejercicio5_tienda.php");
    exit;
}

if (isset($_GET["eliminar"])) {
    $id = (int) $_GET["eliminar"];
    unset($_SESSION["carrito"][$id]);
    header("Location: ejercicio5_tienda.php");
    exit;
}

if (isset($_GET["vaciar"])) {
    $_SESSION["carrito"] = [];
    header("Location: ejercicio5_tienda.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Ejercicio 5 - Tienda</title>
<style>
body { font-family: Arial, sans-serif; margin: 30px; }
.producto { border: 1px solid #ccc; padding: 12px; margin: 10px 0; }
</style>
</head>
<body>
<h1>Tienda online</h1>
<h2>Productos</h2>

<?php foreach ($productos as $id => $producto): ?>
    <div class="producto">
        <h3><?= htmlspecialchars($producto["nombre"]) ?></h3>
        <p><?= htmlspecialchars($producto["descripcion"]) ?></p>
        <p>Precio: <?= number_format($producto["precio"], 2) ?> €</p>
        <a href="?comprar=<?= $id ?>">Comprar</a>
    </div>
<?php endforeach; ?>

<h2>Carrito</h2>
<?php if (count($_SESSION["carrito"]) == 0): ?>
    <p>El carrito está vacío.</p>
<?php else: ?>
    <?php $total = 0; ?>
    <?php foreach ($_SESSION["carrito"] as $id => $cantidad): ?>
        <?php $subtotal = $productos[$id]["precio"] * $cantidad; ?>
        <?php $total += $subtotal; ?>
        <p>
            <?= htmlspecialchars($productos[$id]["nombre"]) ?>
            - Cantidad: <?= $cantidad ?>
            - Subtotal: <?= number_format($subtotal, 2) ?> €
            <a href="?eliminar=<?= $id ?>">Eliminar</a>
        </p>
    <?php endforeach; ?>
    <p><strong>Total: <?= number_format($total, 2) ?> €</strong></p>
    <a href="?vaciar=1">Vaciar carrito</a>
<?php endif; ?>
</body>
</html>
