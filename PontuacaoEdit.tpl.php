<?php
    require_once("conectar.php");
   


$id_pontuacao = $_GET['id_pontuacao'];

if(isset($_POST['edit'])){
    $desc_pontuacao = $_POST['desc_pontuacao'];
    $pontuacao = $_POST['pontuacao'];
    $idUsuario = $_POST['id_usuario'];
    $idEmpresa = $_POST['id_empresa'];
    $idPlano = $_POST['id_plano'];


    $sql = "update pontuacao set desc_pontuacao='$desc_pontuacao',pontuacao='$pontuacao',id_usuario='$idUsuario',id_empresa='$idEmpresa',id_plano='$idPlano' where id_pontuacao='$id_pontuacao'";

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

    $id_pontuacao = $_GET['id_pontuacao'];
    $sql = "select * from pontuacao where id_pontuacao = $id_pontuacao limit 1";
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
                                <label>Desc Pontuacao</label>
                                <input type="text" name="desc_pontuacao" class="form-control" value="<?php echo $row['desc_pontuacao']?>">
                            </div>
                            <div class="mb-3">
                                <label>Pontuação</label>
                                <input type="text" name="pontuacao" class="form-control" value="<?php echo $row['pontuacao']?>">
                            </div>
							<div class="mb-3">
                                <label>Usuario</label>
                                <select name="id_usuario" class="form-control">

                                <?php
                                    $conn = mysqli_connect('localhost','root','','arena');

                                    // $id_empresa = $_GET['id_empresa'];
                                    $sql = "select * from usuario";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                ?>

                                
                                <option value="<?php echo $row['id_usuario']; ?>"><?php echo $row['nome']; ?></option>
                                    
                                    
                                </select>
                            </div>
							<div class="mb-3">
                                <label>Empresa</label>
                                <select name="id_empresa" class="form-control">

                                <?php
                                    $conn = mysqli_connect('localhost','root','','arena');

                                    // $id_empresa = $_GET['id_empresa'];
                                    $sql = "select * from empresa";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                ?>

                                
                                <option value="<?php echo $row['id_empresa']; ?>"><?php echo $row['nome_empresa']; ?></option>
                                    
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Plano</label>
                                <select name="id_plano" class="form-control">

                                <?php
                                    $conn = mysqli_connect('localhost','root','','arena');

                                    // $id_empresa = $_GET['id_empresa'];
                                    $sql = "select * from plano";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                ?>

                                
                                <option value="<?php echo $row['id_plano']; ?>"><?php echo $row['nome']; ?></option>
                                    
                                    
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