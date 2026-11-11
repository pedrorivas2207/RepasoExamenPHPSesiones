<?php
class Animal {
    protected $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function comer() {
        return $this->nombre . " está comiendo.";
    }

    public function dormir() {
        return $this->nombre . " está durmiendo.";
    }

    public function emitirSonido() {
        return $this->nombre . " hace un sonido.";
    }
}

class Mamifero extends Animal {
    public function amamantar() {
        return $this->nombre . " alimenta a sus crías.";
    }
    public function caminar() {
        return $this->nombre . " camina.";
    }
    public function respirar() {
        return $this->nombre . " respira por pulmones.";
    }
}

class Ave extends Animal {
    public function ponerHuevos() {
        return $this->nombre . " pone huevos.";
    }
    public function extenderAlas() {
        return $this->nombre . " extiende sus alas.";
    }
    public function volar() {
        return $this->nombre . " está volando.";
    }
}

class Gato extends Mamifero {
    public function emitirSonido() {
        return $this->nombre . " dice: ¡Miau!";
    }
    public function ronronear() {
        return $this->nombre . " está ronroneando.";
    }
    public function trepar() {
        return $this->nombre . " está trepando.";
    }
}

class Perro extends Mamifero {
    public function emitirSonido() {
        return $this->nombre . " dice: ¡Guau!";
    }
    public function moverCola() {
        return $this->nombre . " mueve la cola.";
    }
    public function buscarPelota() {
        return $this->nombre . " busca la pelota.";
    }
}

class Canario extends Ave {
    public function emitirSonido() {
        return $this->nombre . " está cantando: ¡Pío, pío!";
    }
    public function volar() {
        return $this->nombre . " vuela por la habitación.";
    }
    public function saltar() {
        return $this->nombre . " salta de una rama a otra.";
    }
}

class Pinguino extends Ave {
    public function emitirSonido() {
        return $this->nombre . " emite un graznido.";
    }
    public function nadar() {
        return $this->nombre . " está nadando.";
    }
    public function caminar() {
        return $this->nombre . " camina de forma torpe.";
    }
}

class Lagarto extends Animal {
    public function tomarSol() {
        return $this->nombre . " está tomando el sol.";
    }
    public function reptar() {
        return $this->nombre . " se desplaza reptando.";
    }
    public function mudarPiel() {
        return $this->nombre . " está mudando la piel.";
    }
}

$animales = array(
    new Gato("Michi"),
    new Perro("Toby"),
    new Canario("Piolín"),
    new Pinguino("Pipo"),
    new Lagarto("Rayo")
);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Ejercicio 5 - Animales</title>
<style>
body{font-family:Arial,sans-serif;margin:30px;background:#f4f4f4}
main{max-width:850px;margin:auto}
.animal{background:white;padding:16px;margin:14px 0;border-radius:10px}
h1{color:#333}
</style>
</head>
<body>
<main>
<h1>Ejercicio 5: Herencia de animales</h1>
<?php
foreach ($animales as $animal) {
    echo '<section class="animal">';
    echo '<h2>' . htmlspecialchars(get_class($animal)) . '</h2>';
    echo '<p>' . htmlspecialchars($animal->comer()) . '</p>';
    echo '<p>' . htmlspecialchars($animal->dormir()) . '</p>';
    echo '<p>' . htmlspecialchars($animal->emitirSonido()) . '</p>';

    if ($animal instanceof Gato) {
        echo '<p>' . htmlspecialchars($animal->amamantar()) . '</p>';
        echo '<p>' . htmlspecialchars($animal->ronronear()) . '</p>';
        echo '<p>' . htmlspecialchars($animal->trepar()) . '</p>';
    } elseif ($animal instanceof Perro) {
        echo '<p>' . htmlspecialchars($animal->amamantar()) . '</p>';
        echo '<p>' . htmlspecialchars($animal->moverCola()) . '</p>';
        echo '<p>' . htmlspecialchars($animal->buscarPelota()) . '</p>';
    } elseif ($animal instanceof Canario) {
        echo '<p>' . htmlspecialchars($animal->ponerHuevos()) . '</p>';
        echo '<p>' . htmlspecialchars($animal->volar()) . '</p>';
        echo '<p>' . htmlspecialchars($animal->saltar()) . '</p>';
    } elseif ($animal instanceof Pinguino) {
        echo '<p>' . htmlspecialchars($animal->ponerHuevos()) . '</p>';
        echo '<p>' . htmlspecialchars($animal->nadar()) . '</p>';
        echo '<p>' . htmlspecialchars($animal->caminar()) . '</p>';
    } elseif ($animal instanceof Lagarto) {
        echo '<p>' . htmlspecialchars($animal->tomarSol()) . '</p>';
        echo '<p>' . htmlspecialchars($animal->reptar()) . '</p>';
        echo '<p>' . htmlspecialchars($animal->mudarPiel()) . '</p>';
    }
    echo '</section>';
}
?>
</main>
</body>
</html>
