<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud com bootstrap</title>

    <!-- Biblioteca bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Alternar de navegação</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?php echo BASEURL; ?>index.php" class="navbar-brand" href="#">DTP Software</a>
            </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Início</a></li>
                <li><a href="#">Opções</a></li>
                <li><a href="#">Perfil</a></li>
                <li><a href="#">Ajuda</a></li>
            </ul>
        </div>
        <div id="main" class="container-fluid">
            <h3 class="page-header">Modelo inicial</h3>
        </div>
    </nav>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>