<div class="container">
    <ul>
      <li>
        <a href="index_logueado.php#noticias">Home </a>
      </li>
      <li> <a href="adoptar_logueado.php">Adoptar</a>
      </li>
      <li>
        <a href="perdidas_logueado.php">Mascotas Perdidas</a>
      </li>
      <li>
        <a href="dar_logueado.php">Dar En Adopción</a>
      </li>
      <li>
        <a href="aboutus_logueado.php#sobrenosotros">Sobre Nosotros</a>
      </li> 
      <!-- si el usuario esta registrado -->
      <?php if($user_logged): ?>
        <li style="float:right"><a href="logout.php">Cerrar Sesión</a>
      </li>
        <li style="float:right">
          <a href="index_logueado.php"> Bienvenid@ <?php echo($_SESSION['usuario']); ?> </a> 
        </li>

      <?php else: ?>
       
      <?php endif; ?>

    </ul> 
  </div> 

  