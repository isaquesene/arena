<?php
    $conn = mysqli_connect('localhost','root','','arena');
   


if(isset($_POST['send'])){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $percentual = $_POST['percentual'];
    $status = $_POST['status'];


    $request = "insert into time(nome, descricao, percentual, status) values 
    ('$nome','$descricao','$percentual','$status')";


    mysqli_query($conn, $request);
    echo "<script>history.go(-2);</script>";
    //header('location:templates/TimeListView.tpl.php');
}else{
    echo '';
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Times</title>
</head>
<body>
  
    <div class="container mt-5">

        

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Time 
                            <button onclick="history.go(-1)" class="btn btn-danger float-end">BACK</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form  method="POST">

                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Descrição</label>
                                <input type="text" name="descricao" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Percentual</label>
                                <input type="text" name="percentual" class="form-control">
                            </div>
							<div class="mb-3">
                                <label>Status</label>
                                <!--<input type="text" name="status" class="form-control">-->
                                <select name="status" class="form-control">
                                    <option value="Ativo">Ativo</option>
                                    <option value="Inativo">Inativo</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="send" onclick="add()" class="btn btn-primary">Cadastrar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<script>
        function add(){
            alert ('Cadastrado com Sucesso!');
        }
    </script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!--<form method="post" class="form-horizontal">
			
				<div class="control-group">
					<label class="control-label" >Nome</label>
					<div>
						<input type="text"  name="nome" placeholder="Nome">
						
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Descricao</label>
					<div>
						<input type="text"  name="descricao" placeholder="Descricao">
						
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" >Percentual</label>
					<div>
						<input type="text"  name="percentual" placeholder="Percentual">
						
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Status</label>
					<div>
						<select id="status" name="status"></select>
						
					</div>
				</div>

				

			<input type="submit" value="Cadastrar" name="send">
</form>-->