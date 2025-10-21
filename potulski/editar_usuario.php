```php
<?php
session_start();
require 'conexao.php';

if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'administrador') {
    header('Location: login.php');
    exit();
}

$id = intval($_GET['id']);
$usuario = $conn->query("SELECT * FROM usuarios WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $tipo = $_POST['tipo_usuario'];

    $conn->query("UPDATE usuarios SET nome='$nome', email='$email', telefone='$telefone', endereco='$endereco', cidade='$cidade', estado='$estado', tipo_usuario='$tipo' WHERE id=$id");

    $_SESSION['mensagem'] = "Usuário atualizado com sucesso!";
    header("Location: admin.php#usuarios");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h1>Editar Usuário</h1>
    <form method="post">
        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= $usuario['email'] ?>">
        </div>
        <div class="mb-3">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control" value="<?= $usuario['telefone'] ?>">
        </div>
        <div class="mb-3">
            <label>Endereço</label>
            <input type="text" name="endereco" class="form-control" value="<?= $usuario['endereco'] ?>">
        </div>
        <div class="mb-3">
            <label>Cidade</label>
            <input type="text" name="cidade" class="form-control" value="<?= $usuario['cidade'] ?>">
        </div>
        <div class="mb-3">
            <label>Estado</label>
            <input type="text" name="estado" class="form-control" value="<?= $usuario['estado'] ?>" maxlength="2">
        </div>
        <div class="mb-3">
            <label>Tipo</label>
            <select name="tipo_usuario" class="form-control">
                <option value="cliente" <?= $usuario['tipo_usuario']=='cliente'?'selected':'' ?>>Cliente</option>
                <option value="administrador" <?= $usuario['tipo_usuario']=='administrador'?'selected':'' ?>>Administrador</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="admin.php#usuarios" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
```
