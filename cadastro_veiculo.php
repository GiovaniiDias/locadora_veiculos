htm l
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Exemplo de base de dados com array - Carros</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <form name="form" method="post" enctype="multipart/form-data">
        <div id="FormPesquisa">
            <h3>Exemplo de base de dados com Array - Veículos</h3>

            <div id="LinhaUm" class="BlocoPadrao">
                <div id="Marca" class="BlocoCampos">
                    <label>Marca</label>
                    <select id="marca" name="marca">
                        <option value="0">Todas</option>
                        <option value="200">Toyota</option>
                        <option value="201">Volkswagen</option>
                        <option value="202">Ford</option>
                        <option value="203">Honda</option>
                    </select>
                </div>

                <div id="Modelo" class="BlocoCampos">
                    <label>Modelo</label>
                    <select id="modelo" name="modelo">
                        <option value="0">Todos</option>
                        <option value="1">Corolla</option>
                        <option value="2">Golf</option>
                        <option value="3">Mustang</option>
                        <option value="4">Civic</option>
                        <option value="5">Hilux</option>
                        <option value="6">Polo</option>
                        <option value="7">Territory</option>
                        <option value="8">HR-V</option>
                    </select>
                </div>
            </div>

            <div id="LinhaDois" class="BlocoPadrao">
                <div id="BotaoPesquisar" class="BlocoCampos">
                    <input type="submit" class="Botao" id="pesquisar" name="pesquisar" value="Pesquisar Veículo">
                </div>
            </div>
        </div>
        <div id="Resultado">
        </div>
    </form>
    <script src="locadora.js"></script>
</body>

</html>