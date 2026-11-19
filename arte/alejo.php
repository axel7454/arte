
<?php

// Ruta física para que PHP encuentre las imágenes
$carpeta = __DIR__ . "/arte alejo/";

// Ruta web para mostrar las imágenes
$rutaWeb = "arte%20alejo/";

$imagenes = glob($carpeta . "*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}", GLOB_BRACE);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Obras de Alejo | Galería de Arte</title>

    <link rel="stylesheet" href="index21.css?v=2">

</head>

<body>

    <nav>

        <h2>Galería de Arte</h2>

        <div class="menu">

            <a href="index21.php">Inicio</a>

            <a href="index21.php#artistas">Artistas</a>

            <a href="index21.php#sobre">Sobre nosotros</a>

        </div>

    </nav>


    <section class="seccion pagina-obras">

        <h2>Obras de Alejo</h2>

        <p class="descripcion">
            Conocé las obras y creaciones de nuestro artista Alejo.
        </p>


       <div class="obras">

    <?php foreach ($imagenes as $imagen) { ?>

        <?php
            $nombre = basename($imagen);
            $titulo = pathinfo($nombre, PATHINFO_FILENAME);
            $urlImagen = $rutaWeb . rawurlencode($nombre);
        ?>

        <div class="tarjeta">

            <img
                src="<?php echo htmlspecialchars($urlImagen); ?>"
                alt="<?php echo htmlspecialchars($titulo); ?>"
            >

            <h3>
                <?php echo htmlspecialchars($titulo); ?>
            </h3>

        </div>

    <?php } ?>

</div>


        <?php if (empty($imagenes)) { ?>

            <p>No se encontraron imágenes en la carpeta de Alejo.</p>

        <?php } ?>


        <br>

        <a class="boton volver" href="index21.php#artistas">
            Volver a los artistas
        </a>

    </section>


    <footer>

        <h3>Galería de Arte</h3>

        <p>El arte nos inspira y nos conecta.</p>

        <p>© 2026 - Sofía, Alejo y Axel</p>

    </footer>

</body>

</html>
