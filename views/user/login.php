<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Ponto Eletrônico</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
        <meta property="og:title" content="">
        <meta property="og:image" content="">
        <meta property="og:url" content="">
        <meta property="og:site_name" content="">
        <meta property="og:description" content="">

        <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="">
        <meta name="twitter:title" content="">
        <meta name="twitter:description" content="">
        <meta name="twitter:image" content="">

        <!-- Google Fonts -->
        <!--<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">-->

        <!-- Bootstrap CSS File -->
        <link href="../assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="../assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="../assets/css/style.css" rel="stylesheet">

        <!-- =======================================================
          Theme Name: Bell
          Theme URL: https://bootstrapmade.com/bell-free-bootstrap-4-template/
          Author: BootstrapMade.com
          Author URL: https://bootstrapmade.com
        ======================================================= -->
    </head>

    <body id="body">

        <section class="hero">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12">
                        <a class="hero-brand" href="index.html" title="Home"><img alt="Ponto Eletrônico" src="<?= ROOT_URL ?>assets/img/logo1.png"></a>
                    </div>
                </div>
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>"> 
                    <div class="row justify-content-md-center">
                        <div class="col-md-5">
                            <div class="card">

                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <h2 style="color: gray;margin-bottom: 10%; margin-top: 10%;">Acesso ao Sistema</h2>
                                        <hr>
                                    </div>
                                </div>

                                <div class="row justify-content-md-center">

                                    <div class="col-md-8">
                                        <div class="form-group has-danger">
                                            <label class="sr-only" for="email">E-Mail Address</label>
                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                <div class="input-group-addon" style="width: 2.6rem">
                                                    <i class="fa fa-user"style="color:gray"></i>
                                                </div>
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Informe seu e-mail" required autofocus>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row justify-content-md-center">

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="sr-only" for="password">Password</label>
                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                <div class="input-group-addon" style="width: 2.6rem">
                                                    <i class="fa fa-lock" style="color:gray"></i>
                                                </div>
                                                <input type="password" name="senha" class="form-control" id="senha" placeholder="Informe sua senha" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row justify-content-md-center" style="margin-bottom: 10%;">

                                    <div class="col-md-8">
                                        <input class="btn btn-primary btn-block" name="submit" type="submit" value="Entrar"/>
                                    </div>

                                </div>
                                <div class="row justify-content-md-center">

                                    <div class="col-md-8">
                                        <?php \Config\Message\Message::display(); ?>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>



        </div>

    </section>



</body>
</html>
