<?php require 'request.php'?>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Weather App</title>
<link rel="stylesheet"  type="text/css" href="style/main.css">
</head>
<body>
<nav>

<img src="style/icon.png" id="icon" alt="icon">
<h1>Weather!</h1>
    <form id="change-location" action="" method="post" >
        <div id="nav-form">
      <input type="text" id="zipcode" name="zipcode" placeholder="Enter US Zipcode">
        <input type="submit" id="submit" name="submit" value="Go">
        </div>
        
    </form>
</nav>


  

<main>
<h2><?php echo @$data->name; ?></h2>
<h3> <?php echo @$data->main->temp?> &#176; F</h3>

<div id="summary">
    <img src="http://openweathermap.org/img/w/<?php echo @$data->weather[0]->icon ?>.png" alt="icon">
    <p><?php echo @$data->weather[0]->description;?></p>
    <img src="http://openweathermap.org/img/w/<?php echo @$data->weather[0]->icon ?>.png" alt="icon">
</div>

<div id="api-container">
<div id="temperatures">
<p>Low: <?php echo @$data->main->temp_min?> &#176; F</p>
<p>High: <?php echo @$data->main->temp_max?> &#176; F</p>
</div>
<div id="extra">
<p>Wind:  <?php echo @$windResponse?> </p>
<p>Humidity: <?php echo @$data->main->humidity?> </p>
</div>
</div>
</main>
<div id="error"><?php echo @$error ?></div>

<footer>
    <a href="http://www.dana-hedrick.com">Portfolio</a>
    <a href="https://openweathermap.org/">API</a>
    <a href="https://github.com/Peekoh/Weather-App">View Code</a>
   
</footer>
</body>

</html>