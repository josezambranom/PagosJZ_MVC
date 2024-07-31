<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="José Zambrano">
    <meta name="description" content="Tienda de servicios de entretenimiento">
    <title>
        <?php echo (isset($titulo) && $titulo !== '') ? 'Punto de Pagos "JZ" | ' . $titulo : 'Punto de Pagos "JZ"'; ?>
    </title>
    <link rel="shortcut icon" href="/build/img/logo.jpg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css" integrity="sha256-KIZHD6c6Nkk0tgsncHeNNwvNU1TX8YzPrYn01ltQwFg=" crossorigin="anonymous">
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <?php echo $content; ?>

    <button class="ir-arriba-btn">
        <i class="fas fa-arrow-up"></i>
    </button>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/build/js/app.js"></script>
    <?php echo $script ?? ''; ?>
</body>

</html>