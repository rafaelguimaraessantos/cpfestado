<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Exercício cpf</title>
</head>
<body>
	<form method="post">

		<input id="cpf" type="text" name="cpf" value="<?php $_POST['cpf']?>"  maxlength="14" >
		<button type="submit" value="submit">enviar cpf</button>
		
	</form>
	<script type="text/javascript">
		var cpf = document.querySelector("#cpf");

cpf.addEventListener("blur", function(){
   if(cpf.value) cpf.value = cpf.value.match(/.{1,3}/g).join(".").replace(/\.(?=[^.]*$)/,"-");
});
	</script>
</body>
</html>
<?php
	function limpaCPF_CNPJ($valor){
		$valor = trim($valor);
		$valor = str_replace(".", "", $valor);
		$valor = str_replace(",", "", $valor);
		$valor = str_replace("-", "", $valor);
		$valor = str_replace("/", "", $valor);
		return $valor;
	}
	//deixando apenas os números do cpf
	$_POST['cpf'] = limpaCPF_CNPJ($_POST['cpf']);
	//transformado cpf recebido do input em array
	$_POST['cpf'] = array($_POST['cpf']);

	//iterando para pegar a posição e fazer a comparação 
	foreach ($_POST['cpf'] as $key => $value) {
		// var_dump($value[8]);
	}

	//array com as opções das cidades
	$array = array(
    "Distrito Federal, Goiás, Mato Grosso do Sul e Tocantins"  => 1,
     "Pará, Amazonas, Acre, Amapá, Rondônia e Roraima" => 2,
     "Ceará, Maranhão e Piauí"  => 3,
     "Pernambuco, Rio Grande do Norte, Paraíba e Alagoas"  => 4,
     "Bahia e Sergipe"  => 5,
     "Minas Gerais"  => 6,
     "Rio de Janeiro, Espírito Santo"  => 7, 
     "São Paulo"  => 8,
     "Paraná e Santa Catarina"  => 9,
     "Rio Grande do Sul"  => 0,
    );

	//aqui faz a comparação no array caso ache ele retorna o estado que o cpf foi emitido
	$result = array_search($value[8], $array);
	
	if($value != ""){		  
		echo "O seu CPF foi emitido no estado: ".($result) ; 
		echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=index.php'>";
   }    
   
    
    
	
	
