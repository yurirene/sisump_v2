<!doctype html>
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

    <body class="text-center">
        <style>
            html,
            body {
                height: 100%;
            }

            body {
                display: -ms-flexbox;
                display: -webkit-box;
                display: flex;
                -ms-flex-align: center;
                -ms-flex-pack: center;
                -webkit-box-align: center;
                align-items: center;
                -webkit-box-pack: center;
                justify-content: center;
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #f5f5f5;
            }
        </style>
        <form class="form-signin" action="<?=$router->route("app.logar")?>" method="POST">
            <?=flash()?>
            <img class="mb-4" src="" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Login</h1>
            <label for="usuario" class="sr-only">Usuário</label>
            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuário" required autofocus>
            <label for="senha" class="sr-only">Password</label>
            <input type="password" id="senha" name="senha" class="form-control" placeholder="Password" required>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
            <p class="mt-5 mb-3 text-muted">UMP Net &copy; 2020</p>
        </form>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="<?=assets("js/popper.min.js");?>"></script>
        <script src="<?=assets("js/bootstrap.min.js");?>"></script>
        <script>$('.alert').alert()</script>
        
    </body>
</html>
