<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcas - Potulski Joias</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

        /* Conteúdo principal */
        main {
            flex: 1;
            padding: 150px 20px 80px;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            margin-bottom: 60px;
            padding: 40px 20px;
            border-radius: 20px;
            background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9));
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            margin: 0 auto 60px;
        }

        .hero h2 {
            font-family: 'Playfair Display', serif;
            font-size: 3.2rem;
            margin-bottom: 20px;
            color: var(--primary-color);
            position: relative;
            display: inline-block;
            font-weight: 700;
        }

        .hero h2::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            border-radius: 2px;
        }

        .hero p {
            font-size: 1.2rem;
            color: #5c3c3c;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.8;
        }

        /* Seção de marcas */
        #marcas {
            text-align: center;
            padding: 60px 30px;
            border-radius: 20px;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
        }

        .marcas-grade {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            margin: 0 auto;
        }

        .marca {
            background: linear-gradient(145deg, #ffffff, #f8f8f8);
            padding: 40px 30px;
            text-align: center;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
        }

        .marca::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
        }

        .marca:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .marca-image {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--secondary-color);
            padding: 10px;
            margin-bottom: 25px;
            transition: all 0.4s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .marca:hover .marca-image {
            transform: scale(1.1);
            border-color: var(--accent-color);
        }

        .marca h3 {
            margin: 15px 0;
            color: var(--primary-color);
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
        }

        .marca p {
            font-size: 1.1rem;
            color: #5c3c3c;
            line-height: 1.7;
            margin-bottom: 25px;
            flex-grow: 1;
        }

        .marca-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            color: #fff;
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .marca-btn:hover {
            background: linear-gradient(to right, var(--accent-color), var(--primary-color));
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        /* Destaques */
        .destaques {
            background: linear-gradient(to right, var(--primary-color), #1a2532);
            color: white;
            padding: 60px 20px;
            margin: 80px 0;
            text-align: center;
            border-radius: 20px;
        }

        .destaques h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        .destaques-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .destaque-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 25px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .destaque-item:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15);
        }

        .destaque-item i {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--secondary-color);
        }

        .destaque-item h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        /* Rodapé */
        footer {
            background: linear-gradient(to right, var(--primary-color), #000000);
            color: #fff;
            text-align: center;
            padding: 40px 20px;
            margin-top: 80px;
        }

        .footer-content {
            max-width: 1000px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            text-align: left;
        }

        .footer-section h3 {
            font-size: 1.4rem;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .footer-section h3::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--accent-color);
        }

        .footer-section p, .footer-section a {
            margin-bottom: 10px;
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
            gap: 15px;
            margin-top: 15px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.3s;
        }

        .social-links a:hover {
            background: var(--secondary-color);
            transform: translateY(-3px);
        }

        .copyright {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            grid-column: 1 / -1;
            text-align: center;
        }

        /* Animações */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .marca {
            animation: fadeIn 0.8s ease-out;
        }

        .marca:nth-child(2) {
            animation-delay: 0.2s;
        }

        .marca:nth-child(3) {
            animation-delay: 0.4s;
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
            
            .hero h2 {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            header h1 {
                font-size: 2.2rem;
            }
            
            #menu {
                position: relative;
                top: 0;
                margin: 20px auto;
                border-radius: 15px;
            }
            
            main {
                padding: 120px 15px 50px;
            }
            
            .hero {
                padding: 30px 15px;
            }
            
            .hero h2 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .marcas-grade {
                grid-template-columns: 1fr;
            }
            
            .marca {
                padding: 30px 20px;
            }
            
            .destaques {
                padding: 40px 20px;
            }
            
            .destaques h2 {
                font-size: 2rem;
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
        <h1>Potulski Joias</h1>
    </header>

    <nav id="menu">
        <a href="home.php"><i class="fas fa-home"></i> Início</a>
        <a href="produtos.php"><i class="fas fa-gem"></i> Produtos</a>
        <a href="marcas.php" id="atual"><i class="fas fa-crown"></i> Marcas</a>
        <a href="login.php"><i class="fas fa-user"></i> Login</a>
        <a href="carrinho.php"><i class="fas fa-shopping-cart"></i> Carrinho</a>
    </nav>

    <main>
        <section class="hero">
            <h2>Nossas Marcas Parceiras</h2>
            <p>Descubra as marcas exclusivas que tornam a Potulski Joias uma referência em elegância e sofisticação. Cada uma traz consigo uma história única e um compromisso com a excelência em joalheria fina.</p>
        </section>

        <section id="marcas">
            <div class="marcas-grade">
                <div class="marca">
                    <img src="imagens/pulseira-brilhante.jpg.png" alt="Pulseira Luxor" class="marca-image">
                    <h3>Luxor</h3>
                    <p>Peças refinadas com ouro 18k e pedras preciosas exclusivas. Cada joia é cuidadosamente elaborada para transmitir elegância e sofisticação, com designs que transcendem tendências passageiras.</p>
                    <a href="produtos.php?marca=luxor" class="marca-btn">Ver Coleção <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="marca">
                    <img src="imagens/anelvintage.jpg" alt="Anel BellaGio" class="marca-image">
                    <h3>BellaGio</h3>
                    <p>Designs contemporâneos e materiais sustentáveis. Nossa abordagem ecológica não compromete o estilo ou a qualidade de nossas peças, que são feitas para durar gerações.</p>
                    <a href="produtos.php?marca=bellagio" class="marca-btn">Ver Coleção <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="marca">
                    <img src="imagens/colar-de-flor2.png" alt="Colar VintageGold" class="marca-image">
                    <h3>VintageGold</h3>
                    <p>Joias com inspiração clássica e acabamento artesanal. Cada peça conta uma história e transporta você para épocas de glamour e refinamento, com detalhes que honram tradições seculares.</p>
                    <a href="produtos.php?marca=vintagegold" class="marca-btn">Ver Coleção <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </section>

        <section class="destaques">
            <h2>Por que escolher nossas marcas?</h2>
            <div class="destaques-grid">
                <div class="destaque-item">
                    <i class="fas fa-award"></i>
                    <h3>Qualidade Premium</h3>
                    <p>Materiais da mais alta qualidade e acabamento impecável</p>
                </div>
                <div class="destaque-item">
                    <i class="fas fa-leaf"></i>
                    <h3>Produção Sustentável</h3>
                    <p>Compromisso com práticas ambientais e sociais responsáveis</p>
                </div>
                <div class="destaque-item">
                    <i class="fas fa-gem"></i>
                    <h3>Design Exclusivo</h3>
                    <p>Peças únicas que refletem sua personalidade e estilo</p>
                </div>
            </div>
        </section>
    </main>

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