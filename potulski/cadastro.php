<?php
// Iniciar a sessão no início do arquivo, antes de qualquer saída HTML
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'config.php';

// Verificar se há mensagens de erro ou sucesso na sessão
$erro = '';
$sucesso = '';
$dados_form = isset($_SESSION['dados_form']) ? $_SESSION['dados_form'] : [];

if (isset($_SESSION['erro'])) {
    $erro = $_SESSION['erro'];
    unset($_SESSION['erro']);
}

if (isset($_SESSION['sucesso'])) {
    $sucesso = $_SESSION['sucesso'];
    unset($_SESSION['sucesso']);
}

if (isset($_SESSION['dados_form'])) {
    unset($_SESSION['dados_form']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Potulski Joias</title>
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

        /* Seção de Cadastro */
        #cadastro {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 150px 20px 80px;
        }

        .cadastro-container {
            display: flex;
            max-width: 1000px;
            width: 100%;
            background: linear-gradient(145deg, #ffffff, #f8f8f8);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            animation: fadeInUp 0.8s ease-out;
        }

        .cadastro-image {
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

        .cadastro-image h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .cadastro-image p {
            font-size: 1.1rem;
            max-width: 300px;
            line-height: 1.6;
        }

        .cadastro-form {
            flex: 1;
            padding: 50px 40px;
            position: relative;
        }

        .cadastro-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
        }

        .cadastro-form h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 15px;
            text-align: center;
            position: relative;
            font-weight: 700;
        }

        .cadastro-form h2::after {
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

        .cadastro-form p {
            text-align: center;
            margin-bottom: 30px;
            color: #5c3c3c;
            font-size: 1.1rem;
        }

        /* Estilos do Formulário */
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--primary-color);
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 14px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            font-family: 'Montserrat', sans-serif;
        }

        .form-group input:focus, .form-group select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(44, 62, 80, 0.1);
            outline: none;
        }

        .form-group .error {
            color: #e53e3e;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }

        .form-group.invalid input, .form-group.invalid select {
            border-color: #e53e3e;
        }

        .form-group.invalid .error {
            display: block;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
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
        .login-link {
            text-align: center;
            margin-top: 25px;
            color: #5c3c3c;
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
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
            
            .cadastro-container {
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
            
            #cadastro {
                padding: 120px 15px 50px;
            }
            
            .cadastro-container {
                flex-direction: column;
            }
            
            .cadastro-image {
                display: none;
            }
            
            .cadastro-form {
                padding: 40px 25px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
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
        <a href="login.php"><i class="fas fa-user"></i> Login</a>
        <a href="carrinho.php"><i class="fas fa-shopping-cart"></i> Carrinho</a>
    </nav>

    <section id="cadastro">
        <div class="cadastro-container">
            <div class="cadastro-image">
                <h2>Junte-se a Nós</h2>
                <p>Crie sua conta e descubra um mundo de joias exclusivas e ofertas especiais.</p>
            </div>
            
            <div class="cadastro-form">
                <h2>Cadastro</h2>
                <p>Crie sua conta para acessar ofertas exclusivas.</p>

                <?php if (!empty($erro)): ?>
                    <div class="mensagem erro"><?php echo htmlspecialchars($erro); ?></div>
                <?php endif; ?>
                
                <?php if (!empty($sucesso)): ?>
                    <div class="mensagem sucesso"><?php echo htmlspecialchars($sucesso); ?></div>
                <?php endif; ?>

                <form id="cadastroForm" action="cadastro_process.php" method="POST">
                    <div class="form-group">
                        <label for="nome">Nome completo:</label>
                        <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>
                        <div class="error">Por favor, insira seu nome completo</div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" required>
                            <div class="error">Por favor, insira um CPF válido</div>
                        </div>

                        <div class="form-group">
                            <label for="telefone">Telefone:</label>
                            <input type="tel" id="telefone" name="telefone" placeholder="(xx) xxxxx-xxxx" required>
                            <div class="error">Por favor, insira um telefone válido</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
                        <div class="error">Por favor, insira um e-mail válido</div>
                    </div>

                    <div class="form-group">
                        <label for="endereco">Endereço:</label>
                        <input type="text" id="endereco" name="endereco" placeholder="Digite seu endereço completo" required>
                        <div class="error">Por favor, insira seu endereço</div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="cidade">Cidade:</label>
                            <input type="text" id="cidade" name="cidade" placeholder="Sua cidade" required>
                            <div class="error">Por favor, insira sua cidade</div>
                        </div>

                        <div class="form-group">
                            <label for="estado">Estado:</label>
                            <select id="estado" name="estado" required>
                                <option value="">Selecione</option>
                                <option value="AC" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'AC') || (isset($dados_form['estado']) && $dados_form['estado'] == 'AC') ? 'selected' : ''; ?>>Acre</option>
                                <option value="AL" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'AL') || (isset($dados_form['estado']) && $dados_form['estado'] == 'AL') ? 'selected' : ''; ?>>Alagoas</option>
                                <option value="AP" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'AP') || (isset($dados_form['estado']) && $dados_form['estado'] == 'AP') ? 'selected' : ''; ?>>Amapá</option>
                                <option value="AM" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'AM') || (isset($dados_form['estado']) && $dados_form['estado'] == 'AM') ? 'selected' : ''; ?>>Amazonas</option>
                                <option value="BA" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'BA') || (isset($dados_form['estado']) && $dados_form['estado'] == 'BA') ? 'selected' : ''; ?>>Bahia</option>
                                <option value="CE" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'CE') || (isset($dados_form['estado']) && $dados_form['estado'] == 'CE') ? 'selected' : ''; ?>>Ceará</option>
                                <option value="DF" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'DF') || (isset($dados_form['estado']) && $dados_form['estado'] == 'DF') ? 'selected' : ''; ?>>Distrito Federal</option>
                                <option value="ES" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'ES') || (isset($dados_form['estado']) && $dados_form['estado'] == 'ES') ? 'selected' : ''; ?>>Espírito Santo</option>
                                <option value="GO" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'GO') || (isset($dados_form['estado']) && $dados_form['estado'] == 'GO') ? 'selected' : ''; ?>>Goiás</option>
                                <option value="MA" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'MA') || (isset($dados_form['estado']) && $dados_form['estado'] == 'MA') ? 'selected' : ''; ?>>Maranhão</option>
                                <option value="MT" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'MT') || (isset($dados_form['estado']) && $dados_form['estado'] == 'MT') ? 'selected' : ''; ?>>Mato Grosso</option>
                                <option value="MS" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'MS') || (isset($dados_form['estado']) && $dados_form['estado'] == 'MS') ? 'selected' : ''; ?>>Mato Grosso do Sul</option>
                                <option value="MG" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'MG') || (isset($dados_form['estado']) && $dados_form['estado'] == 'MG') ? 'selected' : ''; ?>>Minas Gerais</option>
                                <option value="PA" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'PA') || (isset($dados_form['estado']) && $dados_form['estado'] == 'PA') ? 'selected' : ''; ?>>Pará</option>
                                <option value="PB" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'PB') || (isset($dados_form['estado']) && $dados_form['estado'] == 'PB') ? 'selected' : ''; ?>>Paraíba</option>
                                <option value="PR" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'PR') || (isset($dados_form['estado']) && $dados_form['estado'] == 'PR') ? 'selected' : ''; ?>>Paraná</option>
                                <option value="PE" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'PE') || (isset($dados_form['estado']) && $dados_form['estado'] == 'PE') ? 'selected' : ''; ?>>Pernambuco</option>
                                <option value="PI" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'PI') || (isset($dados_form['estado']) && $dados_form['estado'] == 'PI') ? 'selected' : ''; ?>>Piauí</option>
                                <option value="RJ" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'RJ') || (isset($dados_form['estado']) && $dados_form['estado'] == 'RJ') ? 'selected' : ''; ?>>Rio de Janeiro</option>
                                <option value="RN" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'RN') || (isset($dados_form['estado']) && $dados_form['estado'] == 'RN') ? 'selected' : ''; ?>>Rio Grande do Norte</option>
                                <option value="RS" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'RS') || (isset($dados_form['estado']) && $dados_form['estado'] == 'RS') ? 'selected' : ''; ?>>Rio Grande do Sul</option>
                                <option value="RO" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'RO') || (isset($dados_form['estado']) && $dados_form['estado'] == 'RO') ? 'selected' : ''; ?>>Rondônia</option>
                                <option value="RR" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'RR') || (isset($dados_form['estado']) && $dados_form['estado'] == 'RR') ? 'selected' : ''; ?>>Roraima</option>
                                <option value="SC" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'SC') || (isset($dados_form['estado']) && $dados_form['estado'] == 'SC') ? 'selected' : ''; ?>>Santa Catarina</option>
                                <option value="SP" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'SP') || (isset($dados_form['estado']) && $dados_form['estado'] == 'SP') ? 'selected' : ''; ?>>São Paulo</option>
                                <option value="SE" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'SE') || (isset($dados_form['estado']) && $dados_form['estado'] == 'SE') ? 'selected' : ''; ?>>Sergipe</option>
                                <option value="TO" <?php echo (isset($_POST['estado']) && $_POST['estado'] == 'TO') || (isset($dados_form['estado']) && $dados_form['estado'] == 'TO') ? 'selected' : ''; ?>>Tocantins</option>
                            </select>
                            <div class="error">Por favor, selecione seu estado</div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <input type="password" id="password" name="password" placeholder="Digite sua senha" required>
                            <div class="error">A senha deve ter pelo menos 6 caracteres</div>
                        </div>

                        <div class="form-group">
                            <label for="confirm-password">Confirmar Senha:</label>
                            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirme sua senha" required>
                            <div class="error">As senhas não coincidem</div>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-user-plus"></i> Cadastrar
                    </button>

                    <div class="login-link">
                        <p>Já tem uma conta? <a href="login.php">Entrar</a></p>
                    </div>
                </form>
                
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

    <script>
        // Validação do formulário no lado do cliente
        document.getElementById('cadastroForm').addEventListener('submit', function(e) {
            let isValid = true;
            
            // Validar nome
            const nome = document.getElementById('nome');
            if (nome.value.trim() === '') {
                markInvalid(nome, 'Por favor, insira seu nome completo');
                isValid = false;
            } else {
                markValid(nome);
            }
            
            // Validar CPF
            const cpf = document.getElementById('cpf');
            const cpfValue = cpf.value.replace(/\D/g, '');
            if (cpfValue.length !== 11) {
                markInvalid(cpf, 'Por favor, insira um CPF válido com 11 dígitos');
                isValid = false;
            } else {
                markValid(cpf);
            }
            
            // Validar email
            const email = document.getElementById('email');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value)) {
                markInvalid(email, 'Por favor, insira um e-mail válido');
                isValid = false;
            } else {
                markValid(email);
            }
            
            // Validar telefone
            const telefone = document.getElementById('telefone');
            const telefoneValue = telefone.value.replace(/\D/g, '');
            if (telefoneValue.length < 10 || telefoneValue.length > 11) {
                markInvalid(telefone, 'Por favor, insira um telefone válido');
                isValid = false;
            } else {
                markValid(telefone);
            }
            
            // Validar endereço
            const endereco = document.getElementById('endereco');
            if (endereco.value.trim() === '') {
                markInvalid(endereco, 'Por favor, insira seu endereço');
                isValid = false;
            } else {
                markValid(endereco);
            }
            
            // Validar cidade
            const cidade = document.getElementById('cidade');
            if (cidade.value.trim() === '') {
                markInvalid(cidade, 'Por favor, insira sua cidade');
                isValid = false;
            } else {
                markValid(cidade);
            }
            
            // Validar estado
            const estado = document.getElementById('estado');
            if (estado.value === '') {
                markInvalid(estado, 'Por favor, selecione seu estado');
                isValid = false;
            } else {
                markValid(estado);
            }
            
            // Validar senha
            const password = document.getElementById('password');
            if (password.value.length < 6) {
                markInvalid(password, 'A senha deve ter pelo menos 6 caracteres');
                isValid = false;
            } else {
                markValid(password);
            }
            
            // Validar confirmação de senha
            const confirmPassword = document.getElementById('confirm-password');
            if (password.value !== confirmPassword.value) {
                markInvalid(confirmPassword, 'As senhas não coincidem');
                isValid = false;
            } else {
                markValid(confirmPassword);
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });
        
        function markInvalid(input, message) {
            const formGroup = input.parentElement;
            formGroup.classList.add('invalid');
            const errorElement = formGroup.querySelector('.error');
            errorElement.textContent = message;
        }
        
        function markValid(input) {
            const formGroup = input.parentElement;
            formGroup.classList.remove('invalid');
        }
        
        // Formatação do telefone
        document.getElementById('telefone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.length > 11) {
                value = value.slice(0, 11);
            }
            
            if (value.length > 0) {
                value = '(' + value;
                
                if (value.length > 3) {
                    value = value.slice(0, 3) + ') ' + value.slice(3);
                }
                
                if (value.length > 10) {
                    value = value.slice(0, 10) + '-' + value.slice(10);
                }
            }
            
            e.target.value = value;
        });
        
        // Formatação do CPF
        document.getElementById('cpf').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.length > 11) {
                value = value.slice(0, 11);
            }
            
            if (value.length > 0) {
                if (value.length <= 3) {
                    value = value;
                } else if (value.length <= 6) {
                    value = value.slice(0, 3) + '.' + value.slice(3);
                } else if (value.length <= 9) {
                    value = value.slice(0, 3) + '.' + value.slice(3, 6) + '.' + value.slice(6);
                } else {
                    value = value.slice(0, 3) + '.' + value.slice(3, 6) + '.' + value.slice(6, 9) + '-' + value.slice(9);
                }
            }
            
            e.target.value = value;
        });

        // Validação em tempo real
        const inputs = document.querySelectorAll('input, select');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                validateField(this);
            });
        });

        function validateField(field) {
            const value = field.value.trim();
            const formGroup = field.parentElement;
            
            switch(field.id) {
                case 'nome':
                    if (value === '') {
                        markInvalid(field, 'Por favor, insira seu nome completo');
                    } else {
                        markValid(field);
                    }
                    break;
                    
                case 'cpf':
                    const cpfValue = value.replace(/\D/g, '');
                    if (cpfValue.length !== 11) {
                        markInvalid(field, 'Por favor, insira um CPF válido com 11 dígitos');
                    } else {
                        markValid(field);
                    }
                    break;
                    
                case 'email':
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(value)) {
                        markInvalid(field, 'Por favor, insira um e-mail válido');
                    } else {
                        markValid(field);
                    }
                    break;
                    
                case 'telefone':
                    const telefoneValue = value.replace(/\D/g, '');
                    if (telefoneValue.length < 10 || telefoneValue.length > 11) {
                        markInvalid(field, 'Por favor, insira um telefone válido');
                    } else {
                        markValid(field);
                    }
                    break;
                    
                case 'endereco':
                    if (value === '') {
                        markInvalid(field, 'Por favor, insira seu endereço');
                    } else {
                        markValid(field);
                    }
                    break;
                    
                case 'cidade':
                    if (value === '') {
                        markInvalid(field, 'Por favor, insira sua cidade');
                    } else {
                        markValid(field);
                    }
                    break;
                    
                case 'estado':
                    if (value === '') {
                        markInvalid(field, 'Por favor, selecione seu estado');
                    } else {
                        markValid(field);
                    }
                    break;
                    
                case 'password':
                    if (value.length < 6) {
                        markInvalid(field, 'A senha deve ter pelo menos 6 caracteres');
                    } else {
                        markValid(field);
                    }
                    break;
                    
                case 'confirm-password':
                    const password = document.getElementById('password').value;
                    if (value !== password) {
                        markInvalid(field, 'As senhas não coincidem');
                    } else {
                        markValid(field);
                    }
                    break;
            }
        }
    </script>
</body>
</html>