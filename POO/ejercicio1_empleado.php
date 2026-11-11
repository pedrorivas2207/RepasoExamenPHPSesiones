<?php
class Empleado {
    private $nombre;
    private $sueldo;

    public function __construct($nombre, $sueldo) {
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
    }

    public function asigna($nombre, $sueldo) {
        if ($nombre == $this->nombre) {
            $this->sueldo = $sueldo;
        }
    }

    public function imprimeDatos() {
        echo "<p>Empleado: " . htmlspecialchars($this->nombre) . "</p>";
        echo "<p>Sueldo: " . number_format($this->sueldo, 2, ',', '.') . " €</p>";

        if ($this->sueldo > 3000) {
            echo "<p>Debe pagar impuestos.</p>";
        } else {
            echo "<p>No debe pagar impuestos.</p>";
        }
    }
}

$empleado = new Empleado("Pedro", 2500);
$empleado->asigna("Pedro", 3200); // Solo actualiza si coincide el nombre.
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Ejercicio 1 - Empleado</title></head>
<body>
<h1>Ejercicio 1: Empleado</h1>
<?php $empleado->imprimeDatos(); ?>
</body>
</html>
