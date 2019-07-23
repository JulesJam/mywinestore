<?php

 

 
    require_once('wine.php');

    function clean_input($entered_data)
    {
      $bad_characters = array('{','}','(',')',';',':','<','>','/','$','?');
      $entered_data = str_ireplace($bad_characters, '', $entered_data);
      $entered_data = htmlentities($entered_data);
      $entered_data = strip_tags($entered_data);
      if(get_magic_quotes_gpc()){
        $entered_data = stripslashes($entered_data);
      }

      return $entered_data;
    } 

    if((isset($_POST['wine_style']))&&(isset($_POST['wine_name']))&&(isset($_POST['wine_grape']))&&(isset($_POST['wine_producer']))&&(isset($_POST['wine_year']))&&(isset($_POST['wine_region']))&&(isset($_POST['wine_stock'])))
    {
      $wine_style = clean_input($_POST['wine_style']);
      $wine_name = clean_input($_POST['wine_name']);
      $wine_grape = clean_input($_POST['wine_grape']);
      $wine_producer = clean_input($_POST['wine_producer']);
      $wine_year = clean_input($_POST['wine_year']);
      $wine_region = clean_input($_POST['wine_region']);
      $wine_stock = clean_input($_POST['wine_stock']);
      
     
    } 

    
  
    $wine1 = new Wine($wine_style, $wine_name, $wine_grape, $wine_producer, $wine_year, $wine_region, $wine_stock); 

 

    list($style_error, $name_error, $grape_error, $producer_error, $year_error, $region_error, $stock_error) = explode(',', $wine1);

    print $style_error == 'TRUE' ? 'Name Update successful<br/>' : "Name update failed <br/>";

    print $name_error == 'TRUE' ? 'Name Update successful<br/>' : "Name update failed <br/>";

    print $grape_error == 'TRUE' ? 'Grape Update successful<br/>' : "Grape update failed <br/>";

    print $producer_error == 'TRUE' ? 'Producer Update successful<br/>' : "Producer update failed <br/>";

    print $year_error == 'TRUE' ? 'Year Update successful<br/>' : "Year update failed <br/>";

    print $region_error == 'TRUE' ? 'Region Update successful<br/>' : "Region update failed <br/>";

    print $stock_error == 'TRUE' ? 'Number of Bottles Update successful<br/>' : "Number of Bottles update failed <br/>";

    if($style_error && $name_error && $grape_error && $producer_error && $year_error &&$region_error && $stock_error) {$wine = $wine1->get_wine();} else
     {
      header( 'Location: http://test1.test/index.html' );
      };

      $wine = $wine1->get_wine();


?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>My Wine Collection</title>
  <meta name="My Wine Collection" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="../js/validator.js"></script>

  <style type="text/css">
    #JS{display: none;}
  </style>
  <script>
    function checkJS(){
      document.getElementById('JS').style.display = "inline";
      console.log("JS working");
    }
  </script>



  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body onload="checkJS();">
  <div id='JS'>
    --JS--
  </div>
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <p>Hello world! This is HTML5 Boilerplate.</p>
  <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
  Here is the wine <?= $wine ?>
</body>

</html>
