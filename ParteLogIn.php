<div class="container">
    <div class="header">
  	    <h1>Iniciar Sesión</h2> 
    </div>
	 
    <form method="post" class="content2" action="login.php">

<?php include('errors.php'); ?>
		  
  	        <div class="input-group">
  		        <label class="modalLabel">
					<h6>Usuario</h6>
				</label>
  		        <input class="CommentInput modalInput" maxlength="25" type="text" name="username" >
			  </div>
			  

			<div class="input-group">
				
				<label class="modalLabel">
				<h6>Contraseña </h6>	 
				</label>
				<input class="CommentInput modalInput" type="password" name="password">
					<p style="margin-top: 6px;">Olvido su Contrase&ntilde;a?  
						<a href="forgotpassword.php"> 
						&nbsp; Recuperar Contrase&ntilde;a
						</a>
					</p>
			</div>
      
    <div class="input-group">
  		<button type="submit" class="btn btn-lg btn-block" name="login_user" >Iniciar</button>
  	</div>
      
    <p>
  		No se ha registrado? <a href="register.php"> &nbsp;Registrarse</a>
  	</p>
  </form>
</div>