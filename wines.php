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
  .modal-content p {
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

    function updateCategoryFilter(text){

      var newText="Category: " + text;
      document.getElementById("navbarDropdownMenuLink2").textContent = newText;
      filterData(newText);

      //clear other fields
      document.getElementById("navbarDropdownMenuLink1").textContent = "Sort";
      document.getElementById("navbarDropdownMenuLink3").textContent = "Price Category";
      document.getElementById("navbarDropdownMenuLink4").textContent = "Sweetness";
   
    }

    function updatePriceFilter(text){
      var newText="Price Category: " + text;
      document.getElementById("navbarDropdownMenuLink3").textContent = newText;
      filterData(newText);

      //clear other fields
      document.getElementById("navbarDropdownMenuLink1").textContent = "Sort";
      document.getElementById("navbarDropdownMenuLink2").textContent = "Category";
      document.getElementById("navbarDropdownMenuLink4").textContent = "Sweetness";
      
    }

    function updateSweetnessFilter(text){
      var newText="Sweetness: " + text;
      document.getElementById("navbarDropdownMenuLink4").textContent = newText;
      filterData(newText);

      //clear other fields
      document.getElementById("navbarDropdownMenuLink1").textContent = "Sort";
      document.getElementById("navbarDropdownMenuLink3").textContent = "Price Category";
      document.getElementById("navbarDropdownMenuLink2").textContent = "Category";
 
    }

  </script>

  <section class="p-5" style="background-color: #00192b; color: white">
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
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <!-- Move the 'container' content into the modal-body -->
              <div class="modal-body" style="background-color: whitesmoke; border-radius: 10px; padding: 50px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
                <div class="row">
                  <div class="col-3">
                    <img src="img/hrw-default-300x300.jpg" alt="hrw-default" class="img-fluid" style="margin: 15px; border-radius: 15px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);" />
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
  <script src="wines.js"></script>
  <script>
    populateExploreWines();
  </script>
</body>

</html>






          
        