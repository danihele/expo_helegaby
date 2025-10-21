<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Potulski Joias</title>
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
            padding: 80px 20px 60px;
        }

        /* Banner */
        .banner {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(img-home.avif) no-repeat center;
            background-size: cover;
            text-align: center;
            padding: 150px 20px;
            color: white;
            border-radius: 18px;
            margin-bottom: 40px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .banner h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .banner p {
            font-size: 1.3rem;
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .button {
            background: linear-gradient(to right, var(--accent-color), #b8941f);
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 45px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
            border: none;
            cursor: pointer;
        }

        .button:hover {
            background: linear-gradient(to right, #b8941f, var(--accent-color));
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(212, 175, 55, 0.4);
        }

        /* Seção de Produtos */
        #produtos {
            padding: 50px 20px;
            text-align: center;
            background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9));
            border-radius: 18px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        #produtos h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 40px;
            position: relative;
            display: inline-block;
            font-weight: 700;
        }

        #produtos h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            border-radius: 2px;
        }

        .produto-grade {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 35px;
            margin: 45px auto;
            max-width: 1200px;
        }

        .produto {
            background-color: #fff;
            padding: 25px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            max-width: 300px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .produto:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .produto img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            height: 200px;
            object-fit: cover;
        }

        .produto:hover img {
            transform: scale(1.05);
        }

        .produto h3 {
            font-size: 1.4rem;
            margin: 15px 0;
            color: var(--primary-color);
            font-weight: 600;
        }

        .produto p {
            font-size: 1.2rem;
            color: var(--accent-color);
            font-weight: 700;
            margin-bottom: 20px;
        }

        .produto .button {
            width: 100%;
            justify-content: center;
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

        /* Filtros e Ordenação */
        .filtros-container {
            background: linear-gradient(rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.95));
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .filtros {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .filtro-grupo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filtro-grupo label {
            font-weight: 600;
            color: var(--primary-color);
        }

        select, input {
            padding: 10px 15px;
            border: 2px solid var(--secondary-color);
            border-radius: 8px;
            background: white;
            font-family: 'Montserrat', sans-serif;
            transition: all 0.3s ease;
        }

        select:focus, input:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
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
            
            .banner h1 {
                font-size: 2.8rem;
            }
            
            #produtos h2 {
                font-size: 2.2rem;
            }
            
            .filtros {
                flex-direction: column;
                align-items: stretch;
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
                padding: 70px 15px 40px;
            }
            
            .banner {
                padding: 100px 15px;
                margin-bottom: 30px;
            }
            
            .banner h1 {
                font-size: 2.2rem;
                margin-bottom: 15px;
            }
            
            .banner p {
                font-size: 1.1rem;
                margin-bottom: 25px;
            }
            
            #produtos {
                padding: 30px 15px;
                margin-bottom: 30px;
            }
            
            #produtos h2 {
                font-size: 1.8rem;
                margin-bottom: 30px;
            }
            
            .produto-grade {
                gap: 20px;
                margin: 30px auto;
            }
            
            .produto {
                padding: 20px;
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
        <a href="produtos.php" id="atual"><i class="fas fa-gem"></i> Produtos</a>
        <a href="marcas.php"><i class="fas fa-crown"></i> Marcas</a>
        <a href="login.php"><i class="fas fa-user"></i> Login</a>
        <a href="carrinho.php"><i class="fas fa-shopping-cart"></i> Carrinho</a>
    </nav>

    <main>
        <section class="banner">
            <h1>Nossa Coleção Exclusiva</h1>
            <p><b>Descubra joias únicas que combinam elegância e sofisticação.</b></p>
        </section>

        <!-- Filtros e Ordenação -->
        <div class="filtros-container">
            <div class="filtros">
                <div class="filtro-grupo">
                    <label for="categoria"><i class="fas fa-filter"></i> Categoria:</label>
                    <select id="categoria">
                        <option value="todos">Todos os Produtos</option>
                        <option value="aneis">Anéis</option>
                        <option value="brincos">Brincos</option>
                        <option value="colares">Colares</option>
                        <option value="pulseiras">Pulseiras</option>
                    </select>
                </div>
                
                <div class="filtro-grupo">
                    <label for="ordenar"><i class="fas fa-sort"></i> Ordenar por:</label>
                    <select id="ordenar">
                        <option value="recentes">Mais Recentes</option>
                        <option value="preco-menor">Menor Preço</option>
                        <option value="preco-maior">Maior Preço</option>
                        <option value="popular">Mais Populares</option>
                    </select>
                </div>
                
                <div class="filtro-grupo">
                    <label for="buscar"><i class="fas fa-search"></i> Buscar:</label>
                    <input type="text" id="buscar" placeholder="Digite o nome do produto...">
                </div>
            </div>
        </div>

        <!-- Seção de produtos -->
        <section id="produtos">
            <h2>Produtos em Destaque</h2>

            <div class="produto-grade">
                <!-- Produto 1 -->
                <div class="produto">
                    <img src="imagens/pulseira-ouro.png" alt="Anel de Ouro rose">
                    <h3>Pulseira de ouro</h3>
                    <p>R$ 1.500,00</p>
                    <a href="carrinho.php?action=add&nome=Anel%20de%20Ouro&preco=1500&imagem=imagens/pulseira-ouro.png" class="button">
                        <i class="fas fa-shopping-cart"></i> Adicionar ao carrinho
                    </a>
                </div>

                <!-- Produto 2 -->
                <div class="produto">
                    <img src="imagens/brinco-borboleta.png" alt="Brinco de borboleta">
                    <h3>Par de brincos de borboleta</h3>
                    <p>R$ 200,00</p>
                    <a href="carrinho.php?action=add&nome=Par%20de%20brincos%20de%20borboleta&preco=200&imagem=imagens/brinco-borboleta.png" class="button">
                        <i class="fas fa-shopping-cart"></i> Adicionar ao carrinho
                    </a>
                </div>

                <!-- Produto 3 -->
                <div class="produto">
                    <img src="imagens/colar-de-flor2.png" alt="Colar de ouro rose">
                    <h3>Colar em ouro rosé</h3>
                    <p>R$ 5.000,00</p>
                    <a href="carrinho.php?action=add&nome=Colar%20em%20ouro%20rosé&preco=5000&imagem=imagens/colar-de-flor2.png" class="button">
                        <i class="fas fa-shopping-cart"></i> Adicionar ao carrinho
                    </a>
                </div>

                <!-- Produto 4 -->
                <div class="produto">
                    <img src="imagens/pulseira-brilhante.png" alt="Pulseira de Ouro Branco">
                    <h3>Colar de Ouro Branco</h3>
                    <p>R$ 3.200,00</p>
                    <a href="carrinho.php?action=add&nome=Colar%20de%20Ouro%20Branco&preco=3200&imagem=imagens/pulseira-brilhante.png" class="button">
                        <i class="fas fa-shopping-cart"></i> Adicionar ao carrinho
                    </a>
                </div>

                <!-- Produto 5 -->
                <div class="produto">
                    <img src="imagens/anelvintage.jpg" alt="Anel Vintage com Ametista">
                    <h3>Anel Ametista</h3>
                    <p>R$ 800,00</p>
                    <a href="carrinho.php?action=add&nome=Anel%20Ametista&preco=800&imagem=imagens/anelvintage.jpg" class="button">
                        <i class="fas fa-shopping-cart"></i> Adicionar ao carrinho
                    </a>
                </div>

                <!-- Produto 6 -->
                <div class="produto">
                    <img src="imagens/anel-coracao.jpg" alt="Colar de Flor">
                    <h3>Anel Solitário</h3>
                    <p>R$ 11.900,00</p>
                    <a href="carrinho.php?action=add&nome=Anel%20Solitário&preco=11900&imagem=imagens/anel-coracao.jpg" class="button">
                        <i class="fas fa-shopping-cart"></i> Adicionar ao carrinho
                    </a>
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

    <script>
        // Filtros e busca
        document.addEventListener('DOMContentLoaded', function() {
            const categoriaSelect = document.getElementById('categoria');
            const ordenarSelect = document.getElementById('ordenar');
            const buscarInput = document.getElementById('buscar');
            const produtos = document.querySelectorAll('.produto');
            
            function filtrarProdutos() {
                const categoria = categoriaSelect.value;
                const ordenar = ordenarSelect.value;
                const termoBusca = buscarInput.value.toLowerCase();
                
                let produtosFiltrados = Array.from(produtos);
                
                // Filtro por categoria
                if (categoria !== 'todos') {
                    produtosFiltrados = produtosFiltrados.filter(produto => {
                        const titulo = produto.querySelector('h3').textContent.toLowerCase();
                        return titulo.includes(categoria);
                    });
                }
                
                // Filtro por busca
                if (termoBusca) {
                    produtosFiltrados = produtosFiltrados.filter(produto => {
                        const titulo = produto.querySelector('h3').textContent.toLowerCase();
                        return titulo.includes(termoBusca);
                    });
                }
                
                // Ordenação
                produtosFiltrados.sort((a, b) => {
                    const precoA = parseFloat(a.querySelector('p').textContent.replace('R$ ', '').replace('.', '').replace(',', '.'));
                    const precoB = parseFloat(b.querySelector('p').textContent.replace('R$ ', '').replace('.', '').replace(',', '.'));
                    
                    switch(ordenar) {
                        case 'preco-menor':
                            return precoA - precoB;
                        case 'preco-maior':
                            return precoB - precoA;
                        default:
                            return 0;
                    }
                });
                
                // Atualizar exibição
                const produtoGrade = document.querySelector('.produto-grade');
                produtoGrade.innerHTML = '';
                produtosFiltrados.forEach(produto => {
                    produtoGrade.appendChild(produto);
                });
                
                // Mensagem se não houver resultados
                if (produtosFiltrados.length === 0) {
                    produtoGrade.innerHTML = '<p style="grid-column: 1 / -1; text-align: center; padding: 40px; font-size: 1.2rem;">Nenhum produto encontrado com os filtros selecionados.</p>';
                }
            }
            
            // Event listeners
            categoriaSelect.addEventListener('change', filtrarProdutos);
            ordenarSelect.addEventListener('change', filtrarProdutos);
            buscarInput.addEventListener('input', filtrarProdutos);
        });
    </script>
</body>
</html>