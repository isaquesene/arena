<?php
	$this->assign('title','ARENA | HistoricoBeneficios');
	$this->assign('nav','historicobeneficios');

	$this->display('_Header.tpl.php');
?>

<!--<script type="text/javascript">
	$LAB.script("scripts/app/historicobeneficios.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>--->

<div class="container">

<h1>
	<i class="icon-th-list"></i> Enviar benefícios
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>
<!--tabela select iner join-->

<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th scope="col">Socio</th>
				<th scope="col">Beneficio</th>
				<th scope="col">Status</th>
				<th scope="col">Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php
			require_once("conectar.php");

			$sql = "SELECT s.nome,b.nome_beneficio,b.descricao,h.* FROM socio s LEFT JOIN historico_beneficio h ON s.id_socio = h.id_socio LEFT JOIN beneficio b ON h.id_beneficio = b.id_beneficio;";
			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($result)){
				?>
				<tr>
						<th><?php echo $row['nome']?></th>
						<th><?php echo $row['nome_beneficio']?></th>
						<th><?php echo $row['status']?></th>
						
						<td>
							<a href="templates/HistoricoBeneficioEdit.tpl?id_historico_beneficio=<?php echo $row['id_historico_beneficio']?>" class="link-dark"><i class="btn btn-info btn-sm">Editar</i></a>
        					<a href="templates/HistoricoBeneficioDelet.tpl?id_historico_beneficio=<?php echo $row['id_historico_beneficio']?>" class="link-dark"><i class="btn btn-sucess btn-sm">Excluir</i></a>
						</td>
						
				<?php
			}

			?>
		</tbody>
	</table>

	<a href="templates/HistoricoBeneficioAdd.tpl"><button class="btn btn-primary">Cadastrar</button></a>
</div>
	<!-- underscore template for the collection -->
	<!--<script type="text/template" id="historicoBeneficioCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<!-- <th id="header_IdHistoricoBeneficio">Id Historico Beneficio<% if (page.orderBy == 'IdHistoricoBeneficio') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th> 
				<th id="header_IdSocio">Socio<% if (page.orderBy == 'IdSocio') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_IdBeneficio">Beneficio<% if (page.orderBy == 'IdBeneficio') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Status">Status<% if (page.orderBy == 'Status') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idHistoricoBeneficio')) %>">
				<!-- <td><%= _.escape(item.get('idHistoricoBeneficio') || '') %></td> -->
				<!--<td><%= _.escape(item.get('idSocio') || '') %></td>-->
				<!--<td><%= _.escape(item.get('idBeneficio') || '') %></td>-->
				<!--<td><%= _.escape(item.get('status') || '') %></td>
				<td><%= _.escape(item.get('idSocio') || '') %></td>
				<td><%= _.escape(item.get('idBeneficio') || '') %></td>
				<td><%= _.escape(item.get('status') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>-->

	<!-- underscore template for the model -->
	<!--<script type="text/template" id="historicoBeneficioModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<!-- <div id="idHistoricoBeneficioInputContainer" class="control-group">
					<label class="control-label" for="idHistoricoBeneficio">Id Historico Beneficio</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idHistoricoBeneficio"><%= _.escape(item.get('idHistoricoBeneficio') || '') %></span>
						<span class="help-inline"></span>
					</div> 
				 </div> 
				<div id="idSocioInputContainer" class="control-group">
					<label class="control-label" for="idSocio">Socio</label>
					<div class="controls inline-inputs">
						<select id="idSocio" name="nome" value="nome" ></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idBeneficioInputContainer" class="control-group">
					<label class="control-label" for="idBeneficio">Beneficio</label>
					<div class="controls inline-inputs">
						<select id="idBeneficio" name="nomeBeneficio" value="nomeBeneficio" ></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="statusInputContainer" class="control-group">
					<label class="control-label" for="status">Status</label>
					<div class="controls inline-inputs">
						<select id="status" name="status"></select>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		 delete button is is a separate form to prevent enter key from triggering a delete
		<form id="deleteHistoricoBeneficioButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteHistoricoBeneficioButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Deletar</button>
						<span id="confirmDeleteHistoricoBeneficioContainer" class="hide">
							<button id="cancelDeleteHistoricoBeneficioButton" class="btn btn-mini">Cancelar</button>
							<button id="confirmDeleteHistoricoBeneficioButton" class="btn btn-mini btn-danger">Confirmar</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog 
	<div class="modal hide fade" id="historicoBeneficioDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Editar
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="historicoBeneficioModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancelar</button>
			<button id="saveHistoricoBeneficioButton" class="btn btn-primary">Salvar</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="historicoBeneficioCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newHistoricoBeneficioButton" class="btn btn-primary">Cadastrar</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
