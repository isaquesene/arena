<?php 
    $conn = mysqli_connect('localhost','root','','arena');
	//deletar
	$id = $_GET['id_pontuacao'];
    $sql = "delete from pontuacao where id_pontuacao=$id";
    $result = mysqli_query($conn, $sql);

    if($result){
       // header("location:status_delete.php");
    }else{
       // echo "Erro: " . mysqli_error($conn);
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

    <title>Pontuação</title>
</head>
<body>
  
    <div class="container mt-5">

    

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Pontuação 
                            <h2>Deletado com sucesso!</h2>
                            <button onclick="history.go(-1)" class="btn btn-danger float-end">BACK</button>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>