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
  <link rel="stylesheet" href="styles/style.css" />
  <title>Favourites| Vineyard</title>
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
          <li class="nav-item" style="margin-top: 5px; margin-left:10px">
            <input type="text" class="form-control" placeholder="Search anything..." />
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <script>
    function updateFilter(text) {
      document.getElementById("navbarDropdownMenuLink").textContent =
        "Filtering: " + text;
    }

    function updateSort(text) {
      document.getElementById("navbarDropdownMenuLink2").textContent =
        "Sorting: " + text;
    }
  </script>

  <section class="p-5" style="background-color: #00192b; color: white">
    <div>
      <h1>Favourite Wines
      </h1>
    </div>
    <div class="container">
      <div class="row text-center g-4" style="padding-top: 25px">
        <div class="col-md">
          <div class="card" style="color: black">
            <div class="card-body text-center">
              <h3 class="card-title" style="margin-top: 10px; margin-bottom: 0px">
                Wine Name
              </h3>
              <h8 class="card-cultivar">category | cultivar</h8>
              <h4 class="card-rating mb-3" style="margin-top: 0; padding-top: 0px">
                ★★★★☆
              </h4>
              <div class="card-img-container" style="border-radius: 5px">
                <img src="img/hrw-default-300x300.jpg" />
              </div>
              <h3 class="card-price" style="margin: 0px; margin-bottom: 15px">
                R1500
              </h3>
              <a href="wineSpec.php" class="btn btn-primary" style="background-color: #00192b; border: none">Learn
                More</a>
              <a class="btn btn-primary" style="color: white; background-color:#00192b"
                onclick="this.style.backgroundColor = this.style.backgroundColor === 'red' ? '#00192b' : 'red'">Favourite
              </a>
            </div>
          </div>
        </div>

        <div class="col-md">
          <div class="card" style="color: black">
            <div class="card-body text-center">
              <h3 class="card-title" style="margin-top: 10px; margin-bottom: 0px">
                Wine Name
              </h3>
              <h8 class="card-cultivar">category | cultivar</h8>
              <h4 class="card-rating mb-3" style="margin-top: 0; padding-top: 0px">
                ★★★★☆
              </h4>
              <div class="card-img-container" style="border-radius: 5px">
                <img src="img/hrw-default-300x300.jpg" />
              </div>
              <h3 class="card-price" style="margin: 0px; margin-bottom: 15px">
                R1500
              </h3>
              <a href="wineSpec.php" class="btn btn-primary" style="background-color: #00192b; border: none">Learn
                More</a>
              <a class="btn btn-primary" style="color: white; background-color:#00192b"
                onclick="this.style.backgroundColor = this.style.backgroundColor === 'red' ? '#00192b' : 'red'">Favourite
              </a>
            </div>
          </div>
        </div>

        <div class="col-md">
          <div class="card" style="color: black">
            <div class="card-body text-center">
              <h3 class="card-title" style="margin-top: 10px; margin-bottom: 0px">
                Wine Name
              </h3>
              <h8 class="card-cultivar">category | cultivar</h8>
              <h4 class="card-rating mb-3" style="margin-top: 0; padding-top: 0px">
                ★★★★☆
              </h4>
              <div class="card-img-container" style="border-radius: 5px">
                <img src="img/hrw-default-300x300.jpg" />
              </div>
              <h3 class="card-price" style="margin: 0px; margin-bottom: 15px">
                R1500
              </h3>
              <a href="wineSpec.php" class="btn btn-primary" style="background-color: #00192b; border: none">Learn
                More</a>
              <a class="btn btn-primary" style="color: white; background-color:#00192b"
                onclick="this.style.backgroundColor = this.style.backgroundColor === 'red' ? '#00192b' : 'red'">Favourite
              </a>
            </div>
          </div>
        </div>

        <div class="col-md">
          <div class="card" style="color: black">
            <div class="card-body text-center">
              <h3 class="card-title" style="margin-top: 10px; margin-bottom: 0px">
                Wine Name
              </h3>
              <h8 class="card-cultivar">category | cultivar</h8>
              <h4 class="card-rating mb-3" style="margin-top: 0; padding-top: 0px">
                ★★★★☆
              </h4>
              <div class="card-img-container" style="border-radius: 5px">
                <img src="img/hrw-default-300x300.jpg" />
              </div>
              <h3 class="card-price" style="margin: 0px; margin-bottom: 15px">
                R1500
              </h3>
              <a href="wineSpec.php" class="btn btn-primary" style="background-color: #00192b; border: none">Learn
                More</a>
              <a class="btn btn-primary" style="color: white; background-color:#00192b"
                onclick="this.style.backgroundColor = this.style.backgroundColor === 'red' ? '#00192b' : 'red'">Favourite
              </a>
            </div>
          </div>
        </div>

        <div class="col-md">
          <div class="card" style="color: black">
            <div class="card-body text-center">
              <h3 class="card-title" style="margin-top: 10px; margin-bottom: 0px">
                Wine Name
              </h3>
              <h8 class="card-cultivar">category | cultivar</h8>
              <h4 class="card-rating mb-3" style="margin-top: 0; padding-top: 0px">
                ★★★★☆
              </h4>
              <div class="card-img-container" style="border-radius: 5px">
                <img src="img/hrw-default-300x300.jpg" />
              </div>
              <h3 class="card-price" style="margin: 0px; margin-bottom: 15px">
                R1500
              </h3>
              <a href="wineSpec.php" class="btn btn-primary" style="background-color: #00192b; border: none">Learn
                More</a>
              <a class="btn btn-primary" style="color: white; background-color:#00192b"
                onclick="this.style.backgroundColor = this.style.backgroundColor === 'red' ? '#00192b' : 'red'">Favourite
              </a>
            </div>
          </div>
        </div>

        <div class="col-md">
          <div class="card" style="color: black">
            <div class="card-body text-center">
              <h3 class="card-title" style="margin-top: 10px; margin-bottom: 0px">
                Wine Name
              </h3>
              <h8 class="card-cultivar">category | cultivar</h8>
              <h4 class="card-rating mb-3" style="margin-top: 0; padding-top: 0px">
                ★★★★☆
              </h4>
              <div class="card-img-container" style="border-radius: 5px">
                <img src="img/hrw-default-300x300.jpg" />
              </div>
              <h3 class="card-price" style="margin: 0px; margin-bottom: 15px">
                R1500
              </h3>
              <a href="wineSpec.php" class="btn btn-primary" style="background-color: #00192b; border: none">Learn
                More</a>
              <a class="btn btn-primary" style="color: white; background-color:#00192b"
                onclick="this.style.backgroundColor = this.style.backgroundColor === 'red' ? '#00192b' : 'red'">Favourite
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <footer class="p-5 text-center position-relative" style="color: black">
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
</body>

</html>