<?php
    $mensagem = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nota = $_POST["nota"];

        if (is_numeric($nota) && $nota >= 0 && $nota <= 10) {
            if ($nota >= 7) {
                $mensagem = "<p class='aprovado'>Aluno aprovado ✅</p>";
            } else {
                $mensagem = "<p class='reprovado'>Aluno reprovado ❌</p>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>APROVAÇÃO</title>
    <style>
        * {
            user-select: none;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

        input[type="number"] {
            padding: 10px;
            width: 80%;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 1rem;
            font-size: 1rem;
            transition: border 0.3s;
        }

        input[type="number"]:focus {
            border-color: #4a90e2;
            outline: none;
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
        }

        button:hover {
            background: #357ABD;
        }

        .aprovado {
            color: green;
            font-weight: bold;
            margin-top: 1rem;
        }

        .reprovado {
            color: red;
            font-weight: bold;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>APROVAÇÃO</h1>
        <form method="POST">
        <label>Digite sua nota (0 a 10):</label><br><br>
        <input type="number" name="nota" min="0" max="10" required>
        <br>
        <button type="submit">Enviar</button>
        </form>
        <?php 
        if ($mensagem !== "") {
            echo $mensagem;
        }
        ?>
    </div>
</body>
</html>
