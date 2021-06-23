
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Lista de Especialidades</title>
    <meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <?php require("navbar.php"); ?>

    <div class="container my-5">
      <h1>Lista de Especialidades</h1>
    </div>
    <div class="container mt-5">
      
<<<<<<< HEAD
    <div class="card mx-auto text-center" style="width: 25rem;">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Especialidade_1</li>
        <li class="list-group-item">Especialidade_1</li>
        <li class="list-group-item">Especialidade_1</li>
    </ul>
    </div>

=======
    <table class="table table-hover text-center">
    <thead>
        <tr>
        <th scope="col">Especialidades</th>
        </tr>
    </thead>
    <tbody>
<<<<<<< HEAD
        <tr>
        <td scope="row">Especialidade_1</td>
        </tr>
        <tr>
        <td scope="row">Especialidade_2</td>
        </tr>
        <tr>
        <td scope="row">Especialidade_3</td>
        </tr>
    </tbody>
    </table>
>>>>>>> main
    </div>
  </body>
</html>

<table class="striped">
				<thead>
					<th>Nome:</th>
					<th>Sobrenome:</th>
					<th>Email:</th>
					<th>Idade:</th>
				</thead>
				<tbody>
					<?php 
				$sql = "SELECT * FROM clientes";
=======
    <?php 
				$sql = "SELECT * FROM especialidade";
>>>>>>> main
				$result = mysqli_query($connect, $sql);

				if(mysqli_num_rows($result)>0):

				while($dados = mysqli_fetch_array($result)):
			?>
        <tr>
        <td scope="row">Especialidade: <?php echo $dados['nome'];?></td>
        </tr>
    </tbody>
    <?php 
 endwhile;
			else:?>
							<tr>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
							</tr>
							<?php
endif;
?>
    </table>
    </div>
  </body>
</html>
