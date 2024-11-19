<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Pedido</title>
    <link rel="stylesheet" href="{{ asset('css/email-styles.css') }}">
</head>
<body>
    <div class="email-container">
        <h1 class="email-title">¡Gracias por tu compra!</h1>
        <p class="email-paragraph">Tu pedido ha sido procesado correctamente.</p>
        <img class="email-logo" src="{{ asset('images/logo-empresa-blanco.png') }}" alt="Logo de la empresa">
    </div>
</body>
</html>