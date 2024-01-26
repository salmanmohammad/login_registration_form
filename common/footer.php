 <!-- Footer -->
 
 </div> <!-- /container -->  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- The AJAX login script -->
    <?php $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
      $current_page = explode(".",$curPageName)[0]; 
    if($current_page == "login"){ ?>
      <script src="js/login.js?id=12"></script>
    <?php } 
    else{ ?>
      <script src="js/signup.js?id=126"></script>
    <?php } ?>
  </body>
</html>