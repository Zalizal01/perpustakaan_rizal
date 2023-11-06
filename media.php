<?php 
session_start();
if (!isset($_SESSION['login'])) {
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Perpustakaan</title>
	<script type="text/javascript" src="desain/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="desain/js/jquery-ui-1.8.21.custom.min.js"></script>
	<script type="text/javascript" src="desain/js/superfish.js"></script>
	<!-- untuk mask -->
	<script type="text/javascript" src="desain/js/jquery.maskedinput.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		   $('ul.sf-menu').superfish();
	  });
	</script>
	<link rel="stylesheet" href="desain/media.css">
	<link rel="stylesheet" href="desain/penerbit.css">
	<link rel="stylesheet" href="desain/tambah_penerbit.css">
</head>
<body>
<div class="container">
	<div class="header">
		<h1 style="text-align: center">PERPUSTAKAAN</h1>
	</div>
	
	<div class="menu">
  <?php include 'menu.php';?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.menu_dropdown').click(function(){
        $(this).next().slideToggle();
        $(this).toggleClass('active');
      });
    });
  </script>
</div>

	<div class="content" id="isi">
		<?php include 'content.php';?>
	</div>
	<div class="footer">
		<marquee>SMK INFORMATIKA CBI</marquee>
	</div>
</div>
</body>
</html>