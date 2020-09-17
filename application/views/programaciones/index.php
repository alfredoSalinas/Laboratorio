 <!DOCTYPE html>
<html lang="en">
  <head>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <!-- Meta, title, CSS, favicons, etc. -->
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <title>Facultad de Tecnologia | USFX </title>

	    <!-- Bootstrap -->
	    <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
		  <link rel="stylesheet" href="<?php echo base_url()?>css/font-awesome.min.css">
		  <link rel="stylesheet" href="<?php echo base_url()?>css/custom.min.css">
	    <!-- jQuery -->
	    <script src="<?php echo base_url()?>js/jquery-3.3.1.min.js"></script>
	    <!-- Bootstrap -->
	    <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
  </head>

<body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Programacion Laboratorio Fisica</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo base_url()?>images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>Estudiante</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>...</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Principal <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Ayuda</a></li>
                      <li><a href="salir.php">Salir</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url()?>images/user.png" alt="">Estudiante
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="salir.php"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
<div class="right_col" role="main">
	-
	<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>PROGRAMACION LABORATORIO DE FISICA:: <small>Estudiante</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
			
			<form name="formu" method="POST" action="opcion_programar_save.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
				<input type="hidden" name="id_estudiante" id="id_estudiante" value="6496"><input type="hidden" name="cu" id="cu" value="26-2147">
				<input type="hidden" name="nombre_completo" id="nombre_completo" value="Salinas Zeballos Alfredo">
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="celular">C.U.:    </label>
					<div class="col-md-6 col-sm-6 col-xs-12">      <h4>26-2147</h4>    
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="celular">ESTUDIANTE:</label>
					<div class="col-md-6 col-sm-6 col-xs-12"><h4>Salinas Zeballos Alfredo</h4>
					</div>
				</div>
			<div class="form-group">    
				<label class="control-label col-md-3 col-sm-3 col-xs-12">GRUPO <span class="required">*</span>:</label>
				<div class="col-md-6 col-sm-6 col-xs-12">      
					<select id="id_grupo" name="id_grupo" class="select2_single form-control" tabindex="-1">
						<option></option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="celular">CELULAR <span class="required">*</span>:
				</label>    
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="celular" name="celular" required="required" class="form-control col-md-7 col-xs-12">
				</div>
			</div>
			<div class="form-group">    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">EMAIL:</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
				</div>
			</div>
			<div class="ln_solid">
				
			</div>
			<div class="form-group">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
					<button type="submit" class="btn btn-primary">PROGRAMAR LABORATORIO</button>
				</div>
			</div>
			</form>
			</div>
        </div>
    </div>
	</div>

	</div>
	    <!-- /page content -->

	    <!-- footer content -->
	<footer>
		<div class="pull-right">
	        LABORATORIO DE FISICA - Facultad de Tecnologia by <a href="#">DIA</a>
		</div>
		<div class="clearfix"></div>
	</footer>
	    <!-- /footer content -->
	</div>
</div>
<!-- Skycons -->
<script src="<?php echo base_url()?>js/skycons.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo base_url()?>js/custom.min.js"></script>


</body>
</html>
