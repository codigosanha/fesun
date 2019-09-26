<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>FESUN en línea | Login</title>

    <!-- Bootstrap -->
   <!--menu-->
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel='stylesheet' type='text/css' />
           
    <style>
        body{
            padding-top: 80px;
        }
    </style>

</head>
<body>
    <div class="container">
        
        <div class="row">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
                <div class="panel panel-default">
                    <!--<div class="panel-heading">
                        <h4>Iniciar Sesión</h4>
                    </div>-->
                    <div class="head">
                        <img src="images/mem2.jpg" alt=""/>
                    </div>  
                    <div class="panel-body">  
                    
                        <form action="<?php echo base_url(); ?>auth/verificar" method="POST">
                            <?php if ($this->session->flashdata("error")): ?>
                                <div class="alert alert-danger text-center">
                                    <strong>Error!</strong> <?php echo $this->session->flashdata("error"); ?>
                                </div>
                            <?php endif ?>
                            <div class="form-group">
                                <label for="email">Email o cedula:</label>
                                <input type="text" name="email" id="email" class="form-control" required placeholder="Digite su correo o cedula">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" name="password" id="password" class="form-control" required placeholder="Digite su contraseña">
                            </div>
                            <div class="form-group">
                                <label for="rol">Tipo de Usuario:</label>
                                <select name="rol" id="rol" class="form-control">
                                    <option value="1">Administrador</option>
                                    <option value="2">Usuario</option>
                                    <option value="3">Gestor de Archivos</option>
                                </select>
                            </div>
                            <div >
                                 <input type="submit" name="login" value="Iniciar Sesión" class="btn btn-success">
                                 
                         </div>
                         
                        </form>
                        <div class="link">
                            <!--<a href="<?php echo base_url(); ?>auth/registro" >Registrarse</a>-->
                            
                            <hr/>
                            <a href="http://fesunenlinea.com" >Volver al portal web</a>
                        </div>
                    </div>  
                </div>
                
            </div>
        </div>
    </div>
<!---start-copyright-->
                    <div class="copy-right">
                        <p>Diseño: <a href="http://on-praxis.com" target="_blank">On praxis✔ </a></p> 
                    </div>
                <!---//end-copyright-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>