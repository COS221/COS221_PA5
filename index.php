<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="styles/style.css
    " />
  <title>Vineyard WineDB</title>
</head>

<!-- Showcase -->

<body style="padding-top: 140px">
  <nav class="navbar navbar-expand-lg navbar-dark py-3 fixed-top" style="background-color: white">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <img src="img\Vineyard.svg" class="navbar-brand" alt="Vineyard Logo" style="width: 200px; height: 170px" />
      </a>

      <div id="navmenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item" style="padding-right: 25px">
            <a href="wines.php" class="nav-link" style="color: #00192b">Explore Wines</a>
          </li>
          <li class="nav-item" style="padding-right: 25px">
            <a href="wineries.php" class="nav-link" style="color: #00192b">Explore Vineyards</a>
          </li>
          <li class="nav-item" style="padding-right: 40px">
            <input type="text" class="form-control" placeholder="Search anything..." />
          </li>
          <img src="img\heart.png" alt="heart-icon" style="
                    width: 30px;
                    height: 30px;
                    margin-top: 5px;
                    margin-right: 20px;
                  " />
          <a href="login.php" class="btn btn-md" type="button" style="background-color: #00192b; color: white">
            Login
          </a>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Showcase -->
  <section class=" text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start" style="min-height: 60vh; background-image: url('img/backgroundMountain.jpg'); 
          background-repeat: no-repeat; background-size: cover;">
    <div class="container d-flex justify-content-center" style="height: 100%; ">
      <div style="background-color: rgba(128, 128, 128, 0.7   ); margin-top: 250px; padding: 30px; border-radius: 5px;">
        <h1>Connecting the world to South Africa's finest wines and wineries</h1>
      </div>
    </div>
    </div>
  </section>

  <!-- Boxes -->
  <section class="p-5" style="background-color: #00192b; color: white;">
    <div class="container">
      <h1 style="padding-bottom: 30px;">Popular Wines</h1>
      <div class="row text-center g-4">
        <div class="col-md">
          <div id="bestSeller" class="card" style="color:black;">
            <div class="card-body text-center">
              <h3 class="card-title" style="margin-top: 10px; margin-bottom: 0px;">Wine Name</h3>
              <h8 class="card-cultivar">category | cultivar</h8>
              <h4 class="card-rating mb-3" style="margin-top:0; padding-top: 0px;">★★★★☆</h4>
              <div class="card-img-container" style="border-radius: 5px;">
                <img src="img/hrw-default-300x300.jpg">
              </div>
              <h3 class="card-price" style="margin: 0px; margin-bottom: 15px;">R1500</h3>
              <a href="wineSpec.php" class="btn btn-primary" style="background-color: #00192b; border:none;">Learn
                More</a>
            </div>
          </div>
        </div>

        <div class="col-md">
          <div id="bestSeller" class="card" style="color:black;">
            <div class="card-body text-center">
              <h3 class="card-title" style="margin-top: 10px; margin-bottom: 0px;">Wine Name</h3>
              <h8 class="card-cultivar">category | cultivar</h8>
              <h4 class="card-rating mb-3" style="margin-top:0; padding-top: 0px;">★★★★☆</h4>
              <div class="card-img-container" style="border-radius: 5px;">
                <img src="img/hrw-default-300x300.jpg">
              </div>
              <h3 class="card-price" style="margin: 0px; margin-bottom: 15px;">R1500</h3>
              <a href="wineSpec.php" class="btn btn-primary" style="background-color: #00192b; border:none;">Learn
                More</a>
            </div>
          </div>
        </div>

        <div class="col-md">
          <div id="bestSeller" class="card" style="color:black;">
            <div class="card-body text-center">
              <h3 class="card-title" style="margin-top: 10px; margin-bottom: 0px;">Wine Name</h3>
              <h8 class="card-cultivar">category | cultivar</h8>
              <h4 class="card-rating mb-3" style="margin-top:0; padding-top: 0px;">★★★★☆</h4>
              <div class="card-img-container" style="border-radius: 5px;">
                <img src="img/hrw-default-300x300.jpg">
              </div>
              <h3 class="card-price" style="margin: 0px; margin-bottom: 15px;">R1500</h3>
              <a href="wineSpec.php" class="btn btn-primary" style="background-color: #00192b; border:none;">Learn
                More</a>
            </div>
          </div>
        </div>



      </div>
    </div>
    <div class="text-center" style="margin-top: 30px;">
      <a href="wines.php" class="btn btn-primary btn-lg" style="background-color: gold; border: none; color: #00192b">
        View Wines
      </a>
    </div>
  </section>

  <!-- Contact & Map -->
  <section class="p-5" style="background-color: #00192b; color: white;">
    <div class="container">
      <div class="row g-4">
        <div class="col-md">
          <h2 class="text-center mb-4">Contact Info</h2>
          <ul class="list-group list-group-flush lead">
            <li class="list-group-item">
              <span class="fw-bold">Main Location:</span> 50 Main st Boston MA
            </li>
            <li class="list-group-item">
              <span class="fw-bold">Enrollment Phone:</span> (555) 555-5555
            </li>
            <li class="list-group-item">
              <span class="fw-bold">Student Phone:</span> (333) 333-3333
            </li>
            <li class="list-group-item">
              <span class="fw-bold">Enrollment Email:</span> (555)
              enroll@frontendbc.test
            </li>
            <li class="list-group-item">
              <span class="fw-bold">Student Email:</span>
              student@frontendbc.test
            </li>
          </ul>
        </div>
        <div class="col-md">
          <div id="map"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="p-5  text-center position-relative" style="color:black">
    <div class="container">
      <p class="lead">Copyright &copy; 2023 Vineyard</p>

      <a href="#" class="position-absolute bottom-0 end-0 p-5">
        <i class="bi bi-arrow-up-circle h1"></i>
      </a>
    </div>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>
  <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>

  <script>
    mapboxgl.accessToken =
      "pk.eyJ1IjoiaGFzaC1zYWx0LXBlcHBlciIsImEiOiJjbGk1cjBwbHczNG92M2VudDhxa3lldXppIn0.kaCeMlQU5YjTDNIIzbTq4w";
    var map = new mapboxgl.Map({
      container: "map",
      style: "mapbox://styles/mapbox/streets-v11",
      center: [28.24, -25.75],
      zoom: 15,
    });
  </script>
</body>

</html>