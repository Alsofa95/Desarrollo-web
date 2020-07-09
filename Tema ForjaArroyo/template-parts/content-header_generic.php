<?php
/**
 * Header de paginas abiertas
 *
 * @package ForjaArroyo
 */
?>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?php echo get_home_url(); ?>">Forja Arroyo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="javascript:window.open('<?php echo get_home_url(); ?>')">Pagina principal</a></li>
        <li><a href="#">Retroceder</a></li>
      </ul>
    </div>
  </div>
</nav>