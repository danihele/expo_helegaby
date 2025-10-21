<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - Potulski Joias</title>
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

        /* Hero Section - ESPAÇO REDUZIDO */
        .hero {
            text-align: center;
            margin-bottom: 30px;
            padding: 25px 20px;
            border-radius: 15px;
            background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9));
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: 0 auto 30px;
        }

        .hero h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            margin-bottom: 12px;
            color: var(--primary-color);
            position: relative;
            display: inline-block;
            font-weight: 700;
        }

        .hero h2::after {
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

        .hero p {
            font-size: 1.1rem;
            color: #5c3c3c;
            max-width: 600px;
            margin: 15px auto 0;
            line-height: 1.6;
        }

        /* Estilos do Carrinho */
        .cart-container {
            max-width: 1200px;
            margin: 0 auto;
            background: linear-gradient(rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.95));
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .cart-table th {
            background: linear-gradient(to right, var(--primary-color), var(--dark-bg));
            color: white;
            padding: 18px;
            text-align: left;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .cart-table td {
            padding: 22px 18px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            vertical-align: middle;
        }

        .cart-table tr:last-child td {
            border-bottom: none;
        }

        .cart-table tr:hover {
            background-color: rgba(254, 215, 221, 0.1);
        }

        .product-info {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .product-img {
            width: 90px;
            height: 90px;
            border-radius: 10px;
            object-fit: cover;
            border: 3px solid var(--secondary-color);
            padding: 4px;
            transition: all 0.3s ease;
        }

        .product-img:hover {
            transform: scale(1.05);
            border-color: var(--accent-color);
        }

        .product-name {
            font-weight: 600;
            color: var(--primary-color);
            font-size: 1.1rem;
        }

        .price {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1.2rem;
        }

        .quantity-input {
            width: 65px;
            padding: 8px;
            border: 2px solid var(--secondary-color);
            border-radius: 8px;
            text-align: center;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .quantity-input:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }

        .subtotal {
            font-weight: 700;
            color: var(--accent-color);
            font-size: 1.2rem;
        }

        .remove-btn {
            background: linear-gradient(to right, #ff6b6b, #ee5a52);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.9rem;
        }

        .remove-btn:hover {
            background: linear-gradient(to right, #ee5a52, #ff6b6b);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }

        .cart-summary {
            background: linear-gradient(145deg, #ffffff, #f8f8f8);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin-top: 25px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .summary-row:last-child {
            border-bottom: none;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .total-amount {
            color: var(--accent-color);
            font-size: 1.4rem;
        }

        .cart-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            gap: 15px;
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 45px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .btn-continue {
            background: linear-gradient(to right, #6c757d, #5a6268);
            color: white;
        }

        .btn-continue:hover {
            background: linear-gradient(to right, #5a6268, #6c757d);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(108, 117, 125, 0.3);
        }

        .btn-update {
            background: linear-gradient(to right, #007bff, #0056b3);
            color: white;
        }

        .btn-update:hover {
            background: linear-gradient(to right, #0056b3, #007bff);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 123, 255, 0.3);
        }

        .btn-clear {
            background: linear-gradient(to right, #dc3545, #c82333);
            color: white;
        }

        .btn-clear:hover {
            background: linear-gradient(to right, #c82333, #dc3545);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(220, 53, 69, 0.3);
        }

        .btn-checkout {
            background: linear-gradient(to right, var(--accent-color), #b8941f);
            color: white;
            font-size: 1.05rem;
            padding: 15px 30px;
        }

        .btn-checkout:hover {
            background: linear-gradient(to right, #b8941f, var(--accent-color));
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(212, 175, 55, 0.4);
        }

        .empty-cart {
            text-align: center;
            padding: 50px 35px;
            background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9));
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .empty-cart i {
            font-size: 3.5rem;
            color: var(--secondary-color);
            margin-bottom: 18px;
        }

        .empty-cart h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--primary-color);
            margin-bottom: 12px;
        }

        .empty-cart p {
            font-size: 1.05rem;
            color: #5c3c3c;
            margin-bottom: 25px;
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
                font-size: 2.2rem;
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
            
            .hero {
                padding: 20px 15px;
                margin-bottom: 20px;
            }
            
            .hero h2 {
                font-size: 1.8rem;
                margin-bottom: 8px;
            }
            
            .hero p {
                font-size: 1rem;
                margin: 10px auto 0;
            }
            
            .cart-container {
                padding: 20px;
            }
            
            .cart-table {
                display: block;
                overflow-x: auto;
            }
            
            .product-info {
                flex-direction: column;
                text-align: center;
                gap: 8px;
            }
            
            .cart-actions {
                flex-direction: column;
                gap: 12px;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
                padding: 10px 20px;
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
        <h1>Carrinho de Compras</h1>
    </header>

    <nav id="menu">
        <a href="home.php"><i class="fas fa-home"></i> Início</a>
        <a href="produtos.php"><i class="fas fa-gem"></i> Produtos</a>
        <a href="marcas.php"><i class="fas fa-crown"></i> Marcas</a>
        <a href="login.php"><i class="fas fa-user"></i> Login</a>
        <a href="carrinho.php" id="atual"><i class="fas fa-shopping-cart"></i> Carrinho</a>
    </nav>

    <main>
        <section class="hero">
            <h2>Seu Carrinho</h2>
            <p>Revise seus produtos antes de finalizar a compra</p>
        </section>

        <div class="cart-container">
            <div id="cart-content">
                <!-- O conteúdo do carrinho será carregado aqui via JavaScript -->
            </div>
        </div>
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
        function loadCart() {
            const cartContent = document.getElementById('cart-content');
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            if (cart.length === 0) {
                cartContent.innerHTML = `
                    <div class="empty-cart">
                        <i class="fas fa-shopping-cart"></i>
                        <h3>Seu carrinho está vazio</h3>
                        <p>Explore nossas coleções exclusivas e encontre a joia perfeita para você</p>
                        <a href="produtos.php" class="btn btn-continue">
                            <i class="fas fa-gem"></i> Continuar Comprando
                        </a>
                    </div>
                `;
                return;
            }

            let total = 0;
            cart.forEach(item => {
                total += item.preco * (item.quantidade || 1);
            });

            let html = `
                <form id="cart-form">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Subtotal</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
            `;

            cart.forEach((item, index) => {
                const subtotal = item.preco * (item.quantidade || 1);
                html += `
                    <tr>
                        <td>
                            <div class="product-info">
                                <img src="${item.imagem}" alt="${item.nome}" class="product-img">
                                <span class="product-name">${item.nome}</span>
                            </div>
                        </td>
                        <td class="price">R$ ${item.preco.toFixed(2).replace('.', ',')}</td>
                        <td>
                            <input type="number" name="quantidade" value="${item.quantidade || 1}" min="1" 
                                   class="quantity-input" data-index="${index}" onchange="updateSubtotal(this)">
                        </td>
                        <td class="subtotal" id="subtotal-${index}">R$ ${subtotal.toFixed(2).replace('.', ',')}</td>
                        <td>
                            <button type="button" class="remove-btn" data-index="${index}">
                                <i class="fas fa-trash"></i> Remover
                            </button>
                        </td>
                    </tr>
                `;
            });

            html += `
                        </tbody>
                    </table>
                    
                    <div class="cart-summary">
                        <div class="summary-row">
                            <span>Subtotal:</span>
                            <span id="cart-subtotal">R$ ${total.toFixed(2).replace('.', ',')}</span>
                        </div>
                        <div class="summary-row">
                            <span>Frete:</span>
                            <span>Grátis</span>
                        </div>
                        <div class="summary-row">
                            <span>Total:</span>
                            <span class="total-amount" id="cart-total">R$ ${total.toFixed(2).replace('.', ',')}</span>
                        </div>
                    </div>
                    
                    <div class="cart-actions">
                        <a href="produtos.php" class="btn btn-continue">
                            <i class="fas fa-arrow-left"></i> Continuar Comprando
                        </a>
                        <div style="display: flex; gap: 12px;">
                            <button type="button" id="update-cart" class="btn btn-update">
                                <i class="fas fa-sync"></i> Atualizar
                            </button>
                            <button type="button" id="clear-cart" class="btn btn-clear">
                                <i class="fas fa-trash"></i> Limpar
                            </button>
                            <button type="button" id="checkout" class="btn btn-checkout">
                                <i class="fas fa-lock"></i> Finalizar Compra
                            </button>
                        </div>
                    </div>
                </form>
            `;

            cartContent.innerHTML = html;

            // Event listeners
            document.querySelectorAll('.remove-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const index = parseInt(this.getAttribute('data-index'));
                    cart.splice(index, 1);
                    localStorage.setItem('cart', JSON.stringify(cart));
                    loadCart();
                });
            });

            document.getElementById('update-cart').addEventListener('click', function() {
                document.querySelectorAll('.quantity-input').forEach(input => {
                    const index = parseInt(input.getAttribute('data-index'));
                    const quantity = parseInt(input.value);
                    if (quantity > 0) {
                        cart[index].quantidade = quantity;
                    } else {
                        cart.splice(index, 1);
                    }
                });
                localStorage.setItem('cart', JSON.stringify(cart));
                loadCart();
            });

            document.getElementById('clear-cart').addEventListener('click', function() {
                if (confirm('Tem certeza que deseja limpar todo o carrinho?')) {
                    localStorage.removeItem('cart');
                    loadCart();
                }
            });

            document.getElementById('checkout').addEventListener('click', function() {
                alert('Redirecionando para o checkout...');
                // Aqui você pode adicionar a lógica de checkout
            });
        }

        // Função para atualizar o subtotal automaticamente
        function updateSubtotal(input) {
            const index = parseInt(input.getAttribute('data-index'));
            const quantity = parseInt(input.value);
            
            if (quantity < 1) {
                input.value = 1;
                return;
            }

            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            if (cart[index]) {
                // Atualiza a quantidade no carrinho
                cart[index].quantidade = quantity;
                
                // Calcula o novo subtotal
                const subtotal = cart[index].preco * quantity;
                
                // Atualiza o display do subtotal
                const subtotalElement = document.getElementById(`subtotal-${index}`);
                if (subtotalElement) {
                    subtotalElement.textContent = `R$ ${subtotal.toFixed(2).replace('.', ',')}`;
                }
                
                // Atualiza o total do carrinho
                updateCartTotal(cart);
            }
        }

        // Função para atualizar o total do carrinho
        function updateCartTotal(cart) {
            let total = 0;
            cart.forEach(item => {
                total += item.preco * (item.quantidade || 1);
            });

            const cartSubtotal = document.getElementById('cart-subtotal');
            const cartTotal = document.getElementById('cart-total');

            if (cartSubtotal) {
                cartSubtotal.textContent = `R$ ${total.toFixed(2).replace('.', ',')}`;
            }
            if (cartTotal) {
                cartTotal.textContent = `R$ ${total.toFixed(2).replace('.', ',')}`;
            }
        }

        function processUrlParams() {
            const params = new URLSearchParams(window.location.search);
            if (params.has('action') && params.get('action') === 'add') {
                const nome = params.get('nome');
                const preco = parseFloat(params.get('preco'));
                const imagem = params.get('imagem');

                if (nome && preco && imagem) {
                    let cart = JSON.parse(localStorage.getItem('cart')) || [];

                    const existingItem = cart.find(item => item.nome === nome);
                    if (existingItem) {
                        existingItem.quantidade = (existingItem.quantidade || 1) + 1;
                    } else {
                        cart.push({
                            nome: nome,
                            preco: preco,
                            imagem: imagem,
                            quantidade: 1
                        });
                    }

                    localStorage.setItem('cart', JSON.stringify(cart));
                    window.history.replaceState({}, document.title, window.location.pathname);
                }
            }
        }

        // Inicialização
        try {
            processUrlParams();
            loadCart();
        } catch (error) {
            console.error('Erro ao carregar o carrinho:', error);
            document.getElementById('cart-content').innerHTML = `
                <div class="empty-cart">
                    <i class="fas fa-exclamation-triangle"></i>
                    <h3>Erro ao carregar o carrinho</h3>
                    <p>Ocorreu um erro ao carregar seu carrinho. Tente novamente.</p>
                    <a href="produtos.php" class="btn btn-continue">
                        <i class="fas fa-gem"></i> Continuar Comprando
                    </a>
                </div>
            `;
        }
    </script>
</body>
</html>