<?php
session_start();
// Se houver mensagem de erro na sessão, exibe e remove
$erro = '';
if (isset($_SESSION['erro'])) {
    $erro = $_SESSION['erro'];
    unset($_SESSION['erro']);
}

// Verificar se há mensagem de sucesso (após cadastro)
$sucesso = '';
if (isset($_SESSION['sucesso'])) {
    $sucesso = $_SESSION['sucesso'];
    unset($_SESSION['sucesso']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Potulski Joias</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Reset e estilos base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #2c3e50;
            --secondary-color: #fed7dd;
            --accent-color: #d4af37;
            --dark-bg: #1a1f29;
            --light-bg: #f8f9fa;
            --text-dark: #2c3e50;
            --text-light: #ffffff;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #fed7dd 0%, #f8c0c9 100%);
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            line-height: 1.6;
            overflow-x: hidden;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Cabeçalho */
        header {
            background: linear-gradient(to right, rgba(248, 233, 233, 0.98), rgba(248, 233, 233, 0.95));
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            text-align: center;
            backdrop-filter: blur(5px);
        }

        header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            color: var(--primary-color);
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
            background: linear-gradient(45deg, var(--primary-color), #000000);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            letter-spacing: 1px;
        }

        header a {
            text-decoration: none;
            color: inherit;
        }

        /* Menu de navegação */
        #menu {
            background: linear-gradient(to right, rgba(41, 40, 40, 0.95), rgba(60, 59, 59, 0.95));
            color: rgb(247, 250, 253);
            width: 80%;
            max-width: 900px;
            margin: 20px auto;
            padding: 15px;
            border-radius: 50px;
            position: relative;
            top: -3px;
            left: 30%;
            transform: translateX(-50%);
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            z-index: 999;
            backdrop-filter: blur(5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
        }

        #menu a {
            color: aliceblue;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 50px;
            transition: all 0.4s ease;
            font-weight: 600;
            font-size: 16px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        #menu a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.6s ease;
        }

        #menu a:hover::before { 
            left: 100%;
        }

        #menu a:hover {
            background-color: rgba(254, 215, 221, 0.3);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        #atual {
            background-color: rgba(254, 215, 221, 0.4);
            box-shadow: 0 0 15px rgba(254, 215, 221, 0.6);
        }

        /* Seção de Login */
        #login {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 150px 20px 80px;
        }

        .login-container {
            display: flex;
            max-width: 1000px;
            width: 100%;
            background: linear-gradient(145deg, #ffffff, #f8f8f8);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            animation: fadeInUp 0.8s ease-out;
        }

        .login-image {
            flex: 1;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://images.unsplash.com/photo-1515562141207-7a88fb7ad3e5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80') no-repeat center;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            color: white;
            text-align: center;
        }

        .login-image h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .login-image p {
            font-size: 1.1rem;
            max-width: 300px;
            line-height: 1.6;
        }

        .login-form {
            flex: 1;
            padding: 50px 40px;
            position: relative;
        }

        .login-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
        }

        .login-form h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 15px;
            text-align: center;
            position: relative;
            font-weight: 700;
        }

        .login-form h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            border-radius: 2px;
        }

        .login-form p {
            text-align: center;
            margin-bottom: 30px;
            color: #5c3c3c;
            font-size: 1.1rem;
        }

        /* Estilos do Formulário */
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--primary-color);
        }

        .form-group input {
            width: 100%;
            padding: 15px 15px 15px 50px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-repeat: no-repeat;
            background-position: 15px center;
            font-family: 'Montserrat', sans-serif;
        }

        input[type="email"] {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="%232c3e50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>');
        }

        input[type="password"] {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="%232c3e50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>');
        }

        .form-group input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(44, 62, 80, 0.1);
            outline: none;
        }

        .btn-submit {
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            color: white;
            padding: 16px;
            width: 100%;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-submit:hover {
            background: linear-gradient(to right, var(--accent-color), var(--primary-color));
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        /* Links e Mensagens */
        .extra-links {
            text-align: center;
            margin-top: 25px;
            color: #5c3c3c;
        }

        .extra-links a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 0 10px;
        }

        .extra-links a:hover {
            text-decoration: underline;
            color: var(--accent-color);
        }

        #voltar {
            display: block;
            text-align: center;
            margin-top: 30px;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        #voltar:hover {
            color: var(--accent-color);
            text-decoration: underline;
        }

        .mensagem {
            padding: 15px;
            margin-bottom: 25px;
            border-radius: 10px;
            text-align: center;
            font-size: 16px;
            font-weight: 500;
        }

        .erro {
            background-color: #ffebee;
            color: #c62828;
            border: 1px solid #ef9a9a;
        }

        .sucesso {
            background-color: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #a5d6a7;
        }

        /* Social Login */
        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 25px;
        }

        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-btn.facebook {
            background: linear-gradient(to right, #3b5998, #2d4373);
        }

        .social-btn.google {
            background: linear-gradient(to right, #db4437, #c23321);
        }

        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        /* Rodapé */
        footer {
            background: linear-gradient(to right, var(--primary-color), #000000);
            color: #fff;
            text-align: center;
            padding: 35px 20px;
            margin-top: 60px;
        }

        .footer-content {
            max-width: 1000px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            text-align: left;
        }

        .footer-section h3 {
            font-size: 1.3rem;
            margin-bottom: 18px;
            position: relative;
            display: inline-block;
        }

        .footer-section h3::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 45px;
            height: 2px;
            background: var(--accent-color);
        }

        .footer-section p, .footer-section a {
            margin-bottom: 8px;
            display: block;
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: var(--secondary-color);
        }

        .social-links {
            display: flex;
            gap: 12px;
            margin-top: 12px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.3s;
        }

        .social-links a:hover {
            background: var(--secondary-color);
            transform: translateY(-3px);
        }

        .copyright {
            margin-top: 35px;
            padding-top: 18px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            grid-column: 1 / -1;
            text-align: center;
        }

        /* Animações */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsividade */
        @media (max-width: 992px) {
            #menu {
                width: 95%;
                top: 90px;
            }
            
            #menu a {
                padding: 10px 15px;
                font-size: 14px;
            }
            
            .login-container {
                max-width: 90%;
            }
        }

        @media (max-width: 768px) {
            header h1 {
                font-size: 2.2rem;
            }
            
            #menu {
                position: relative;
                top: 0;
                margin: 15px auto;
                border-radius: 15px;
            }
            
            #login {
                padding: 120px 15px 50px;
            }
            
            .login-container {
                flex-direction: column;
            }
            
            .login-image {
                display: none;
            }
            
            .login-form {
                padding: 40px 25px;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .footer-section h3::after {
                left: 50%;
                transform: translateX(-50%);
            }
        }
    </style>
