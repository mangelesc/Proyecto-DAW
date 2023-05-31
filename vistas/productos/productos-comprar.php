<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar <?php echo $currentProduct['nombre_producto'];?></title>
    <link rel="stylesheet" href="../../styles/navbar.css" />
    <link rel="stylesheet" href="../../styles/tarjetas.css" />
    <script src="https://www.paypal.com/sdk/js?client-id=AeuOxYUOQsyqbuoMpo-gjCm65T74zccghYvRMqhTyHesowtwbSm1PhmBQkxc73xUMbI3G7Qi-2rY2tui&currency=EUR"></script>
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <script src="paypal-API.js"></script>
</head>
<body>
    <?php
        require_once ("../../vistas/navbar.php");
    ?>
    <!-- Importa la librería de PayPal -->

<main>
    <!-- Agrega un formulario para procesar pagos -->
    <form id="payment-form">
        <div class="buy-div">
            <h3 class="buyTittleh3">Producto: </h3>
            <p class="buyp"><?php echo $currentProduct['nombre_producto'];?></p>
            <input type="hidden" id="description" name="amount" value="<?php echo $currentProduct['nombre_producto'];?>" required />
        </div>
        <div class="buy-div">
            <h3 class="buyTittleh3">Precio: </h3>
            <p class="buyp"><?php echo $currentProduct['precio'];?> €</p>
        </div>
        <div class="buy-div">
            <h3 class="buyTittleh3">Opciones de compra:  </h3>
            <p></p>
        </div>
        <div id="paypal-button-container"></div>
    </form>
    <div class="div-button">
        <div class="userProf-div-btn" id="userProf-div-btn">
            <a class="boton" href='./detalle-producto.php?id_producto=<?php echo $currentProduct['id_producto'];?>'>Volver</a>
        </div>
    </div>
</main>



<!-- Configura el entorno de pruebas de la API de PayPal -->
<script>
    paypal
        .Buttons({
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [
                        {
                            amount: {
                                value: <?php echo $currentProduct['precio'];?>,
                            },
                            description:
                                document.getElementById("description").value,
                        },
                    ],
                });
            },
            // Configura el entorno de pruebas de PayPal
            onInit: function (data) {
                data.clientId =
                    "Your_API_Key_Here"; // Coloca aquí tu Client ID de PayPal
                data.currency = "EUR"; // Configura la moneda en la que se realizará el pago
            },
            // Configura la redirección después del pago
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (details) {
                    window.location.href = "./comprar-producto-pago-exitoso.php?id_producto=<?php echo $currentProduct['id_producto'];?>"; // 
                    
                });
            },
        })
        .render("#paypal-button-container"); // Renderiza el botón de pago en el formulario

    // Agrega un evento para procesar el formulario al hacer clic en el botón de enviar
    document
        .getElementById("payment-form")
        .addEventListener("submit", function (event) {
            event.preventDefault(); // Previene la acción por defecto del formulario
            paypal.Buttons().render(); // Renderiza el botón de pago de PayPal
        });
</script>
</body>
</html>
