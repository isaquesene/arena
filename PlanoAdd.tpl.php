<?php
    $conn = mysqli_connect('localhost','root','','arena');
   



if(isset($_POST['send'])){
    $nome = $_POST['nome'];
    $valorMensal = $_POST['valor_mensal'];
    $idEmpresa = $_POST['id_empresa'];


    $request = "insert into plano(nome, valor_mensal, id_empresa) values 
    ('$nome','$valorMensal','$idEmpresa')";


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

    <title>Times</title>
</head>
<body>
  
    <div class="container mt-5">

    
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Plano 
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
                                <label>Valor Mensal</label>
                                <input type="text" name="valor_mensal" class="form-control">
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

                                <option>Selecione...</option>
                                <option value="<?php echo $row['id_empresa']; ?>"><?php echo $row['nome_empresa']; ?></option>
                                    
                                    
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