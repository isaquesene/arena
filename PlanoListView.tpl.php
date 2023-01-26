<?php
	$this->assign('title','ARENA | Planos');
	$this->assign('nav','planos');

	$this->display('_Header.tpl.php');

	require_once("_machine_config.php");
?>

<!--<script type="text/javascript">
	$LAB.script("scripts/app/planos.js").wait(function(){
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
	<i class="icon-th-list"></i> Planos
	<!--<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>-->
	<span class='input-append pull-right searchContainer'>
		<!--<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>-->
	</span>
</h1>

<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">Valor Mensal</th>
				<th scope="col">Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php
			require_once("conectar.php");

			$sql = "select * from plano";
			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($result)){
				?>
				<tr>
						<th><?php echo $row['nome']?></th>
						<th><?php echo $row['valor_mensal']?></th>

						<td>
							<a href="templates/PlanoEdit.tpl.php?id_plano=<?php echo $row['id_plano']?>" class="link-dark"><i class="btn btn-info btn-sm">Editar</i></a>
        					<a href="templates/PlanoDelet.tpl.php?id_plano=<?php echo $row['id_plano']?>" class="link-dark"><i class="btn btn-sucess btn-sm">Excluir</i></a>
						</td>
			</tr>
				<?php
			}

			?>
		</tbody>
		</table>

		<a href="templates/PlanoAdd.tpl.php"><button class="btn btn-primary">Cadastrar</button></a>
</div>


	<!-- underscore template for the collection -->
	<!--<script type="text/template" id="planoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdPlano">Id Plano<% if (page.orderBy == 'IdPlano') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Nome">Nome<% if (page.orderBy == 'Nome') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_ValorMensal">Valor Mensal<% if (page.orderBy == 'ValorMensal') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_ValorTrimestral">Valor Trimestral<% if (page.orderBy == 'ValorTrimestral') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_ValorSemestral">Valor Semestral<% if (page.orderBy == 'ValorSemestral') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_ValorAnual">Valor Anual<% if (page.orderBy == 'ValorAnual') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_IdEmpresa">Id Empresa<% if (page.orderBy == 'IdEmpresa') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>

			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<!--<tr id="<%= _.escape(item.get('idPlano')) %>">
				<td><%= _.escape(item.get('idPlano') || '') %></td>
				<td><%= _.escape(item.get('nome') || '') %></td>
				<td><%= _.escape(item.get('valorMensal') || '') %></td>
				<td><%= _.escape(item.get('valorTrimestral') || '') %></td>
				<td><%= _.escape(item.get('valorSemestral') || '') %></td>
				<td><%= _.escape(item.get('valorAnual') || '') %></td>
				<!--UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('idEmpresa') || '') %></td>

			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model 
	<script type="text/template" id="planoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<!--<div id="idPlanoInputContainer" class="control-group">
					<label class="control-label" for="idPlano">Id Plano</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idPlano"><%= _.escape(item.get('idPlano') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="nomeInputContainer" class="control-group">
					<label class="control-label" for="nome">Nome</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nome" placeholder="Nome" value="<%= _.escape(item.get('nome') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="valorMensalInputContainer" class="control-group">
					<label class="control-label" for="valorMensal">Valor Mensal</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="valorMensal" placeholder="Valor Mensal" value="<%= _.escape(item.get('valorMensal') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="valorTrimestralInputContainer" class="control-group">
					<label class="control-label" for="valorTrimestral">Valor Trimestral</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="valorTrimestral" placeholder="Valor Trimestral" value="<%= _.escape(item.get('valorTrimestral') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="valorSemestralInputContainer" class="control-group">
					<label class="control-label" for="valorSemestral">Valor Semestral</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="valorSemestral" placeholder="Valor Semestral" value="<%= _.escape(item.get('valorSemestral') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="valorAnualInputContainer" class="control-group">
					<label class="control-label" for="valorAnual">Valor Anual</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="valorAnual" placeholder="Valor Anual" value="<%= _.escape(item.get('valorAnual') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idEmpresaInputContainer" class="control-group">
					<label class="control-label" for="idEmpresa">Id Empresa</label>
					<div class="controls inline-inputs">
						<select id="idEmpresa" name="idEmpresa"></select>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete 
		<form id="deletePlanoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deletePlanoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Plano</button>
						<span id="confirmDeletePlanoContainer" class="hide">
							<button id="cancelDeletePlanoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeletePlanoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog 
	<div class="modal hide fade" id="planoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Plano
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="planoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="savePlanoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="planoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newPlanoButton" class="btn btn-primary">Add Plano</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
