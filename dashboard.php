<?php


$conn = new Connection();
$pdo = $conn->getConnection();





$query = $pdo->query('SELECT quantidade FROM meta_cons_ambulatorial');
$rows = $query->fetchAll(PDO::FETCH_OBJ);

foreach ($rows as $row){
    $atual = $row->quantidade;
}

$meta = ($atual*100/5000);


// APONTAMENTO DAS CIRURGIAS REALIZADAS NO ANO
$cirurgias = $pdo->query('SELECT * FROM cirurgias_mes_ano');
$linhas = $cirurgias->fetchAll(PDO::FETCH_OBJ);

foreach ($linhas as $linha){
    $jan = $linha->janeiro;
    $fev = $linha->fevereiro;
    $mar = $linha->marco;
    $abr = $linha->abril;
    $mai = $linha->maio;
    $jun = $linha->junho;
    $jul = $linha->julho;
    $ago = $linha->agosto;
    $set = $linha->setembro;
    $out = $linha->outubro;
    $nov = $linha->novembro;
    $dez = $linha->dezembro;


    $cirurgias_abril = $linha->abril;
}

 

// TAXA DE OCUPAÇÃO
$ocupa = $pdo->query('SELECT * FROM taxa_ocupacao');
$rowsocupa = $ocupa->fetchAll(PDO::FETCH_OBJ);

foreach ($rowsocupa as $rowstaxa) {
    $taxa = $rowstaxa->tx_ocupacao;
}
    


// CIRURGIAS MÊS ATUAL
$querycirurgiamesatual = $pdo->query('SELECT * FROM cirurgias_mes_atual');
$rowscirurgiasmesatual = $querycirurgiamesatual->fetchAll(PDO::FETCH_OBJ);
foreach ($rowscirurgiasmesatual as $contagemcirurgiasmesatual){
    $meta_cirurgias_atual = $contagemcirurgiasmesatual->cirurgias;

}

$meta_atual = ($meta_cirurgias_atual*100/550);
$meta_atual = number_format($meta_atual, 2, '.', '');



// ÓBITOS CIRÚRGICOS MENSAL
$obitos = $pdo->query('SELECT * FROM obitos_cirurgicos');
$rowsobitos = $obitos->fetchAll(PDO::FETCH_OBJ);
foreach ($rowsobitos as $rowobitos){
    $quantidade_obitos = $rowobitos->obitos_cirurgicos;
}



// META INTERNAÇÕES MENSAL

$inter = $pdo->query('SELECT * FROM meta_cons_internacao');
$rowsinter = $inter->fetchAll(PDO::FETCH_OBJ);
foreach ($rowsinter as $rowsinternacoes){
    $internacoes = $rowsinternacoes->quantidade;
}


// CONTAGEM DE CONSULTAS POR TIPO

$atendime_tipo = $pdo->query('SELECT * FROM consultas_tipo');
$rowsatendime = $atendime_tipo->fetchAll(PDO::FETCH_OBJ);
foreach ($rowsatendime as $rowatendime) {
    $serv = $rowatendime->servicosocial;
    $enf = $rowatendime->enfermagem;
    $fisio = $rowatendime->fisioterapia;
    $fono = $rowatendime->fonoaudiologia;
    $nutri = $rowatendime->nutricionista;
    $odonto = $rowatendime->odontologia;
    $psi = $rowatendime->psicologia;
    $med = $rowatendime->medico;
}


// EXAMES DE IMAGEM

$queryimagem = $pdo->query('SELECT * FROM meta_imagem');
$rowsimagem = $queryimagem->fetchAll(PDO::FETCH_OBJ);

foreach ($rowsimagem as $rowimagem){
    $angio = $rowimagem->angiotomografia;
    $doppler = $rowimagem->doppler;
    $eco = $rowimagem->ecocardiograma;
    $rx = $rowimagem->raiosx;
    $tc = $rowimagem->tomografia;
    $ultra = $rowimagem->ultrassonografia;
    $total = $rowimagem->total;
    $totalser = $rowimagem->total_ser;
}


