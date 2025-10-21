<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós - Potulski Joias</title>
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

        /* Conteúdo principal */
        main {
            flex: 1;
            padding: 150px 20px 80px;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            margin-bottom: 80px;
            padding: 60px 40px;
            border-radius: 25px;
            background: linear-gradient(rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.95));
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin: 0 auto 80px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
        }

        .hero h2 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            margin-bottom: 25px;
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
            font-size: 1.3rem;
            color: #5c3c3c;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.8;
        }

        /* Seção Nossa História */
        .nossa-historia {
            padding: 80px 40px;
            border-radius: 25px;
            background: linear-gradient(rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.95));
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin: 0 auto 80px;
            position: relative;
        }

        .nossa-historia::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
        }

        .nossa-historia h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            margin-bottom: 40px;
            color: var(--primary-color);
            text-align: center;
            position: relative;
            font-weight: 700;
        }

        .nossa-historia h2::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            border-radius: 2px;
        }

        .historia-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .historia-texto h3 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        .historia-texto p {
            font-size: 1.1rem;
            color: #5c3c3c;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .historia-imagem {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .historia-imagem img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .historia-imagem:hover img {
            transform: scale(1.05);
        }

        /* Valores */
        .valores {
            padding: 80px 40px;
            border-radius: 25px;
            background: linear-gradient(to right, var(--primary-color), #1a2532);
            color: white;
            max-width: 1200px;
            margin: 0 auto 80px;
            text-align: center;
        }

        .valores h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            margin-bottom: 50px;
            position: relative;
            display: inline-block;
            font-weight: 700;
        }

        .valores h2::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(to right, var(--secondary-color), var(--accent-color));
            border-radius: 2px;
        }

        .valores-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }

        .valor-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .valor-item:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .valor-item i {
            font-size: 3rem;
            margin-bottom: 20px;
            color: var(--accent-color);
        }

        .valor-item h3 {
            font-size: 1.6rem;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .valor-item p {
            font-size: 1.1rem;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.9);
        }

        /* Equipe */
        .equipe {
            padding: 80px 40px;
            border-radius: 25px;
            background: linear-gradient(rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.95));
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin: 0 auto 80px;
            text-align: center;
            position: relative;
        }

        .equipe::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
        }

        .equipe h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            margin-bottom: 50px;
            color: var(--primary-color);
            position: relative;
            display: inline-block;
            font-weight: 700;
        }

        .equipe h2::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            border-radius: 2px;
        }

        .equipe-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
        }

        .membro {
            background: linear-gradient(145deg, #ffffff, #f8f8f8);
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .membro::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
        }

        .membro:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .membro-foto {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 20px;
            border: 5px solid var(--secondary-color);
            padding: 5px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .membro h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: var(--primary-color);
            font-weight: 600;
        }

        .membro .cargo {
            font-size: 1.1rem;
            color: var(--accent-color);
            margin-bottom: 15px;
            font-weight: 500;
        }

        .membro p {
            font-size: 1rem;
            color: #5c3c3c;
            line-height: 1.6;
        }

        /* Missão e Visão */
        .missao-visao {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto 80px;
        }

        .missao, .visao {
            padding: 50px 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .missao {
            background: linear-gradient(135deg, var(--primary-color), #1a2532);
            color: white;
        }

        .visao {
            background: linear-gradient(135deg, var(--accent-color), #b8941f);
            color: white;
        }

        .missao::before, .visao::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(to right, var(--secondary-color), var(--accent-color));
        }

        .missao i, .visao i {
            font-size: 3.5rem;
            margin-bottom: 25px;
            color: var(--secondary-color);
        }

        .missao h3, .visao h3 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .missao p, .visao p {
            font-size: 1.2rem;
            line-height: 1.7;
            opacity: 0.95;
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

        .hero, .nossa-historia, .valores, .equipe, .missao-visao {
            animation: fadeInUp 0.8s ease-out;
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
                font-size: 2.8rem;
            }
            
            .historia-content {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .missao-visao {
                grid-template-columns: 1fr;
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
            
            main {
                padding: 120px 15px 50px;
            }
            
            .hero, .nossa-historia, .valores, .equipe {
                padding: 40px 20px;
                margin-bottom: 50px;
            }
            
            .hero h2 {
                font-size: 2.2rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
            
            .nossa-historia h2, .valores h2, .equipe h2 {
                font-size: 2.2rem;
            }
            
            .missao, .visao {
                padding: 30px 20px;
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

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <h2>Nossa História</h2>
            <p>Há mais de três décadas, a Potulski Joias vem escrevendo uma trajetória de excelência, elegância e compromisso com a beleza atemporal. Cada peça conta uma história de paixão pela joalheria fina.</p>
        </section>

        <!-- Nossa História -->
        <section class="nossa-historia">
            <h2>Uma Tradição Familiar</h2>
            <div class="historia-content">
                <div class="historia-texto">
                    <h3>Das Mãos de Mestre às Suas Mãos</h3>
                    <p>Fundada em 1990 pela família Potulski, nossa joalheria nasceu do sonho de criar peças que transcendem o tempo. Com raízes europeias e um olhar apaixonado pela arte da ourivesaria, começamos como uma pequena oficina familiar no coração de São Paulo.</p>
                    <p>Hoje, mantemos viva a tradição do trabalho artesanal enquanto abraçamos a inovação. Cada joia Potulski é cuidadosamente elaborada por nossos mestres joalheiros, que dominam técnicas seculares combinadas com tecnologia de ponta.</p>
                    <p>Nossa missão vai além de criar joias - queremos eternizar momentos especiais, celebrar conquistas e marcar histórias de amor que perduram por gerações.</p>
                </div>
                <div class="historia-imagem">
                    <img src="https://images.unsplash.com/photo-1588444650700-6c7f0c89d36b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Oficina de Joalheria Potulski">
                </div>
            </div>
        </section>

        <!-- Valores -->
        <section class="valores">
            <h2>Nossos Valores</h2>
            <div class="valores-grid">
                <div class="valor-item">
                    <i class="fas fa-gem"></i>
                    <h3>Excelência</h3>
                    <p>Comprometidos com a mais alta qualidade em cada detalhe, desde a seleção das pedras preciosas até o acabamento final de nossas joias.</p>
                </div>
                <div class="valor-item">
                    <i class="fas fa-heart"></i>
                    <h3>Paixão</h3>
                    <p>Movidos pelo amor à joalheria, criamos peças que carregam em si a essência da dedicação e do cuidado artesanal.</p>
                </div>
                <div class="valor-item">
                    <i class="fas fa-award"></i>
                    <h3>Tradição</h3>
                    <p>Honramos técnicas ancestrais enquanto inovamos no design, mantendo viva a herança familiar que nos define.</p>
                </div>
                <div class="valor-item">
                    <i class="fas fa-handshake"></i>
                    <h3>Confiança</h3>
                    <p>Construímos relacionamentos duradouros baseados na transparência, integridade e compromisso com cada cliente.</p>
                </div>
            </div>
        </section>

        <!-- Missão e Visão -->
        <section class="missao-visao">
            <div class="missao">
                <i class="fas fa-bullseye"></i>
                <h3>Nossa Missão</h3>
                <p>Criar joias excepcionais que eternizem momentos especiais, combinando artesanato tradicional com design contemporâneo, sempre com excelência e paixão.</p>
            </div>
            <div class="visao">
                <i class="fas fa-eye"></i>
                <h3>Nossa Visão</h3>
                <p>Ser referência mundial em joalheria fina, reconhecida pela inovação, qualidade e pelo legado de beleza que perdura através das gerações.</p>
            </div>
        </section>

        <!-- Equipe -->
        <section class="equipe">
            <h2>Nossa Equipe</h2>
            <div class="equipe-grid">
                <div class="membro">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="
                    Carlos Potulski" class="membro-foto">
                    <h3>Carlos Potulski</h3>
                    <div class="cargo">CEO & Fundador</div>
                    <p>Com mais de 30 anos de experiência, Carlos lidera nossa visão criativa e mantém viva a tradição familiar que deu origem à Potulski Joias.</p>
                </div>
                <div class="membro">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Carlos Mendes" class="membro-foto">
                    <h3>Carlos Mendes</h3>
                    <div class="cargo">Mestre Joalheiro</div>
                    <p>Artífice com 25 anos de trajetória, Carlos domina técnicas ancestrais e é responsável pelas peças mais complexas de nossa coleção.</p>
                </div>
                <div class="membro">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Isabela Santos" class="membro-foto">
                    <h3>Isabela Santos</h3>
                    <div class="cargo">Designer Chefe</div>
                    <p>Com formação internacional, Isabela traz inovação e sensibilidade contemporânea aos designs que conquistam nossos clientes.</p>
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
                <p><i class="fas fa-map-marker-alt"></i> Av. das Joias, 123 - Centro, São Paulo - SP</p>
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