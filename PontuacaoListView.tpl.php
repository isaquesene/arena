<?php
	$this->assign('title','ARENA | Pontuacaos');
	$this->assign('nav','pontuacaos');

	$this->display('_Header.tpl.php');
?>

<!--<script type="text/javascript">
	$LAB.script("scripts/app/pontuacaos.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>-->

<div class="container">

<h1>
	<i class="icon-th-list"></i> Pontuação
	<!--<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>-->
</h1>

<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th scope="col">Desc Pontuação</th>
				<th scope="col">Pontuação</th>
				<th scope="col">Usuário</th>
				<th scope="col">Empresa</th>
				<th scope="col">Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php
			require_once("conectar.php");

			$sql = "select * from pontuacao";
			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($result)){
				?>
				<tr>
						<th><?php echo $row['desc_pontuacao']?></th>
						<th><?php echo $row['pontuacao']?></th>
						<th><?php echo $row['id_usuario']?></th>
						<th><?php echo $row['id_empresa']?></th>

						<td>
							<a href="templates/PontuacaoEdit.tpl.php?id_pontuacao=<?php echo $row['id_pontuacao']?>" class="link-dark"><i class="btn btn-info btn-sm">Editar</i></a>
        					<a href="templates/PontuacaoDelet.tpl.php?id_pontuacao=<?php echo $row['id_pontuacao']?>" class="link-dark"><i class="btn btn-sucess btn-sm">Excluir</i></a>
						</td>
			</tr>
				<?php
			}

			?>
		</tbody>
		</table>

		<a href="templates/PontuacaoAdd.tpl.php"><button class="btn btn-primary">Cadastrar</button></a>
</div>

	<!-- underscore template for the collection 
	<script type="text/template" id="pontuacaoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<!--<th id="header_IdPontuacao">Id Pontuacao<% if (page.orderBy == 'IdPontuacao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_DescPontuacao">Desc Pontuação<% if (page.orderBy == 'DescPontuacao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Pontuacao">Pontuação<% if (page.orderBy == 'Pontuacao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_IdUsuario">Usuario<% if (page.orderBy == 'IdUsuario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_IdEmpresa">Empresa<% if (page.orderBy == 'IdEmpresa') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_IdPlano">Plano<% if (page.orderBy == 'IdPlano') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<!--<tr id="<%= _.escape(item.get('idPontuacao')) %>">
				<td><%= _.escape(item.get('idPontuacao') || '') %></td>
				<td><%= _.escape(item.get('descPontuacao') || '') %></td>
				<td><%= _.escape(item.get('pontuacao') || '') %></td>
				<td><%= _.escape(item.get('idUsuario') || '') %></td>
				<td><%= _.escape(item.get('idEmpresa') || '') %></td>
				<!--UNCOMMENT TO SHOW ADDITIONAL COLUMNS 
				<td><%= _.escape(item.get('idPlano') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model 
	<script type="text/template" id="pontuacaoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<!--<div id="idPontuacaoInputContainer" class="control-group">
					<label class="control-label" for="idPontuacao">Id Pontuacao</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idPontuacao"><%= _.escape(item.get('idPontuacao') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descPontuacaoInputContainer" class="control-group">
					<label class="control-label" for="descPontuacao">Desc Pontuacao</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="descPontuacao" placeholder="Desc Pontuacao" value="<%= _.escape(item.get('descPontuacao') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="pontuacaoInputContainer" class="control-group">
					<label class="control-label" for="pontuacao">Pontuacao</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="pontuacao" placeholder="Pontuacao" value="<%= _.escape(item.get('pontuacao') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idUsuarioInputContainer" class="control-group">
					<label class="control-label" for="idUsuario">Usuario</label>
					<div class="controls inline-inputs">
						<select id="idUsuario" name="idUsuario"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idEmpresaInputContainer" class="control-group">
					<label class="control-label" for="idEmpresa">Empresa</label>
					<div class="controls inline-inputs">
						<select id="idEmpresa" name="idEmpresa"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idPlanoInputContainer" class="control-group">
					<label class="control-label" for="idPlano">Plano</label>
					<div class="controls inline-inputs">
						<select id="idPlano" name="idPlano"></select>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete 
		<form id="deletePontuacaoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deletePontuacaoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Deletar</button>
						<span id="confirmDeletePontuacaoContainer" class="hide">
							<button id="cancelDeletePontuacaoButton" class="btn btn-mini">Cancelar</button>
							<button id="confirmDeletePontuacaoButton" class="btn btn-mini btn-danger">Confirmar/button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog 
	<div class="modal hide fade" id="pontuacaoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Editar
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="pontuacaoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancelar</button>
			<button id="savePontuacaoButton" class="btn btn-primary">Salvar</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="pontuacaoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newPontuacaoButton" class="btn btn-primary">Cadastrar</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
