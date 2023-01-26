<?php
    require_once("conectar.php");


$id_time = $_GET['id_time'];

if(isset($_POST['edit'])){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $percentual = $_POST['percentual'];
    $status = $_POST['status'];


    $sql = "update time set nome='$nome',descricao='$descricao',percentual='$percentual',status='$status' where id_time='$id_time'";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo "Alterado com sucesso!";
        //header("location:status_edit.php");
    }else{
       // echo "erro: " . mysqli_error($conn);
    }
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

    <?php 
    require_once("conectar.php");

    $id_time = $_GET['id_time'];
    $sql = "select * from time where id_time = $id_time limit 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Time 
                            <button onclick="history.go(-2)" class="btn btn-danger float-end">BACK</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form  method="POST">

                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control" value="<?php echo $row['nome']?>">
                            </div>
                            <div class="mb-3">
                                <label>Descrição</label>
                                <input type="text" name="descricao" class="form-control" value="<?php echo $row['descricao']?>">
                            </div>
                            <div class="mb-3">
                                <label>Percentual</label>
                                <input type="text" name="percentual" class="form-control" value="<?php echo $row['percentual']?>">
                            </div>
							<div class="mb-3">
                                <label>Status</label>
                                <input type="text" name="status" class="form-control" value="<?php echo $row['status']?>">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="edit" onclick="add()" class="btn btn-primary">Cadastrar</button>
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