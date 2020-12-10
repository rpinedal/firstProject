
<div class="container">
    <div class="header">
      <h2>Cambiar su Contraseña</h2>
    </div>
	 
  <form method="POST" class="content2" action="recoverPage.php">
  
        <div class="input-group">
          <label>Nueva Contraseña:</label><br>
          <input maxlength="150" type="password" id="newpass" placeholder="Nueva Contraseña..." >
        </div>

        <div class="input-group">
          <label>Confirmar Contraseña: </label><br>
          <input maxlength="150" type="password" id="confirmpass" placeholder="Confirmar Contraseña..." >
        </div>
        
        <div>
          <p class="elseErrorIndex" style="padding-top:0px;">
            Favor escriba una nueva 
              <strong style="color:#5510d6;">
                Contraseña
              </strong>
          </p>
        </div>
        <div class="input-group">
          <a type="submit" class="btn btn-lg btn-block" onclick="changepass('<?php echo $userEmailId; ?>')" >
            <i id="loading" ></i> 
              Cambiar Contraseña
          </a>
        </div>
        
      <div id="confirmchange"></div>

  </form>
</div>