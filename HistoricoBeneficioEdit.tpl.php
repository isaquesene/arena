<?php
    require_once("conectar.php");
   


$id_historico_beneficio = $_GET['id_historico_beneficio'];

if(isset($_POST['edit'])){
    $socio = $_POST['id_socio'];
    $beneficio = $_POST['id_beneficio'];
    $status = $_POST['status'];


    $sql = "update historico_beneficio set id_socio='$socio',id_beneficio='$beneficio',status='$status' where id_historico_beneficio='$id_historico_beneficio'";

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

    <title>ARENA | HistoricoBeneficio</title>
</head>
<body>
  
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Benefico 
                            <button onclick="history.go(-1)" class="btn btn-danger float-end">BACK</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form  method="POST">

                           <!--socio-->
							<div class="mb-3">
                                <label>Socio</label>
                                
                                <select name="id_socio" class="form-control">

                                <?php
                                   $conn = mysqli_connect('localhost','root','','arena');

                                    // $id_empresa = $_GET['id_empresa']; 
                                    $sql = "SELECT s.nome,b.nome_beneficio,b.descricao,h.* FROM socio s LEFT JOIN historico_beneficio h ON s.id_socio = h.id_socio LEFT JOIN beneficio b ON h.id_beneficio = b.id_beneficio;";
                                    $result = mysqli_query($conn, $sql);

                                   
    
                                    while($row = mysqli_fetch_assoc($result)){
                                    
                                ?>  
                                    <option value="<?php echo $row['id_socio']; ?>"><?php echo $row['nome']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                            <!--beneficio-->
							<div class="mb-3">
                                <label>Beneficio</label>
                                
                                <select name="id_beneficio" class="form-control">
                                <?php
                                   $conn = mysqli_connect('localhost','root','','arena');

                                    // $id_empresa = $_GET['id_empresa']; 
                                    $sql = "SELECT s.nome,b.nome_beneficio,b.descricao,h.* FROM socio s LEFT JOIN historico_beneficio h ON s.id_socio = h.id_socio LEFT JOIN beneficio b ON h.id_beneficio = b.id_beneficio;";
                                    $result = mysqli_query($conn, $sql);

                                   
    
                                    while($row = mysqli_fetch_assoc($result)){
                                    
                                ?>  
                                    <option value="<?php echo $row['id_beneficio']; ?>"><?php echo $row['nome_beneficio']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                            <!--status-->
                            <div class="mb-3">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="<?php echo $row['id_historico_beneficio'];?>"><?php echo $row['status']; ?></option>
                                    <option value="Ativo">Ativo</option>
                                    <option value="Inativo">Inativo</option>
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