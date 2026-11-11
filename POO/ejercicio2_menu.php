<?php
class Menu {
    private $titulo = array();
    private $enlace = array();

    public function anadeElemento($titulo, $enlace) {
        $this->titulo[] = $titulo;
        $this->enlace[] = $enlace;
    }

    public function mostrarHorizontal() {
        echo '<ul style="display:flex;gap:20px;list-style:none;padding:0;">';
        for ($i = 0; $i < count($this->titulo); $i++) {
            echo '<li><a href="' . htmlspecialchars($this->enlace[$i]) . '">' .
                 htmlspecialchars($this->titulo[$i]) . '</a></li>';
        }
        echo '</ul>';
    }

    public function mostrarVertical() {
        echo '<ul>';
        for ($i = 0; $i < count($this->titulo); $i++) {
            echo '<li><a href="' . htmlspecialchars($this->enlace[$i]) . '">' .
                 htmlspecialchars($this->titulo[$i]) . '</a></li>';
        }
        echo '</ul>';
    }
}

$menu = new Menu();
$menu->anadeElemento("Inicio", "#inicio");
$menu->anadeElemento("Servicios", "#servicios");
$menu->anadeElemento("Contacto", "#contacto");
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Ejercicio 2 - Menú</title></head>
<body>
<h1>Ejercicio 2: Menú</h1>
<h2>Menú horizontal</h2>
<?php $menu->mostrarHorizontal(); ?>
<h2>Menú vertical</h2>
<?php $menu->mostrarVertical(); ?>
</body>
</html>
