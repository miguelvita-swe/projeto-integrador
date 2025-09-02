<?php 
    $imagem = "php.png";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>IMAGEM</title>
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
            color: #333;
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

        p {
            font-size: 1.1rem;
            margin-bottom: 0.8rem;
            padding: 0.5rem;
            border-bottom: 1px solid #eee;
        }

        p:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>IMAGEM</h1>
        <img src=<?php echo $imagem ?> alt="Imagem php">
    </div>
</body>
</html>
