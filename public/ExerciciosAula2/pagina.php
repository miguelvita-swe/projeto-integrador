<?php
session_start();

$nomefilme   = "";
$generofilme = "";
$mensagem    = "";
$mostrarBox  = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nomefilme   = trim($_POST["nomefilme"]);
    $generofilme = trim($_POST["generofilme"]);

    $_SESSION['nomefilme']   = $nomefilme;
    $_SESSION['generofilme'] = $generofilme;

    $generoLower = mb_strtolower($generofilme, 'UTF-8');
    if ($generoLower === "terror") {
        $_SESSION['mensagem'] = "<p style='color: red;'>Atenção! Filme de Terror cadastrado.</p>";
    } elseif ($generoLower === "comedia" || $generoLower === "comédia") {
        $_SESSION['mensagem'] = "<p style='color: green;'>Esse filme promete boas risadas!</p>";
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_SESSION['nomefilme'], $_SESSION['generofilme'], $_SESSION['mensagem'])) {
    $nomefilme   = $_SESSION['nomefilme'];
    $generofilme = $_SESSION['generofilme'];
    $mensagem    = $_SESSION['mensagem'];
    $mostrarBox  = true;

    unset($_SESSION['nomefilme'], $_SESSION['generofilme'], $_SESSION['mensagem']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>PlayCine</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

    <?php include 'cabecalho.php'; ?>

    <main>
        <div class="container">
            <h1>CATÁLOGO DE FILMES</h1>
            <div class="logop">
                <img src="logo.png" alt="Logo PlayCine">
            </div>
            
            <form method="POST">
                <label>Nome do filme*</label>
                <input class="input" type="text" name="nomefilme" placeholder="Digite o nome do filme." required>
                
                <label>Gênero*</label>
                <input class="input" type="text" name="generofilme" placeholder="Digite o gênero do filme." required>
                
                <button id="botao" type="submit" disabled>ENVIAR</button>
            </form>
        </div>
    </main>
    
    <?php include 'rodape.php'; ?>

    <?php if ($mostrarBox): ?>
        <div id="minhaBox">
            <h2>Filme cadastrado com sucesso!</h2>
            <p><b>Nome: </b><?= htmlspecialchars($nomefilme) ?></p>
            <p><b>Gênero: </b><?= htmlspecialchars($generofilme) ?></p>
            <?= $mensagem ?>
            <button id="fechar" onclick="document.getElementById('minhaBox').style.display='none'">FECHAR</button>
        </div>
    <?php endif; ?>

    <script>
        const inputs = document.querySelectorAll(".input");
        const botao  = document.getElementById("botao");

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
