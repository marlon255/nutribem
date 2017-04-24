<?php
	include('include/topo.php');
	include('include/corpo.php');
?>
<div class="conteudo">
	<h2>Cadastro Unidade de Produção</h2>
	<form method="post" class="form_producao">
		<div class="inputs" style="width: 500px;">
			<div class="label_input" style="margin-left: 20%;">
				<label>Cliente</label>
				<input type="text" name="cliente_contrato">
			</div>
			<div class="label_input" style="margin-left: 32px;">
				<label>Unidade de Produção</label>
				<input type="text" name="nome_unidade">
			</div>
		</div>
			<input type="submit" name="cadastro_unidade">
	</form>
</div>
<?php
	include('include/rodape.php');
?>