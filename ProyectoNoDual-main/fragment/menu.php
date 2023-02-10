<div class="container">
    <ul>
      <li>
        <a href="/#noticias">Home</a>
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
        <a href="/aboutus.php#sobrenosotros">Sobre Nosotros</a>
      </li> 

      <?php if($user_logged): ?>
        <li style="float:right">
          <a href="/logout.php"> <?php echo($_SESSION['usuario']); ?> </a> 
          <a href="logout.php">Cerrar Sesión</a>
        </li>
      <?php else: ?>
        <li style="float:right">
          <a href="inicio/">Iniciar Sesión </a> 
        </li>
      <?php endif; ?>

    </ul> 
  </div> 

  