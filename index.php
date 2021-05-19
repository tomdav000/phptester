<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <?php include('./routes/routes.php'); ?>
    <title>Hello, world!</title>
    <?php
	  $mysqli = new mysqli('localhost','root','root','show')or die(mysqli_error($mysqli));
	?>
	<?php 
		$results = $mysqli->query("SELECT * FROM podcasts") or die($mysqli->error);
	?>
  </head>
  <body>
    <h1 class="text-center">Hello, world!</h1>
    <div class='text-center'>
    	<br/>
    	<?php while($row = $results->fetch_assoc()): ?>
    	<p><?php echo $row['title']; ?> : <?php echo $row['about']; ?></p>
    	<a href="index.php?edit=<?php echo $row['id']; ?>">EDIT</a> ||
    	<a href="routes/routes.php?delete=<?php echo $row['id']; ?>">REMOVE</a>
    	<?php endwhile; ?>
    	<br/>
    	<img width="100" src="https://instagram.fiev17-1.fna.fbcdn.net/v/t51.2885-15/e35/p1080x1080/150984277_433284584458600_6934462690180883590_n.jpg?tp=1&_nc_ht=instagram.fiev17-1.fna.fbcdn.net&_nc_cat=104&_nc_ohc=5JEja9Yy074AX9BFl26&oh=7815d935819778d9cbc8834cb2fc6f59&oe=60664274"/>
    	<br/>
    	<video controls width='100' autoplay loop src="https://instagram.fiev22-2.fna.fbcdn.net/v/t50.2886-16/128373217_189060596144702_5355526867951398275_n.mp4?efg=eyJ2ZW5jb2RlX3RhZyI6InZ0c192b2RfdXJsZ2VuLjcyMC5mZWVkLmRlZmF1bHQiLCJxZV9ncm91cHMiOiJbXCJpZ193ZWJfZGVsaXZlcnlfdnRzX290ZlwiXSJ9&_nc_ht=instagram.fiev22-2.fna.fbcdn.net&_nc_cat=102&_nc_ohc=bYOQJA1x0EYAX9zhmCK&vs=17860701563240516_821818114&_nc_vs=HBksFQAYJEdPSFJwZ2NfbXF3Wjg2c0FBSU90VGNWUHAxSktia1lMQUFBRhUAAsgBABUAGCRHT0o2bWdjY2ZTWE8xdWtKQUladF9FWHR2dlJaYmtZTEFBQUYVAgLIAQAoABgAGwAVAAAmiN6q%2BtONuj8VAigCQzMsF0AkMzMzMzMzGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHXqBwA%3D&_nc_rid=f29397e74e&oe=603D479D&oh=5c2c5a29675e0d6f185ae449c4969972"></video>
    	<br/>
    	<br/>
    	<form method='POST' action='routes/routes.php'>
    	<input type='hidden' name='id' value='<?php echo $id; ?>'/>
    	<input type='text' name='title' placeholder="Title" value='<?php echo $title; ?>'/>
    	<input type='text' name='about' placeholder="About" value='<?php echo $about; ?>'/>
    	<?php if($update == true): ?>
    		<input type='submit' name='update' value='update'/>
    	<?php else: ?>
    		<input type='submit' name='add' value='add'/>
    	<?php endif; ?>
    	</form>
    	<br/>
    	<br/>
    	<a href="index.php">home</a>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>