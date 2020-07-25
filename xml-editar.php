    <?php
    $id_xml = intval($_GET['id']);
	$result = $xml->xpath("dados[@id=$id_xml]");
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3><span class="glyphicon glyphicon-edit"></span> EDITAR CONTATO</h3>
        </div>
        <div class="panel-body">
            <form name='frmEditar' class="form-horizontal" method='post' action='main.php?action=edt&id=<?=$id_xml?>'>
                <input type="hidden" name="submit" value="1">
                <?php
                foreach ($result as $indice => $dados)
                {
                    ?>
                    <div class="form-group">
                        <label for="inputNome" class="col-sm-2 control-label">Nome:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputNome" name='inputNome' placeholder="nome completo" value="<?=$dados['nome']?>" required>
                        </div>
                    </div>
									<div class="form-group">
				<label for="inputNome" class="col-sm-2 control-label">Setor:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputLocal" name='inputLocal' placeholder="Localização" value="<?=$dados['local']?>" required>
				</div>
				</div>
                    <div class="form-group">
                        <label for="inputTel" class="col-sm-2 control-label">Tel:*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control mask-phone" id="inputTel" name='inputTel' placeholder="telefone" value="<?=$dados['tel']?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type='submit' value='ATUALIZAR' class='btn btn-primary' id='btnAtualizar'>
                            <button type="button" class='btn btn-default' id='btnCancelar'>CANCELAR</button>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['submit']) && $_POST['submit'] == 1)
    {
        $nome	= $_POST["inputNome"];
		$local	= $_POST["inputLocal"];
        $tel	= $_POST["inputTel"];


        foreach ($result as $indice => $dados)
        {
            $dados['nome'] 	= $nome;
			$dados['local'] = $local;
            $dados['tel'] 	= $tel;

        }

        // inserindo os novos dados no arquivo xml
        file_put_contents( 'agenda.xml', $xml->asPrettyXML() );
        ?>
        <div class="alert alert-success"><strong>Sucesso!</strong> Registro atualizado corretamente.</div>
        <!-- // refresh para retornar a página principal -->
        <meta HTTP-EQUIV='refresh' CONTENT='<?=$tempo?>;URL=main.php'>
        <?php
    }
    ?>