<?php
    $produtos = [
        ["nome" => "Arroz", "preco" => 20],
        ["nome" => "Feijão", "preco" => 10],
        ["nome" => "Macarrão", "preco" => 5],
        ["nome" => "Leite", "preco" => 8],
        ["nome" => "Pão", "preco" => 6],
    ];
    $total = 0;

    foreach ($produtos as $produto) {
        echo "Produto: " . $produto["nome"] . " - Preço: " . $produto["preco"] . "\n";
        $total = $total + $produto["preco"];
    }
    echo "\nValor total da compra: " . $total;
?>
