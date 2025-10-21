<?php
// Iniciar a sessão no início do arquivo
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'config.php';

function validarCPF($cpf) {
    // Remove caracteres não numéricos
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    
    // Verifica se tem 11 dígitos
    if (strlen($cpf) != 11) {
        return false;
    }
    
    // Verifica se todos os dígitos são iguais (CPF inválido)
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }
    
    // Validação do dígito verificador
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    
    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar e sanitizar dados
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
    $endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco']));
    $cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
    $estado = mysqli_real_escape_string($conexao, trim($_POST['estado']));
    $senha = $_POST['password'];
    $confirmar_senha = $_POST['confirm-password'];
    
    // Limpar CPF e telefone (remover caracteres não numéricos)
    $cpf_limpo = preg_replace('/[^0-9]/', '', $cpf);
    $telefone_limpo = preg_replace('/[^0-9]/', '', $telefone);
    
    // Validações
    $erros = [];
    
    if (empty($nome)) $erros[] = "Nome é obrigatório.";
    if (empty($cpf_limpo)) $erros[] = "CPF é obrigatório.";
    if (empty($email)) $erros[] = "E-mail é obrigatório.";
    if (empty($telefone_limpo)) $erros[] = "Telefone é obrigatório.";
    if (empty($endereco)) $erros[] = "Endereço é obrigatório.";
    if (empty($cidade)) $erros[] = "Cidade é obrigatória.";
    if (empty($estado)) $erros[] = "Estado é obrigatório.";
    if (empty($senha)) $erros[] = "Senha é obrigatória.";
    
    if (!empty($erros)) {
        $_SESSION['erro'] = implode(" ", $erros);
    } elseif ($senha !== $confirmar_senha) {
        $_SESSION['erro'] = "As senhas não coincidem.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['erro'] = "Formato de e-mail inválido.";
    } elseif (strlen($cpf_limpo) !== 11 || !validarCPF($cpf_limpo)) {
        $_SESSION['erro'] = "CPF inválido.";
    } elseif (strlen($telefone_limpo) < 10 || strlen($telefone_limpo) > 11) {
        $_SESSION['erro'] = "Telefone deve ter entre 10 e 11 dígitos.";
    } elseif (strlen($senha) < 6) {
        $_SESSION['erro'] = "A senha deve ter pelo menos 6 caracteres.";
    } else {
        // Verificar se email já existe
        $verifica_email = "SELECT id FROM usuarios WHERE email = '$email'";
        $result_email = mysqli_query($conexao, $verifica_email);
        
        // Verificar se CPF já existe
        $verifica_cpf = "SELECT id FROM usuarios WHERE cpf = '$cpf_limpo'";
        $result_cpf = mysqli_query($conexao, $verifica_cpf);
        
        if (mysqli_num_rows($result_email) > 0) {
            $_SESSION['erro'] = "Este e-mail já está cadastrado.";
        } elseif (mysqli_num_rows($result_cpf) > 0) {
            $_SESSION['erro'] = "Este CPF já está cadastrado.";
        } else {
            // Criptografar senha
            $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
            
            // Usar prepared statements para maior segurança
            $query = "INSERT INTO usuarios (nome, cpf, email, telefone, endereco, cidade, estado, senha, tipo_usuario) 
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'cliente')";
            
            $stmt = mysqli_prepare($conexao, $query);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ssssssss", $nome, $cpf_limpo, $email, $telefone_limpo, $endereco, $cidade, $estado, $senha_criptografada);
                
                if (mysqli_stmt_execute($stmt)) {
                    $_SESSION['sucesso'] = "Cadastro realizado com sucesso! Faça login.";
                    // Limpar dados do formulário em caso de sucesso
                    if (isset($_SESSION['dados_form'])) {
                        unset($_SESSION['dados_form']);
                    }
                    header("Location: login.php");
                    exit();
                } else {
                    $_SESSION['erro'] = "Erro ao cadastrar: " . mysqli_error($conexao);
                }
                mysqli_stmt_close($stmt);
            } else {
                $_SESSION['erro'] = "Erro no sistema. Tente novamente.";
            }
        }
    }
    
    // Salvar dados do formulário para preenchimento automático em caso de erro
    $_SESSION['dados_form'] = [
        'nome' => $nome,
        'cpf' => $cpf,
        'email' => $email,
        'telefone' => $telefone,
        'endereco' => $endereco,
        'cidade' => $cidade,
        'estado' => $estado
    ];
    
    // Redirecionar de volta para a página de cadastro
    header("Location: cadastro.php");
    exit();
}
?>