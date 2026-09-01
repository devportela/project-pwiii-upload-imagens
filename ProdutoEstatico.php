<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 30px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .produtos {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .produto {
            background-color: white;
            width: 220px;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .produto img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
        }

        .produto h2 {
            font-size: 20px;
            margin: 15px 0 5px;
        }

        .produto p {
            font-size: 18px;
            color: #333;
        }
    </style>
</head>

<body>

    <h1>Produtos</h1>

    <div class="produtos">

        <?php

        require 'classes/Produto.class.php';

        $produto = new Produto();

        $dadosProduto = $produto->buscarProdutos();

        if (empty($dadosProduto)) {

            echo "<p>Ainda não há produtos cadastrados.</p>";

        } else {

            foreach ($dadosProduto as $Value) {
        ?>

                <div class="produto">

                    <?php if (!empty($Value['foto_capa'])) { ?>
                        <img src="imgs/<?php echo $Value['foto_capa']; ?>"
                             alt="<?php echo $Value['nome_produto']; ?>">
                    <?php } ?>

                    <h2>
                        <?php echo $Value['nome_produto']; ?>
                    </h2>

                    <p>
                        R$ <?php echo number_format($Value['valor'], 2, ',', '.'); ?>
                    </p>

                </div>

        <?php
            }
        }

        ?>

    </div>

</body>

</html>