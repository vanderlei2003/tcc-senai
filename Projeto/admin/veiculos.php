<?php
include("../config/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <?php include "../components/head.php" ?>
  <link rel="stylesheet" href="../styles/veiculos.css">
  <title>SRV | Gerenciar veículos</title>
</head>

<body>
  <div class="container">
    <p class="left car-icon"><i class="fas fa-car fa-5x"></i></p>
    <h3 class="left">Veículos</h3>

    

    <!--Tabela Veiculos-->
    <table id="tabela-veiculos"  class="centered highlight">
      <thead>
        <tr>
          <th>ID</th>
          <th>MODELO</th>
          <th>PLACA</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM veiculo ORDER BY id_veiculo DESC") or die(mysqli_connect_error());
        while ($veiculo = mysqli_fetch_array($query)) {
        ?>
          <tr>
            <td><?php echo $veiculo['id_veiculo']; ?></td>
            <td><?php echo $veiculo['modelo']; ?></td>
            <td><?php echo $veiculo['placa']; ?></td>
          </tr>
        <?php
        }
        mysqli_close($conn);
        ?>
      </tbody>
    </table>
    <br><br>
    <a class="waves-effect waves-light btn modal-trigger right" href="#modal1">Novo Veículo
      <i class="material-icons right">add</i>
    </a>
  </div>

  <!-- Modal-Cadastro -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <div class="container">
        <h3 class="center">Cadastrar Veículo</h3>
        <p class="center"><i class="material-icons medium">directions_car</i></p>
        <div class="row">
          <form action="../config/inserir-carro.php" method="POST" class="col s12">
            <div class="row">
              <div class="input-field col s6">
                <input id="modelo" type="text" class="validate" name="modelo">
                <label for="modelo">Modelo</label>
              </div>
              <div class="input-field col s6">
                <input id="placa" type="text" class="validate" name="placa">
                <label for="placa">Placa</label>
              </div>
            </div>
            <div class="input-field">
              <input id="proprietario" type="text" class="validate" name="proprietario">
              <label for="proprietario">Proprietario</label>
            </div>
            <div class="button-container">
              <a href="#!" class="modal-close btn waves-effect red darken-1">Cancelar
                <i class="material-icons left">cancel</i>
              </a>
              <button class="btn waves-effect right" type="submit" name="submit">Confirmar
                <i class="material-icons right">send</i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <?php include ("../components/scripts.php")?>
  <script src="../scripts/veiculos.js"></script>
</body>

</html>