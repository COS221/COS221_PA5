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
</head>

<body style="padding-top: 230px; background-color: #00192b">
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
  <div class="container" style="
        background-color: whitesmoke;
        border-radius: 10px;
        padding: 50px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
      ">
    <div class="row">
      <div class="col-3">
        <img src="img/hrw-default-300x300.jpg" alt="hrw-default" class="img-fluid" style="
              margin: 15px;
              border-radius: 15px;
              box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            " />
      </div>
      <div class="col-4" style="margin-left: 50px; margin-top: 10px">
        <ul style="list-style-type: none">
          <li class="liTitle">
            <h1>Specific Wine</h1>
          </li>
          <li class="liRating">

            <h3>★★★★☆ </h3>
          </li>
          <li class="liCategoryCultivar">Category & Cultivar</li>
          <li class="liAlc">Alc: 12% pH3.43 TA: 5.32</li>
          <li class="liProd">Producer</li>
          <li>
            <h2 style="margin-top: 30px">R1500.00</h2>
          </li>
          <li>
            <a href="#" class="btn btn-primary" style="background-color: #00192b">Buy Now</a>
            <a class="btn btn-primary" style="color: white; background-color:#00192b"
              onclick="this.style.backgroundColor = this.style.backgroundColor === 'red' ? '#00192b' : 'red'">Favourite
            </a>
          </li>
        </ul>
      </div>

      <div class="col-4">
        <ul class="scrollReviews nav-pills nav-stacked" style="list-style-type: none">
          <li>
            <h1>Reviews</h1>
            <h5><a href="">Add Review</a></h5>
          </li>
          <li>
            <div class="review">
              <ul style="list-style-type: none">
                <li>
                  <h4>Username</h4>
                </li>
                <li>
                  <h5>★★★☆☆ </h5>

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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>
</body>
<footer class="p-5 text-center position-relative" style="color: white">
  <div class="container">
    <p class="lead">Copyright &copy; 2023 Vineyard</p>
  </div>
</footer>

</html>