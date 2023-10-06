<?php

session_start();
include('conexoes/conexao-mysqli-usuarios.php');

date_default_timezone_set('America/Sao_Paulo');
$hora = date('H:i');

if (isset($_POST['usuario']) || isset($_POST['password'])) {
    if (strlen($_POST['usuario']) == 0 || strlen($_POST['password']) == 0) {
        $mostrarModal2 = true;    
    } else {
        $usuario = $mysqli->real_escape_string($_POST['usuario']);
        $senha = $mysqli->real_escape_string($_POST['password']);

        $sql_code = "SELECT * FROM painel_usuarios WHERE usuario = '$usuario' AND password = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli_error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            // Usuário autenticado com sucesso
            $usuario = $sql_query->fetch_assoc();

            // Definir as informações do usuário na sessão
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['sobrenome'] = $usuario['sobrenome'];
            $_SESSION['id_grupo'] = $usuario['id_grupo'];
            $_SESSION['imagem_usuario'] = $usuario['imagem_usuario'];
            $_SESSION['usuario'] = $usuario['usuario'];

            $mostrarModal3 = true;
            echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                var modal = new bootstrap.Modal(document.getElementById("successModal"));
                modal.show();
            });
    
            setTimeout(function() {
                window.location.href = "index.php";
            }, 3000); // 5 segundos
        </script>';
        } else {
            // Usuário ou senha incorretos
            $mostrarModal = true;
        }
    }
}

$mostrarModal = isset($mostrarModal) ? $mostrarModal : false;
$mostrarModal2 = isset($mostrarModal2) ? $mostrarModal2 : false;
$mostrarModal3 = isset($mostrarModal3) ? $mostrarModal3 : false;
?>

<!-- Modal user ou senha errado-->
<div class="modal fade <?php echo $mostrarModal ? 'show' : ''; ?>" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="error-animation">
                    <div class="error-icon">
                        <i class="fas fa-exclamation"></i>
                    </div>
                    <h3>Usuário ou Senha Incorretos!</h3>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Usuário ou Senha em branco -->
<div class="modal fade <?php echo (isset($_POST['usuario']) && strlen($_POST['usuario']) == 0) || (isset($_POST['password']) && strlen($_POST['password']) == 0) ? 'show' : ''; ?>" id="emptyFieldsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="emptyFieldsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="error-animation">
                    <div class="error-icon">
                        <i class="fas fa-exclamation"></i>
                    </div>
                    <h3>Preencha todos os campos!</h3>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Autenticado com sucesso -->
<div class="modal fade <?php echo $mostrarModal3 ? 'show' : ''; ?>" id="successModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="success-animation">
                    <div class="success-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <h3>Autenticado com sucesso!</h3>
                    <p id="loading-text">Carregando</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (isset($_POST['usuario']) && strlen($_POST['usuario']) == 0 || isset($_POST['password']) && strlen($_POST['password']) == 0): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modal = new bootstrap.Modal(document.getElementById('emptyFieldsModal'));
            modal.show();
        });
    </script>
<?php endif; ?>



<?php if ($mostrarModal): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
            modal.show();
        });
    </script>
<?php endif; ?>






<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Painel - Login</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

            <!--
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                      
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Seja bem vindo!</h1>
                                    </div>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="usuario" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Usuario">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Senha">
                                        </div>
                                        

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Salvar senha</label>
                                            </div>
                                        </div>
                                       <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                       </button>
                                        <hr>
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Esqueci Minha Senha</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Criar Conta</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    -->

                    <section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">
                <?php
                    if($hora >= '00:00' && $hora < '12:00'){
                    echo 'Bom dia!';
                    }elseif ($hora >= '12:00' && $hora < '18:00'){
                        echo 'Boa tarde!';
                    }else {
                        echo 'Boa noite!';
                    }
                ?>
            </h3>
                <form class="user" action="" method="POST">
                    <div class="form-outline mb-4">
                    <input type="text" name="usuario" id="typeEmailX-2" class="form-control form-control-lg" />
                    <label class="form-label" for="typeEmailX-2">Usuário</label>
                    </div>

                    <div class="form-outline mb-4">
                    <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" />
                    <label class="form-label" for="typePasswordX-2">Senha</label>
                    </div>

                    <div class="form-check d-flex justify-content-start mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                    <label class="form-check-label" for="form1Example3"> Lembrar Senha </label>
                    </div>
                    
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Entrar</button>

                    <hr class="my-4">
                </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

            </div>

        </div>

    </div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  var loadingText = document.getElementById("loading-text");
  var animationInterval;

  function startAnimation() {
    loadingText.innerHTML = "Carregando";
    var dots = 0;

    animationInterval = setInterval(function() {
      dots++;
      if (dots > 3) {
        dots = 0;
      }

      loadingText.innerHTML = "Carregando" + ".".repeat(dots);
    }, 500);
  }

  startAnimation();

  setTimeout(function() {
    clearInterval(animationInterval);
  }, 5000);
});

</script>


</body>

</html>