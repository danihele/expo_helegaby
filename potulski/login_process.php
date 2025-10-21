<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['password'];
    
    if (empty($email) || empty($senha)) {
        $_SESSION['erro'] = "Por favor, preencha todos os campos.";
        header("Location: login.php");
        exit();
    }

    // Verificar se a conexão com o banco de dados está funcionando
    if (!$conexao) {
        $_SESSION['erro'] = "Erro de conexão com o banco de dados.";
        header("Location: login.php");
        exit();
    }

    // Usar prepared statements para evitar SQL injection
    $query = "SELECT id, nome, email, senha, tipo_usuario FROM usuarios WHERE email = ?";
    $stmt = $conexao->prepare($query);
    
    if ($stmt === false) {
        $_SESSION['erro'] = "Erro na preparação da consulta: " . $conexao->error;
        header("Location: login.php");
        exit();
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $usuario = $result->fetch_assoc();
        
        if (password_verify($senha, $usuario['senha'])) {
            // Login bem-sucedido
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['logado'] = true;
            
            // Verificar se é administrador - versão mais robusta
            $tipo_usuario = strtolower(trim($usuario['tipo_usuario']));
            
            if ($tipo_usuario === 'administrador' || $tipo_usuario === 'admin') {
                $_SESSION['usuario_tipo'] = 'admin';
                header("Location: admin.php");
                exit();
            } else {
                $_SESSION['usuario_tipo'] = 'cliente';
                header("Location: home.php");
                exit();
            }
        } else {
            $_SESSION['erro'] = "Senha incorreta.";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['erro'] = "Nenhuma conta encontrada com este e-mail.";
        header("Location: login.php");
        exit();
    }

    $stmt->close();
    $conexao->close();
} else {
    header("Location: login.php");
    exit();
}
?>