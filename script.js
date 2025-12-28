function ListarVeiculos() {
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
				document.getElementById("resultado").innerHTML=xmlhttp100.responseText;
			}
		}
		
		xmlhttp100.open("GET", "veiculos_lista.html", true);
		xmlhttp100.send();
		
	}

function AdicionarCliente() {
	var cliente = document.getElementById("nomeCliente");
    alert(cliente.value + " salvo com sucesso!");
}

	function AdicionarVeiculo() {
		var marca = document.getElementById("marcaVeiculo");
		var modelo = document.getElementById("modeloVeiculo");
		var valor = document.getElementById("valor"); 

   	    alert(marca.value + " " + modelo.value + " com diária de R$ " + valor.value + " salvo com sucesso!");

}


