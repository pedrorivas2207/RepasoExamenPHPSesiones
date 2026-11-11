<?php
class Cubo {
    private $capacidad;
    private $contenido;

    public function __construct($capacidad, $contenido = 0) {
        $this->capacidad = max(0, $capacidad);
        $this->contenido = max(0, min($contenido, $this->capacidad));
    }

    public function getCapacidad() {
        return $this->capacidad;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function verterEn($destino) {
        $espacioLibre = $destino->getCapacidad() - $destino->getContenido();
        $cantidad = min($this->contenido, $espacioLibre);

        $this->contenido -= $cantidad;
        $destino->contenido += $cantidad;

        return $cantidad;
    }
}

$cubo1 = new Cubo(10, 8);
$cubo2 = new Cubo(5, 3);
$vertido = $cubo1->verterEn($cubo2);
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Ejercicio 3 - Cubos</title></head>
<body>
<h1>Ejercicio 3: Cubos</h1>
<p>Cubo origen: capacidad <?php echo $cubo1->getCapacidad(); ?> litros.</p>
<p>Contenido final del origen: <?php echo $cubo1->getContenido(); ?> litros.</p>
<p>Cubo destino: capacidad <?php echo $cubo2->getCapacidad(); ?> litros.</p>
<p>Contenido final del destino: <?php echo $cubo2->getContenido(); ?> litros.</p>
<p>Se han vertido <?php echo $vertido; ?> litros.</p>
</body>
</html>
