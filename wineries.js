


    

function populateExploreWineries() {
  const xhr = new XMLHttpRequest();
  const url = "http://localhost/COS221_PA5/api.php";

  var data = {
    type: "GetAllWineries",
    api_key: "123456",
    page: "index.php",
    //"search":{"BName":"Franschhoek Cellar"},
    order: "desc",
    //"limit":10,
    sort: "BName",
    fuzzy: false,
    return: "*",
  };

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let objectData = JSON.parse(this.responseText);

      let row = document.querySelector(".row");
      //row.innerHTML = '';

      data = ``;

      for (i = 0; i < objectData.data.length; i++) {
        data += `<div class="col-md">
              <div class="card" style="color: black">
                <div class="card-body text-center">
                  <div class="h1 mb-3">
                    <img alt="hrw-default" class="displayImg" style="
                          margin: 15px;
                          border-radius: 15px;
                          box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
                        " src="${objectData.data[i].Business_URL}" />
                  </div>
                  <h3 class="card-title mb-3">${objectData.data[i].BName}</h3>
                  <p>Region</p>
                  <p class="card-text">
                  ${objectData.data[i].Description}
                  </p>
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="background-color: #00192b;">Learn More</button>
                </div>
              </div>
            </div>`;
      }

      data += `<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-body" style="background-color: whitesmoke; border-radius: 10px; padding: 50px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
            <div class="row">
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
    </div>`;
      row.innerHTML = data;
    } else {
      console.log("Api link not accessible.");
    }
  };

  

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(data));

}
