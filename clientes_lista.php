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



<form name="form" method="POST" action="clientes_lista.php">


    <h4> Cadastro de Clientes</h4>
    <table border="1" cellpadding="4" cellspacing="0" width="400">
        <tr>
            <td>Nome</td>
            <td><input type="text" name="nome" id="nome"></td>
        </tr>
        <tr>
            <td>CPF</td>
            <td><input type="text" name="cpf" id="cpf"></td>
        </tr>
        <tr>
            <td>Situação</td>
            <td><input type="text" name="situacao" id="situacao"></td>
        </tr>
    </table>
    <input type="button" value="Cadastrar" onclick="AdicionarCliente()"><br><br>
</form>

<table border="1" cellpadding="4" cellspacing="0">
    <tr>
        <td><strong>Código</strong></td>
        <td><strong>Nome</strong></td>
        <td><strong>CPF</strong></td>
        <td><strong>Situação</strong></td>
        <td></td>
    </tr>

    <?php
    $sql = "SELECT * FROM clientes ORDER BY nome";
    $tb_clientes = mysqli_query($conn, $sql);


    while ($dados = mysqli_fetch_array($tb_clientes)) {
         $codigo = $dados["codigo"];
         $nome = $dados["nome"];
         $cpf = $dados["cpf"];
         $situacao = $dados["situacao"];
        // echo "$codigo - $nome - $cpf - $situacao<br>";w
    echo "
     <tr>
        <td>".$codigo."</td>
        <td>".$nome."</td>
        <td>".$cpf."</td>
        <td>".$situacao."</td>
        <td><a href='php_video_10_editar.php?produto=.$codigo.'><strong>Editar</strong></a></td>
     </tr>";
        }
    ?>

</table>

<?php
mysqli_close($conn);

?>