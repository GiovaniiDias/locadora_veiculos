<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2 style="margin-bottom:50px;">PHP Aula Video 8</h2>

    <h4 style="margin-bottom:50px;">PHP Inserindo dados em uma tabela do Banco de dados</h4>
    <form name="form" method="POST" enctype="multipart/form-data">

        <div align="center" style="width: 400px"></div>
        <h4> Cadastro de Produto</h4>
        <table border="1" cellpadding="4" cellspacing="0" width="400">
            <tr>
                <td>Nome</td>
                <td><input type="text" name="nome" id="nome"></td>
            </tr>
            <tr>
                <td>Valor Dia</td>
                <td><input type="text" name="valor_dia" id="valor_dia"></td>
            </tr>
        </table>
        <input type="submit" name="cadastrar" value="Cadastrar"><br><br>
    </form>
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
    // echo "Conexão estabelecida com sucesso<br><br>";

    echo '
   <table border="1" cellpadding="4" cellspacing="0">
   <tr>
    <td><strong>Código</strong></td>
    <td><strong>Nome</strong></td>
    <td><strong>Valor Dia</strong></td>
    <td><strong>Situacao</strong></td>
   </tr>';

    $sql = "SELECT * FROM produtos ORDER BY nome";
    $tb_produtos =  mysqli_query($conn, $sql);
    while ($dados = mysqli_fetch_array($tb_produtos)) {
        $codigo = $dados["codigo"];
        $nome = $dados["nome"];
        $valor_dia = $dados["valor_dia"];
        $situacao = $dados["situacao"];
        // echo "$codigo - $nome - $valor_dia - $situacao<br>";

        echo '
    <tr>
        <td>' . $codigo . '</td>
        <td>' . $nome . '</td>
        <td>' . $valor_dia . '</td>
        <td>' . $situacao . '</td>

    </tr> ';
    }
    echo '</table>
';
    if (isset($_POST["cadastrar"])) {
        $nome = $_POST["nome"];
        $valor_dia = $_POST["valor_dia"];

        
        $sql = "
INSERT INTO
produtos
(codigo, nome, valor_dia, situacao)
VALUES
(NULL, '$nome', '$valor_dia','A')
";
        $insert = mysqli_query($conn, $sql);
        if ($insert) {
            
            header("Location: " . $_SERVER['PHP_SELF'] . "?sucesso=1");
            exit();
        } else {
            echo "Produto Não Cadastrado";
        }
    }
    mysqli_close($conn);

    ?>

</body>

</html>
