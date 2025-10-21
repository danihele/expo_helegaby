<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração - Potulski Joias</title>
    <style>
        /* [MANTENHA TODOS OS ESTILOS ANTERIORES AQUI] */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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

        header {
            background: linear-gradient(to right, rgba(248, 233, 233, 0.98), rgba(248, 233, 233, 0.95));
            padding: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            text-align: center;
            backdrop-filter: blur(5px);
        }

        header h1 {
            font-size: 2.5rem;
            color: #2c3e50;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        header a {
            text-decoration: none;
            color: inherit;
        }

        #menu {
            background: linear-gradient(to right, rgba(41, 40, 40, 0.95), rgba(60, 59, 59, 0.95));
            color: rgb(247, 250, 253);
            width: 70%;
            max-width: 800px;
            margin: 20px auto;
            padding: 15px;
            border-radius: 50px;
            position: sticky;
            top: 80px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            z-index: 999;
            backdrop-filter: blur(5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        #menu a {
            color: aliceblue;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 50px;
            transition: all 0.3s ease;
            font-weight: bold;
            font-size: 18px;
            position: relative;
            overflow: hidden;
        }

        #menu a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.5s ease;
        }

        #menu a:hover::before {
            left: 100%;
        }

        #menu a:hover {
            background-color: rgba(254, 215, 221, 0.2);
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        #atual {
            background-color: rgba(254, 215, 221, 0.3);
            box-shadow: 0 0 10px rgba(254, 215, 221, 0.5);
        }

        .container {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 40px 20px;
            margin: 40px 0;
            max-width: 1200px;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .tab-content {
            display: none;
            background: linear-gradient(145deg, #ffffff, #f8f8f8);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
            animation: fadeIn 1s ease;
            margin-top: 20px;
        }

        .tab-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #000000, #2c3e50);
        }

        .tab-content.active {
            display: block;
        }

        .tab-content h2 {
            font-size: 2.2rem;
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
            position: relative;
        }

        .tab-content h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(to right, #000000, #2c3e50);
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }

        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 14px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            border-color: #2c3e50;
            box-shadow: 0 0 0 3px rgba(44, 62, 80, 0.1);
            outline: none;
        }

        .form-group .error {
            color: #e53e3e;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }

        .form-group.invalid input, .form-group.invalid select, .form-group.invalid textarea {
            border-color: #e53e3e;
        }

        .form-group.invalid .error {
            display: block;
        }

        .btn-submit {
            background: linear-gradient(to right, #000000, #2c3e50);
            color: #fed4db;
            padding: 16px;
            width: 100%;
            border: none;
            border-radius: 50px;
            font-weight: bold;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin-top: 10px;
        }

        .btn-submit:hover {
            background: linear-gradient(to right, #2c3e50, #000000);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .btn-secondary {
            background: linear-gradient(to right, #6c757d, #5a6268);
            color: #fff;
            padding: 12px 25px;
            border: none;
            border-radius: 50px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin-right: 10px;
        }

        .btn-secondary:hover {
            background: linear-gradient(to right, #5a6268, #6c757d);
            transform: translateY(-3px);
        }

        .btn-danger {
            background: linear-gradient(to right, #e53e3e, #c53030);
            color: #fff;
            padding: 12px 25px;
            border: none;
            border-radius: 50px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-danger:hover {
            background: linear-gradient(to right, #c53030, #e53e3e);
            transform: translateY(-3px);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        .table th {
            background: linear-gradient(to right, #2c3e50, #000000);
            color: #fed4db;
            font-weight: 600;
        }

        .table tr:hover {
            background-color: #f8f9fa;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .stat-card {
            background: linear-gradient(145deg, #ffffff, #f8f8f8);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #000000, #2c3e50);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
        }

        .stat-card h3 {
            font-size: 1.2rem;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .stat-card .value {
            font-size: 2.5rem;
            font-weight: bold;
            color: #2c3e50;
        }

        .mensagem {
            padding: 15px;
            margin: 20px 0;
            border-radius: 8px;
            text-align: center;
            font-size: 16px;
            font-weight: 500;
        }

        .erro {
            background-color: #fed7d7;
            color: #c53030;
            border: 1px solid #feb2b2;
        }

        .sucesso {
            background-color: #c6f6d5;
            color: #2f855a;
            border: 1px solid #9ae6b4;
        }

        footer {
            margin-top: auto;
            padding: 30px;
            background: linear-gradient(to right, #2c3e50, #000000);
            color: #fff;
            text-align: center;
            font-size: 1rem;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            #menu {
                width: 90%;
                padding: 10px;
                top: 70px;
            }
            
            #menu a {
                padding: 10px 15px;
                font-size: 16px;
                margin: 5px;
            }
            
            .container {
                padding: 20px 15px;
                margin: 20px 0;
            }
            
            .tab-content {
                padding: 20px 15px;
            }
            
            .tab-content h2 {
                font-size: 1.8rem;
            }
            
            .stats-container {
                grid-template-columns: 1fr;
            }
            
            .table {
                display: block;
                overflow-x: auto;
            }
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }

        @media (max-width: 480px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header>
        <a href="#">
            <h1>Potulski Joias - Administração</h1>
        </a>
    </header>

    <div id="menu">
        <a href="#" id="atual" data-tab="dashboard">Dashboard</a>
        <a href="#" data-tab="products">Produtos</a>
        <a href="#" data-tab="add-product">Adicionar Produto</a>
        <a href="#" data-tab="orders">Pedidos</a>
    </div>

    <div class="container">
        <!-- Dashboard -->
        <div id="dashboard" class="tab-content active">
            <h2>Dashboard</h2>
            <p>Bem-vindo à área administrativa da Potulski Joias.</p>
            
            <div class="stats-container">
                <div class="stat-card">
                    <h3>Total de Produtos</h3>
                    <div class="value" id="total-produtos">0</div>
                </div>
                <div class="stat-card">
                    <h3>Pedidos Pendentes</h3>
                    <div class="value">12</div>
                </div>
                <div class="stat-card">
                    <h3>Vendas do Mês</h3>
                    <div class="value">R$ 24.580,00</div>
                </div>
                <div class="stat-card">
                    <h3>Clientes Novos</h3>
                    <div class="value">8</div>
                </div>
            </div>
        </div>
        
        <!-- Lista de Produtos -->
        <div id="products" class="tab-content">
            <h2>Gerenciar Produtos</h2>
            <p>Visualize, edite ou exclua produtos do catálogo.</p>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Preço</th>
                        <th>Estoque</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="products-table-body">
                    <!-- Produtos serão carregados aqui dinamicamente -->
                </tbody>
            </table>
        </div>
        
        <!-- Adicionar Produto -->
        <div id="add-product" class="tab-content">
            <h2>Adicionar Novo Produto</h2>
            <p>Preencha os dados do novo produto para adicioná-lo ao catálogo.</p>
            
            <form id="product-form">
                <div class="form-group">
                    <label for="product-name">Nome do Produto</label>
                    <input type="text" id="product-name" class="form-control" placeholder="Ex: Anel Solitário Ouro 18k" required>
                </div>
                
                <div class="form-group">
                    <label for="product-category">Categoria</label>
                    <select id="product-category" class="form-control" required>
                        <option value="">Selecione uma categoria</option>
                        <option value="Anéis">Anéis</option>
                        <option value="Brincos">Brincos</option>
                        <option value="Colares">Colares</option>
                        <option value="Pulseiras">Pulseiras</option>
                        <option value="Relógios">Relógios</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="product-description">Descrição</label>
                    <textarea id="product-description" class="form-control" placeholder="Descreva o produto em detalhes..." rows="4" required></textarea>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="product-price">Preço (R$)</label>
                        <input type="number" id="product-price" class="form-control" step="0.01" min="0" placeholder="Ex: 1250.00" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="product-stock">Estoque</label>
                        <input type="number" id="product-stock" class="form-control" min="0" placeholder="Ex: 15" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="product-image">Imagem do Produto</label>
                    <input type="file" id="product-image" class="form-control" accept="image/*">
                </div>
                
                <button type="submit" class="btn-submit">Adicionar Produto</button>
            </form>
        </div>
        
        <!-- Pedidos -->
        <div id="orders" class="tab-content">
            <h2>Gerenciar Pedidos</h2>
            <p>Acompanhe e gerencie os pedidos dos clientes.</p>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Nº Pedido</th>
                        <th>Cliente</th>
                        <th>Data</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#2023001</td>
                        <td>Maria Silva</td>
                        <td>15/03/2023</td>
                        <td>R$ 1.250,00</td>
                        <td><span style="color: #f39c12; font-weight: 500;">Pendente</span></td>
                        <td class="actions">
                            <button class="btn-secondary">Detalhes</button>
                        </td>
                    </tr>
                    <tr>
                        <td>#2023002</td>
                        <td>João Santos</td>
                        <td>18/03/2023</td>
                        <td>R$ 890,00</td>
                        <td><span style="color: #3498db; font-weight: 500;">Processando</span></td>
                        <td class="actions">
                            <button class="btn-secondary">Detalhes</button>
                            <button class="btn-danger">Cancelar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>Potulski Joias &copy; 2023 - Todos os direitos reservados</p>
    </footer>

    <script>
        // Chave para salvar no localStorage
        const STORAGE_KEY = 'potulski_produtos';
        const LAST_ID_KEY = 'potulski_last_id';

        // Carregar produtos do localStorage quando a página carrega
        document.addEventListener('DOMContentLoaded', function() {
            carregarProdutos();
        });

        // Função para carregar produtos do localStorage
        function carregarProdutos() {
            const produtosSalvos = localStorage.getItem(STORAGE_KEY);
            const lastId = localStorage.getItem(LAST_ID_KEY);
            
            if (lastId) {
                productId = parseInt(lastId) + 1;
            } else {
                productId = 1;
            }
            
            if (produtosSalvos) {
                const produtos = JSON.parse(produtosSalvos);
                const tbody = document.getElementById('products-table-body');
                tbody.innerHTML = '';
                
                produtos.forEach(produto => {
                    adicionarProdutoNaTabela(produto);
                });
                
                atualizarTotalProdutos();
            }
        }

        // Função para salvar produtos no localStorage
        function salvarProdutos() {
            const produtos = [];
            const linhas = document.querySelectorAll('#products-table-body tr');
            
            linhas.forEach(linha => {
                const colunas = linha.querySelectorAll('td');
                produtos.push({
                    id: colunas[0].textContent,
                    nome: colunas[1].textContent,
                    categoria: colunas[2].textContent,
                    preco: colunas[3].textContent,
                    estoque: colunas[4].textContent
                });
            });
            
            localStorage.setItem(STORAGE_KEY, JSON.stringify(produtos));
            localStorage.setItem(LAST_ID_KEY, (productId - 1).toString());
        }

        // Função para adicionar produto na tabela
        function adicionarProdutoNaTabela(produto) {
            const tbody = document.getElementById('products-table-body');
            const novaLinha = document.createElement('tr');
            
            novaLinha.innerHTML = `
                <td>${produto.id}</td>
                <td>${produto.nome}</td>
                <td>${produto.categoria}</td>
                <td>${produto.preco}</td>
                <td>${produto.estoque}</td>
                <td class="actions">
                    <button class="btn-secondary">Editar</button>
                    <button class="btn-danger" onclick="excluirProduto(this)">Excluir</button>
                </td>
            `;
            
            tbody.appendChild(novaLinha);
        }

        // Navegação entre abas
        document.querySelectorAll('#menu a').forEach(tab => {
            tab.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Remove a classe atual de todas as abas
                document.querySelectorAll('#menu a').forEach(t => t.classList.remove('atual'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                
                // Adiciona a classe atual à aba clicada
                tab.classList.add('atual');
                document.getElementById(tab.getAttribute('data-tab')).classList.add('active');
            });
        });
        
        // Adicionar produto
        document.getElementById('product-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Obter valores do formulário
            const nome = document.getElementById('product-name').value;
            const categoria = document.getElementById('product-category').value;
            const preco = parseFloat(document.getElementById('product-price').value);
            const estoque = parseInt(document.getElementById('product-stock').value);
            
            // Formatar preço para exibição
            const precoFormatado = 'R$ ' + preco.toFixed(2).replace('.', ',');
            
            // Gerar ID com zeros à esquerda
            const idFormatado = productId.toString().padStart(3, '0');
            
            // Criar objeto do produto
            const novoProduto = {
                id: idFormatado,
                nome: nome,
                categoria: categoria,
                preco: precoFormatado,
                estoque: estoque
            };
            
            // Adicionar produto na tabela
            adicionarProdutoNaTabela(novoProduto);
            
            // Atualizar contador
            productId++;
            atualizarTotalProdutos();
            
            // Salvar no localStorage
            salvarProdutos();
            
            // Mostrar mensagem de sucesso
            alert('Produto adicionado com sucesso!');
            
            // Limpar formulário
            this.reset();
            
            // Mudar para a aba de produtos
            document.querySelectorAll('#menu a').forEach(t => t.classList.remove('atual'));
            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
            document.querySelector('#menu a[data-tab="products"]').classList.add('atual');
            document.getElementById('products').classList.add('active');
        });
        
        // Função para excluir produto
        function excluirProduto(botao) {
            if (confirm('Tem certeza que deseja excluir este produto?')) {
                const linha = botao.closest('tr');
                linha.remove();
                atualizarTotalProdutos();
                salvarProdutos(); // Atualizar localStorage após exclusão
                alert('Produto excluído com sucesso!');
            }
        }
        
        // Função para atualizar o total de produtos no dashboard
        function atualizarTotalProdutos() {
            const tbody = document.getElementById('products-table-body');
            const totalProdutos = tbody.children.length;
            document.getElementById('total-produtos').textContent = totalProdutos;
        }
    </script>
</body>
</html>