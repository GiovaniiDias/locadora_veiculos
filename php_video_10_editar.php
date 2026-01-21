<html>

<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>


<body>


    <h4 style="margin-bottom:50px;">PHP Inserindo dados do Clientes em no BD</h4>

    <?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'locadora';

    $conn = mysqli_connect($host, $user, $pass, $dbname);

    if (!$conn) {
        die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    }
    if (!mysqli_set_charset($conn, "utf8")) {
        die("Erro ao codificar UTF-8: " . mysqli_error($conn));
    }

    $clientes = $_GET['clientes'];
    // $clientes = trim($clientes, "."); //Remove os pontos do inicio e do fim da string

    // echo "cliente: $clientes";
    if ($clientes == "") {
        echo "Dados invalidos!";
        exit;
    }

    // atualiza dados do registro
    if (isset($_POST["Atualizar"])) {
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $situacao = $_POST["situacao"];
        $sql = "UPDATE
    clientes SET nome='$nome', cpf='$cpf', situacao='$situacao' 
    WHERE codigo = '$clientes'";
        $update = mysqli_query($conn, $sql);
        if ($update == '1') {
            echo "Registro atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar registro: ";
        }
    }
    $sql = "SELECT * FROM clientes WHERE codigo = '$clientes'";
    $tb_clientes = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_array($tb_clientes);
    if ($dados) {
    $codigo = $dados["codigo"];
    $nome = $dados["nome"];
    $cpf = $dados["cpf"];
    $situacao = $dados["situacao"];
    }else {
        $codigo = $nome = $cpf = $situacao = "";
        echo "Erro: Cliente $clientes não encontrado.";
    }

    //echo "Conexão estabelecida com sucesso<br><br>";

    $mensagem = "";

    if (isset($_POST["cadastrar"])) {
        $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
        $cpf = mysqli_real_escape_string($conn, $_POST["cpf"]);
        $situacao = mysqli_real_escape_string($conn, $_POST["situacao"]);


        $sql = "
INSERT INTO
clientes
(nome, cpf, situacao)
VALUES
('$nome', '$cpf','$situacao')
";
        if (mysqli_query($conn, $sql)) {
            $mensagem = "<b style='color:green;'>Cliente cadastrado com sucesso!</b>";
        } else {
            // Se houver erro, ele será mostrado aqui em vez de redirecionar
            $mensagem = "<b style='color:red;'>Erro ao cadastrar: " . mysqli_error($conn) . "</b>";
        }
    }
    ?>
    <?php echo $mensagem; ?>



    <form name="form" method="POST" action="php_video_10_editar.php?clientes=<?php echo $clientes; ?>">


        <h4> Cadastro de Clientes</h4>
        <table border="1" cellpadding="4" cellspacing="0" width="400">
            <tr>
                <td>Nome</td>
                <td><input type="text" name="nome" id="nome" value="<?php echo $nome ?>"></td>
            </tr>
            <tr>
                <td>CPF</td>
                <td><input type="text" name="cpf" id="cpf" value="<?php echo $cpf ?>"></td>
            </tr>
            <tr>
                <td>Situação</td>
                <td>
                    <select name="situacao" id="situacao">
                        <option value="A" <?php if ($situacao == "A") echo "selected"; ?>>Ativo</option>
                        <option value="I" <?php if ($situacao == "I") echo "selected"; ?>>Inativo</option>
                    </select>
                </td>
            </tr>
        </table>
        <input type="submit" name="Atualizar" value="Atualizar">
        <input type="button" name="Voltar" value="Voltar" onclick="javascript:location.href='clientes_lista.php'">
    </form>
    <?php
    mysqli_close($conn);

    ?>
</body>

</html>