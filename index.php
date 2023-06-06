<?php
if (!isset($_SESSION)) {
  session_start();
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
  <link rel="stylesheet" href="styles/style.css
" />
  <style>
    #wineryImage {
      width: 200px;
      height: 230px;
    }
  </style>

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
            <a href="wines.php" id="exploreWines" class="nav-link" style="color: #00192b">Explore Wines</a>
          </li>
          <li class="nav-item" style="padding-right: 25px">
            <a href="wineries.php" class="nav-link" style="color: #00192b">Explore Vineyards</a>
          </li>
          <a href="favWines.php">
            <img src="img\heart.png" alt="heart-icon" style="
width: 30px;
height: 30px;
margin-top: 5px;
margin-right: 20px;
" />
          </a>

          <?php if (isset($_SESSION['UserID'])) {
            echo ' <a href="usersettings.php" class="btn btn-md" type="button" style="background-color: #00192b; color: white; margin-right:10px">
  Settings
  
  </a>';
            echo '<a href="logout.php" class="btn btn-md" type="button" style="background-color: #00192b; color: white; margin-right:10px">
  Logout
  </a>';


          } ?>
          <?php if (isset($_SESSION['Business_ID'])) {
            echo '<div class= "RemoveLater"> <a class="nav-link" href="managerBusiness.php" style="color:red">BusinessSIDERMOVELATER</a></div>';
          } ?>
          <!-- <div class= "RemoveLater"> <a class="nav-link" href="managerBusiness.php" style="color:red">BusinessSIDERMOVE LATER</a></div>
<div class= "RemoveLater"> <a class="nav-link" href="usersettings.php" style="color:red">usersettings Remove LATER</a></div>
 -->
          <a id="loginID" href="login.php" class="btn btn-md" type="button"
            style="background-color: #00192b; color: white">
            Login
          </a>
        </ul>
      </div>
    </div>
  </nav>


  <!-- Showcase -->
  <section class=" text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start" style="min-height: 70vh; background-image: url('img/wines2.gif'); 
