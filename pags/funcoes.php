<?php
session_start();
	$user = $_SESSION['login'];
	if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)):
	  unset($_SESSION['login']);
	  unset($_SESSION['senha']);
	  header('location: index.php');
	  endif;
	date_default_timezone_set("America/Sao_Paulo");
	//Cadastrando Unidade de Produção
	if(isset($_POST['cadastro_unidade'])){
		$cliente = $_POST['cliente_contrato'];
		$unidade = $_POST['nome_unidade'];
		$data = date('Y/m/d');
		$hora = date('H:i:s');
		$usuario = $_SESSION['login'];

		if(empty($cliente) || empty($unidade)){
			echo "<script>alert('Faltou digitar um campo!')</script>";
		}else{
			$sql_unidade = "INSERT INTO `unidade_producao`(`cliente`, `unidade`, `data_cadastro`, `hora_cadastro`, `usuario_cadastro`) VALUES (:cliente, :unidade, :data, :hora, :usuario)";
			$cadastro_unidade = $PDO->prepare($sql_unidade);
			$cadastro_unidade->bindValue(":cliente", $cliente);
			$cadastro_unidade->bindValue(":unidade", $unidade);
			$cadastro_unidade->bindValue(":data", $data);
			$cadastro_unidade->bindValue(":hora", $hora);
			$cadastro_unidade->bindValue(":usuario", $usuario);

			//Verifica se há algum contrato com a mesma numeração.
			$validar_unidade = $PDO->prepare("SELECT * FROM unidade_producao WHERE unidade = ?");
			$validar_unidade->execute(array($unidade));

			if($validar_unidade->rowCount() == 0):
				$cadastro_unidade->execute();
				echo "<script>alert('Cadastro realizado com sucesso.')</script>";
			else:
				echo "<script>alert('Contrato repetido.')</script>";
			endif;
		}
	}
	//Cadastrando Fornecedor
	if(isset($_POST['cadastro_fornecedor'])){
		$cnpj = $_POST['cnpj_fornecedor'];
		$social = $_POST['razao_fornecedor'];
		$fantasia = $_POST['fantasia_fornecedor'];
		if(empty($_POST['tipo_fornecedor'])){
			$tipo = "0";
		}else{
			$tipo = $_POST['tipo_fornecedor'];
		};
		$estadual = $_POST['inscricao_estadual'];
		$endereco = $_POST['endereco_fornecedor'];
		$telefone1 = $_POST['telefone1_fornecedor'];
		$telefone2 = $_POST['telefone2_fornecedor'];
		$telefone3 = $_POST['telefone3_fornecedor'];
		$email = $_POST['email_fornecedor'];
		$contato1 = $_POST['contato1_fornecedor'];
		$contato2 = $_POST['contato2_fornecedor'];
		$contato3 = $_POST['contato3_fornecedor'];
		$data = date('Y/m/d');
		$hora = date('H:i:s');
		$usuario = $_SESSION['login'];

		if(empty($cnpj) || empty($social) || empty($fantasia) || empty($tipo) || empty($estadual) || empty($endereco) || empty($telefone1) || empty($email) || empty($contato1) || $tipo == "0"){
			echo "<script>alert('Faltou digitar um campo!')</script>";
		}else{
			$sql_fornecedor = "INSERT INTO `fornecedor`(`tipo_fornecedor`, `razao_social`, `nome_fantasia`, `cnpj_fornecedor`, `inscricao_estadual`, `endereco_fornecedor`, `telefone1_fornecedor`, `telefone2_fornecedor`, `telefone3_fornecedor`, `email_fornecedor`, `contato1_fornecedor`, `contato2_fornecedor`, `contato3_fornecedor`, `data_cadastro`, `hora_cadastro`, `usuario_cadastro`) VALUES (:tipo, :social, :fantasia, :cnpj, :estadual, :endereco, :telefone1, :telefone2, :telefone3, :email, :contato1, :contato2, :contato3, :data, :hora, :user)";
			$cadastro_fornecedor = $PDO->prepare($sql_fornecedor);
			$cadastro_fornecedor->bindValue(":tipo", $tipo);
			$cadastro_fornecedor->bindValue(":social", $social);
			$cadastro_fornecedor->bindValue(":fantasia", $fantasia);
			$cadastro_fornecedor->bindValue(":cnpj", $cnpj);
			$cadastro_fornecedor->bindValue(":estadual", $estadual);
			$cadastro_fornecedor->bindValue(":endereco", $endereco);
			$cadastro_fornecedor->bindValue(":telefone1", $telefone1);
			$cadastro_fornecedor->bindValue(":telefone2", $telefone2);
			$cadastro_fornecedor->bindValue(":telefone3", $telefone3);
			$cadastro_fornecedor->bindValue(":email", $email);
			$cadastro_fornecedor->bindValue(":contato1", $contato1);
			$cadastro_fornecedor->bindValue(":contato2", $contato2);
			$cadastro_fornecedor->bindValue(":contato3", $contato3);
			$cadastro_fornecedor->bindValue(":data", $data);
			$cadastro_fornecedor->bindValue(":hora", $hora);
			$cadastro_fornecedor->bindValue(":user", $usuario);

			//Verificando se existe este fornecedor cadastrado
			$validar_fornecedor = $PDO->prepare("SELECT * FROM fornecedor WHERE cnpj_fornecedor = ?");
			$validar_fornecedor->execute(array($cnpj));

			if($validar_fornecedor->rowCount() == 0):
				$cadastro_fornecedor->execute();
				echo "<script>alert('Cadastro realizado com sucesso.')</script>";
			else:
				echo "<script>alert('Fornecedor repetido.')</script>";
			endif;
		}
	}
	//Cadastrando Produto
	if(isset($_POST['cadastro_produto'])){
		$descricao = $_POST['descricao_produto'];

		if(empty($_POST['fornecedor_produto'])){
			$fornecedor = "0";
		}else{
			$fornecedor = $_POST['fornecedor_produto'];
		}

		$unidade_medida = $_POST['unidade_medida_produto'];
		$preco_unitario = str_replace(".", "", str_replace("R$", "", $_POST['preco_produto']));
		$preco_produto = str_replace(",", ".", $preco_unitario);
		$pergunta_combustivel = $_POST['pergunta_combustivel'];
		$data = date('Y/m/d');
		$hora = date('H:i:s');
		$usuario = $_SESSION['login'];

		if(empty($descricao) || empty($fornecedor) || empty($unidade_medida) || empty($preco_produto) || $fornecedor == "0" || $preco_produto == "0.00"){
			echo "<script>alert('Faltou digitar um campo!')</script>";
		}else{
			$sql_produto = "INSERT INTO `produto`(`fornecedor`, `descricao`, `unidade_medida`, `preco_unitario`, `pergunta_combustivel`, `data_cadastro`, `hora_cadastro`, `usuario_cadastro`) VALUES (:fornecedor, :descricao, :unidade_medida, :preco_unitario, :pergunta_combustivel, :data, :hora, :user)";
			$cadastro_produto = $PDO->prepare($sql_produto);
			$cadastro_produto->bindValue(":fornecedor", $fornecedor);
			$cadastro_produto->bindValue(":descricao", $descricao);
			$cadastro_produto->bindValue(":unidade_medida", $unidade_medida);
			$cadastro_produto->bindValue(":preco_unitario", $preco_produto);
			$cadastro_produto->bindValue(":pergunta_combustivel", $pergunta_combustivel);
			$cadastro_produto->bindValue(":data", $data);
			$cadastro_produto->bindValue(":hora", $hora);
			$cadastro_produto->bindValue(":user", $usuario);

			//Verificando se existe este produto com o mesmo fornecedor cadastrado
			$sql_validar_produto = "SELECT * FROM `produto` WHERE `fornecedor` = ? AND `descricao` = ?";
			$validar_produto = $PDO->prepare($sql_validar_produto);
			$validar_produto->execute(array($fornecedor, $descricao));
			if($validar_produto->rowCount() == 0):
				$cadastro_produto->execute();
				echo "<script>alert('Cadastro realizado com sucesso.')</script>";
			else:
				echo "<script>alert('Produto repetido do mesmo fornecedor.')</script>";
			endif;
		}
	}
	//Cadastrando Motorista para abastecimento
	if(isset($_POST['cadastro_motorista'])){
		$nome = $_POST['nome_motorista'];
		$cnh = $_POST['cnh_motorista'];
		$categoria = $_POST['categoria_motorista'];
		$validade = $_POST['validade_motorista'];
		$idade = $_POST['idade_motorista'];
		$data = date('Y/m/d');
		$hora = date('H:i:s');
		$usuario = $_SESSION['login'];

		if(empty($nome) || empty($cnh) || empty($categoria) || empty($validade) || empty($idade)){
			echo "<script>alert('Faltou digitar um campo!')</script>";
		}else{
			$sql_motorista = "INSERT INTO `motorista`(`nome_motorista`, `numero_cnh`, `categoria_cnh`, `validade_cnh`, `idade`, `data_cadastro`, `hora_cadastro`, `usuario_cadastro`) VALUES (:nome, :cnh, :categoria, :validade, :idade, :data, :hora, :user)";
			$cadastro_motorista = $PDO->prepare($sql_motorista);
			$cadastro_motorista->bindValue(":nome", $nome);
			$cadastro_motorista->bindValue(":cnh", $cnh);
			$cadastro_motorista->bindValue(":categoria", $categoria);
			$cadastro_motorista->bindValue(":validade", $validade);
			$cadastro_motorista->bindValue(":idade", $idade);
			$cadastro_motorista->bindValue(":data", $data);
			$cadastro_motorista->bindValue(":hora", $hora);
			$cadastro_motorista->bindValue(":user", $usuario);

			//Verificando se existe o motorista já cadastrado
			$validar_motorista = $PDO->prepare("SELECT * FROM motorista WHERE numero_cnh = ?");
			$validar_motorista->execute(array($cnh));

			if($validar_motorista->rowCount() == 0):
				$cadastro_motorista->execute();
				echo "<script>alert('Cadastro realizado com sucesso.')</script>";
			else:
				echo "<script>alert('Documento repetido.')</script>";
			endif;
		}
	}
	//Cadastrando Veiculos no sistema
	if(isset($_POST['cadastro_veiculo'])){
		$descricao = $_POST['descricao_veiculo'];
		$placa = $_POST['placa_veiculo'];
		$km = $_POST['km_veiculo'];
		if(empty($_POST['proprietario_veiculo'])){
			$proprietario = "0";
		}else{
			$proprietario = $_POST['proprietario_veiculo'];
		}
		$renavan = $_POST['renavan_veiculo'];
		$consumo = $_POST['consumo_veiculo'];
		$data = date('Y/m/d');
		$hora = date('H:i:s');
		$usuario = $_SESSION['login'];

		if(empty($descricao) || empty($placa) || empty($km) || empty($proprietario) || empty($renavan) || empty($consumo) || $proprietario == "0"){
			echo "<script>alert('Faltou digitar um campo!')</script>";
		}else{
			$sql_veiculo = "INSERT INTO `veiculo`(`descricao_veiculo`, `placa_veiculo`, `km_veiculo`, `proprietario_veiculo`, `renavan_veiculo`, `consumo_veiculo`, `data_cadastro`, `hora_cadastro`, `usuario_cadastro`) VALUES (:descricao, :placa, :km, :proprietario, :renavan, :consumo, :data, :hora, :user)";
			$cadastro_veiculo = $PDO->prepare($sql_veiculo);
			$cadastro_veiculo->bindValue(":descricao", $descricao);
			$cadastro_veiculo->bindValue(":placa", $placa);
			$cadastro_veiculo->bindValue(":km", $km);
			$cadastro_veiculo->bindValue(":proprietario", $proprietario);
			$cadastro_veiculo->bindValue(":renavan", $renavan);
			$cadastro_veiculo->bindValue(":consumo", $consumo);
			$cadastro_veiculo->bindValue(":data", $data);
			$cadastro_veiculo->bindValue(":hora", $hora);
			$cadastro_veiculo->bindValue(":user", $usuario);

			//Verificando se existe o mesmo veiculo cadastrado
			$validar_veiculo = $PDO->prepare("SELECT * FROM veiculo WHERE placa_veiculo = ?");
			$validar_veiculo->execute(array($placa));

			if($validar_veiculo->rowCount() == 0):
				$cadastro_veiculo->execute();
				echo "<script>alert('Cadastro realizado com sucesso.')</script>";
			else:
				echo "<script>alert('Veículo repetido.')</script>";
			endif;
		}
	}
	
	//Registrando compra de produto de fornecedor local
	if(isset($_POST['cadastro_local'])){
		if(empty($_POST['unidade_producao_local'])){
			$unidade = "0";
		}else{
			$unidade = $_POST['unidade_producao_local'];
		};
		$data_compra = $_POST['data_compra_local'];
		if(empty($_POST['fornecedor_local'])){
			$fornecedor = "0";
		}else{
			$fornecedor = $_POST['fornecedor_local'];
		}
		if(empty($_POST['produto_local'])){
			$produto = "0";
		}else{
			$produto = $_POST['produto_local'];
		}
		$quantidade = $_POST['quantidade_local'];
		$valor = $_POST['valor_produto'];
		$total = $quantidade * $valor;
		$total_db = number_format($total, 2);
		if(empty($_POST['motorista_combustivel'])){
			$motorista = "";
		}else{
			$motorista = $_POST['motorista_combustivel'];
		}
		if(empty($_POST['veiculo_combustivel'])){
			$placa = "";
		}else{
			$placa = $_POST['veiculo_combustivel'];
		}
		if(empty($_POST['km_combustivel'])){
			$km = "";
		}else{
			$km = $_POST['km_combustivel'];
		}
		$data = date('Y/m/d');
		$hora = date('H:i:s');
		$usuario = $_SESSION['login'];

		if(empty($unidade) || empty($data_compra) || empty($fornecedor) || empty($produto) || empty($quantidade) || $unidade == "0" || $fornecedor == "0" || $produto == "0"){
			echo "<script>alert('Faltou digitar um campo!')</script>";
		}else{
			$sql_local = "INSERT INTO `fornecimento_local`(`unidade_producao`, `data_compra`, `fornecedor_local`, `produto_local`, `quantidade`, `valor_unitario`, `total_produto`, `motorista_veiculo`, `placa_veiculo`, `km_veiculo`, `data_cadastro`, `hora_cadastro`, `usuario_cadastro`) VALUES (:unidade, :data_compra, :fornecedor, :produto, :quantidade, :valor, :total, :motorista, :placa, :km, :data, :hora, :user)";
			$cadastro_local = $PDO->prepare($sql_local);
			$cadastro_local->bindValue(":unidade", $unidade);
			$cadastro_local->bindValue(":data_compra", $data_compra);
			$cadastro_local->bindValue(":fornecedor", $fornecedor);
			$cadastro_local->bindValue(":produto", $produto);
			$cadastro_local->bindValue(":quantidade", $quantidade);
			$cadastro_local->bindValue(":valor", $valor);
			$cadastro_local->bindValue(":total", $total_db);
			$cadastro_local->bindValue(":motorista", $motorista);
			$cadastro_local->bindValue(":placa", $placa);
			$cadastro_local->bindValue(":km", $km);
			$cadastro_local->bindValue(":data", $data);
			$cadastro_local->bindValue(":hora", $hora);
			$cadastro_local->bindValue(":user", $usuario);

			//validando registro
			$sql_validar_local = "SELECT * FROM `fornecimento_local` WHERE `unidade_producao` = ? AND `data_compra` = ? AND `fornecedor_local` = ? AND `produto_local` = ?";
			$validar_local = $PDO->prepare($sql_validar_local);
			$validar_local->execute(array($unidade, $data_compra, $fornecedor, $produto));

			if($validar_local->rowCount() == 0):
				$cadastro_local->execute();
				echo "<script>alert('Cadastro realizado com sucesso.')</script>";
			else:
				echo "<script>alert('Lançamento repetido.')</script>";
			endif;
		}
	}

	//Lançamento de fornecedor Externo
	/*if(isset($_POST['cadastro_externo'])){
		//Verificando se unidade de produção foi escolhido
		if(empty($_POST['unidade_producao_externo'])){
			$unidade = "0";
		}else{
			$unidade = $_POST['unidade_producao_externo'];
		};

		$nota_fisca = $_POST['nota_fiscal_externo'];
		$data_emissao = $_POST['data_emissao_externo'];
		//Verificando se o fornecedor foi escolhido
		if(empty($_POST['fornecedor_externo'])){
			$fornecedor = "0";
		}else{
			$fornecedor = $_POST['fornecedor_externo'];
		};

		$valor_total = str_replace(".", "", str_replace("R$", "", $_POST['valor_total_externo']));
		$valor_total1 = str_replace(",", ".", $valor_total);
		$forma_pagamento = $_POST['forma_pagamento_externo'];
		$parcelado = $_POST['parcelado'];

		//verificando se a quantidade de parcela foi escolhido
		if(empty($_POST['quantidade_parcela'])){
			$quantidade_parcela = "0";
		}else{
			$quantidade_parcela = $_POST['quantidade_parcela'];
		};

		
		//Criando variavel para as parcelas.

		//Data da primeira parcela
		if(empty($_POST['primeiro_vencimento_externo'])){
			$primeira_parcela = "00/00/0000";
		}else{
			$primeira_parcela = $_POST['primeiro_vencimento_externo'];
		};

		//Valor da primeira Parcela
		$valor_primeira = str_replace(".", "", str_replace("R$", "",$_POST['valor_primeira_externo']));
		$valor_primeira1 = str_replace(",", ".", $valor_primeira);

		//Data da Segunda Parcela
		if(empty($_POST['segundo_vencimento_externo'])){
			$segunda_parcela = "00/00/0000";
		}else{
			$segunda_parcela = $_POST['segundo_vencimento_externo'];
		};
		
		//Valor da Segunda Parcela
		$valor_segunda = str_replace(".", "", str_replace("R$", "", $_POST['valor_segundo_externo']));
		$valor_segunda1 = str_replace(",", ".", $valor_segunda);

		//Data da terceira Parcela
		if(empty($_POST['terceiro_vencimento_externo'])){
			$terceira_parcela = "00/00/0000";
		}else{
			$terceira_parcela = $_POST['terceiro_vencimento_externo'];
		};
		
		//Valor da Terceira Parcela
		$valor_terceiro = str_replace(".", "", str_replace("R$", "", $_POST['valor_terceiro_externo']));
		$valor_terceiro1 = str_replace(",", ".", $valor_terceiro);
		
		//Data da quarta parcela
		if(empty($_POST['quarto_vencimento_externo'])){
			$quarta_parcela = "00/00/0000";
		}else{
			$quarta_parcela = $_POST['quarto_vencimento_externo'];
		};
		
		//Valor da quarta parcela
		$valor_quarta = str_replace(".", "", str_replace("R$", "", $_POST['valor_quarto_externo']));
		$valor_quarta1 = str_replace(",", ".", $valor_quarta);
		
		//Data da quinta parcela
		if(empty($_POST['quinto_vencimento_externo'])){
			$quinta_parcela = "00/00/0000";
		}else{
			$quinta_parcela = $_POST['quinto_vencimento_externo'];
		};
		
		//Valor da quinta parcela
		$valor_quinta = str_replace(".", "", str_replace("R$", "", $_POST['valor_quinto_externo']));
		$valor_quinta1 = str_replace(",", ".", $valor_quinta);
		
		//Data da sexta parcela
		if(empty($_POST['sexto_vencimento_externo'])){
			$sexta_parcela = "00/00/0000";
		}else{
			$sexta_parcela = $_POST['sexto_vencimento_externo'];
		};
		
		//Valor da sexta parcela
		$valor_sexta = str_replace(".", "", str_replace("R$", "", $_POST['valor_sexto_externo']));
		$valor_sexta1 = str_replace(",", ".", $valor_sexta);

		$data = date('Y/m/d');
		$hora = date('H:i:s');
		$usuario = $_SESSION['login'];


		if(empty($nota_fisca) || empty($data_emissao) || empty($valor_total) || $_POST['valor_total_externo'] == "R$0,00" || empty($forma_pagamento) || empty($parcelado) || $unidade == "0" || $fornecedor == "0"){
			echo "<script>alert('Faltou digitar um campo!')</script>";
		}else{
			$sql_externo = "INSERT INTO `fornecimento_externo`(`unidade_producao`, `nota_fisca`, `data_emissao`, `fornecedor_externo`, `valor_total`, `forma_pagamento`, `parcelado`, `quantidade_parcela`, `primeiro_vencimento`, `valor_primeiro`, `segundo_vencimento`, `valor_segundo`, `terceiro_vencimento`, `valor_terceiro`, `quarto_vencimento`, `valor_quarto`, `quinto_vencimento`, `valor_quinto`, `sexto_vencimento`, `valor_sexto`, `data_cadastro`, `hora_cadastro`, `usuario_cadastro`) VALUES (:unidade, :nota_fisca, :data_emissao, :fornecedor, :valor_total, :forma_pagamento, :parcelado, :quantidade_parcela, :primeira_parcela, :valor_primeira, :segunda_parcela, :valor_segunda, :terceira_parcela, :valor_terceiro, :quarta_parcela, :valor_quarta, :quinta_parcela, :valor_quinta, :sexta_parcela, :valor_sexta, :data, :hora, :user)";
			$cadastro_externo = $PDO->prepare($sql_externo);
			$cadastro_externo->bindValue(":unidade", $unidade);
			$cadastro_externo->bindValue(":nota_fisca", $nota_fisca);
			$cadastro_externo->bindValue(":data_emissao", $data_emissao);
			$cadastro_externo->bindValue(":fornecedor", $fornecedor);
			$cadastro_externo->bindValue(":valor_total", $valor_total1);
			$cadastro_externo->bindValue(":forma_pagamento", $forma_pagamento);
			$cadastro_externo->bindValue(":parcelado", $parcelado);
			$cadastro_externo->bindValue(":quantidade_parcela", $quantidade_parcela);
			$cadastro_externo->bindValue(":primeira_parcela", $primeira_parcela);
			$cadastro_externo->bindValue(":valor_primeira", $valor_primeira1);
			$cadastro_externo->bindValue(":segunda_parcela", $segunda_parcela);
			$cadastro_externo->bindValue(":valor_segunda", $valor_segunda1);
			$cadastro_externo->bindValue(":terceira_parcela", $terceira_parcela);
			$cadastro_externo->bindValue(":valor_terceiro", $valor_terceiro1);
			$cadastro_externo->bindValue(":quarta_parcela", $quarta_parcela);
			$cadastro_externo->bindValue(":valor_quarta", $valor_quarta1);
			$cadastro_externo->bindValue(":quinta_parcela", $quinta_parcela);
			$cadastro_externo->bindValue(":valor_quinta", $valor_quinta1);
			$cadastro_externo->bindValue(":sexta_parcela", $sexta_parcela);
			$cadastro_externo->bindValue(":valor_sexta", $valor_sexta1);
			$cadastro_externo->bindValue(":data", $data);
			$cadastro_externo->bindValue(":hora", $hora);
			$cadastro_externo->bindValue(":user", $usuario);

			//Validando nota fiscal digitanda
			$sql_validar_externo = "SELECT * FROM `fornecimento_externo` WHERE `nota_fisca` = ?";
			$validar_externo = $PDO->prepare($sql_validar_externo);
			$validar_externo->execute(array($nota_fisca));

			if($validar_externo->rowCount() == 0):
				$cadastro_externo->execute();
				echo "<script>alert('Cadastro realizado com sucesso.')</script>";
			else:
				echo "<script>alert('Lançamento repetido.')</script>";
			endif;
		};
	};	*/
	
	//Selecionando Fornecedor para listar na pagina de cadastro do produto
	$sql_selecionar_fornecedor = "SELECT * FROM fornecedor";
	$exibir_fornecedor = $PDO->prepare($sql_selecionar_fornecedor);
	$exibir_fornecedor->execute();
	$fetch_fornecedor = $exibir_fornecedor->fetch(PDO::FETCH_ASSOC);

	//Selecionando Fornecedor local para listar na pagina de registro.
	$sql_selecionar_fornecedor_local = "SELECT * FROM fornecedor WHERE tipo_fornecedor = 'Local'";
	$exibir_fornecedor_local = $PDO->prepare($sql_selecionar_fornecedor_local);
	$exibir_fornecedor_local->execute();
	$fetch_fornecedor_local = $exibir_fornecedor_local->fetch(PDO::FETCH_ASSOC);

	//Selecionando Fornecedor Externo para listar na pagina de registro.
	$sql_selecionar_fornecedor_externo = "SELECT * FROM fornecedor WHERE tipo_fornecedor = 'Externo'";
	$exibir_fornecedor_externo = $PDO->prepare($sql_selecionar_fornecedor_externo);
	$exibir_fornecedor_externo->execute();
	$fetch_fornecedor_externo = $exibir_fornecedor_externo->fetch(PDO::FETCH_ASSOC);

	//Selecionando as unidades de produção no banco de dados
	$sql_selecionar_unidade = "SELECT * FROM unidade_producao";
	$exibir_unidade = $PDO->prepare($sql_selecionar_unidade);
	$exibir_unidade->execute();
	$fetch_unidade = $exibir_unidade->fetch(PDO::FETCH_ASSOC);

	//Selecionando o produto no bando de dados
	$sql_selecionar_produto = "SELECT * FROM produto";
	$exibir_produto = $PDO->prepare($sql_selecionar_produto);
	$exibir_produto->execute();
	$fetch_produto = $exibir_produto->fetch(PDO::FETCH_ASSOC);
?>