<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Veículos</title>
</head>

<body>

    <h2>Lista de Veículos Disponíveis</h2>

    <table width="700" border="1" cellspacing="0" cellpadding="4">
        <tr>
            <td>#</td>
            <td>Marca</td>
            <td>Modelo</td>
            <td>Ano</td>
            <td>Cor</td>
            <td>Placa</td>
            <td>Valor Diária R$</td>
            <td>Ação</td>
        </tr>

        <?php
        $count = 1;
        $estoque = array(
            array("marca" => "Toyota", "modelo" => "Corolla", "ano" => "2020", "cor" => "Prata", "placa" => "ABC-1234", "valor" => "150.00"),
            array("marca" => "Honda",  "modelo" => "Civic",   "ano" => "2019", "cor" => "Preto", "placa" => "XYZ-5678", "valor" => "180.00"),
            array("marca" => "Fiat",   "modelo" => "Argo",    "ano" => "2021", "cor" => "Branco", "placa" => "KJH-9012", "valor" => "120.00")
        );


        foreach ($estoque as $veiculo) {
        ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $veiculo['marca']; ?></td>
            <td><?php echo $veiculo['modelo']; ?></td>
            <td><?php echo $veiculo['ano']; ?></td>
            <td><?php echo $veiculo['cor']; ?></td>
            <td><?php echo $veiculo['placa']; ?></td>
            <td>R$ <?php echo number_format($veiculo['valor'], 2, ',', '.'); ?></td>
            <td>
                <button type="button">Abrir</button>
            </td>
        </tr>
        <?php
            $count++;
        }
        ?>
    </table>
</body>

</html>