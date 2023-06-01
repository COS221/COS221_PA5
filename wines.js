function populateExploreWines() {
  const xhr = new XMLHttpRequest();
  const url = "http://localhost/COS221_PA5/api.php";

  var data = {
    type: "GetAllWines",
    api_key: "123456",
    page: "bruh",
    //"search":{"wine_name":"Franschhoek Cellar"},
    order: "desc",
    //"limit":10,
    sort: "Acidity",
    fuzzy: false,
    return: "*",
  };

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let objectData = JSON.parse(this.responseText);

      var row = document.querySelector(".row");

      data = ``;

      for (i = 0; i < objectData.data.length; i++) {
        //alert(objectData.data[i].WineID);
        var WineName = objectData.data[i].Name;
        var underscoredName = WineName.replace(/\s/g, "_"); //Wine Name spaces replaced with underscore.
        data += `<div class="col-md" >
              <div class="card" style="color: black">
                <div class="card-body text-center">
                  <h5 class="card-title" style="margin-top: 10px; margin-bottom: 0px">
                    ${objectData.data[i].Name}
                  </h5>
                  <h8 class="card-cultivar">category | ${objectData.data[i].Category}</h8>
                  <h4 class="card-rating mb-3" style="margin-top: 0; padding-top: 0px">
                    ★★★★☆
                  </h4>
                  <div class="card-img-container" style="border-radius: 5px;">
                    <img src="${objectData.data[i].Wine_URL}" style="width: 230px; height: 210px;"/>
                  </div>
                  <h3 class="card-price" style="margin: 0px; margin-bottom: 15px"> R
                  ${objectData.data[i].Cost_per_bottle}
                  </h3>
                  <button class="ourSpecButton btn btn-primary " id="${underscoredName}" data-bs-toggle="modal" data-bs-target="#myModal" style="background-color: #00192b;">Learn More</button>
                </div>
              </div>
            </div>`;
      }

      row.innerHTML = data;
    } else {
      console.log("Api link not accessible.");
    }
  };

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(data));
}

function populateSpecifications(wineName) {
  var WineName = wineName.replace(/_/g, " "); //Now we have the original wine name.
  console.log("The wine name is: " + WineName);

  //Now to make an api call and search for the wine Item in the database.
  const xhr = new XMLHttpRequest();
  const url = "http://localhost/COS221_PA5/api.php";

  var data = {
    type: "GetAllWines",
    api_key: "123456",
    //"page": "bruh",
    search: { Name: WineName },
    order: "desc",
    //"limit":10,
    sort: "Acidity",
    fuzzy: false,
    return: "*",
  };

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let objectData = JSON.parse(this.responseText); //This will return one wine Item i.e the searched wine item.
      console.log("WINE NAME IN LOOP" + objectData.data[0].Name);
      var modal = document.querySelector(".modal");
      console.log(modal);

      data = ``;
      //1 Loop iteration since we return one wine item
      for (i = 0; i < objectData.data.length; i++) {
        data += `
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <!-- Move the 'container' content into the modal-body -->
                  <div class="modal-body" style="background-color: whitesmoke; border-radius: 10px; padding: 50px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
                    <div class="row">
                      <div class="col-3" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <img src="${objectData.data[i].Wine_URL}" alt="hrw-default" class="img-fluid" style="margin: 15px; border-radius: 15px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);" />
                        <h4>${objectData.data[i].Name}</h4>
                      </div>
                      
                      <div class="col-4" style="margin-left: 50px; margin-top: 10px">
                        <ul style="list-style-type: none">
                          <li class="liRating">
                            <h3>★★★★☆</h3>
                          </li>
                          <li class="liCategoryCultivar">${objectData.data[i].Category} & ${objectData.data[i].Cultivars}</li>
                          <li class="liAlc">Alc: ${objectData.data[i].Alcohol}% pH${objectData.data[i].Acidity} TA: ${objectData.data[i].Tannin}</li>
                          <li class="liProd">${objectData.data[i].Producer}</li>
                          <li>
                            <h2 style="margin-top: 30px">${objectData.data[i].Cost_per_bottle}</h2>
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
            `;
      }
      
      modal.innerHTML = data;
    } else {
      console.log("Api link not accessible.");
    }
  };

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(data));
}

document.addEventListener("click", function (event) {
  if (event.target.matches(".ourSpecButton")) {
    var btnElement = event.target;
    console.log(btnElement);

    var buttonId = btnElement.id;
    console.log(buttonId);

    populateSpecifications(buttonId);
  }
});

function applyFilter() {
  var dropdown = document.getElementById("navbarDropdownMenuLink");
  var selectedOption = dropdown.textContent.trim();
  
  executeFilter(selectedOption);
}

var applyButton = document.getElementById("applyFilterButton");
applyButton.addEventListener("click", applyFilter);

function executeFilter(option) {
  console.log(option);
  var selected_option = option;

  var getactualOption = selected_option.split(':');
  console.log(getactualOption);
  var realOption = getactualOption[1].trim();

  var parts = realOption.split('-');
  var sort = parts[0].trim();
  var order = parts[1].trim();

  console.log(sort);
  console.log("here is the order");
  console.log(order);

  const xhr = new XMLHttpRequest();
  const url = "http://localhost/COS221_PA5/api.php";

  var data = {
    type: "GetAllWines",
    api_key: "123456",
    page: "bruh",
    //"search":{"wine_name":"Franschhoek Cellar"},
    order: order,
    //"limit":10,
    sort: sort,
    fuzzy: false,
    return: "*",
  };

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let objectData = JSON.parse(this.responseText);

      var row = document.querySelector(".row");

      data = ``;

      for (i = 0; i < objectData.data.length; i++) {
        //alert(objectData.data[i].WineID);
        var WineName = objectData.data[i].Name;
        var underscoredName = WineName.replace(/\s/g, "_"); //Wine Name spaces replaced with underscore.
        data += `<div class="col-md" >
              <div class="card" style="color: black">
                <div class="card-body text-center">
                  <h5 class="card-title" style="margin-top: 10px; margin-bottom: 0px">
                    ${objectData.data[i].Name}
                  </h5>
                  <h8 class="card-cultivar">category | ${objectData.data[i].Category}</h8>
                  <h4 class="card-rating mb-3" style="margin-top: 0; padding-top: 0px">
                    ★★★★☆
                  </h4>
                  <div class="card-img-container" style="border-radius: 5px;">
                    <img src="${objectData.data[i].Wine_URL}" style="width: 230px; height: 210px;"/>
                  </div>
                  <h3 class="card-price" style="margin: 0px; margin-bottom: 15px"> R
                  ${objectData.data[i].Cost_per_bottle}
                  </h3>
                  <button class="ourSpecButton btn btn-primary " id="${underscoredName}" data-bs-toggle="modal" data-bs-target="#myModal" style="background-color: #00192b;">Learn More</button>
                </div>
              </div>
            </div>`;
      }

      row.innerHTML = data;
    } else {
      console.log("Api link not accessible.");
    }
  };

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(data));

}

