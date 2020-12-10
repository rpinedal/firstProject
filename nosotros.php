<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Memedone - Nosotros</title>
    <meta name="description" content="Toda la informacion acerca de nuestra pagina y como funciona"/>
    
    <meta name="keywords" content="memes,meme,chistoso,imagenes chistosas, diversion, entretenimiento, Memedone, Memedone.com,chistosos,chistoso, en espanol,en espa単ol,espanol,espa単ol,latino">
    
    <link rel="shortcut icon" type="image/x-icon" href="ICONv2.png"></link>

    <link rel="stylesheet" href="css/menucss.css">
    
    <link rel="stylesheet" href="css/main.css">
    <script data-ad-client="ca-pub-3187893082972835" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-158039347-1"></script>
 <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-158039347-1');
</script> 
</head>
<body>
   <?php

include 'Database/dbConnect.php';
session_start();
include 'Menu/indexMenu.php'; 

?>
<div class="container card-body">
  <section>
        <div class="container card-body">
          
                <h1 style="white-space:pre-wrap;">Sobre Nosotros</h1>
               
                <span> <p> Memedone es el hogar de la diversion, el lugar indicado para compartir memes y contenido divertido con el mundo.</p></span>
            <p class="" style="white-space:pre-wrap;" >
                <a href="policy.php">Politica de Privacidad</a><br>
                <a href="terms.php">Terminos y Condiciones</a><br>
                <a href="rules.php">Reglas</a><br>
                
            </p>
        </div>    
    </section>           
</div>       

<section class="container card-body">
    <div class="container card-body">
<h1 style="white-space:pre-wrap;">¿Cómo funciona Memedone?</h1>
<ul class="container policyUL">
                <li>
                <div class="feature-wrapper">
                    <strong class="h4"><div style="vertical-align: inherit;"><div style="vertical-align: inherit;">Publicar </div></div></strong><br>
                    <span class="text"><div style="vertical-align: inherit;"><div style="vertical-align: inherit;">La comunidad puede compartir contenido publicando historias, imágenes y videos.</div></div></span>
                </div>
                </li>
                <br>
                
                <li>
                <div class="feature-wrapper">
                    <strong class="h4"><div style="vertical-align: inherit;"><div style="vertical-align: inherit;">Comentar </div></div></strong><br>
                    <span class="text"><div style="vertical-align: inherit;"><div style="vertical-align: inherit;">La comunidad comenta las publicaciones. </div><div style="vertical-align: inherit;">Los comentarios proporcionan discusión y, a menudo, humor.</div></div></span>
                </div>
                </li>
                <br>
                
                <li>
                <div class="feature-wrapper">
                    <strong class="h4">Votar</strong><br>
                    <span class="text"><br><div style="vertical-align: inherit;">Comentarios y las publicaciones de votación pueden ser Me gusta o No Me Gusta. El contenido más interesante pasa a Populares.</div></span>
                </div>
                </li>
                <br>
                
                <li>
                <div class="feature-wrapper">
                    <strong class="h4">Segui Creadores</strong><br>
                    <span class="text"><br><div style="vertical-align: inherit;">Segui a tus creadores favoritos!</div></span>
                </div>
                </li>
                <br>
                </ul>

</section>
<!-- FOOTER -->
    
<footer id="sticky-footer" style="margin-top: 200px;" class="py-4 bg-dark text-white-50">
    <div class="container text-center">
       
      <a class="nav-link" href="nosotros.php">Sobre Nosotros</a>
      
      <small>Copyright&copy; Memedone.COM</small>
      
    </div>
  </footer>
  
<script type="text/javascript" src="scripts/navBar.js">
</script>
</body>
</html>