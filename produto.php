<?php
	include('include/topo.php');
	include('include/corpo.php');
?>
<div class="conteudo">
	<h2>Cadastro Produto</h2>
	<form method="post" class="form_producao">
		<div class="inputs">
			<div class="label_input">
				<label>Fornecedor</label>
				<select name="fornecedor_produto">
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
			<div class="label_input">
				<label>Especificação Completa</label>
				<input type="text" name="descricao_produto">
			</div>
			<div class="label_input">
				<label>Unidade de Medida</label>
				<input type="text" name="unidade_medida_produto">
			</div>
			<div class="label_input">
				<label>Preço Unitário</label>
				<input type="text" name="preco_produto" id="money" value="R$0,00">
			</div>
			<div class="label_input">
				<label>Combustível?</label>
				<div class="input_radio">
					<div>
						Sim: <input type="radio" name="pergunta_combustivel" value="sim">
					</div>
					<div>
						Não: <input type="radio" name="pergunta_combustivel" value="nao" checked>
					</div>
				</div>
			</div>
		</div>
			<input type="submit" name="cadastro_produto">
	</form>
</div>
<?php
	include('include/rodape.php');
?>