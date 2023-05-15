<?php include 'header.php';?>

<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./image/fleure.jpg" class="d-block w-100" alt="fleure">
    </div>
    <div class="carousel-item">
      <img src="./image/outil.jpg" class="d-block w-100" alt="outil">
    </div>
    <div class="carousel-item">
      <img src="./image/materiel.jpg" class="d-block w-100" alt="materiel">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Précédent</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Suivant</span>
  </button>
</div>

<div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
  <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
  <label class="btn btn-outline-primary" for="categorie">fleure</label>

  <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
  <label class="btn btn-outline-primary" for="btncheck2">Plante</label>

  <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
  <label class="btn btn-outline-primary" for="btncheck3">Outillage</label>

  <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
  <label class="btn btn-outline-primary" for="btncheck4">Matériel</label>

  <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
  <label class="btn btn-outline-primary" for="btncheck5"></label>

  <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
  <label class="btn btn-outline-primary" for="btncheck6"></label>

 <input type="checkbox" class="btn-check" id="btncheck7" autocomplete="off">
  <label class="btn btn-outline-primary" for="btncheck7"></label>
</div>

<div class="promo">

<h2>Produits vedettes</h2>

<img src="./image/vedette.php" class="img-fluid" alt="">


<h2>Marques vedettes</h2>

<img src="./image/bosh.png" class="img-fluid" alt="logobosh">
<img src="./image/gardena.png" class="img-fluid" alt="logogardena">


<h2>Quoi de neuf</h2>

<img src="./image/affiche.jpg" class="img-fluid" alt="evenement">

</div>

<?php include 'footer.php'; ?>