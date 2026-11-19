
<?php
$carpeta = __DIR__ . "/arte sofi/";

// Buscar todas las imágenes
$obras = glob($carpeta . "*");

// Filtrar solamente archivos de imagen
$obras = array_filter($obras, function($archivo) {
    $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    return in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
});

// Ordenar por número
usort($obras, function($a, $b) {
    return strnatcasecmp(basename($a), basename($b));
});
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Obras de Sofía</title>
    <link rel="stylesheet" href="index21.css">

    <style>
        body {
            margin: 0;
            background-color: #f5eee5;
            font-family: Arial, sans-serif;
            color: #5c4b3f;
        }

        nav {
            background-color: #cbb69e;
            padding: 20px;
            text-align: center;
        }

        nav h2 {
            color: white;
            margin-top: 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 10px;
        }

        h1 {
            text-align: center;
            color: #8b725b;
            margin-top: 35px;
        }

        .subtitulo {
            text-align: center;
            color: #998573;
        }

        .obras-lista {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 25px;
            padding: 25px;
        }

        .obra {
            background-color: #fffdf9;
            width: 260px;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 3px 8px rgba(80, 60, 40, 0.12);
        }

        .obra img {
            width: 100%;
            height: 230px;
            object-fit: contain;
            background-color: #eee5da;
            border-radius: 6px;
        }

        .obra p {
            color: #806b58;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .volver {
            text-align: center;
            margin: 35px;
        }

        .volver a {
            background-color: #b69b7e;
            color: white;
            padding: 12px 22px;
            border-radius: 20px;
            text-decoration: none;
        }

        footer {
            background-color: #cbb69e;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 30px;
        }

        @media (max-width: 600px) {
            .obra {
                width: 85%;
            }
        }
    </style>
</head>

<body>

    <nav>
        <h2>Galería de Arte</h2>
        <a href="index21.php">Inicio</a>
        <a href="index21.php#artistas">Artistas</a>
    </nav>

    <h1>Obras de Sofía </h1>

    <div class="obras-lista">

        <?php if (!empty($obras)): ?>

            <?php foreach ($obras as $obra): ?>

                <?php
                $nombre = basename($obra);
                $nombreMostrar = pathinfo($nombre, PATHINFO_FILENAME);
                ?>

                <div class="obra">

                    <img
                        src="<?php echo 'arte%20sofi/' . rawurlencode($nombre); ?>"
                        alt="<?php echo htmlspecialchars($nombreMostrar, ENT_QUOTES, 'UTF-8'); ?>"
                    >

                    <p>
                        <?php echo htmlspecialchars($nombreMostrar, ENT_QUOTES, 'UTF-8'); ?>
                    </p>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <p>Todavía no hay imágenes para mostrar.</p>

        <?php endif; ?>

    </div>

    <div class="volver">
        <a href="index21.php#artistas">Volver a los artistas</a>
    </div>

    <footer>
        <p>Galería de Arte Chernopoloff Sofia</p>
    </footer>

</body>
</html>
