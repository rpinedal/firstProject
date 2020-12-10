<div class="header" style="background: white; color: black; border: 1px solid grey; text-align: center; padding: 10px; border-radius: 20px;">
  	<h3 style="line-height: unset;">Actualizar Perfil</h3>
  	</div>

<form class="content2" action="server.php" method="POST" enctype="multipart/form-data" placeholder="Editar">
    <br>   
<div>
    <label class="modalLabel"> <!-- @@@@@@@@@@@@@@ ACTUALIZAR USUARIO @@@@@@@@@@@@@@@@@@ -->
        <h5>
            Usuario
        </h5>
    </label>
    <input id="oldname" type="text" name="OldName" value="<?php echo $name ?>" hidden>
  <input id="newname" class="CommentInput modalInput" maxlength="18" type="text" name="NewName" placeholder="Cambiar <?php echo $name ?>" onkeyup="nospaces(this)"> 

  <button type="submit" name="EditName" class="F1">Actualizar</button>
  
    <br>
    <br>


   <label class="modalLabel"> <!-- @@@@@@@@@@@@@@ ACTUALIZAR CORREO @@@@@@@@@@@@@@@ -->
       <h5>
           Correo
        </h5>
    </label>
    <input id="oldemail" type="text" name="OldEmail" value="<?php echo $email ?>" hidden>
  <input id="newemail" class="CommentInput modalInput" maxlength="45" type="email" name="NewEmail" placeholder="Cambiar <?php echo $email ?>" onkeyup="nospaces(this)" > 
  <button type="submit" name="EditEmail" class="F1">Actualizar</button>
    <br>
    <br>

    <label class="modalLabel"> <!-- @@@@@@@@@ ACTUALIZAR CONTRASENA @@@@@@@@@@@@ -->
        <h5>
            Contraseña
        </h5>
    </label>
    <input id="userid" type="text" name="UserId" value="<?php echo $userID ?>" hidden>
  <input class="CommentInput modalInput" maxlength="200" type="password" name="NewPassword" placeholder="Cambiar Contraseña">
  <button id="EditPassword" type="submit" name="EditPassword" class="F1">Actualizar</button> 
  <br>
    <br>

<div>
<label class="modalLabel"> <!-- @@@@@@@@@@@@@ ACTUALIZAR FOTO DE PERFIL @@@@@@@@@ -->
    <h5>
        Foto Perfil
    </h5>
</label>

    <label for="choosefile" class="custom-file-upload">
    <i class="fa fa-cloud-upload"></i> Buscar Imagen
</label>
<input id="choosefile" type="file" name="file"/>

    <button type="submit" id="EditProfilePic" name="EditProfilePic" class="F1">Actualizar</button>
    <br><br>

<!-- category select -->

</form>
</div>
        
      <div id="confirmchange"></div>

  </form>
</div>