<?php
	include('include/topo.php');
	include('include/corpo.php');
?>
<div class="conteudo">
	<h2>Cadastro de Fornecedor</h2>
	<form method="post" class="form_producao">
		<div class="inputs">
			<div class="label_input">
				<label>Tipo de Fornecedor</label>
				<select name="tipo_fornecedor">
					<option selected disabled>Selecione --></option>
					<option>Local</option>
					<option>Externo</option>
				</select>
			</div>
			<div class="label_input">
				<label>Razão Social</label>
				<input type="text" name="razao_fornecedor">
			</div>
			<div class="label_input">
				<label>Nome Fantasia</label>
				<input type="text" name="fantasia_fornecedor">
			</div>
			<div class="label_input">
				<label>CNPJ</label>
				<input type="text" name="cnpj_fornecedor">
			</div>
			<div class="label_input">
				<label>Inscrição Estadual</label>
				<input type="text" name="inscricao_estadual">
			</div>
			<div class="label_input">
				<label>Endereço Completo</label>
				<input type="text" name="endereco_fornecedor">
			</div>
			<div class="label_input">
				<label>Telefone 1</label>
				<input type="text" name="telefone1_fornecedor">
			</div>
			<div class="label_input">
				<label>Telefone 2</label>
				<input type="text" name="telefone2_fornecedor">
			</div>
			<div class="label_input">
				<label>Telefone 3</label>
				<input type="text" name="telefone3_fornecedor">
			</div>
			<div class="label_input">
				<label>E-mail</label>
				<input type="text" name="email_fornecedor">
			</div>
			<div class="label_input">
				<label>Contato 1</label>
				<input type="text" name="contato1_fornecedor">
			</div>
			<div class="label_input">
				<label>Contato 2</label>
				<input type="text" name="contato2_fornecedor">
			</div>
			<div class="label_input">
				<label>Contato 3</label>
				<input type="text" name="contato3_fornecedor">
			</div>
		</div>
			<input type="submit" name="cadastro_fornecedor">
	</form>
</div>
<?php
	include('include/rodape.php');
?>