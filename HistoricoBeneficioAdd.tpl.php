<?php
    $conn = mysqli_connect('localhost','root','','arena');
   



if(isset($_POST['send'])){
    $socio = $_POST['id_socio'];
    $beneficio = $_POST['id_beneficio'];
    $status = $_POST['status'];


    $request = "insert into historico_beneficio(id_socio, id_beneficio, status) values 
    ('$socio','$beneficio','$status')";


    mysqli_query($conn, $request);
    echo "<script>history.go(-2);</script>";
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

    <title>ARENA | HistoricoBeneficio</title>
</head>
<body>
  
    <div class="container mt-5">

    
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Beneficio 
                            <button onclick="history.go(-1)" class="btn btn-danger float-end">BACK</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form  method="POST">
                            <!--socio-->
							<div class="mb-3">
                                <label>Socio</label>
                                
                                <select name="id_socio" class="form-control">
                                <option>Selecione...</option>
                                <?php
                                   $conn = mysqli_connect('localhost','root','','arena');

                                    // $id_empresa = $_GET['id_empresa']; 
                                    $sql = "select id_socio, nome from socio";
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
                                <option>Selecione...</option>
                                <?php
                                   $conn = mysqli_connect('localhost','root','','arena');
 
                                    $sql = "select id_beneficio, nome_beneficio from beneficio";
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
                                    <option>Selecione...</option>
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