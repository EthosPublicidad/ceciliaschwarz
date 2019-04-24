<?php 
session_start();
$_SESSION['login'] = 'false';
$_SESSION['apellidonombre'] = '';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tec One</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        <div class="row">
			<div class="row text-center" style="margin-top: 5%;">
				<img src="../images/logo.png" />
			</div>
			<?php
				if(isset($_SESSION['msg']) and $_SESSION['msg']!=''){
					echo "<div class='col-lg-12'>";
					echo '<div class="alert alert-success text-center">'.$_SESSION['msg'].'</div>';
					echo "</div>";
					$_SESSION['msg'] = '';
				}
				if(isset($_SESSION['msgerror']) and $_SESSION['msgerror']!=''){
					echo "<div class='col-lg-12'>";
					echo '<div class="alert alert-danger text-center">'.$_SESSION['msgerror'].'</div>';
					echo "</div>";
					$_SESSION['msgerror'] = '';
				}
			?>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ingreso al Sistema</h3>
                    </div>
                    <div class="panel-body">
                        <form action="gestion.php" method="POST" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nombre de Usuario" name="usuario" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Clave" name="clave" type="password" required>
                                </div>
								<input name="opcion" type="hidden" value="login">
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Ingresar</button>
                            </fieldset>
                        </form>
						<div class="text-center">
							<a href="#" onclick="$('#olvide').removeClass('hide');">Olvid&eacute; mi clave</a>
						</div>
					</div>
					<div class="text-center col-md-12 hide" id="olvide" style="margin-top:3%;">
						<form action="gestion.php" name="formulario" method="POST">
							<div class="">
								<label>Ingrese su email:</label>
								<input class="form-control" type="text" name="mail" required>
								<input type="hidden" name="opcion" value="recuperarclavegestion">
							</div>
							<div class="">
								<input type="submit" class="btn btn-primary" value="Enviar">
							</div>
						</form>	
					</div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
