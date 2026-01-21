function CarregarPagina(pagina) {
	
	 if (window.XMLHttpRequest){
			xmlhttp100=new XMLHttpRequest();
		}
		else
		{
			xmlhttp100=new ActiveXObject ("Microsoft.XMLHTTP");
		}

		xmlhttp100.onreadystatechange=function()
		{ 
			if (xmlhttp100.readyState==4 && xmlhttp100.status==200){
				document.getElementById("Principal").innerHTML=xmlhttp100.responseText;
				

			}
		}
		
		xmlhttp100.open("GET", pagina, true);
		xmlhttp100.send();
		
	}


function ListarVeiculos() {
	if (window.XMLHttpRequest) {
		xmlhttp101 = new XMLHttpRequest();
	}
	else {
		xmlhttp101 = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp101.onreadystatechange = function () {
		if (xmlhttp101.readyState == 4 && xmlhttp101.status == 200) {
			document.getElementById("resultado").innerHTML = xmlhttp101.responseText;
		}
	}

	xmlhttp101.open("GET", "tabelas.php", true);
	xmlhttp101.send();

}


function AdicionarCliente() {
  // 1. Captura os dados pelos IDs corretos que estão no PHP
  var nome = document.getElementById("nome").value;
  var cpf = document.getElementById("cpf").value;
  var situacao = document.getElementById("situacao").value;

  // 2. Cria a conexão AJAX
  var xmlhttp = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");

  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      // 3. Atualiza a div Principal com a resposta do PHP
      document.getElementById("Principal").innerHTML = xmlhttp.responseText;
      alert("Cliente processado com sucesso!");
    }
  };

  // 4. Configura o envio
  xmlhttp.open("POST", "clientes_lista.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // 5. Envia os parâmetros
  var params = "nome=" + encodeURIComponent(nome) + 
               "&cpf=" + encodeURIComponent(cpf) + 
               "&situacao=" + encodeURIComponent(situacao) + 
               "&cadastrar=1";
  xmlhttp.send(params);
}




function AdicionarVeiculo() {
	var marca = document.getElementById("marcaVeiculo");
	var modelo = document.getElementById("modeloVeiculo");
	var valor = document.getElementById("valor");

	alert(marca.value + " " + modelo.value + " com diária de R$ " + valor.value + ", salvo com sucesso!");

}