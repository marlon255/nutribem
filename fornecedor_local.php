<?php
	include('include/topo.php');
	include('include/corpo.php');
?>
<div class="conteudo">
	<h2>Lançamento Fornecedor Local</h2>
	<form method="post" class="form_producao">
		<div class="inputs">
			<!-- Buscando a unidade de produção -->
			<div class="label_input">
				<label>Unidade de Produção</label>
				<select name="unidade_producao_local">
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
			<!-- Data da compra do produto -->
			<div class="label_input">
				<label>Data da Compra</label>
				<input type="date" name="data_compra_local">
			</div>
			<!-- Buscando o produto -->
			<div class="label_input">
				<label>Fornecedor</label>
				<select name="fornecedor_local" id="fornecedor_local" onblur="getDados()">
					<option selected disabled>Selecione --></option>
					<?php
				if($fetch_fornecedor_local > 0):
					do{
				?>
				<option><?=$fetch_fornecedor_local['nome_fantasia'];?></option>
				<?php
				}while($fetch_fornecedor_local = $exibir_fornecedor_local->fetch(PDO::FETCH_ASSOC));
				endif;
				?>
				</select>
			</div>
			<!-- Buscando o produto -->
			<div class="label_input">
				<label>Produto</label>
				<select name="produto_local" id="produto_local" onblur="dados()">
					<option selected disabled>Selecione --></option>
				</select>
				<input type="hidden" name="pergunta_combustivel" id="pergunta_combustivel">
			</div>
			<!-- Quantidade a ser comprada -->
			<div class="label_input">
				<label>Quantidade</label>
				<input type="number" name="quantidade_local" id="quantidade_local">
				<input type="hidden" name="valor_produto" id="valor_produto">
			</div>
			<!-- Div que será mostrado caso seja combustivel -->
			<div id="combustivel" style="display: none;">
				<div class="label_input">
					<label>Motorista</label>
					<input type="text" name="motorista_combustivel">
				</div>
				<div class="label_input">
					<label>Placa do Veículo</label>
					<input type="text" name="veiculo_combustivel">
				</div>
				<div class="label_input">
					<label>KM do Veículo</label>
					<input type="number" name="km_combustivel">
				</div>
			</div>
		</div>
		<!-- Botao -->
			<input type="submit" name="cadastro_local">
	</form>
</div>
<?php
	include('include/rodape.php');
?>