<?php
	include('include/topo.php');
	include('include/corpo.php');
	if(isset($_POST['cadastro_externo'])){
		//Verificando se a unidade de produção foi selecionada.
		if(empty($_POST['unidade_producao_externo'])){
			echo "<script>alert('Faltou escolher a unidade de produção.')</script>";
		}else{
			$unidade = $_POST['unidade_producao_externo'];
		};

		//Verificando se o numero da nota fiscal foi preenchido.
		if(empty($_POST['nota_fiscal_externo'])){
			echo "<script>alert('Faltou preencher o número da nota fiscal.')</script>";
		}else{
			$nota_fiscal = $_POST['nota_fiscal_externo'];
		};

		//Verificando se a data de emissão foi preenchido.
		if(empty($_POST['data_emissao_externo'])){
			echo "<script>alert('Faltou preencher a data de emissão.')</script>";
		}else{
			$data_emissao = $_POST['data_emissao_externo'];
		};

		//Verificando se o fornecedor foi escolhido.
		if(empty($_POST['fornecedor_externo'])){
			echo "<script>alert('Faltou escolher o fornecedor.')</script>";
		}else{
			$fornecedor_externo = $_POST['fornecedor_externo'];
		};

		//Verificando se o valor total foi preenchido.
		if(empty($_POST['valor_total_externo']) || $_POST['valor_total_externo'] == "R$0,00"){
			echo "<script>alert('Faltou preencher o valor total.')</script>";
		}else{
			$valor_total = $_POST['valor_total_externo'];
		};

		//Verificando se a forma de pagamento foi escolhido.
		if(empty($_POST['forma_pagamento'])){
			echo "<script>alert('Faltou escolher a forma de pagamento.')</script>";
		}else{
			$forma_pagamento = $_POST['forma_pagamento'];
		};

		//Verificando se a forma de pagamento foi antecipada.
		if($forma_pagamento == "antecipado"){

			//Verificando se a forma antecipado foi escolhido (Deposito, Boleto ou cheque)
			if(empty($_POST['forma_antecipado'])){
				echo "<script>alert('Faltou escolher a forma de pagamento antecipado.')</script>";
			}else{
				$forma_antecipado = $_POST['forma_antecipado'];
			};

			//Verificando se a data foi preenchida de pagamento.
			if(empty($_POST['data_pagamento_antecipado'])){
				echo "<script>alert('Faltou preencher a data de pagamento antecipado.')</script>";
			}else{
				$data_pagamento_antecipado = $_POST['data_pagamento_antecipado'];
			};

		//Verificando se a forma de pagamento foi à vista.
		}elseif($forma_pagamento == "avista"){
			if(empty($_POST['forma_avista'])){
				echo "<script>alert('Faltou escolher a forma de pagamento à vista.')</script>";
			}else{
				$forma_avista = $_POST['forma_avista'];
			};
			if(empty($_POST['data_pagamento_avista'])){
				echo "<script>alert('Faltou preencher a data de pagamento à vista.')</script>";
			}else{
				$data_pagamento_avista = $_POST['data_pagamento_avista'];
			};
		}elseif($forma_pagamento == "aprazo"){
			if(empty($_POST['quantidade_parcela'])){
				echo "<script>alert('Faltou escolher a quantidade de parcela.')</script>";
			}else{
				$quantidade_parcela = $_POST['quantidade_parcela'];
			};
			if($quantidade_parcela == "1"){
				if(empty($_POST['data_parcela_unica'])){
					echo "<script>alert('Faltou preencher a data da parcela unica.')</script>";
				}else{
					$data_parcela_unica = $_POST['data_parcela_unica'];
				};
				if(empty($_POST['parcela_unica_externa']) || $_POST['parcela_unica_externa'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da parcela unica.')</script>";
				}else{
					$parcela_unica_externa = $_POST['parcela_unica_externa'];
				};
			}elseif($quantidade_parcela == "2"){
				if(empty($_POST['primeiro_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 1ª parcela.')</script>";
				}else{
					$primeiro_vencimento_externo = $_POST['primeiro_vencimento_externo'];
				};
				if(empty($_POST['valor_primeira_externo']) || $_POST['valor_primeira_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 1ª parcela.')</script>";
				}else{
					$valor_primeira_externo = $_POST['valor_primeira_externo'];
				};
				if(empty($_POST['segundo_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 2ª parcela.')</script>";
				}else{
					$segundo_vencimento_externo = $_POST['segundo_vencimento_externo'];
				};
				if(empty($_POST['valor_segundo_externo']) || $_POST['valor_segundo_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 2ª parcela.')</script>";
				}else{
					$valor_segundo_externo = $_POST['valor_segundo_externo'];
				};
			}elseif($quantidade_parcela == "3"){
				if(empty($_POST['primeiro_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 1ª parcela.')</script>";
				}else{
					$primeiro_vencimento_externo = $_POST['primeiro_vencimento_externo'];
				};
				if(empty($_POST['valor_primeira_externo']) || $_POST['valor_primeira_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 1ª parcela.')</script>";
				}else{
					$valor_primeira_externo = $_POST['valor_primeira_externo'];
				};
				if(empty($_POST['segundo_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 2ª parcela.')</script>";
				}else{
					$segundo_vencimento_externo = $_POST['segundo_vencimento_externo'];
				};
				if(empty($_POST['valor_segundo_externo']) || $_POST['valor_segundo_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 2ª parcela.')</script>";
				}else{
					$valor_segundo_externo = $_POST['valor_segundo_externo'];
				};
				if(empty($_POST['terceiro_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 3ª parcela.')</script>";
				}else{
					$terceiro_vencimento_externo = $_POST['terceiro_vencimento_externo'];
				};
				if(empty($_POST['valor_terceiro_externo']) || $_POST['valor_terceiro_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 3ª parcela.')</script>";
				}else{
					$valor_terceiro_externo = $_POST['valor_terceiro_externo'];
				};
			}elseif($quantidade_parcela == "4"){
				if(empty($_POST['primeiro_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 1ª parcela.')</script>";
				}else{
					$primeiro_vencimento_externo = $_POST['primeiro_vencimento_externo'];
				};
				if(empty($_POST['valor_primeira_externo']) || $_POST['valor_primeira_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 1ª parcela.')</script>";
				}else{
					$valor_primeira_externo = $_POST['valor_primeira_externo'];
				};
				if(empty($_POST['segundo_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 2ª parcela.')</script>";
				}else{
					$segundo_vencimento_externo = $_POST['segundo_vencimento_externo'];
				};
				if(empty($_POST['valor_segundo_externo']) || $_POST['valor_segundo_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 2ª parcela.')</script>";
				}else{
					$valor_segundo_externo = $_POST['valor_segundo_externo'];
				};
				if(empty($_POST['terceiro_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 3ª parcela.')</script>";
				}else{
					$terceiro_vencimento_externo = $_POST['terceiro_vencimento_externo'];
				};
				if(empty($_POST['valor_terceiro_externo']) || $_POST['valor_terceiro_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 3ª parcela.')</script>";
				}else{
					$valor_terceiro_externo = $_POST['valor_terceiro_externo'];
				};
				if(empty($_POST['quarto_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 4ª parcela.')</script>";
				}else{
					$quarto_vencimento_externo = $_POST['quarto_vencimento_externo'];
				};
				if(empty($_POST['valor_quarto_externo']) || $_POST['valor_quarto_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 4ª parcela.')</script>";
				}else{
					$valor_quarto_externo = $_POST['valor_quarto_externo'];
				};
			}elseif($quantidade_parcela == "5"){
				if(empty($_POST['primeiro_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 1ª parcela.')</script>";
				}else{
					$primeiro_vencimento_externo = $_POST['primeiro_vencimento_externo'];
				};
				if(empty($_POST['valor_primeira_externo']) || $_POST['valor_primeira_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 1ª parcela.')</script>";
				}else{
					$valor_primeira_externo = $_POST['valor_primeira_externo'];
				};
				if(empty($_POST['segundo_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 2ª parcela.')</script>";
				}else{
					$segundo_vencimento_externo = $_POST['segundo_vencimento_externo'];
				};
				if(empty($_POST['valor_segundo_externo']) || $_POST['valor_segundo_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 2ª parcela.')</script>";
				}else{
					$valor_segundo_externo = $_POST['valor_segundo_externo'];
				};
				if(empty($_POST['terceiro_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 3ª parcela.')</script>";
				}else{
					$terceiro_vencimento_externo = $_POST['terceiro_vencimento_externo'];
				};
				if(empty($_POST['valor_terceiro_externo']) || $_POST['valor_terceiro_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 3ª parcela.')</script>";
				}else{
					$valor_terceiro_externo = $_POST['valor_terceiro_externo'];
				};
				if(empty($_POST['quarto_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 4ª parcela.')</script>";
				}else{
					$quarto_vencimento_externo = $_POST['quarto_vencimento_externo'];
				};
				if(empty($_POST['valor_quarto_externo']) || $_POST['valor_quarto_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 4ª parcela.')</script>";
				}else{
					$valor_quarto_externo = $_POST['valor_quarto_externo'];
				};
				if(empty($_POST['quinto_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 5ª parcela.')</script>";
				}else{
					$quinto_vencimento_externo = $_POST['quinto_vencimento_externo'];
				};
				if(empty($_POST['valor_quinto_externo']) || $_POST['valor_quinto_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 5ª parcela.')</script>";
				}else{
					$valor_quinto_externo = $_POST['valor_quinto_externo'];
				};
			}elseif($quantidade_parcela == "6"){
				if(empty($_POST['primeiro_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 1ª parcela.')</script>";
				}else{
					$primeiro_vencimento_externo = $_POST['primeiro_vencimento_externo'];
				};
				if(empty($_POST['valor_primeira_externo']) || $_POST['valor_primeira_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 1ª parcela.')</script>";
				}else{
					$valor_primeira_externo = $_POST['valor_primeira_externo'];
				};
				if(empty($_POST['segundo_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 2ª parcela.')</script>";
				}else{
					$segundo_vencimento_externo = $_POST['segundo_vencimento_externo'];
				};
				if(empty($_POST['valor_segundo_externo']) || $_POST['valor_segundo_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 2ª parcela.')</script>";
				}else{
					$valor_segundo_externo = $_POST['valor_segundo_externo'];
				};
				if(empty($_POST['terceiro_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 3ª parcela.')</script>";
				}else{
					$terceiro_vencimento_externo = $_POST['terceiro_vencimento_externo'];
				};
				if(empty($_POST['valor_terceiro_externo']) || $_POST['valor_terceiro_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 3ª parcela.')</script>";
				}else{
					$valor_terceiro_externo = $_POST['valor_terceiro_externo'];
				};
				if(empty($_POST['quarto_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 4ª parcela.')</script>";
				}else{
					$quarto_vencimento_externo = $_POST['quarto_vencimento_externo'];
				};
				if(empty($_POST['valor_quarto_externo']) || $_POST['valor_quarto_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 4ª parcela.')</script>";
				}else{
					$valor_quarto_externo = $_POST['valor_quarto_externo'];
				};
				if(empty($_POST['quinto_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 5ª parcela.')</script>";
				}else{
					$quinto_vencimento_externo = $_POST['quinto_vencimento_externo'];
				};
				if(empty($_POST['valor_quinto_externo']) || $_POST['valor_quinto_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 5ª parcela.')</script>";
				}else{
					$valor_quinto_externo = $_POST['valor_quinto_externo'];
				};
				if(empty($_POST['sexto_vencimento_externo'])){
					echo "<script>alert('Faltou preencher a data da 6ª parcela.')</script>";
				}else{
					$sexto_vencimento_externo = $_POST['sexto_vencimento_externo'];
				};
				if(empty($_POST['valor_sexto_externo']) || $_POST['valor_sexto_externo'] == "R$0,00"){
					echo "<script>alert('Faltou preencher o valor da 6ª parcela.')</script>";
				}else{
					$valor_sexto_externo = $_POST['valor_sexto_externo'];
				};
			};
		}else{
			echo "<script>alert('Faltou escolher a forma de pagamento.')</script>";
		};

		$data = date('Y/m/d');
		$hora = date('H:i:s');
		$usuario = $_SESSION['login'];
	};
?>
<div class="conteudo">
	<h2>Lançamento Fornecedor Externo</h2>
	<form method="post" class="form_producao">
		<div class="inputs">
		<!-- Buscando a unidade de produção -->
			<div class="label_input">
				<label>Unidade de Produção</label>
				<select name="unidade_producao_externo">
					<option selected disabled>Selecione --></option>
					<?php
						if($fetch_unidade > 0):
							do{
					?>
						<option><?=$fetch_unidade['unidade'];?></option>
					<?php
							}while($fetch_unidade = $exibir_unidade->fetch(PDO::FETCH_ASSOC));
						endif;
					?>
				</select>
			</div>
		<!-- Número da Nota Fiscal a ser lançada -->
			<div class="label_input">
				<label>Nota Fiscal</label>
				<input type="number" name="nota_fiscal_externo">
			</div>
		<!-- Data de Emissão da Nota fiscal -->
			<div class="label_input">
				<label>Data de Emissão</label>
				<input type="date" name="data_emissao_externo">
			</div>
		<!-- Fornecedor da Nota Fiscal -->
			<div class="label_input">
				<label>Fornecedor</label>
				<select name="fornecedor_externo">
				<option selected disabled>Selecione --></option>
				<?php
				if($fetch_fornecedor_externo > 0):
				do{
				?>
				<option><?=$fetch_fornecedor_externo['nome_fantasia'];?></option>
				<?php
				}while($fetch_fornecedor_externo = $exibir_fornecedor_externo->fetch(PDO::FETCH_ASSOC));
				endif;
				?>
				</select>
			</div>
		<!-- Valor total da nota fiscal -->
			<div class="label_input">
				<label>Valor Total</label>
				<input type="text" name="valor_total_externo" id="money" value="R$0,00">
			</div>
		<!-- Forma de Pagamento -->
			<div class="label_input" style="height: 70px;">
				<label>Forma de Pagamento</label>
				<div class="input_radio">
						Antecipado <input type="radio" name="forma_pagamento" id="antecipado" value="antecipado"><br>
						À Vista <input type="radio" name="forma_pagamento" id="avista" value="avista"><br>
						A Prazo <input type="radio" name="forma_pagamento" id="aprazo" value="aprazo">
				</div>
			</div>
		<!-- Div com todas as opçoes de antecipado -->
			<div class="antecipado">
				<div class="label_input" style="height: 70px;">
					<label>Antecipado:</label>
					<div class="input_radio">
							Deposito em CC <input type="radio" name="forma_antecipado" value="Deposito"><br>
							Boleto Bancario <input type="radio" name="forma_antecipado" value="Boleto"><br>
							Cheque <input type="radio" name="forma_antecipado" value="Cheque">
					</div>
				</div>
				<div class="label_input" name="data_pagamento_antecipado" id="data_pagamento_antecipado" style="display: none;">
					<label>Data de Pagamento</label>
					<input type="date" name="">
				</div>
			</div>
		<!-- Div com todas as opçoes de antecipado -->
			<div class="avista">
				<div class="label_input" style="height: 70px;">
					<label>À Vista:</label>
					<div class="input_radio">
							Deposito em CC <input type="radio" name="forma_avista" value="Deposito"><br>
							Boleto Bancario <input type="radio" name="forma_avista" value="Boleto"><br>
							Cheque <input type="radio" name="forma_avista" value="Cheque">
					</div>
				</div>
				<div class="label_input" name="data_pagamento_avista" id="data_pagamento_avista" style="display: none;">
					<label>Data de Pagamento</label>
					<input type="date" name="">
				</div>
			</div>
		<!-- Div com todas as opçoes de A Prazo -->
			<div class="aprazo">
			<!-- Quantidade de parcelas -->
					<div class="label_input" id="opcoes_none" style="height: 80px;">
						<label>Quantidade de Parcela</label>
						<div class="input_radio">
							<div>
							1 <input type="radio" name="quantidade_parcela" id="um" value="1">
							</div>
							<div>
							2 <input type="radio" name="quantidade_parcela" id="dois" value="2">
							</div>
							<div>
							3 <input type="radio" name="quantidade_parcela" id="tres" value="3">
							</div>
							<div>
							4 <input type="radio" name="quantidade_parcela" id="quatro" value="4">
							</div>
							<div>
							5 <input type="radio" name="quantidade_parcela" id="cinco" value="5">
							</div>
							<div>
							6 <input type="radio" name="quantidade_parcela" id="seis" value="6">
							</div>
						</div>
					</div>
				<!-- Div para caso seja somente 1 parcela -->
					<div id="parcela_unica">
					<!-- Data da primeira Parcela -->
						<div class="label_input">
							<label>Data da Parcela Única</label>
							<input type="date" name="data_parcela_unica">
						</div>
					<!-- Valor da 1ª Parcela -->
						<div class="label_input">
							<label>Valor da Parcela</label>
							<input type="text" name="parcela_unica_externa" id="money" value="R$0,00">
						</div>
					</div>
					<!-- Div para puxar caso selecionado 1 parcela -->
					<div id="primeira_parcela">
					<!-- Data da primeira Parcela -->
						<div class="label_input">
							<label>Data do 1º Vencimento</label>
							<input type="date" name="primeiro_vencimento_externo">
						</div>
						<!-- Valor da 1ª Parcela -->
						<div class="label_input">
							<label>Valor do 1º Vencimento</label>
							<input type="text" name="valor_primeira_externo" id="money1" value="R$0,00">
						</div>
					</div>

					<!-- Div para puxar caso selecionado 2 parcela -->
					<div id="segunda_parcela">
					<!-- Data da segunda Parcela -->
						<div class="label_input">
							<label>Data do 2º Vencimento</label>
							<input type="date" name="segundo_vencimento_externo">
						</div>
						<!-- Valor da 2ª Parcela -->
						<div class="label_input">
							<label>Valor do 2º Vencimento</label>
							<input type="text" name="valor_segundo_externo" id="money2" value="R$0,00">
						</div>
					</div>

					<!-- Div para puxar caso selecionado 3 parcela -->
					<div id="terceira_parcela">
					<!-- Data da terceira Parcela -->
						<div class="label_input">
							<label>Data do 3º Vencimento</label>
							<input type="date" name="terceiro_vencimento_externo">
						</div>
						<!-- Valor da 3ª Parcela -->
						<div class="label_input">
							<label>Valor do 3º Vencimento</label>
							<input type="text" name="valor_terceiro_externo" id="money3" value="R$0,00">
						</div>
					</div>

					<!-- Div para puxar caso selecionado 4 parcela -->
					<div id="quarta_parcela">
					<!-- Data da quarta Parcela -->
						<div class="label_input">
							<label>Data do 4º Vencimento</label>
							<input type="date" name="quarto_vencimento_externo">
						</div>
						<!-- Valor da 4ª Parcela -->
						<div class="label_input">
							<label>Valor do 4º Vencimento</label>
							<input type="text" name="valor_quarto_externo" id="money4" value="R$0,00">
						</div>
					</div>

					<!-- Div para puxar caso selecionado 5 parcela -->
					<div id="quinta_parcela">
					<!-- Data da quinta Parcela -->
						<div class="label_input">
							<label>Data do 5º Vencimento</label>
							<input type="date" name="quinto_vencimento_externo">
						</div>
						<!-- Valor da 5ª Parcela -->
						<div class="label_input">
							<label>Valor do 5º Vencimento</label>
							<input type="text" name="valor_quinto_externo" id="money5" value="R$0,00">
						</div>
					</div>

					<!-- Div para puxar caso selecionado 6 parcela -->
					<div id="sexta_parcela">
					<!-- Data da sexta Parcela -->
						<div class="label_input">
							<label>Data do 6º Vencimento</label>
							<input type="date" name="sexto_vencimento_externo">
						</div>
						<!-- Valor da 6ª Parcela -->
						<div class="label_input">
							<label>Valor do 6º Vencimento</label>
							<input type="text" name="valor_sexto_externo" id="money6" value="R$0,00">
						</div>
					</div>
				</div>
		</div>
		<!-- Botao -->
			<input type="submit" name="cadastro_externo">
	</form>
</div>
<?php
	include('include/rodape.php');
?>