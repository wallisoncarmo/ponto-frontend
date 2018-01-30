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
        <link href="<?= ROOT_URL ?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="<?= ROOT_URL ?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="<?= ROOT_URL ?>assets/css/style.css" rel="stylesheet">



        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="<?= ROOT_URL ?>assets/lib/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- Bootstrap time Picker -->

        <!-- =======================================================
          Theme Name: Bell
          Theme URL: https://bootstrapmade.com/bell-free-bootstrap-4-template/
          Author: BootstrapMade.com
          Author URL: https://bootstrapmade.com
        ======================================================= -->
    </head>

    <body id="body">


        <!-- Header -->
        <header id="header">
            <div class="container">

                <div id="logo" class="pull-left">
                    <a href="index.html"><img src="<?= ROOT_URL ?>assets/img/logo-nav1.png" alt="" title="" /></img></a>
                    <!-- Uncomment below if you prefer to use a text image -->
                    <!--<h1><a href="#hero">Bell</a></h1>-->
                </div>

                <nav  id="nav-menu-container">
                    <ul class="nav-menu">
                        <li><a href="<?= ROOT_URL ?>">Principal</a></li>
                        <li><a href="<?= ROOT_URL ?>ponto/espelho">Espelho de ponto</a></li>
                        <li><a href="<?= ROOT_URL ?>ponto/justificativa-lista">Justificativas</a></li>
                    </ul>
                </nav>
                <nav class="pull-right" id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-has-children">
                            <a href="#">Bem Vindo,<?=$_SESSION['user']['nome']?></a>
                            <ul>
                                <li><a href="<?= ROOT_URL ?>user/logout">Sair</a></li>
                            </ul>
                        </li>
                    </ul>

                </nav>

            </div>
        </header>
        <!-- #header -->

        <!-- About -->

        <section class="about" id="about">
            <div class="container">



                <div class="row text-center">

                    <div class="col-lg-12 col-xs-12">
                        <h1>Hora Atual</h1>
                    </div>

                    <div class="col-lg-12 col-xs-12">
                        <div id="clockdiv">

                            <div>
                                <span class="hours" id="hours"></span>
                                <div class="smalltext">Horas</div>
                            </div>
                            <div>
                                <span class="minutes" id="minutes"></span>
                                <div class="smalltext">Minutos</div>
                            </div>
                            <div>
                                <span class="seconds" id="seconds"></span>
                                <div class="smalltext">Segundos</div>
                            </div>
                        </div>
                    </div>
                </div>

                <br/>
                <hr/>

                <div id="message">
                    <?php Config\Message\Message::display(); ?>
                </div>
                <?php require ($view); ?>



            </div>
        </section>
        <!-- /About -->
        <!-- Parallax -->


        <footer class="site-footer">
            <div class="bottom">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-xs-12 text-lg-left text-center">
                            <p class="copyright-text">
                                © 2018 Ponto Eletrônico - Wallison do Carmo Costa
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <a class="scrolltop" href="#"><span class="fa fa-angle-up"></span></a>

        <!-- Required JavaScript Libraries -->
        <script src="<?= ROOT_URL ?>assets/lib/jquery/jquery.min.js"></script>
        <script src="<?= ROOT_URL ?>assets/lib/jquery/jquery-migrate.min.js"></script>
        <script src="<?= ROOT_URL ?>assets/lib/superfish/hoverIntent.js"></script>
        <script src="<?= ROOT_URL ?>assets/lib/superfish/superfish.min.js"></script>
        <script src="<?= ROOT_URL ?>assets/lib/tether/js/tether.min.js"></script>
        <script src="<?= ROOT_URL ?>assets/lib/stellar/stellar.min.js"></script>
        <script src="<?= ROOT_URL ?>assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= ROOT_URL ?>assets/lib/counterup/counterup.min.js"></script>
        <script src="<?= ROOT_URL ?>assets/lib/waypoints/waypoints.min.js"></script>
        <script src="<?= ROOT_URL ?>assets/lib/easing/easing.js"></script>
        <script src="<?= ROOT_URL ?>assets/lib/stickyjs/sticky.js"></script>
        <script src="<?= ROOT_URL ?>assets/lib/parallax/parallax.js"></script>
        <script src="<?= ROOT_URL ?>assets/lib/lockfixed/lockfixed.min.js"></script>

        <!-- Template Specisifc Custom Javascript File -->
        <script src="<?= ROOT_URL ?>assets/js/custom.js"></script>

        <!-- bootstrap datepicker -->
        <script src="<?= ROOT_URL ?>assets/lib/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

        <script>

            var ROOT_URL = "<?= ROOT_URL ?>";
            var ROOT_CLIENTE = "<?= ROOT_CLIENTE ?>";
            var TOKEN = "<?= $_SESSION['user']['token'] ?>";


            //Timepicker
            $('#datepicker').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy',
                maxDate: 'now',
                locale: "pt-br"
            })

            function startTime(campo = null) {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);

                document.getElementById('hours').innerHTML = h;
                document.getElementById('minutes').innerHTML = m;
                document.getElementById('seconds').innerHTML = s;

                if (campo) {
                    document.getElementById(campo).innerHTML = h + ":" + m + ":" + s;
                }
                var t = setTimeout(startTime, 500);
            }
            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i
                }
                ;  // add zero in front of numbers < 10
                return i;
            }

            startTime();
        </script>

    </body>
</html>
