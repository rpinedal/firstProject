<div class="sidenav">
    <?php if (isset($_SESSION['username'])){ ?>
  <a href="userupload.php">Subir +</a>
  <a href="MemeMismemes.php">Mis Creadores</a>
    <?php } ?>
  <a href="index.php">Populares</a>
  <a href="new.php">Nuevos</a>
  <a href="MemeMemes.php">Memes</a>
  <a href="MemeDivertido.php">Divertidos</a>
  <a href="MemeJuegos.php">Juegos</a>
  <a href="MemeFracasos.php">Fracasos</a>
  <a href="MemeExitos.php">Exitos</a>
  <a href="MemeAnimales.php">Animales</a>
  <a href="highscores.php">HighScores</a><br>
  <?php  
    if (isset($_SESSION['username'])) {
    $username = md5($_SESSION['username']);
    ?>
     
    	<a class="nav-link " style="color: white; word-wrap: break-word;" href="perfil.php?op=<?php echo $username; ?>"><strong class="postedby" style="color: white;" style="word-wrap: break-word;"><?php echo $_SESSION['username']; ?></strong></a>
    	
      <a class="nav-link" href="index.php?logout='1'" class="postedby"><strong class="postedby" style="color: white;">Cerrar Sesion</strong> </a>
      
    <?php } else { ?>
        <a class="nav-link" href="login.php"><strong class="postedby">Iniciar Sesion</strong></a>
        <a class="nav-link" style="color: white;" href="register.php"><strong class="postedby">Registrarse</strong></a>
    <?php } ?>

    
   
  <a href="nosotros.php">Acerca de Nosotros</a>
  

  <?php if (isset($_SESSION['username'])){ 
    if ($_SESSION['username'] == 'Admin') {
    ?>
  <a href="AdminUploadDO.php">Admin</a>
  
    <?php } } ?>
</div>