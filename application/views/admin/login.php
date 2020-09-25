<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Facultad de Tecnologia | USFX</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url() ?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="formulario">
              <h1>Facultad de Tecnologia</h1>
              <h3>Administración</h3>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" id="user" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" id="password" />
              </div>
              <div>
                <input class="btn btn-default submit" type="submit" name="Enviar" value="Entrar">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                
                <br />

                <div>
                  <h1><i class="fa fa-university"></i> Laboratorio Fisica</h1>
                  <p>©2018 All Rights Reserved. USFX. Facultad de Tecnologia.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
    <script src="<?php echo base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
     <script>
      $(document).ready(function() {
        // Variable to hold request
        var urlPost ='http://localhost/laboratorio/index.php/Admin/login';

        // Bind to the submit event of our form
        $("#formulario").submit(function(event){
            event.preventDefault();

            var user = $("#user").val();
            var password = $("#password").val();

            $.ajax({
                    url : urlPost,
                    type: "POST",
                    data:{
                       user: user,
                       password: password,
                     },
                    success: function(data)
                    {
                        if(data==0){
                            alert('ERROR DE DATOS');
                        }else{
                            var url = 'http://localhost/laboratorio/index.php/Laboratorio/Docente/';
                            window.location = url;
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error get data from ajax');
                    }
            });
        });
      });
    </script>
  </body>
</html>
