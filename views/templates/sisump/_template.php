<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Sistema de Estátistica da UMP">
        <meta name="author" content="Yuri Ferreira">
        <link rel="icon" href="<?=assets("img/favicon.ico");?>">

        <title><?=$this->e($title)?></title>

        <!-- Bootstrap core CSS -->
        <link href="<?=assets("css/bootstrap.min.css");?>" rel="stylesheet">
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        <!-- Custom styles for this template -->
        <link href="<?=assets("css/dashboard.css");?>" rel="stylesheet">
    </head>

    <body>
        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar-header ">
                    <img src="<?= assets("img/logo.png")?>" height="75px"/> <b class="align-middle" style="font-size: 2rem;">SISUMP</b>
                </div>

                <ul class="list-unstyled components">
                    
                    <li>
                        <a href="<?=url("SISUMP/");?>"><i class="fas fa-fw fa-home mr-2"></i>Início</a>
                    </li>
                    <li>
                        <a href="<?=url("SISUMP/Diretoria");?>"><i class="fas fa-fw fa-users mr-2"></i>Diretoria</a>
                    </li>
                    <?=$this->insert("sisump/menu/{$_SESSION['usuario']['menu']}")?>
                    <li>
                        <a href="<?=url("SISUMP/Alterar-Senha");?>"><i class="fas fa-fw fa-key mr-2"></i>Alterar Senha</a>
                    </li>
                    <li>
                        <a href="<?=url("SISUMP/Logout");?>"><i class="fas fa-fw fa-sign-out-alt mr-2"></i>Sair</a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content  -->
            <div id="content">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <button type="button" id="sidebarCollapse" class="btn btn-info">
                                    <i class="fas fa-align-left"></i>
                                    <span>Menu</span>
                                </button><i class="ml-4">Sistema UMP</i>
                            </div>
                        </div>

                        
                    </div>
                </nav>

                <?=$this->section('content');?>
            </div>
        </div>
        
        

        <!-- Bootstrap core JavaScript
================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="<?=assets("js/popper.min.js");?>"></script>
        <script src="<?=assets("js/bootstrap.min.js");?>"></script>
        <script src="<?=assets("js/jquery.mask.js");?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.date').mask('00/00/0000');
                $('.celular').mask('(00) 00000-0000');
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>
        <?=$this->section("script");?>
        <script>$('.alert').alert()</script>
        
    </body>
</html>
