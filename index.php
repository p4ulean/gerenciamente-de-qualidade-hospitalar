<?php


 

//RESTAURAR SESSÃO DO USUÁRIO
include('users/protect.php');
include('conexoes/conexao-oracle.php');


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="icon" href="assets/img/fav.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard Completo</title>
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/js/sb-admin-2.min.js"></script>
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/demo/datatables-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/toorshia/justgage@1.2.2/raphael-2.1.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/toorshia/justgage@1.2.2/justgage.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/toorshia/justgage@1.2.2/justgage.css">

    


</head>


<body id="page-top">

    <!-- PAGINA COMPLETA -->
    <div id="wrapper">

        <!-- BARRA LATERAL -->
            <?php include('includes/barra-lateral.php'); ?>
        <!-- FIM BARRA LATERAL -->

        <!-- CONTEÚDO CENTRAL -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- CONTEÚDO PRINCIPAL -->
            <div id="content">

                <!-- HEADER -->
                <?php include('includes/header.php'); ?>
                <!-- FIM HEADER -->

                <!-- INCLUIR CONTEUDO DINÂMICO -->
                <?php
                    if (isset($pagina)){
                        include $pagina;
                    }else{
                        include('dashboard.php');
                    }
                ?>

            </div>
            <!-- FIM CONTEÚDO PRINCIPAL -->

            <!-- RODAPE -->
            <?php include('includes/footer.php'); ?>
            <!-- FIM RODAPE -->

        </div>
        <!-- FIM CONTEÚDO CENTRAL -->

    </div>
    <!-- FIM DA PÁGINA COMPLETA -->

    <!-- SCROLL TO TOP-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- LOGOUT-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Finalizar sessão?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Clique em "Sair" se você quer encerrar sua sessão.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="users/logout.php">Sair</a>
                </div>
            </div>
        </div>
    </div>

<script src="assets/js/demo/chart-pie-demo.js"></script>
</body>
</html>