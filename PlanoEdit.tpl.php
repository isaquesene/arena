<?php
    require_once("conectar.php");
   


$id_plano = $_GET['id_plano'];

if(isset($_POST['edit'])){
    $nome = $_POST['nome'];
    $valorMensal = $_POST['valor_mensal'];
    $idEmpresa = $_POST['id_empresa'];


    $sql = "update plano set nome='$nome',valor_mensal='$valorMensal',id_empresa='$idEmpresa' where id_plano='$id_plano'";

    $result = mysqli_query($conn, $sql);

    if($result){
       // echo "Alterado com sucesso!";
        //header("location:status_edit.php");
        echo "<script>history.go(-2);</script>";
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

    $id_plano = $_GET['id_plano'];
    $sql = "select * from plano where id_plano = $id_plano limit 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Plano 
                            <button onclick="history.go(-1)" class="btn btn-danger float-end">BACK</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form  method="POST">

                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control" value="<?php echo $row['nome']?>">
                            </div>
                            <div class="mb-3">
                                <label>Valor Mensal</label>
                                <input type="text" name="valor_mensal" class="form-control" value="<?php echo $row['valor_mensal']?>">
                            </div>
							<div class="mb-3">
                                <label>Empresa</label>
                                <!--<input type="text" name="status" class="form-control" value="<?php echo $row['status']?>">-->
                                <select name="id_empresa" class="form-control">
                                <?php
                                    $conn = mysqli_connect('localhost','root','','arena');

                                    // $id_empresa = $_GET['id_empresa'];
                                    $sql = "select * from empresa";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                ?>
                                    <option value="<?php echo $row['id_empresa']; ?>"> <?php echo $row['nome_empresa'];?></option>
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="edit" class="btn btn-primary">Cadastrar</button>
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