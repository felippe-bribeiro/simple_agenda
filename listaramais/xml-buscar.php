	<?php
	$result = busca_xml($xml,"dados",$buscar,$opc,$order,$by);
	$conta_result = count($result);
	?>
    <h2><span class="glyphicon glyphicon-phone"></span> CONTATOS CADASTRADOS</h2>
    <hr />
    <form class="form-inline" action="index.php" name="frmBuscar" method="get">
        <div class="form-group">
            <select name="opc" class="form-control">
				<option value="local"<?=$opc == "local" ? " selected=\"selected\"" : ""?>>Setor</option>
                <option value="nome"<?=$opc == "nome" ? " selected=\"selected\"" : ""?>>Nome</option>
				<option value="tel"<?=$opc == "tel" ? " selected=\"selected\"" : ""?>>Telefone</option>
                
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="buscar" value="<?=$buscar?>" id="idBuscar" class="form-control" />
        </div>
        <button type="submit" class="btn btn-primary">BUSCAR</button>
        <input type="reset" name="limpar" class="btn" id="btnLimpar" value="LIMPAR">
    </form>
    <br>
	<?php
	// verifica se o array possui dados
	if ($conta_result > 0){
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    
                    <th><a href="index.php?opc=<?=$opc?>&buscar=<?=$buscar?>&id=<?=$id?>&action=buscar&order=@nome&by=<?=$byC?>">Nome</a></th>
					<th><a href="index.php?opc=<?=$opc?>&buscar=<?=$buscar?>&id=<?=$id?>&action=buscar&order=@local&by=<?=$byC?>">Setor</a></th>
                    <th>Telefone</th>
                    
                    

                </tr>
            </thead>
	        <?php
		    // montando a tabela com os dados do arquivo xml
		    foreach ($result as $dados)
            {
	        ?>
            <tbody>
                <tr>
                    
                    <td><?=$dados["nome"]?></td>
					<td><?=$dados["local"]?></td>
                    <td><?=$dados["tel"]?></td>
                    
                    

                </tr>
            </tbody>
	        <?php
            }
            ?>
	    </table>
	<?php
	}
    else
    {
	?>
		<div class="alert alert-info"><strong>Aviso!</strong> Nenhum contato cadastrado no momento.</div>
	<?php
    }
    ?>

    
    <div id="modalExclusao" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmação de Exclusão</h4>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir o registro selecionado?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnExcluir">SIM</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">NÃO</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
