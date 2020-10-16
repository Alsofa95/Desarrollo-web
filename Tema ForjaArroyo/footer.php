<!-- Footer -->
<footer class="page-footer font-small bg-dark text-white">
  <div class="container text-center footer-container">
    <div class="row">
    
      <!-- Columna Informacion RGPD -->
      <div class="col-md-3 mb-md-0 mb-3">
        <h5 class="text-uppercase">Informacion</h5>

        <ul class="list-unstyled">
          <li>
            <a class="footer_link" href="#!">Link 1</a>
          </li>
          <li>
            <a class="footer_link" href="#!">Link 2</a>
          </li>
          <li>
            <a class="footer_link" href="#!">Link 3</a>
          </li>
          <li>
            <a class="footer_link" href="#!">Link 4</a>
          </li>
        </ul>
      </div>
      <!-- #Columna 1 -->
     
      <!-- Columna Paginas internas -->
      <div class="col-md-3 mb-md-0 mb-3">
        <h5 class="text-uppercase">Enlances de interes de la página</h5>
        <ul class="list-unstyled">
          <li>
            <a class="footer_link" href="<?php echo get_home_url(); ?>/articulos/">Novedades</a>
          </li>
          <li>
            <a class="footer_link" href="#!">Sobre nosotros</a>
          </li>
          <li>
            <a class="footer_link" href="<?php echo get_home_url(); ?>/galeria/">Galeria</a>
          </li>
          <li>
            <a class="footer_link" href="#!">Link 4</a>
          </li>
        </ul>

      </div>
      <!-- #Columna 2 -->

      <!-- Columna Acceso a redes sociales -->
      <div class="col-md-6 mt-md-0 mt-3">
        <h5 class="text-uppercase">Siguenos en redes sociales</h5>
        <ul class="list-unstyled">
          <li>
            <a class="footer_link" href="#!">Facebook</a>
          </li>
          <li>
            <a class="footer_link" href="#!">Instagram</a>
          </li>
          <li>
            <a class="footer_link" href="#!">Google</a>
          </li>
          <li>
            <a class="footer_link" href="#!">Link</a>
          </li>
        </ul>
      </div>
      <!-- #Columna 3 -->

    </div>  

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© forjaarroyo.es | 2020 Copyright 
    <a class="footer_link" href="https://github.com/Alsofa95"> Daniel Moreno Aljaro</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

<script>
  var slideIndex = 1;
  showSlides(slideIndex);
  
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }
  
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }
  
  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    captionText.innerHTML = dots[slideIndex-1].alt;
  }
  </script>

</body>
</html>