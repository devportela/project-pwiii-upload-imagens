<?php

require_once 'classes/Produto.class.php';

$produto = new Produto();

// Processa o envio do formulário
if (isset($_POST['nome'])) {

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];

    $fotos = isset($_FILES['foto'])
        ? $_FILES['foto']
        : array();

    $produto->enviarProduto(
        $nome,
        $descricao,
        $valor,
        $fotos
    );

    // Redireciona informando que o produto foi cadastrado
    header("Location: index.php?sucesso=1");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Cadastrar Produto</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;

            font-family:
                Arial,
                Helvetica,
                sans-serif;
        }

        body {
            background-color: #f4f6f8;

            color: #333;

            min-height: 100vh;

            padding: 40px 20px;
        }

        .container {
            width: 100%;

            max-width: 600px;

            margin: 0 auto;
        }

        h1 {
            text-align: center;

            margin-bottom: 25px;

            color: #222;
        }

        form {
            background-color: white;

            padding: 30px;

            border-radius: 12px;

            box-shadow:
                0 4px 15px
                rgba(0, 0, 0, 0.08);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;

            margin-bottom: 8px;

            font-weight: bold;

            color: #444;
        }

        input,
        textarea {
            width: 100%;

            padding: 12px;

            border: 1px solid #ccc;

            border-radius: 7px;

            font-size: 16px;

            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: #0066cc;
        }

        textarea {
            resize: vertical;

            min-height: 100px;
        }

        .btn-cadastrar {
            width: 100%;

            padding: 13px;

            border: none;

            border-radius: 7px;

            background-color: #0066cc;

            color: white;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.2s;
        }

        .btn-cadastrar:hover {
            background-color: #0052a3;
        }

        .separador {
            display: flex;

            align-items: center;

            gap: 15px;

            margin: 25px 0;
        }

        .separador::before,
        .separador::after {
            content: "";

            flex: 1;

            height: 1px;

            background-color: #ddd;
        }

        .separador span {
            color: #888;

            font-size: 14px;
        }

        .btn-produtos {
            display: block;

            width: 100%;

            padding: 13px;

            background-color: #333;

            color: white;

            text-align: center;

            text-decoration: none;

            border-radius: 7px;

            font-size: 16px;

            font-weight: bold;

            transition: 0.2s;
        }

        .btn-produtos:hover {
            background-color: #222;
        }

    </style>

</head>

<body>

    <div class="container">

        <h1>
            Cadastrar Produto
        </h1>


        <form
            method="post"
            enctype="multipart/form-data"
        >

            <div class="form-group">

                <label for="nome">
                    Nome do Produto
                </label>

                <input
                    type="text"
                    id="nome"
                    name="nome"
                    placeholder="Ex: Sofá Retrátil"
                    required
                >

            </div>


            <div class="form-group">

                <label for="descricao">
                    Descrição
                </label>

                <textarea
                    id="descricao"
                    name="descricao"
                    placeholder="Informe os detalhes do produto..."
                    required
                ></textarea>

            </div>


            <div class="form-group">

                <label for="valor">
                    Valor (R$)
                </label>

                <input
                    type="number"
                    id="valor"
                    name="valor"
                    step="0.01"
                    min="0"
                    placeholder="0.00"
                    required
                >

            </div>


            <div class="form-group">

                <label for="foto">
                    Imagens do Produto
                </label>

                <input
                    type="file"
                    id="foto"
                    name="foto[]"
                    multiple
                    required
                >

            </div>


            <button
                type="submit"
                class="btn-cadastrar"
            >
                Cadastrar Produto
            </button>

        </form>


        <div class="separador">
            <span>ou</span>
        </div>


        <a
            href="ProdutoEstatico.php"
            class="btn-produtos"
        >
            Ver produtos
        </a>

    </div>


    <?php

    // Mostra o alerta depois do cadastro
    if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1) {

        echo "
        <script>
            alert('Produto cadastrado com sucesso!');
        </script>
        ";

    }

    ?>

</body>

</html>
```
