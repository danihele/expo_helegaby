<?php
// Exemplo: recebendo dados do pedido (normalmente viriam de um banco de dados ou sessão)
$pedido_id = $_GET['pedido_id'] ?? rand(1000, 9999); 
$cliente   = $_GET['cliente'] ?? "Cliente Exemplo";
$produto   = $_GET['produto'] ?? "Produto Exemplo";
$valor     = $_GET['valor'] ?? "R$ 0,00";
$pagamento = $_GET['pagamento'] ?? "Cartão de Crédito";
$entrega   = $_GET['entrega'] ?? "5 a 7 dias úteis";
$email     = $_GET['email'] ?? "email@exemplo.com";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Compra Finalizada - Potulski Joias</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilos extras para a página de finalização */
        .finalizacao {
            text-align: center;
            padding: 100px 20px;
            background-color: #fdf2f4;
            min-height: 100vh;
        }

        .finalizacao h1 {
            font-size: 40px;
            color: #8c4a53;
            margin-bottom: 20px;
        }

        .finalizacao p {
            font-size: 20px;
            color: #5c3c3c;
            margin-bottom: 15px;
        }

        .resumo {
            margin: 30px auto;
            padding: 25px;
            border: 1px solid #f1c6cc;
            border-radius: 12px;
            background-color: #fff;
            max-width: 500px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            text-align: left;
        }

        .resumo h2 {
            text-align: center;
            color: #c08a8a;
            margin-bottom: 15px;
        }

        .resumo p {
            font-size: 16px;
            margin: 8px 0;
        }

        .btn-home {
            display: inline-block;
            margin-top: 25px;
            padding: 15px 30px;
            background-color: #c08a8a;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 8px;
            transition: 0.3s;
        }
        .btn-home:hover {
            background-color: #a15f5f;
        }
    </style>
</head>
<body>

    <header>
        <a href="home.php" class="logo">Potulski Joias</a>
    </header>

    <section class="finalizacao">
        <h1>🎉 Obrigado pela sua compra!</h1>
        <p>Seu pedido foi processado com sucesso.</p>
        <p>Um e-mail de confirmação foi enviado para: <strong><?php echo $email; ?></strong></p>

        <div class="resumo">
            <h2>Resumo do Pedido</h2>
            <p><strong>Pedido:</strong> #<?php echo $pedido_id; ?></p>
            <p><strong>Cliente:</strong> <?php echo $cliente; ?></p>
            <p><strong>Produto:</strong> <?php echo $produto; ?></p>
            <p><strong>Valor:</strong> <?php echo $valor; ?></p>
            <p><strong>Forma de Pagamento:</strong> <?php echo $pagamento; ?></p>
            <p><strong>Previsão de Entrega:</strong> <?php echo $entrega; ?></p>
        </div>

        <a href="home.php" class="btn-home">Voltar para a Loja</a>
    </section>

</body>
</html>
