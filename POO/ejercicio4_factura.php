<?php
class Factura {
    const IVA = 21;
    private $importeBase = 0;
    private $fecha;
    private $estado;
    private $productos = array();

    public function __construct($fecha, $estado = "pendiente") {
        $this->fecha = $fecha;
        $this->estado = $estado;
    }

    public function anadeProducto($nombre, $precio, $cantidad) {
        $this->productos[] = array(
            "nombre" => $nombre,
            "precio" => $precio,
            "cantidad" => $cantidad
        );
        $this->importeBase += $precio * $cantidad;
    }

    public function imprimeFactura() {
        echo "<h2>Factura</h2>";
        echo "<p>Fecha: " . htmlspecialchars($this->fecha) . "</p>";
        echo "<p>Estado: " . htmlspecialchars($this->estado) . "</p>";
        echo "<table border='1' cellpadding='6'><tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th></tr>";

        foreach ($this->productos as $producto) {
            $subtotal = $producto["precio"] * $producto["cantidad"];
            echo "<tr><td>" . htmlspecialchars($producto["nombre"]) . "</td>";
            echo "<td>" . number_format($producto["precio"], 2, ',', '.') . " €</td>";
            echo "<td>" . $producto["cantidad"] . "</td>";
            echo "<td>" . number_format($subtotal, 2, ',', '.') . " €</td></tr>";
        }

        $iva = $this->importeBase * self::IVA / 100;
        $total = $this->importeBase + $iva;
        echo "</table>";
        echo "<p>Importe base: " . number_format($this->importeBase, 2, ',', '.') . " €</p>";
        echo "<p>IVA (" . self::IVA . "%): " . number_format($iva, 2, ',', '.') . " €</p>";
        echo "<strong>Total: " . number_format($total, 2, ',', '.') . " €</strong>";
    }

    public function getImporteBase() {
        return $this->importeBase;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        if ($estado == "pagada" || $estado == "pendiente") {
            $this->estado = $estado;
        }
    }
}

$factura = new Factura("11/11/2026");
$factura->anadeProducto("Teclado", 25, 2);
$factura->anadeProducto("Ratón", 15, 1);
$factura->setEstado("pagada");
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Ejercicio 4 - Factura</title></head>
<body>
<h1>Ejercicio 4: Factura</h1>
<?php $factura->imprimeFactura(); ?>
</body>
</html>
