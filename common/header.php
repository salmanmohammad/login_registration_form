<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>
      <?php $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
    echo explode(".",$curPageName)[0]; ?></title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css?id=1" rel="stylesheet" media="screen">
    <link href="css/main.css?reload=12" rel="stylesheet" media="screen">
  </head>
  <body>
    <div class="bg_image"></div>
    <div class="container" style="padding-top:20px">
    