
<?php

$artistas = array("Sofia", "Axel", "Alejo");

$fotos = array(
    "imagenes/artista1.jpg",
    "imagenes/artista2.jpg",
    "imagenes/artista3.jpg"
);

$carpetas = array(
    "imagenes/sofia/",
    "imagenes/axel/",
    "imagenes/alejo/"
);

$seleccionado = 0;

if (isset($_GET["artista"]) && ctype_digit((string)$_GET["artista"])) {
    $seleccionado = (int) $_GET["artista"];
}

if ($seleccionado < 0 || $seleccionado > count($artistas)) {
    $seleccionado = 0;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Arte</title>
    <link rel="stylesheet" href="index21.css?v=2">
</head>

<body>

    <!-- MENU SUPERIOR -->

    <nav>

        <h2>Galería de Arte</h2>

        <div class="menu">

            <a href="index21.php">Inicio</a>

            <a href="index21.php#artistas">Artistas</a>

            <a href="index21.php#sobre">Sobre nosotros</a>

            <a class="boton-tecnico" href="tecnicodelasartes.php">
                Técnico de las Artes
            </a>

        </div>

    </nav>


    <?php if ($seleccionado == 0) { ?>

        <!-- PORTADA -->

        <section class="portada">

            <h1>Galería de Arte</h1>

            <p>Un espacio para compartir y disfrutar el arte.</p>

        </section>


        <!-- ARTISTAS -->

        <section class="seccion" id="artistas">

            <h2>Nuestros artistas</h2>

            <p class="descripcion">
                Conocé nuestros artistas y sus obras.
            </p>

            <div class="tarjetas">

                <?php for ($i = 0; $i < count($artistas); $i++) { ?>

                    <div class="tarjeta">

                        <img src="<?php echo htmlspecialchars($fotos[$i]); ?>"
                             alt="<?php echo htmlspecialchars($artistas[$i]); ?>">

                        <h3><?php echo htmlspecialchars($artistas[$i]); ?></h3>

                        <a class="boton" href="<?php
    if ($i === 0) {
        echo 'sofia.php';
    } elseif ($i === 1) {
        echo 'axel.php';
    } else {
        echo 'alejo.php';
    }
?>">
    Ver trabajos
</a>


                    </div>

                <?php } ?>

            </div>

        </section>


        <!-- SOBRE NOSOTROS -->

        <section class="sobre" id="sobre">

            <h2>Sobre nosotros</h2>

            <p>
                Somos una galería dedicada a mostrar diferentes artistas
                y compartir sus obras de arte.
            </p>

        </section>


    <?php } else { ?>

        <!-- OBRAS DEL ARTISTA -->

        <section class="seccion pagina-obras">

            <h2><?php echo htmlspecialchars($artistas[$seleccionado - 1]); ?></h2>

            <p class="descripcion">Obras del artista.</p>

            <div class="obras">

                <?php

                $carpeta = $carpetas[$seleccionado - 1];

                for ($i = 1; $i <= 10; $i++) {

                    $imagen = $carpeta . "obra" . $i . ".jpg";

                    if (file_exists($imagen)) {

                ?>

                        <img src="<?php echo htmlspecialchars($imagen); ?>"
                             alt="Obra <?php echo $i; ?>">

                <?php

                    }

                }

                ?>

            </div>

            <a class="boton volver" href="index21.php#artistas">
                Volver a los artistas
            </a>

        </section>

    <?php } ?>


    

    <footer>

        <h3>Galería de Arte</h3>

        <p>El arte nos inspira y nos conecta.</p>

        <p>© 2026 - Chernopoloff Sofía, Alcaraz Alejo y Vera Axel</p>

    </footer>

</body>

</html>
