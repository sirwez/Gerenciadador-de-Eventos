<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">SIGSalas</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Especialidades
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="cadastrar_especialidade.php">Adicionar</a></li>
              <li><a class="dropdown-item" href="visualizar_especialidades.php">Listar</a></li>
            </ul>
          </li>
        
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Salas
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="cadastrar_sala.php">Adicionar</a></li>
              <li><a class="dropdown-item" href="visualizar_salas.php">Listar</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Usuários
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="cadastrar_usuario.php">Adicionar</a></li>
              <li><a class="dropdown-item" href="visualizar_usuarios.php">Listar</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Relatórios
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="relatorio_salas.php">Salas</a></li>
              <li><a class="dropdown-item" href="relatorio_especialidades.php">Especialidades</a></li>
              <li><a class="dropdown-item" href="relatorio_usuarios.php">Usuários</a></li>
            </ul>
          </li>

          
        </ul>
        
        <form class="d-flex">
        <a href="cadastrar_evento.php" class="btn btn-outline-light border-0" type="submit">Cadastrar Evento</a>
        </form>

      </div>

      </div>
    </div>
</nav>