</head>
<body>
    <header>
        <a href="home.php"><h1>Potulski Joias</h1></a>
    </header>

    <nav id="menu">
        <a href="home.php"><i class="fas fa-home"></i> Início</a>
        <a href="produtos.php"><i class="fas fa-gem"></i> Produtos</a>
        <a href="marcas.php"><i class="fas fa-crown"></i> Marcas</a>
        <a href="login.php" id="atual"><i class="fas fa-user"></i> Login</a>
        <a href="carrinho.php"><i class="fas fa-shopping-cart"></i> Carrinho</a>
    </nav>

    <section id="login">
        <div class="login-container">
            <div class="login-image">
                <h2>Bem-vindo de volta</h2>
                <p>Entre em sua conta para acessar ofertas exclusivas e gerenciar seus pedidos.</p>
            </div>
            
            <div class="login-form">
                <h2>Login</h2>
                <p>Entre com sua conta para acessar os recursos exclusivos.</p>

                <?php if (!empty($erro)): ?>
                    <div class="mensagem erro"><?php echo htmlspecialchars($erro); ?></div>
                <?php endif; ?>
                
                <?php if (!empty($sucesso)): ?>
                    <div class="mensagem sucesso"><?php echo htmlspecialchars($sucesso); ?></div>
                <?php endif; ?>
                
                <form action="login_process.php" method="POST">
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input type="password" id="password" name="password" placeholder="Digite sua senha" required>
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-sign-in-alt"></i> Entrar
                    </button>

                    <div class="extra-links">
                        <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
                        <a href="#" class="forgot-password">Esqueceu sua senha?</a>
                    </div>
                </form>
                
                <div class="social-login">
                    <a href="#" class="social-btn facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-btn google"><i class="fab fa-google"></i></a>
                </div>
                
                <a href="home.php" id="voltar">
                    <i class="fas fa-arrow-left"></i> Voltar ao início
                </a>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Potulski Joias</h3>
                <p>Especialistas em joias finas e exclusivas, trazendo elegância e sofisticação para momentos especiais.</p>
            </div>
            <div class="footer-section">
                <h3>Links Rápidos</h3>
                <a href="home.php">Início</a>
                <a href="produtos.php">Produtos</a>
                <a href="marcas.php">Marcas</a>
                <a href="sobre.php">Sobre Nós</a>
            </div>
            <div class="footer-section">
                <h3>Contato</h3>
                <p><i class="fas fa-map-marker-alt"></i> Av. das Joias, 123 - Centro</p>
                <p><i class="fas fa-phone"></i> (11) 3456-7890</p>
                <p><i class="fas fa-envelope"></i> contato@potulskijoias.com.br</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2025 Potulski Joias. Todos os direitos reservados.</p>
            <p>Joias que encantam e momentos que permanecem</p>
        </div>
    </footer>
</body>
</html>