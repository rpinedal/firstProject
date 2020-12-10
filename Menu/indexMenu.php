
<?php

echo ' 
<div style="width: 100%;" class="navbar-brand navbar navbar-expand-lg navbar-dark bg-dark hiddenbig ">
<button 
style="background: black; "
    data-trigger="#navbar_main" 
      class="navbar-toggler navbar-toggler-right " 
        type="button">
      <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="index.php"><img class="logo" src="LOGOMEMEDONEv3.png" /></a>
  </div>
  <b class="screen-overlay"></b>
<nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg navbar-dark bg-dark myMenu">
  
  <a class="navbar-brand" href="index.php"><img class="logo" src="LOGOMEMEDONEv3.png" /></a>

  <div  class="offcanvas-header">
    <ul class="navbar-nav mr-auto mt-2 mt-md-0">
      <li class="nav-item">
        <a class="nav-link" style="color: white;" href="index.php">Populares</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color: white;" href="new.php">Nuevos</a>
      </li>
     
    

  '
  ?>

  <?php if (isset($_SESSION['username'])){ ?>
    <li class="nav-item ">
  <a class="nav-link hiddenbig" style="color: white;" href="MemeMismemes.php">Siguiendo</a>
  </li>
    <?php } ?>
          
  <li class="nav-item hiddenbig">
  <a class="nav-link hiddenbig" style="color: white;" href="MemeDivertido.php">Divertidos</a>
  </li>
  <li class="nav-item hiddenbig">
  <a class="nav-link hiddenbig" style="color: white;" href="MemeJuegos.php">Juegos</a>
  </li>
  <li class="nav-item hiddenbig">
  <a class="nav-link hiddenbig" style="color: white;" href="MemeFracasos.php">Fracasos</a>
  </li>
  <li class="nav-item hiddenbig">
  <a class="nav-link hiddenbig" style="color: white;" href="MemeExitos.php">Exitos</a>
  </li>
  <li class="nav-item hiddenbig">
  <a class="nav-link hiddenbig" style="color: white;" href="MemeAnimales.php">Animales</a>
  </li>
  
  <li class="nav-item hiddenbig">
    <a class="nav-link hiddenbig" style="color: white;" href="highscores.php">HighScores</a>
  </li>
     <?php  
    if (isset($_SESSION['username'])) {
    $username = md5($_SESSION['username']);
    ?>
    
      <li class="nav-item" style="color: white;"><a class="nav-link" style="color: white;" href="userupload.php">Subir +</a></li>
    	<li class="nav-item" style="color: white;"><a class="nav-link" style="color: white;" href="perfil.php?op=<?php echo $username; ?>">Bienvenido,  <strong class="postedby" style="color: white;"><?php echo $_SESSION['username']; ?></strong></a></li>
    	<li class="nav-item" style="color: white;"><a class="nav-link" href="index.php?logout='1'" class="postedby"><strong class="postedby" style="color: white;">Cerrar Sesion</strong> </a></li>
      
    <?php } else { ?>
        <li class="nav-item" style="color: white;"><a class="nav-link" href="login.php"><strong class="postedby">Iniciar Sesion</strong></a></li>
        <li class="nav-item" style="color: white;"><a class="nav-link" style="color: white;" href="register.php"><strong class="postedby">Registrarse</strong></a></li>
    <?php } ?>

    <?php 
    echo '
    
</ul>   </div></div></nav>';


