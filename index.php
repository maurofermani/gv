<?php
$menu = array("Inicio" => "inicio",
    "Global Village" => array(0 => "gv",
        1 => array(
            "El evento" => "gv",
            "Fecha, hora y lugar" => "fhl",
            "Cronograma" => "cronograma")),
    "AIESEC" => array(0 => "abb",
        1 => array("Bahía Blanca" => "abb",
            "Internacional" => "aiesec")),
    "Contacto" => "contacto"
);

$menu = array("Inicio" => "inicio", "AIESEC" => "abb", "Contacto" => "contacto", "El evento" => "gv");

$actual = '';

/* obtengo la pagina seleccionada */
if (isset($_GET["option"])) {
    $actual = strtolower($_GET["option"]);
} else {
    $actual = "inicio";
}
/* evaluo cual es el menu actual
  while (list ($key, $value) = each($array)) {
  if (is_array($value){
  if($value[0]==$actual){
  break;
  }else if (esta_aca($value[1]){
  $actual=
  }
  }else{

  }
  } */

function esta_aca($array, $actual) {
    while (list ($key, $value) = each($array)) {
        if ($value == $actual)
            return true;
    }
    return false;
}

function tree_menu($array, $actual, $raiz = 0) {
    $colores = array("red", "blue", "purple", "yellow");
    echo "<ul id='topmenu'>";
    $i = 0;
    while (list ($key, $value) = each($array)) {
        $corriente = '';
        if (is_array($value)) {
            if (($raiz == 0) && ( ($value[0] == $actual) || (esta_aca($value[1], $actual)) )) {
                $corriente = ' class="current"';
            }
            echo "<a href='index.php?option=" . $value[0] . "'" . $corriente . "><li>" . $key . "</li></a>";
            //tree_menu($value[1], 1);
            echo "";
        } else {
            if (($raiz == 0) && ($value == $actual)) {
                $corriente = ' class="current"';
            }
            echo "<a href='index.php?option=" . $value . "'" . $corriente . "><li class='" . $colores[$i] . "'>" . $key . "</li></a>";
            $i++;
        }
    }
    echo "</ul>";
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">

    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Global Village - Bahía Blanca</title>
        <link rel="stylesheet" href="css/animated-menu.css" type="text/css" />
        <link rel="stylesheet" href="css/estilos.css" type="text/css" />
        <link rel="stylesheet" href="css/slideshow.css">
            <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
            <script src="js/jquery.min.js" type="text/javascript"></script>
            <script src="js/slider.min.js" type="text/javascript"></script>
            <script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
            <script src="js/animated-menu.js" type="text/javascript"></script>
            <script type="text/javascript">
                
                $(function () {

                    var msie6 = $.browser == 'msie' && $.browser.version < 7;

                    if (!msie6) {
                        var top = $('#socialmedia').offset().top - parseFloat($('#socialmedia').css('margin-top').replace(/auto/, 0));
                        $(window).scroll(function (event) {
                            // what the y position of the scroll is
                            var y = $(this).scrollTop();

                            // whether that's below the form
                            if (y >= top) {
                                // if so, ad the fixed class
                                $('#socialmedia').addClass('fixed');
                            } else {
                                // otherwise remove it
                                $('#socialmedia').removeClass('fixed');
                            }
                        });
                    }
                });
	
                /*Google analitycs*/
                var _gaq = _gaq || [];
                _gaq.push(['_setAccount', 'UA-19754226-1']);
                _gaq.push(['_setDomainName', 'globalvillage.aiesecbb.com.ar']);
                _gaq.push(['_trackPageview']);

                (function() {
                    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                })();
                
                window.addEvent("domready",function(){
                    //var divs = $(document.body).getElements('div');
                    //divs[divs.length-1].set('html', '');
                });
            </script>

    </head>
    <body>
        <div id="wrapper">

            <!--Columnas fijas-->
            <div id="header">
                <div id="top">
                    <!--Menu-->
                    <?php tree_menu($menu, $actual); ?>
                </div>
                <div id="logo">
                    <h1><img src="images/logo.png" alt="Global Village" /></h1>
                </div>
            </div>

            <div id="content">
                <!--Contenido-->
                <div id="main">
                    <?php
                    if (file_exists("html/$actual.html")) {
                        include("html/$actual.html");
                    } else {
                        include("html/error.html");
                    }
                    ?>
                </div>

                <div id="side">
                    <h4>Organiza</h4>
                    <p><a href="http://www.aiesecbb.com.ar" target="_blank"><img src="images/partners/aiesec.png" /></a> </p>
                    <h4>Auspicia</h4>
                    <p><a href="http://www.bahiablanca.gov.ar/" target="_blank"><img src="images/partners/escudo_municipal.png" /></a> </p>
                    <p><a href="#" target="_blank"><img src="images/partners/unico.png" /></a> </p>
                    <p><a href="http://www.swwschool.com.ar" target="_blank"><img src="images/partners/sww.jpg" /></a> </p>
                    <p><a href="http://www.unixono.com.ar" target="_blank"><img src="images/partners/unixono.png" /></a> </p>
                    <p><a href="http://www.queres-viajar.com/" target="_blank"><img src="images/partners/rh.png" /></a><br />
                        <h4>Partners</h4>
                        <p><a href="http://www.uns.edu.ar" target="_blank"><img src="images/partners/uns.jpg" /></a><br />
                            <a href="http://www.deltados.com.ar" target="_blank"><img src="images/partners/deltados.jpg" /></a><br />
                            <a href="http://www.fundacionacce.org.ar" target="_blank"><img src="images/partners/fundacionacce.jpg" /></a></p>
                </div>

                <div id="socialmedia">
                    <p>
                        <a href="http://www.facebook.com/aiesecbahia" target="_blank">
                            <img src="images/socialmedia/facebook.png" alt="Facebook" />
                        </a>
                    </p>
                    <p><a href="http://www.twitter.com/AIESEC_BB" target="_blank">
                            <img src="images/socialmedia/twitter.png" alt="Twitter" /></a>
                    </p>

                </div>

            </div>

            <!--Footer-->
            <div id="pie">
            </div>
        </div>
    </body>


</html>