$metaangio = ($angio*100/150);
$metadoppler = ($doppler*100/500);
$metaeco = ($eco*100/400);
$metarx = ($rx*100/2500);
$metatc = ($tc*100/800);
$metaultra = ($ultra*100/800);
$totalamb = ($total-$totalser);

$metaangio = number_format($metaangio, 2, '.', '');
$metadoppler = number_format($metadoppler, 2, '.', '');
$metaeco = number_format($metaeco, 2, '.', '');
$metarx = number_format($metarx, 2, '.', '');
$metatc = number_format($metatc, 2, '.', '');
$metaultra = number_format($metaultra, 2, '.', '');

?>



<script src="https://pagead2.googlesyndication.com/pagead/managed/js/adsense/m202304250101/show_ads_impl_fy2021.js?bust=31074192" id="google_shimpl"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

<script>


 
$(document).ready(function(){
    $('.counter-value').each(function(){
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        },{
            duration: 3500,
            easing: 'swing',
            step: function (now){
                $(this).text(Math.ceil(now));
            }
        });
    });
});
</script>

<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>Gerar Relatório</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">


             
                        <!-- Earnings (Monthly) Card Example -->
                        
                        <div class="col-xl-3 col-md-6 mb-4">
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        </a>
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">

                                            consultas - <?php echo date('m/y'); ?>
                                        </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php
                                                    if ($meta < 100) {
                                                            echo $meta . '%';
                                                        }elseif ($meta >= 100) {
                                                            echo "Meta concluída!";
                                                        };
                                                    
                                            
                                            ?>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info3" role="progressbar"
                                                            style="<?php if($meta < 100) {
                                                                echo "width:" . $meta . "%";
                                                            } else {
                                                                echo "width:100%";
                                                            }?>
                                                            " aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                    <?php echo $atual . " Atendimentos";?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">internações - <?php echo date('m/y'); ?>
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $internacoes; ?></div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CIRURGIAS -->

                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">cirurgias - <?php echo date('m/y'); ?>
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php
                                                        if ($meta_atual < 100) {
                                                            echo $meta_atual . '%';
                                                            }elseif ($meta_atual >= 100) {
                                                                echo "Meta Concluída!" ;
                                                        };
                                            
                                            
                                                    ?>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="<?php if($meta_atual <= 100){
                                                                echo "width:" . $meta_atual . "%";
                                                            } else {
                                                                echo "width:100%";
                                                            }?>
                                                            " aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                            
                                                    </div>
                                                    <?php echo $meta_cirurgias_atual . " Cirurgias"; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                óbitos cirúrgicos - <?php echo date('m/y'); ?></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $quantidade_obitos ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Cirurgias realizadas</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown</div>
                                            <a class="dropdown-item" href="#">Link Teste1</a>
                                            <a class="dropdown-item" href="#">Link Teste2</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Link Teste3</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PESQUISA DE SATISFAÇÃO -->

                        <!--
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Pesquisa de satisfação</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown</div>
                                            <a class="dropdown-item" href="#">Link teste1</a>
                                            <a class="dropdown-item" href="#">Link teste2</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Link teste3</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Bom
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-warning"></i> Ruim
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-danger"></i> Péssimo
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>


                    <!-- CONTADORES -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Total de Consultas por Tipo</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            
                                                <div class="col-xl-3 col-sm-6 col-6">
                                                <h4 style="text-align: center; font-size: 11px; margin-top: 20px;">MÉDICA</h4>
                                                    <div class="counter">
                                                        <span class="counter-value" style="color: #e74a3b;"><?php echo $med ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-6 col-6">
                                                <h4 style="text-align: center; font-size: 11px; margin-top: 20px;">ENFERMAGEM</h4>
                                                    <div class="counter counter-amarelo">
                                                        <span class="counter-value" style="color: #f6c23e;"><?php echo $enf ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-6 col-6">
                                                <h4 style="text-align: center; font-size: 11px; margin-top: 20px;">FISIOTERAPIA</h4>
                                                    <div class="counter counter-azul">
                                                        <span class="counter-value" style="color: #4e73df;"><?php echo $fisio ?></span>
                                                    </div>
                                                </div>
                                            
                                            
                                                <div class="col-xl-3 col-sm-6 col-6">
                                                <h4 style="text-align: center; font-size: 11px; margin-top: 20px;">FONOAUDIOLOGIA</h4>
                                                    <div class="counter counter-azul2">
                                                        <span class="counter-value"><?php echo $fono ?></span>
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-sm-6 col-6">
                                                <h4 style="text-align: center; font-size: 11px; margin-top: 20px;">NUTRICIONISTA</h4>
                                                    <div class="counter counter-verde">
                                                        <span class="counter-value"><?php echo $nutri ?></span>
                                                    </div>
                                                </div>  
                                                
                                                <div class="col-xl-3 col-sm-6 col-6">
                                                <h4 style="text-align: center; font-size: 11px; margin-top: 20px;">ODONTOLOGIA</h4>
                                                    <div class="counter counter-roxo">
                                                        <span class="counter-value"><?php echo $odonto ?></span>
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-sm-6 col-6">
                                                <h4 style="text-align: center; font-size: 11px; margin-top: 20px;">PSICOLOGIA</h4>
                                                    <div class="counter counter-rosa">
                                                        <span class="counter-value"><?php echo $psi ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-6 col-6">
                                                <h4 style="text-align: center; font-size: 11px; margin-top: 20px;">SERVIÇO SOCIAL</h4>
                                                    <div class="counter counter-laranja">
                                                        <span class="counter-value"><?php echo $serv ?></span>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4" style="height: 335px;">
                                
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Taxa de Ocupação</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <div id="grafico"></div>
                                        <?php echo $taxa; ?>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>   
                  

                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- EXAMES DE IMAGEM -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Exames de Imagem</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Angiotomografia - (<?php echo $angio; ?>)<span
                                            class="float-right">

                                            <?php
                                            if ($metaangio < 100) {
                                            echo $metaangio . "%";
                                            } elseif ($metaangio >= 100) {
                                                echo "Meta Concluída!";
                                            } ?>
                                        
                                        </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar 
                                        
                                        <?php
                                        if ($metaangio <= 50) {
                                            echo "bg-danger";
                                        } elseif ($metaangio < 100) {
                                            echo "bg-warning";
                                        } elseif ($metaangio >= 100) {
                                            echo "bg-success";
                                        }
                                        
                                        ?>
                                        
                                        " role="progressbar" style="width: <?php echo $metaangio; ?>%"
                                            aria-valuenow="<?php echo $metaangio; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Doppler - (<?php echo $doppler; ?>)<span
                                            class="float-right">

                                            <?php
                                            if ($metadoppler < 100) {
                                            echo $metadoppler . "%";
                                            } elseif ($metadoppler >= 100) {
                                                echo "Meta Concluída!";
                                            } ?>
                                        
                                        </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar 
                                        
                                        <?php
                                        if ($metadoppler <= 50) {
                                            echo "bg-danger";
                                        } elseif ($metadoppler < 100) {
                                            echo "bg-warning";
                                        } elseif ($metadoppler >= 100) {
                                            echo "bg-success";
                                        }
                                        
                                        ?>
                                        
                                        " role="progressbar" style="width: <?php echo $metadoppler; ?>%"
                                            aria-valuenow="<?php echo $metadoppler; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Ecocardiograma - (<?php echo $eco; ?>)<span
                                            class="float-right">

                                            <?php
                                            if ($metaeco < 100) {
                                            echo $metaeco . "%";
                                            } elseif ($metaeco >= 100) {
                                                echo "Meta Concluída!";
                                            } ?>
                                        
                                        </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar 
                                        
                                        <?php
                                        if ($metaeco <= 50) {
                                            echo "bg-danger";
                                        } elseif ($metaeco < 100) {
                                            echo "bg-warning";
                                        } elseif ($metaeco >= 100) {
                                            echo "bg-success";
                                        }
                                        
                                        ?>
                                        
                                        " role="progressbar" style="width: <?php echo $metaeco; ?>%"
                                            aria-valuenow="<?php echo $metaeco; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Raio X - (<?php echo $rx; ?>)<span
                                            class="float-right">

                                            <?php
                                            if ($metarx < 100) {
                                            echo $metarx . "%";
                                            } elseif ($metarx >= 100) {
                                                echo "Meta Concluída!";
                                            } ?>
                                        
                                        </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar 
                                        
                                        <?php
                                        if ($metarx <= 50) {
                                            echo "bg-danger";
                                        } elseif ($metarx < 100) {
                                            echo "bg-warning";
                                        } elseif ($metarx >= 100) {
                                            echo "bg-success";
                                        }
                                        
                                        ?>
                                        
                                        " role="progressbar" style="width: <?php echo $metarx; ?>%"
                                            aria-valuenow="<?php echo $metarx; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Tomografia - (<?php echo $tc; ?>)<span
                                            class="float-right">

                                            <?php
                                            if ($metatc < 100) {
                                            echo $metatc . "%";
                                            } elseif ($metatc >= 100) {
                                                echo "Meta Concluída!";
                                            } ?>
                                        
                                        </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar 
                                        
                                        <?php
                                        if ($metatc <= 50) {
                                            echo "bg-danger";
                                        } elseif ($metatc < 100) {
                                            echo "bg-warning";
                                        } elseif ($metatc >= 100) {
                                            echo "bg-success";
                                        }
                                        
                                        ?>
                                        
                                        " role="progressbar" style="width: <?php echo $metatc; ?>%"
                                            aria-valuenow="<?php echo $metatc; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Ultrassonografia - (<?php echo $ultra; ?>)<span
                                            class="float-right">

                                            <?php
                                            if ($metaultra < 100) {
                                            echo $metaultra . "%";
                                            } elseif ($metaultra >= 100) {
                                                echo "Meta Concluída!";
                                            } ?>
                                        
                                        </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar 
                                        
                                        <?php
                                        if ($metaultra <= 50) {
                                            echo "bg-danger";
                                        } elseif ($metaultra < 100) {
                                            echo "bg-warning";
                                        } elseif ($metaultra >= 100) {
                                            echo "bg-success";
                                        }
                                        
                                        ?>
                                        
                                        " role="progressbar" style="width: <?php echo $metaultra; ?>%"
                                            aria-valuenow="<?php echo $metaultra; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <hr class="sidebar-divider d-none d-md-block">
                                    <h4 class="small font-weight-bold">Total de Exames Ambulatoriais: <strong><?php echo $totalamb; ?></strong></h4>
                                    <h4 class="small font-weight-bold">Total de Exames SER: <strong><?php echo $totalser; ?></strong></h4>
                                    <h4 class="small font-weight-bold">Total de Exames: <strong><?php echo $total; ?></strong></h4>
                                </div>
                            </div>

                            

                        </div>

                        
                    </div>
                    
                </div>
                                                   
                  

               
                <!-- /.container-fluid -->




                 <!-- Bootstrap core JavaScript-->


                 <script>



                    </script>
    <script> 
        
        // GRÁFICO DAS CIRURGIAS
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';
        
        // VARIÁVEIS QUE PUXAM AS VARIÁVEIS EM PHP DE CADA MÊS
        var jan="<?php echo $jan; ?>";
        var fev="<?php echo $fev; ?>";
        var mar="<?php echo $mar; ?>";
        var abr="<?php echo $abr; ?>";
        var mai="<?php echo $mai; ?>";
        var jun="<?php echo $jun; ?>";
        var jul="<?php echo $jul; ?>";
        var ago="<?php echo $ago; ?>";
        var set="<?php echo $set; ?>";
        var out="<?php echo $out; ?>";
        var nov="<?php echo $nov; ?>";
        var dez="<?php echo $dez; ?>";
        
        function number_format(number, decimals, dec_point, thousands_sep) {
          // *     example: number_format(1234.56, 2, ',', ' ');
          // *     return: '1 234,56'
          number = (number + '').replace(',', '').replace(' ', '');
          var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
              var k = Math.pow(10, prec);
              return '' + Math.round(n * k) / k;
            };
          // Fix for IE parseFloat(0.55).toFixed(0) = 0;
          s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
          if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
          }
          if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
          }
          return s.join(dec);
        }
        
        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            datasets: [{
              label: "Cirurgias",
              lineTension: 0.3,
              backgroundColor: "rgba(78, 115, 223, 0.05)",
              borderColor: "rgba(78, 115, 223, 1)",
              pointRadius: 3,
              pointBackgroundColor: "rgba(78, 115, 223, 1)",
              pointBorderColor: "rgba(78, 115, 223, 1)",
              pointHoverRadius: 3,
              pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
              pointHoverBorderColor: "rgba(78, 115, 223, 1)",
              pointHitRadius: 10,
              pointBorderWidth: 2,
              data: [(jan), (fev), (mar), (abr), (mai), (jun), (jul), (ago), (set), (out), (nov), (dez)],
            }],
          },
          options: {
            maintainAspectRatio: false,
            layout: {
              padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
              }
            },
            scales: {
              xAxes: [{
                time: {
                  unit: 'date'
                },
                gridLines: {
                  display: false,
                  drawBorder: false
                },
                ticks: {
                  maxTicksLimit: 7
                }
              }],
              yAxes: [{
                ticks: {
                  maxTicksLimit: 5,
                  padding: 10,
                  // Include a dollar sign in the ticks
        
                },
                gridLines: {
                  color: "rgb(234, 236, 244)",
                  zeroLineColor: "rgb(234, 236, 244)",
                  drawBorder: false,
                  borderDash: [2],
                  zeroLineBorderDash: [2]
                }
              }],
            },
            legend: {
              display: false
            },
            tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              titleMarginBottom: 10,
              titleFontColor: '#6e707e',
              titleFontSize: 14,
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              intersect: false,
              mode: 'index',
              caretPadding: 10,
              
            }
          }
        });
        
            </script>


