
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
      
    <table class="table table-hover text-center">
    <thead>
        <tr>
        <th scope="col">Especialidades</th>
        </tr>
    </thead>
    <tbody>
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
				$result = mysqli_query($connect, $sql);

				if(mysqli_num_rows($result)>0):

				while($dados = mysqli_fetch_array($result)):
			?>
						<tr>
							<td>
								<?php echo $dados['nome'];?>
							</td>
							<td>
								<?php echo $dados['sobrenome'];?>
							</td>
							<td>
								<?php echo $dados['email'];?>
							</td>
							<td>
								<?php echo $dados['idade'];?>
							</td>
							<td><a href="editar.php?id=<?php echo $dados['id'];?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
							<td><a href="#modal<?php echo $dados['id'];?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
							<!-- Modal Structure -->
							<div id="modal<?php echo $dados['id'];?>" class="modal">
								<div class="modal-content">
									<h2 class="center-align">Tem certeza que deseja excluir?</h2> </div>
								<div class="modal-footer">
									<form action="php_action/delete.php" method="POST">
										<input type="hidden" name="id" value="<?php echo $dados['id'];?>">
										<button type="submit" name="btn-deletar" class="btn waves-effect waves-red red btn-flat">Sim, tenho certeza.</button> <a href="#!" class="modal-close waves-effect waves-green btn-flat">Não</a> </form>
								</div>
							</div>
						</tr>
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
				</tbody>
			</table>
