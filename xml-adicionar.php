	<div class="panel panel-default">
		<div class="panel-heading">
			<h3><span class="glyphicon glyphicon-plus"></span> ADICIONAR CONTATO</h3>
		</div>
		<div class="panel-body">
			<form name="frmAdicionar" method="post" action="main.php?action=add" >
				<input type="hidden" name="submit" value="1">

				<div class="form-group">
					<label for="inputNome" class="col-sm-3 control-label">Nome:*</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputNome" name='inputNome' placeholder="nome completo" required>
					</div>
				</div>
				<div class="form-group">
				<label for="inputNome" class="col-sm-3 control-label">Setor:*</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputLocal" name='inputLocal' placeholder="Localização" required>
				</div>
				</div>
				<div class="form-group">
					<label for="inputTel" class="col-sm-3 control-label">Tel:*</label>
					<div class="col-sm-10">
						<input type="text" class="form-control mask-phone" id="inputTel" name='inputTel' placeholder="telefone">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type='submit' value='ATUALIZAR' class='btn btn-primary' id='btnAtualizar'>
						<button type="button" class='btn btn-default' id='btnCancelar'>CANCELAR</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<?php
	if (isset($_POST['submit']) && $_POST['submit'] == 1)
	{
		// pegando o ultimo elemento (nó) do xml
		$getLastID = $xml->xpath("dados[last()]");

		if(!empty($getLastID)){
			$lastID	= $getLastID[0]['id'];
		}else{
			$lastID	= 0;
		};

		// atribuindo os dados via post
		$id		= $lastID+1;
		$nome	= $_POST["inputNome"];
		$local	= $_POST["inputLocal"];
		$tel	= $_POST["inputTel"];


		// criando um novo nó com seus atributos
		$dados = $xml->addChild('dados');
		$dados->addAttribute('id', $id);
		$dados->addAttribute('nome', $nome);
		$dados->addAttribute('local', $local);
		$dados->addAttribute('tel', $tel);


		// inserindo os dados no arquivo xml
		file_put_contents( 'agenda.xml', $xml->asPrettyXML() );
		?>
		<div class="alert alert-success"><strong>Sucesso!</strong> Dados inseridos corretamente.</div>
		<!--// refresh para retornar a página principal -->
		<meta HTTP-EQUIV='refresh' CONTENT='<?=$tempo?>;URL=main.php'>
		<?php
	}
	?>
