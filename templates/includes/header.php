<?php 
	
	require_once "../classes/entidades/Entidade.class.php";
	require_once "../classes/dao/ConexaoDB.class.php";
	require_once "../classes/dao/UsuarioDao.class.php";
	require_once "../classes/dao/PaginaDao.class.php";
	require_once "../classes/dao/ProjetoDao.class.php";
	require_once "../classes/dao/TarefaDao.class.php";
	require_once "../classes/dao/InsereTarefaDao.class.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PGK - Processo Generico Kanban</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">PGK - Gerenciador</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-bars"></i> Inicio</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#usuario"><i class="fa fa-users"></i> Usuarios <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="usuario" class="collapse">
                            <li>
                                <a href="cadastra-usuario.php">Novo Usuario</a>
                            </li>
                            <li>
                                <a href="lista-usuario.php">Listar Usuario</a>
                            </li>
                        </ul>
                        <a href="javascript:;" data-toggle="collapse" data-target="#projeto"><i class="fa fa-file-text"></i> Projetos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="projeto" class="collapse">
                            <li>
                                <a href="#">Novo Projeto</a>
                            </li>
                            <li>
                                <a href="#">Projetos ativos</a>
                            </li>
						</ul>                       
                        <a href="javascript:;" data-toggle="collapse" data-target="#tarefa"><i class="fa fa-list"></i> Tarefas <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="tarefa" class="collapse">
                            <li>
                                <a href="#">Nova tarefa</a>
                            </li>
                            <li>
                                <a href="#">Listar Tarefa</a>
                            </li>
                        </ul>    
                        
                    </li>
                    
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-bar-chart"></i> Relatorios</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
