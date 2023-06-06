<?php
if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION["API_Key"])) {
  # code...
  //echo ("٩(▀̿Ĺ̯▀̿ ̿٩)三");
  header("Location: login.php");
  //die();
}

?>


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
  <title>Wines | Vineyard</title>
  <style>
    .modal-content h1,
    .modal-content h2,
    .modal-content h3,
    .modal-content h4,
    .modal-content h5,
    .modal-content li,
    .modal-content p,
    .rateOptions {
      color: #00192b;
    }
  </style>

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
            <input type="text" class="form-control" placeholder="Search anything..." onkeypress="search(event)" />
          </li>
          <a href="favWines.php">
            <img src="img\heart.png" alt="heart-icon" style="
              width: 30px;
              height: 30px;
              margin-top: 5px;
            " />
          </a>
        </ul>
      </div>
    </div>
  </nav>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button"
              data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 20px">
              Category
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
              <li>
                <a class="dropdown-item" href="#" onclick="updateCategoryFilter('White')">White</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" onclick="updateCategoryFilter('Red')">Red</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" onclick="updateCategoryFilter('Sparkling')">Sparkling</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" onclick="updateCategoryFilter('Rosé')">Rosé</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" onclick="updateCategoryFilter('Dessert')">Dessert</a>
              </li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink4" role="button"
              data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 20px">
              Sweetness
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink4">
              <li>
                <a class="dropdown-item" href="#" onclick="updateSweetnessFilter('High')">High</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" onclick="updateSweetnessFilter('Medium')">Medium</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" onclick="updateSweetnessFilter('Low')">Low</a>
              </li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink3" role="button"
              data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 20px">
              Price Category
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
              <li>
                <a class="dropdown-item" href="#" onclick="updatePriceFilter('Premium')">Premium</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" onclick="updatePriceFilter('Super Premium')">Super Premium</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" onclick="updatePriceFilter('Luxury')">Luxury</a>
              </li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button"
              data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 20px">
              Sort
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
              <li>
                <a class="dropdown-item" href="#" onclick="updateSort('Alcohol-asc')">Alcohol-asc</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" onclick="updateSort('Alcohol-desc')">Alcohol-desc</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" onclick="updateSort('Acidity-asc')">Acidity-asc</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" onclick="updateSort('Acidity-desc')">Acidity-desc</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" onclick="updateSort('Cost_per_bottle-asc')">Cost_per_bottle-asc</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" onclick="updateSort('Cost_per_bottle-desc')">Cost_per_bottle-desc</a>
              </li>
            </ul>
          </li>


        </ul>
        <!-- <button class="FilterButton btn btn-primary " id="applyFilterButton" style="background-color: #00192b;">Apply</button> -->
      </div>
    </div>
  </nav>

  <script>
    function updateSort(text) {
      document.getElementById("navbarDropdownMenuLink1").textContent = "Sort: " + text;
      sortData(text);

      //clear other fields
      document.getElementById("navbarDropdownMenuLink2").textContent = "Category";
      document.getElementById("navbarDropdownMenuLink3").textContent = "Price Category";
      document.getElementById("navbarDropdownMenuLink4").textContent = "Sweetness";
    }

    function updateCategoryFilter(text) {

      var newText = "Category: " + text;
      document.getElementById("navbarDropdownMenuLink2").textContent = newText;
      filterData(newText);

      //clear other fields
      document.getElementById("navbarDropdownMenuLink1").textContent = "Sort";
      document.getElementById("navbarDropdownMenuLink3").textContent = "Price Category";
      document.getElementById("navbarDropdownMenuLink4").textContent = "Sweetness";

    }

    function updatePriceFilter(text) {
      var newText = "Price Category: " + text;
      document.getElementById("navbarDropdownMenuLink3").textContent = newText;
      filterData(newText);

      //clear other fields
      document.getElementById("navbarDropdownMenuLink1").textContent = "Sort";
      document.getElementById("navbarDropdownMenuLink2").textContent = "Category";
      document.getElementById("navbarDropdownMenuLink4").textContent = "Sweetness";

    }

    function updateSweetnessFilter(text) {
      var newText = "Sweetness: " + text;
      document.getElementById("navbarDropdownMenuLink4").textContent = newText;
      filterData(newText);

      //clear other fields
      document.getElementById("navbarDropdownMenuLink1").textContent = "Sort";
      document.getElementById("navbarDropdownMenuLink3").textContent = "Price Category";
      document.getElementById("navbarDropdownMenuLink2").textContent = "Category";

    }

  </script>
  <style>
    #banner {
      border-radius: 50%;
      width: 150px;
      height: 150px;

      background: #FFFF;
      overflow: hidden;
      backface-visibility: hidden;
      transform: translate3d(0, 0, 0);
      position: relative;
    }

    #banner .fill {
      transform: translateY(150px);
      animation-name: fillAction;
      animation-iteration-count: 1;
      animation-timing-function: cubic-bezier(.2, .6, .8, .4);
      animation-duration: 4s;
      animation-fill-mode: forwards;
      animation-delay: 0.25s;
    }

    #banner .pour {
      width: 6px;
      position: absolute;
      left: 50%;
      margin-left: -3px;
      bottom: 0;
      top: 0;
      background: #800000;
      animation-name: pourAction;
      animation-timing-function: linear;
      animation-duration: 0.25s;
    }

    #banner #waveShape {
      animation-name: waveAction;
      animation-iteration-count: infinite;
      animation-timing-function: linear;
      animation-duration: 0.5s;
      width: 300px;
      height: 150px;
      fill: #800000;
    }

    @keyframes pourAction {
      0% {
        transform: translateY(-100%);
      }

      100% {
        transform: translateY(0);
      }
    }

    @keyframes fillAction {
      0% {
        transform: translateY(150px);
      }

      100% {
        transform: translateY(-5px);
      }
    }

    @keyframes waveAction {
      0% {
        transform: translate(-150px, 0);
      }

      100% {
        transform: translate(0, 0);
      }
    }
  </style>
  <section class="p-5" style="background-color: #00192b; color: white">
    <div class="container">
      <div class="row text-center g-4" style="padding-top: 25px">
        <div style="display: flex; justify-content: center;">
          <div>
            <div id="banner">
              <div class="pour"></div>
              <div class="fill">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                  y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300"
                  xml:space="preserve">
                  <path fill="#04ACFF" id="waveShape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
            c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
            c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z" />
                </svg>
              </div>
            </div>
          </div>
        </div>


      </div>
      <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <!-- Move the 'container' content into the modal-body -->
            <div class="modal-body"
              style="background-color: whitesmoke; border-radius: 10px; padding: 50px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
              <div class="row">
                <div class="col-3">
                  <img src="img/hrw-default-300x300.jpg" alt="hrw-default" class="img-fluid"
                    style="margin: 15px; border-radius: 15px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);" />
                  <h1>Specific Wine</h1>
                </div>

                <div class="col-4" style="margin-left: 50px; margin-top: 10px">
                  <ul style="list-style-type: none">
                    <li class="liRating">
                      <h3>★★★★☆</h3>
                    </li>
                    <li class="liCategoryCultivar">Category & Cultivar</li>
                    <li class="liAlc">Alc: 12% pH3.43 TA: 5.32</li>
                    <li class="liProd">Producer</li>
                    <li>
                      <h2 style="margin-top: 30px">R1500.00</h2>
                    </li>
                    <li>
                      <a href="#" class="btn btn-primary" style="background-color: #00192b">Buy Now</a>
                    </li>
                  </ul>
                </div>

                <div class="col-4">
                  <ul class="scrollReviews nav-pills nav-stacked" style="list-style-type: none">
                    <li>
                      <h1>Reviews</h1>
                    </li>
                    <li>
                      <div class="review">
                        <ul style="list-style-type: none">
                          <li>
                            <h4>Username</h4>
                          </li>
                          <li>
                            <h5>★★★☆☆</h5>
                          </li>
                          <li>
                            <p>
                              Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                              Facilis aperiam consequatur natus recusandae dicta numquam
                              inventore perferendis magnam deserunt neque doloremque
                              dignissimos aliquid, vitae doloribus earum architecto
                              illum. Sequi, reiciendis?
                            </p>
                          </li>
                        </ul>
                      </div>
                    </li>

                    <li>
                      <div class="review">
                        <ul style="list-style-type: none">
                          <li>
                            <h4>Username</h4>
                          </li>
                          <li>
                            <h5>★★★☆☆</h5>
                          </li>
                          <li>
                            <p>
                              Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                              Facilis aperiam consequatur natus recusandae dicta numquam
                              inventore perferendis magnam deserunt neque doloremque
                              dignissimos aliquid, vitae doloribus earum architecto
                              illum. Sequi, reiciendis?
                            </p>
                          </li>
                        </ul>
                      </div>
                    </li>

                    <li>
                      <div class="review">
                        <ul style="list-style-type: none">
                          <li>
                            <h4>Username</h4>
                          </li>
                          <li>
                            <h5>★★★☆☆</h5>
                          </li>
                          <li>
                            <p>
                              Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                              Facilis aperiam consequatur natus recusandae dicta numquam
                              inventore perferendis magnam deserunt neque doloremque
                              dignissimos aliquid, vitae doloribus earum architecto
                              illum. Sequi, reiciendis?
                            </p>
                          </li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  <div class="after" id="after">
    <input type="text" name="apistuff1" id="API_Key" value="<?php echo $_SESSION["API_Key"]; ?>" style="display:none">
    <input type="text" name="apistuff2" id="UserID" value="<?php echo $_SESSION["UserID"]; ?>" style="display:none">
    <input type="text" name="apistuff3" id="First_name" value="<?php echo $_SESSION["First_name"]; ?>"
      style="display:none">
    <input type="text" name="apistuff4" id="Middle_name" value="<?php echo $_SESSION["Middle_name"]; ?>"
      style="display:none">
    <input type="text" name="apistuff5" id="Last_name" value="<?php echo $_SESSION["Last_name"]; ?>"
      style="display:none">
    <input type="text" name="apistuff6" id="Email" value="<?php echo $_SESSION["Email"]; ?>" style="display:none">
    <input type="text" name="apistuff7" id="PhoneNumber" value="<?php echo $_SESSION["PhoneNumber"]; ?>"
      style="display:none">
  </div>
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
  <script src="js/wines.js"></script>
  <script>
    populateExploreWines();
  </script>
</body>

</html>