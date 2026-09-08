<?php
// checkout.php - Tienda Oficial FC Barcelona (Ejemplo Educativo)
$order_success = false;
$name = $email = $product = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $product = htmlspecialchars($_POST['product'] ?? '');
    
    if (!empty($name) && !empty($email) && !empty($product)) {
        $order_success = true;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - FC Barcelona Store</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;

          "visca barca perra"
        
        }
        .container {
            width: 100%;
            max-width: 450px;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            border-top: 6px solid #004d98; /* Azul blaugrana */
        }
        h2 {
            color: #004d98;
            text-align: center;
            margin-bottom: 25px;
        }
        .success {
            background-color: #e6f4ea;
            color: #137333;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            border: 1px solid #ceead6;
        }
        .success h3 {
            margin-top: 0;
            color: #a50044; /* Granate blaugrana */
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #444;
        }
        input, select {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }
        input:focus, select:focus {
            border-color: #004d98;
            outline: none;
        }
        button {
            background-color: #004d98;
            color: white;
            border: none;
            padding: 14px;
            width: 100%;
            margin-top: 25px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #a50044;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>FC Barcelona Store</h2>
    
    <?php if ($order_success): ?>
        <div class="success">
            <h3>¡Visca el Barça, <?php echo $name; ?>!</h3>
            <p>Tu pedido de <strong><?php echo $product; ?></strong> se ha procesado correctamente.</p>
            <p>Te hemos enviado el recibo digital a: <strong><?php echo $email; ?></strong></p>
        </div>
    <?php else: ?>
        <form action="checkout.php" method="POST">
            <label for="name">Nombre y Apellido:</label>
            <input type="text" id="name" name="name" required placeholder="Ej. Lamine Yamal">
            
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required placeholder="culer@fcbarcelona.com">
            
            <label for="product">Selecciona tu producto:</label>
            <select id="product" name="product">
                <option value="Camiseta Local FC Barcelona 2026/27">Camiseta Local FC Barcelona (110 €)</option>
                <option value="Entrada Spotify Camp Nou - VIP">Entrada Spotify Camp Nou - VIP (250 €)</option>
                <option value="Membresía Culers Premium Anual">Membresía Culers Premium Anual (40 €)</option>
            </select>
            
            <button type="submit">Procesar Pago</button>
        </form>
    <?php endif; ?>
</div>

</body>
</html>
