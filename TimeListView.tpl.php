<?php
	$this->assign('title','ARENA | Times');
	$this->assign('nav','times');

	$this->display('_Header.tpl.php');

	require_once("conectar.php");

	
?>

<div class="container">

<h1>
	<i class="icon-th-list"></i> Times
	<!--<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>-->
	<span class='input-append pull-right searchContainer'>
		<!--<input id='filter' type="text" placeholder="Search..." />-->
		<!--<button class='btn add-on'><i class="icon-search"></i></button>-->
	</span>
</h1>


<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">Descrição</th>
				<th scope="col">Percentual</th>
				<th scope="col">Status</th>
				<th scope="col">Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php
				require_once("conectar.php");

			$sql = "select * from time";
			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($result)){
				?>
				<tr>
						<th><?php echo $row['nome']?></th>
						<th><?php echo $row['descricao']?></th>
						<th><?php echo $row['percentual']?></th>
						<th><?php echo $row['status']?></th>

						<td>
							<a href="templates/TimeEdit.tpl.php?id_time=<?php echo $row['id_time']?>" class="link-dark"><i class="btn btn-info btn-sm">Editar</i></a>
        					<a href="templates/TimeDelet.tpl.php?id_time=<?php echo $row['id_time']?>" class="link-dark"><i class="btn btn-sucess btn-sm">Excluir</i></a>
						</td>
			</tr>
				<?php
			}

			?>
		</tbody>
		</table>

		<a href="templates/TimeAdd.tpl.php"><button class="btn-primary">Cadastrar</button></a>
</div>





<!--<script type="text/javascript">
	$LAB.script("scripts/app/times.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> Times
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>-->

	<!-- underscore template for the collection -->
	<!--<script type="text/template" id="timeCollectionTemplate">-->
		<!--<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<!--th id="header_IdTime">Id Time<% if (page.orderBy == 'IdTime') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>-->
				<!--<th id="header_Nome">Nome<% if (page.orderBy == 'Nome') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Descricao">Descricao<% if (page.orderBy == 'Descricao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Percentual">Percentual<% if (page.orderBy == 'Percentual') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Status">Status<% if (page.orderBy == 'Status') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idTime')) %>">
				<!--<td><%= _.escape(item.get('idTime') || '') %></td>-->
				<!--<td><%= _.escape(item.get('nome') || '') %></td>
				<td><%= _.escape(item.get('descricao') || '') %></td>
				<td><%= _.escape(item.get('percentual') || '') %></td>
				<td><%= _.escape(item.get('status') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<!--<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<!--<script type="text/template" id="timeModelTemplate">-->
		<!--<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="nomeInputContainer" class="control-group">
					<label class="control-label" for="nome">Nome</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nome" placeholder="Nome" value="<%= _.escape(item.get('nome') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descricaoInputContainer" class="control-group">
					<label class="control-label" for="descricao">Descricao</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="descricao" placeholder="Descricao" value="<%= _.escape(item.get('descricao') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="percentualInputContainer" class="control-group">
					<label class="control-label" for="percentual">Percentual</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="percentual" placeholder="Percentual" value="<%= _.escape(item.get('percentual') || '') %>">
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

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<!--<form id="deleteTimeButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteTimeButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Deletar</button>
						<span id="confirmDeleteTimeContainer" class="hide">
							<button id="cancelDeleteTimeButton" class="btn btn-mini">Cancelar</button>
							<button id="confirmDeleteTimeButton" class="btn btn-mini btn-danger">Confirmar</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>-->

	<!-- modal edit dialog -->
	<!--<div class="modal hide fade" id="timeDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Editar
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="timeModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancelar</button>
			<button id="saveTimeButton" class="btn btn-primary">Salvar</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="timeCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newTimeButton" class="btn btn-primary">Cadastrar</button>
	</p>

	<button class="btn-primary"><a href="time.php">times</a></button>
</div> -->
<!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
