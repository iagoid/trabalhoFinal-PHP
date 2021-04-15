<?php

$mensagem = '';
if (isset($_GET['status'])) {
  switch ($_GET['status']) {
    case 'success':
      $mensagem = '
      <div class="alert alert-success">
          <strong>Successo!</strong> Sua ação foi executada com sucesso.
      </div>';
      break;
    case 'error':
      $mensagem = '
      <div class="alert alert-danger">
        <strong>Erro!</strong> Sua ação não pode ser executada.
      </div>';
      break;
  }
}

$resultados = '';
$qtdUsuarios = 0;
foreach ($usuarios as $usuario) {
  $resultados .= '<tr>
                  <td>' . $usuario->id . '</td>
                  <td>' . $usuario->first_name . ' ' . $usuario->last_name . '</td>
                  <td>' . $usuario->country . '</td>
                  <td>' . $usuario->city . '</td>
                  <td> $' . $usuario->salary . '</td>
                  <td>
                    <a href="editar.php?id=' . $usuario->id . '">
                      <button type="button" class="btn btn-primary">Editar</button>
                    </a>
                    <a href="excluir.php?id=' . $usuario->id . '">
                      <button type="button" class="btn btn-danger">Excluir</button>
                    </a>
                  </td>';
                  $qtdUsuarios++;
}


$resultados = $qtdUsuarios ? $resultados : '<tr><td colspan="6" class="text-center">Não existem usuários cadastrados</td></td>'
?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <?=$mensagem?>
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Usuários cadastrados: <?= $qtdUsuarios ?></h4>
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Country
                  </th>
                  <th>
                    City
                  </th>
                  <th>
                    Salary
                  </th>
                  <th>
                    Actions
                  </th>
                </thead>
                <tbody>
                  <?= $resultados; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>