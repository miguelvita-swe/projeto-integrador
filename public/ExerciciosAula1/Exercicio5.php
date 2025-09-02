<?php
session_start();

$nome = "";
$email = "";
$mostrarBox = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;

    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

if (isset($_SESSION['nome']) && isset($_SESSION['email'])) {
    $nome = $_SESSION['nome'];
    $email = $_SESSION['email'];
    $mostrarBox = true;

    unset($_SESSION['nome']);
    unset($_SESSION['email']);
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>FORMULÁRIO</title>
    <style>
        * { 
            user-select: none;
            margin: 0; 
            padding: 0; 
            box-sizing: 
            border-box; 
            font-family: "Segoe UI", Roboto, sans-serif; 
        }

        body {
            background: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 2rem 3rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h1 { 
            font-size: 1.8rem; 
            margin-bottom: 1.5rem; 
            color: #4a90e2; 
            letter-spacing: 1px; 
        }

        input {
            padding: 10px;
            width: 80%;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 1rem;
            font-size: 1rem;
            transition: border 0.3s;
        }

        input:focus { 
            border-color: #4a90e2; 
            outline: none; 
        }

        label { 
            color: #444; 
            display: block; 
            margin-bottom: 0.3rem; 
            text-align: left; 
        }

        button {
            padding: 10px 20px;
            background: #4a90e2;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
            font-weight: bold;
        }

        button:hover { 
            background: #357ABD; 
        }

        #minhaBox {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            z-index: 1000;
            text-align: center;
        }

        h2 { 
            color: 
            green; 
            margin-bottom: 1rem; 
        }

        #fechar {
            margin-top: 1rem;
        }

        p {
            text-align: left;
            color: #444;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>LOGIN</h1>
        <form method="POST">
            <label>Nome*</label>
            <input class="input" type="text" name="nome" placeholder="Digite seu nome." required>
            
            <label>E-mail*</label>
            <input class="input" type="email" name="email" placeholder="Digite seu email." required>
            
            <button id="botao" type="submit" disabled>ENTRAR</button>
        </form>
    </div>

    <?php if ($mostrarBox): ?>
    <div id="minhaBox">
        <h2>Cadastro realizado com sucesso!</h2>
        <p><b>Nome: </b><?php echo htmlspecialchars($nome); ?></p>
        <p><b>E-mail: </b><?php echo htmlspecialchars($email); ?></p>
        <button id="fechar" onclick="document.getElementById('minhaBox').style.display='none'">FECHAR</button>
    </div>
    <?php endif; ?>

    <script>
        const inputs = document.querySelectorAll(".input");
        const botao = document.getElementById("botao");

        inputs.forEach(input => {
            input.addEventListener("input", verificarInputs);
        });

        function verificarInputs() {
            const todosPreenchidos = Array.from(inputs).every(c => c.value.trim() !== "");
            botao.disabled = !todosPreenchidos;
        }
    </script>
</body>
</html>
