<div class="container">
    <ul>
      <li>
        <a href="index.php#noticias">Home </a>
      </li>
      <li> <a href="adoptar.php">Adoptar</a>
      </li>
      <li>
        <a href="perdidas1.php">Mascotas Perdidas</a>
      </li>
      <li>
        <a href="dar.php">Dar En Adopción</a>
      </li>
      <li>
        <a href="aboutus.php">Sobre Nosotros</a>
      </li> 
      <!-- si el usuario esta registrado -->
      <?php if($user_logged): ?>
        <li style="float:right"><a href="logout.php">Cerrar Sesión</a>
      </li>
        <li style="float:right">
          <a href="/logout.php"> Bienvenid@ , <?php echo($_SESSION['usuario']); ?> </a> 
         
        </li>

      <?php else: ?>
        <li style="float:right">
          <a href="inicio/">Iniciar Sesión </a> 
        </li>
      <?php endif; ?>

    </ul> 
  </div> 

  