<!-- TAXA DE OCUPAÇÃO -->
<script>

var taxa="<?php echo $taxa; ?>";
      // Crie o gráfico de medidor
      const grafico = new JustGage({
        id: "grafico",
        value: taxa,
        min: 0,
        max: 100,
        
        label: "Internados %",
        gaugeWidthScale: 0.7,
        customSectors: [
          {
            color: "#ff0000",
            lo: 0,
            hi: 69
          },
          {
            color: "#f6c23e",
            lo: 69,
            hi: 79
          },
          {
            color: "#00ff00",
            lo: 79,
            hi: 100
          }
        ]
      });
    </script>




<!-- DÁ PRA USAR NO DROPDOWN 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.item-header').click(function() {
        $(this).next('.item-content').slideToggle();
      });
    });
  </script>
  <style>
    .item-content {
      display: none;
    }
  </style>
  <div class="accordion">
    <h2 class="item-header">Item 1</h2>
    <div class="item-content">
      <p>Conteúdo do item 1.</p>
    </div>
    <h2 class="item-header">Item 2</h2>
    <div class="item-content">
      <p>Conteúdo do item 2.</p>
    </div>
    <h2 class="item-header">Item 3</h2>
    <div class="item-content">
      <p>Conteúdo do item 3.</p>
    </div>
  </div>  -->