background-repeat: no-repeat; background-size: cover;">
    <div class="container d-flex justify-content-center" style="height: 100%; ">
      <div style="background-color: rgba(6, 82, 40, 0.7   ); margin-top: 250px; padding: 30px; border-radius: 5px;">
        <h1>Embrace The Exquisite World of Wines and Wineries</h1>
      </div>
    </div>
    </div>
  </section>

  <!-- Boxes -->



  </section>
  <section class="p-5" style="background-color: #00192b; color: white;">
    <h1 style="padding-bottom: 30px;" align="center">WHO ARE WE?</h1>
    <div class="container">
      <!-- <h1 style="padding-bottom: 30px;">Popular Wines</h1> -->
      <div class="row text-center g-4">
        <!-- DESCRIPTION OF WHO WE ARE  -->
        <div class="col-12">

          <div id="bestSeller" class="card" style="color:black;">
            <div class="card-body text-center" id="imageVineyard">

              <br>
              <h3 class="card-cultivar">Discover the Essence of Wine: Unveiling Our Passionate Journey</h3>
              <br>
              <p> At Vineyard, we embrace the exquisite world of wines and wineries, offering a warm and inviting space
                where the beauty of this timeless art form can be experienced. As a dedicated platform, we take immense
                pride in curating a collection of exceptional wines and showcasing the remarkable stories behind each
                bottle.</p>
              <p>With us, you embark on a voyage that goes beyond a simple transaction; we strive to foster a sense of
                connection and belonging. We believe in the power of wine to bring people together, to create memories,
                and to inspire moments of joy and celebration.</p>
              <p>Creating an account with us opens doors to a realm of possibilities. As you embark on your personal
                wine journey, our platform becomes your faithful companion, guiding you through a rich tapestry of
                flavors, regions, and winemaking traditions. Our caring and knowledgeable team stands ready to assist
                you in discovering the perfect wine that resonates with your unique palate and preferences.</p>
              <p>For the wineries we feature, we provide a nurturing environment, allowing them to express their passion
                and craftsmanship to a discerning audience. We empower wineries to manage their accounts with ease,
                providing them the tools to showcase their exceptional offerings, update their portfolios, and connect
                directly with wine enthusiasts who appreciate the dedication and love poured into each bottle.</p>
              <p>With a genuine commitment to exceptional quality and an unwavering dedication to our community, we
                invite you to join us on this homely and caring journey. Together, let us raise a glass, savor the
                aromas, and revel in the shared experience that wine graciously offers. Cheers to the remarkable
                connections and cherished moments that await you in the world of wine.</p><br>
              <a href="wines.php" class="btn btn-primary btn-lg"
                style="background-color: gold; border: none; color: #00192b">
                View Our Wine Selection
              </a>
              <a href="wineries.php" id="indexBtn" class="btn btn-primary btn-lg"
                style="background-color: gold; border: none; color: #00192b">
                View Our Winery Catalogue
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
    <br>

    <br>
    <h1 style="padding-bottom: 30px;" align="center">OUR VALUES</h1>
    <div class="container">
      <div class="row text-center g-4 values-container">
        <div class="col-3">
          <div class="values-card card" style="color:black;" id="imageVineyard2">
            <div class="card-body text-center">
              <div class="card-img-container" style="border-radius: 5px;">
                <img src="img/service.png" style="height:100px;">
              </div>
              <h3 class="card-title"
                style="margin-Justification for Research and Web Scouring for Data Collection in Winery Database:
  
  When populating a database with data for wineries and wine categories, it is essential to ensure the accuracy and integrity of the information. As a university-level student tasked with this project, I have chosen to conduct research and scour the web for accurate data for several reasons:
    
    1. Data Accuracy and Reliability: The quality of data is crucial for any database. By conducting research and utilizing reliable sources on the web, I can ensure the accuracy and reliability of the data collected. Trusted websites, reputable winery directories, and official wine organizations often provide up-to-date and verified information about wineries and their wine categories.
    
    2. Current and Comprehensive Information: The wine industry is dynamic, with wineries constantly updating their offerings and introducing new wine categories. By researching online, I can access the most recent information about wineries and wine categories, allowing me to provide an up-to-date and comprehensive database.
    
    3. Global Coverage: The web provides a vast amount of information, making it possible to collect data for wineries from various countries and regions. This ensures that the database includes a diverse range of wineries and wine categories, representing different wine-producing regions worldwide.
    
    4. Data Validation: Researching online allows for cross-referencing and validation of information. By comparing data from multiple sources, I can ensure its accuracy and mitigate the risk of including incorrect or outdated information in the database. This validation process helps maintain the integrity of the data and enhances its reliability.
    
    5. Cost and Efficiency: Conducting research and utilizing web sources for data collection can be cost-effective and efficient compared to alternative methods. Collecting data through APIs or XML files might require additional resources, technical expertise, and potential costs. By utilizing existing online resources, I can efficiently gather the necessary information without incurring substantial expenses.
    
    6. Ethical Considerations: Scouring the web for publicly available information avoids potential privacy concerns associated with extracting data from private APIs or databases. It ensures compliance with ethical guidelines regarding data collection and respects the rights of wineries and individuals involved.
    
    By choosing to conduct research and scour the web for accurate information, I can ensure the integrity, reliability, and comprehensiveness of the winery database. This method allows me to collect up-to-date data from diverse sources, validate information, and adhere to ethical considerations, making it a suitable approach for the task at hand.top: 10px; margin-bottom: 0px;">
                Service</h3>
            </div>
          </div>
        </div>

        <div class="col-3">
          <div class="values-card card" style="color:black;" id="imageVineyard2">
            <div class="card-body text-center">
              <div class="card-img-container" style="border-radius: 5px;">
                <img src="img/authenticity.png">
              </div>
              <h3 class="card-title" style="margin-top: 10px; margin-bottom: 0px;">Authenticity</h3>
            </div>
          </div>
        </div>

        <div class="col-3">
          <div class="values-card card" style="color:black;" id="imageVineyard2">
            <div class="card-body text-center">
              <div class="card-img-container" style="border-radius: 5px;">
                <img src="img/quality.jpg" style="height:100px;">
              </div>
              <h3 class="card-title" style="margin-top: 10px; margin-bottom: 0px;">Quality</h3>
            </div>
          </div>
        </div>

        <div class="col-3">
          <div class="values-card card" style="color:black;" id="imageVineyard2">
            <div class="card-body text-center">
              <div class="card-img-container" style="border-radius: 5px;">
                <img src="img/people.png" style="height:100px;">
              </div>
              <h3 class="card-title" style="margin-top: 10px; margin-bottom: 0px;">People</h3>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- OUR VALUES -->
    <style>
      .values-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      .values-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
      }
    </style>


    <style>
      /* 
    #imageVineyard2 {
      
      position: relative;
      overflow: hidden;
    } */

      #imageVineyard2 img {
        transition: transform 0.1s;

      }

      #imageVineyard2:hover {
        border: 2px solid #F13C20;

        color: white;
        font-weight: bold;
        border-radius: 40px;
        border: 3px dashed #4056A1;

      }

      .imageVineyard2:hover {
        border: 2px solid #F13C20;

        color: white;
        font-weight: bold;
        border-radius: 40px;
        border: 3px dashed #4056A1;

      }
    </style>

    <br>
    <br>
    <div class="container">
      <div class="row g-4">
        <div class="col-md">
          <h2 class="text-center mb-4">Contact Info</h2>
          <ul class="list-group list-group-flush lead">
            <li class="list-group-item">
              <span class="fw-bold">Physical Address:</span> 140 Lunnon Road, Hillcrest, Pretoria
            </li>
            <li class="list-group-item">
              <span class="fw-bold">Postal Address:</span> PO Box 14679, Hatfield, 0028
            </li>
            <li class="list-group-item">
              <span class="fw-bold">General Phone:</span> 012 420 4111
            </li>
            <li class="list-group-item">
              <span class="fw-bold">Email:</span> vineyard@gmail.com
            </li>
            <li class="list-group-item">
              <span class="fw-bold">Operational Hours:</span> Monday – Friday 08:00 – 16:00
            </li>
          </ul>
        </div>
        <div class="col-md">
          <div id="map"></div>
        </div>
      </div>
    </div>
  </section>
  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-body"
          style="background-color: whitesmoke; border-radius: 10px; padding: 50px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
          <div class="row rowDisplay">
            <div class="col-3">
              <img src="img/vineyard-placeholder.jpg" alt="hrw-default" id="wineryImage"
                style="margin: 15px; border-radius: 15px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);" />
            </div>
            <div class="col-4" style="margin-left: 50px; margin-top: 10px">
              <ul style="list-style-type: none">
                <li class="liTitle">
                  <h1>Specific Winery</h1>
                </li>
                <li class="liAddress">42 Werner Street, Stellenbosch</li>
                <li class="liDescription">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis iure dolorem esse facilis in,
                  perspiciatis repudiandae et ipsam? Enim pariatur dolore ipsum nostrum id. Repellendus, dolor. Optio
                  laborum minus dolorem!
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
  <!-- Footer -->
  <footer class="p-5  text-center position-relative" style="color:black">
    <div class="container">
      <p class="lead">Copyright &copy; 2023 Vineyard</p>

      <a href="#" class="position-absolute bottom-0 end-0 p-5">
        <i class="bi bi-arrow-up-circle h1"></i>
      </a>
    </div>
  </footer>


  <!-- <script src="js/index.js"></script> -->

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