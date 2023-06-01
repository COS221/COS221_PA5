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
  <title>Wines | Vineyard</title>
  <style>
    #wineryImage {
      width: 200px;
      height: 230px;
    } 
  </style>  
  <script src="wineries.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>
  <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>
</head>

<body style="padding-top: 150px">
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
          <button class="btn btn-md" type="button" style="background-color: #00192b; color: white">
            Login
          </button>
        </ul>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 20px">
              Filter
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li>
                <a class="dropdown-item" href="#" onclick="updateFilter('Option 1')">Option 1</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" onclick="updateFilter('Option 2')">Option 2</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" onclick="updateFilter('Option 3')">Option 3</a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button"
              data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 20px">
              Sort
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
              <li>
                <a class="dropdown-item" href="#" onclick="updateSort('Option 1')">Option 1</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" onclick="updateSort('Option 2')">Option 2</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" onclick="updateSort('Option 3')">Option 3</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="p-5" style="background-color: #00192b; color: white">
    <div class="container">
      <div class="row text-center g-4" style="padding-top: 25px">
        <div class="col-md">
          <div class="card" style="color: black">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <img alt="hrw-default" class="displayImg" style="
                      margin: 15px;
                      border-radius: 15px;
                      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
                    " src="img/vineyard-placeholder.jpg" />
              </div>
              <h3 class="card-title mb-3">Wine</h3>
              <p>Region</p>
              <p class="card-text">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Iure, quas quidem possimus dolorum esse eligendi?
              </p>
              <a href="wineriesSpec.php" class="btn btn-primary" style="background-color: #00192b">Read More</a>
            </div>
          </div>
        </div>

        <div class="col-md">
          <div class="card" style="color: black">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <img alt="hrw-default" class="displayImg" style="
                      margin: 15px;
                      border-radius: 15px;
                      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
                    " src="img/vineyard-placeholder.jpg" />
              </div>
              <h3 class="card-title mb-3">Wine</h3>
              <p>Region</p>
              <p class="card-text">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Iure, quas quidem possimus dolorum esse eligendi?
              </p>
              <a href="wineriesSpec.php" class="btn btn-primary" style="background-color: #00192b">Read More</a>
            </div>
          </div>
        </div>

        <div class="col-md">
          <div class="card" style="color: black">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <img alt="hrw-default" class="displayImg" style="
                      margin: 15px;
                      border-radius: 15px;
                      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
                    " src="img/vineyard-placeholder.jpg" />
              </div>
              <h3 class="card-title mb-3">Vineyard</h3>
              <p>Region</p>
              <p class="card-text">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Iure, quas quidem possimus dolorum esse eligendi?
              </p>
              <a href="wineriesSpec.php" class="btn btn-primary" style="background-color: #00192b">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </section>
  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-body" style="background-color: whitesmoke; border-radius: 10px; padding: 50px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
            <div class="row rowDisplay">
              <div class="col-3">
                <img src="img/vineyard-placeholder.jpg" alt="hrw-default" id= "wineryImage" style="margin: 15px; border-radius: 15px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);" />
              </div>
              <div class="col-4" style="margin-left: 50px; margin-top: 10px">
                <ul style="list-style-type: none">
                  <li class="liTitle">
                    <h1>Specific Winery</h1>
                  </li>
                  <li class="liAddress">42 Werner Street, Stellenbosch</li>
                  <li class="liDescription">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis iure dolorem esse facilis in, perspiciatis repudiandae et ipsam? Enim pariatur dolore ipsum nostrum id. Repellendus, dolor. Optio laborum minus dolorem!
                  </li>
                </ul>
              </div>
              <div class="col-4">
                <div id="map"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <script>
    populateExploreWineries();
  </script>
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
  <footer class="p-5 text-center position-relative" style="color: black">
    <div class="container">
      <p class="lead">Copyright &copy; 2023 Vineyard</p>

      <a href="#" class="position-absolute bottom-0 end-0 p-5">
        <i class="bi bi-arrow-up-circle h1"></i>
      </a>
    </div>

  </footer>
</body>
</html>