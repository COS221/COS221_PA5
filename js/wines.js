//Global session variables
var apikey = document.getElementById("API_Key").value;
var userid = document.getElementById("UserID").value;
var firstname = document.getElementById("First_name").value;
var lastname = document.getElementById("Middle_name").value;
var email = document.getElementById("Email").value;
var phonenumber = document.getElementById("PhoneNumber").value;

//alert("Api key is: " + apikey);
//alert("The user id is: " + userid);

async function populateExploreWines() {
  const xhr = new XMLHttpRequest();
  const url = "PHP/api.php";

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

  xhr.onreadystatechange = async function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let objectData = JSON.parse(this.responseText);

      var row = document.querySelector(".row");

      data = ``;
      console.log("The array length is:" + objectData.data.length);
      for (i = 0; i < objectData.data.length; i++) {
        //alert(objectData.data[i].WineID);
        var average = 1;
        const rating = await getAverageRating(objectData.data[i].WineID);
        average = rating;

        console.log("THE CODE IS NOW HERE!!");

        var WineName = objectData.data[i].Name;
        var underscoredName = WineName.replace(/\s/g, "_"); //Wine Name spaces replaced with underscore.
        data += `<div class="col-md"  >
              <div class="card" style="color: black; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <div class="card-body text-center">
                  <h5 class="card-title" style="margin-top: 10px; margin-bottom: 0px; width: 250px;
                  white-space: nowrap;
                  overflow: hidden;
                  text-overflow: ellipsis;">
                    ${objectData.data[i].Name}
                  </h5>
                  <h8 class="card-cultivar">category | ${objectData.data[i].Category}</h8>
                  <h4 class="card-rating mb-3" style="margin-top: 0; padding-top: 0px">
                    Rating: ${average}/5
                  </h4>
                  <div class="card-img-container" style="border-radius: 5px;">
                    <img src="${objectData.data[i].Wine_URL}" style="    width:80px;
                    height:180px;"/>
                  </div>
                  <h3 class="card-price" style="margin: 0px; margin-bottom: 15px"> R
                  ${objectData.data[i].Cost_per_bottle}
                  </h3>
                  <button class="ourSpecButton btn btn-primary " id="${underscoredName}" data-bs-toggle="modal" data-bs-target="#myModal" style="background-color: #00192b;">Learn More</button>
                  <button class="favouriteWine btn btn-primary" id="${objectData.data[i].WineID}" style="color: white; background-color:#00192b"
                  onclick="this.style.backgroundColor = this.style.backgroundColor === 'red' ? '#00192b' : 'red'">Favourite
                  </button>
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

async function populateSpecifications(wineName) {
  var WineName = wineName.replace(/_/g, " "); //Now we have the original wine name.
  console.log("The wine name is: " + WineName);

  //Now to make an api call and search for the wine Item in the database.
  const xhr = new XMLHttpRequest();
  const url = "PHP/api.php";

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

  xhr.onreadystatechange = async function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let objectData = JSON.parse(this.responseText); //This will return one wine Item i.e the searched wine item.
      console.log("WINE NAME IN LOOP" + objectData.data[0].Name);
      var modal = document.querySelector(".modal");
      console.log(modal);

      data = ``;
      //1 Loop iteration since we return one wine item
      for (i = 0; i < objectData.data.length; i++) {
        //alert(objectData.data[i].WineID);
        //var average = getAverage(objectData.data[i].WineID);
        var average = 1;
        const rating = await getAverageRating(objectData.data[i].WineID);
        average = rating;
        data += `
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <!-- Move the 'container' content into the modal-body -->
                  <div class="modal-body" style="background-color: whitesmoke; border-radius: 10px; padding: 50px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
                    <div class="row">
                      <div class="col-4" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <h4>${objectData.data[i].Name}</h4>
                        <img src="${objectData.data[i].Wine_URL}" alt="hrw-default" class="img-fluid" style="margin: 15px; border-radius: 15px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); " />
                        
                      </div>
                      
                      <div class="col-6" style="margin-left: 50px; margin-top: 10px">
                        <ul style="list-style-type: none">
                          <li class="liRating">
                            <h3>Rating: ${average}/5</h3>
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
            
                      <div>
                        <div class="reviewSection" style="display: flex; flex-direction: column">
                          <ul class="scrollReviews nav-pills nav-stacked" id="CenterStage" style="list-style-type: none">
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
                          <button class="ReviewButton wineid-${objectData.data[i].WineID} btn btn-primary " id="${WineName}" style="background-color: #00192b;">Rate Wine</button>
                          
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            `;

        populateSpecificationsReviews(objectData.data[i].WineID);
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

// Get the button element
var addReviewButton = document.getElementById("addReviewButton");

// Add a click event listener
document.addEventListener("click", function (event) {
  // Toggle the modal between initial form and rate and review modal
  if (event.target.matches(".ReviewButton")) {
    var btnElement = event.target;

    var classNames = btnElement.classList;
    var reviewWineID = classNames.item(1);
    var parts = reviewWineID.split("-");
    var realWineID = parts[1];

    console.log("The Wine id to be submitted is: " + realWineID);

    var buttonId = btnElement.id;
    var underscoredName = buttonId.replace(/\s/g, "_");

    var modal = document.querySelector(".modal");
    data = ``;
    data += `<div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <!-- Move the 'container' content into the modal-body -->
        <div class="modal-body" style="background-color: whitesmoke; border-radius: 10px; padding: 50px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
          <div class="row " style="flex-direction: column; gap: 20px;">
          <h1>${buttonId}</h1>
          <label for="rating" style="font-size: 20px;  color: #00192B">Rate Wine:</label>
          <div class="rateOptions" style="display: flex; justify-content: space-between;">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>5</span>
          </div>
          
          <input type="range" id="rating" name="rating" min="1" max="5" style="width: 100%; background-color: #00192B;" />
          <textarea class="review-textbox" rows="4" placeholder="Write your review"></textarea>
          <button class="submitReviewButton wineNumber-${realWineID} btn btn-primary" id=${underscoredName} style="background-color: #00192b;">Submit</button>
          </div>
        </div>
      </div>
    </div>`;
    modal.innerHTML = data;
  }
});

document.addEventListener("click", function (event) {
  if (event.target.matches(".submitReviewButton")) {
    var btnElement = event.target;
    var classNames = btnElement.classList;
    var reviewWineID = classNames.item(1);
    var parts = reviewWineID.split("-");
    var realWineID = parts[1];
    var buttonId = btnElement.id;

    var rangeInput = document.getElementById("rating");
    var rangeValue = rangeInput.value;

    var textareaInput = document.querySelector(".review-textbox");
    var textareaValue = textareaInput.value;
    //alert("The range value is: " + rangeValue);
    //alert("The text input is: " + textareaValue);

    submitReview(realWineID, rangeValue, textareaValue);
    populateSpecifications(buttonId);
  }
});

function submitReview(wineID, rating, comment) {
  alert("Submitting the review!!");
  const xhr = new XMLHttpRequest();
  const url = "PHP/api.php";

  var data = {
    type: "RateWine",
    api_key: apikey,
    userID: userid,
    rate: { Wine_ID: wineID, rating: rating, comment: comment },
  };

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(data));
}

function populateSpecificationsReviews(WineID) {
  //Now to make an api call and search for the wine Item in the database.
  const xhr = new XMLHttpRequest();
  const url = "PHP/api.php";

  var data = {
    type: "GetWineReviews",
    api_key: "123456",
    search: { Wine_ID: WineID },
    return: "*",
  };

  var center = document.getElementById("CenterStage");

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      //center.innerHTML = "";
      let objectData = JSON.parse(this.responseText); //This will return one wine Item i.e the searched wine item.
      console.log(JSON.stringify(objectData));
      var modal = document.getElementById("CenterStage");
      modal.innerHTML = "";
      //console.log(modal);
      modal.innerHTML += `                      
                        <li>
                        <h1>Reviews</h1>
                      </li>`;

      //data = ``;
      //1 Loop iteration since we return one wine item
      for (i = 0; i < objectData.data.length; i++) {
        var p = document.createElement("div");
        p.innerHTML += ` 
          <li>
            <div class="review">
              <ul style="list-style-type: none">
                <li>
                  <h4>${objectData.data[i].First_name} ${objectData.data[
          i
        ].Middle_name.substring(0, 1)}. ${objectData.data[i].Last_name}</h4>
                </li>
                <li>
                  <h5>${objectData.data[i].Rating}/5</h5>
                </li>
                <li>
                  <p>
                  ${objectData.data[i].Comment}
                  </p>
                </li>
              </ul>
            </div>
          </li>`;
        CenterStage.appendChild(p);
      }

      //modal.innerHTML += data;
    }
  };

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(data));
}

async function sortData(text) {
  var realOption = text;

  var parts = realOption.split("-");
  var actual_sort = parts[0].trim();
  var actual_order = parts[1].trim();

  const xhr = new XMLHttpRequest();
  const url = "PHP/api.php";

  var data = {
    type: "GetAllWines",
    api_key: "123456",
    //"page": "bruh",
    //search: { Sweetness: text },
    order: actual_order,
    //"limit":10,
    sort: actual_sort,
    fuzzy: false,
    return: "*",
  };

  console.log(data);

  xhr.onreadystatechange = async function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let objectData = JSON.parse(this.responseText);

      var row = document.querySelector(".row");

      data = ``;

      for (i = 0; i < objectData.data.length; i++) {
        var average = 1;
        const rating = await getAverageRating(objectData.data[i].WineID);
        average = rating;
        var WineName = objectData.data[i].Name;
        console.log(WineName);
        var underscoredName = WineName.replace(/\s/g, "_"); //Wine Name spaces replaced with underscore.
        console.log(underscoredName);
        data += `<div class="col-md" >
                <div class="card" style="color: black">
                  <div class="card-body text-center">
                    <h5 class="card-title" style="margin-top: 10px; margin-bottom: 0px">
                      ${objectData.data[i].Name}
                    </h5>
                    <h8 class="card-cultivar">category | ${objectData.data[i].Category}</h8>
                    <h4 class="card-rating mb-3" style="margin-top: 0; padding-top: 0px">
                      Rating: ${average}/5
                    </h4>
                    <div class="card-img-container" style="border-radius: 5px;">
                      <img src="${objectData.data[i].Wine_URL}" style="width: 230px; height: 210px;"/>
                    </div>
                    <h3 class="card-price" style="margin: 0px; margin-bottom: 15px"> R
                    ${objectData.data[i].Cost_per_bottle}
                    </h3>
                    <button class="ourSpecButton btn btn-primary " id="${underscoredName}" data-bs-toggle="modal" data-bs-target="#myModal" style="background-color: #00192b;">Learn More</button>
                    <button class="favouriteWine btn btn-primary" id="${objectData.data[i].WineID}" style="color: white; background-color:#00192b"
                    onclick="this.style.backgroundColor = this.style.backgroundColor === 'red' ? '#00192b' : 'red'">Favourite
                    </button>
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

// Search function
//const search = (event) => {
async function search(event) {
  const xhr = new XMLHttpRequest();
  const url = "PHP/api.php";

  if (event.keyCode === 13) {
    event.preventDefault();
    const userInput = event.target.value.toLowerCase();

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

    xhr.onreadystatechange = async function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        let objectData = JSON.parse(this.responseText);

        var row = document.querySelector(".row");

        data = ``;

        for (i = 0; i < objectData.data.length; i++) {
          var wineName = objectData.data[i].Name.toLowerCase();

          if (wineName.indexOf(userInput) !== -1) {
            //alert(objectData.data[i].WineID);
            var average = 1;
            const rating = await getAverageRating(objectData.data[i].WineID);
            average = rating;

            var WineName = objectData.data[i].Name;
            var underscoredName = WineName.replace(/\s/g, "_"); //Wine Name spaces replaced with underscore.
            data += `<div class="col-md"  >
            <div class="card" style="color: black; display: flex; flex-direction: column; align-items: center; justify-content: center;">
              <div class="card-body text-center">
                <h5 class="card-title" style="margin-top: 10px; margin-bottom: 0px; width: 250px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;">
                  ${objectData.data[i].Name}
                </h5>
                <h8 class="card-cultivar">category | ${objectData.data[i].Category}</h8>
                <h4 class="card-rating mb-3" style="margin-top: 0; padding-top: 0px">
                  Rating: ${average}/5
                </h4>
                <div class="card-img-container" style="border-radius: 5px;">
                  <img src="${objectData.data[i].Wine_URL}" style="    width:80px;
                  height:180px;"/>
                </div>
                <h3 class="card-price" style="margin: 0px; margin-bottom: 15px"> R
                ${objectData.data[i].Cost_per_bottle}
                </h3>
                <button class="ourSpecButton btn btn-primary " id="${underscoredName}" data-bs-toggle="modal" data-bs-target="#myModal" style="background-color: #00192b;">Learn More</button>
                <button class="favouriteWine btn btn-primary" id="${objectData.data[i].WineID}" style="color: white; background-color:#00192b"
                onclick="this.style.backgroundColor = this.style.backgroundColor === 'red' ? '#00192b' : 'red'">Favourite
                </button>
              </div>
            </div>
          </div>`;
          }
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
}

async function filterData(newText) {
  var selected_option = newText;
  var getactualOption = selected_option.split(":");

  var attr = getactualOption[0].trim();
  var val = getactualOption[1].trim();

  const xhr = new XMLHttpRequest();
  const url = "PHP/api.php";

  if (attr === "Category") {
    var data = {
      type: "GetAllWines",
      api_key: "123456",
      //"page": "bruh",
      search: { Category: val },
      order: "desc",
      //"limit":10,
      sort: "Acidity",
      fuzzy: false,
      return: "*",
    };
  } else if (attr === "Price Category") {
    var data = {
      type: "GetAllWines",
      api_key: "123456",
      //"page": "bruh",
      search: { Price_Category: val },
      order: "desc",
      //"limit":10,
      sort: "Acidity",
      fuzzy: false,
      return: "*",
    };
  } else {
    var data = {
      type: "GetAllWines",
      api_key: "123456",
      //"page": "bruh",
      search: { Sweetness: val },
      order: "desc",
      //"limit":10,
      sort: "Acidity",
      fuzzy: false,
      return: "*",
    };
  }

  xhr.onreadystatechange = async function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let objectData = JSON.parse(this.responseText);

      var row = document.querySelector(".row");

      data = ``;

      for (i = 0; i < objectData.data.length; i++) {
        var average = 1;
        const rating = await getAverageRating(objectData.data[i].WineID);
        average = rating;
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
                        Rating: ${average}/5
                      </h4>
                      <div class="card-img-container" style="border-radius: 5px;">
                        <img src="${objectData.data[i].Wine_URL}" style="width: 230px; height: 210px;"/>
                      </div>
                      <h3 class="card-price" style="margin: 0px; margin-bottom: 15px"> R
                      ${objectData.data[i].Cost_per_bottle}
                      </h3>
                      <button class="ourSpecButton btn btn-primary " id="${underscoredName}" data-bs-toggle="modal" data-bs-target="#myModal" style="background-color: #00192b;">Learn More</button>
                      <button class="favouriteWine btn btn-primary" id="${objectData.data[i].WineID}" style="color: white; background-color:#00192b"
                      onclick="this.style.backgroundColor = this.style.backgroundColor === 'red' ? '#00192b' : 'red'">Favourite
                      </button>
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

function getAverageRating(wineID) {
  return new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    const url = "PHP/api.php";

    var data = {
      type: "GetWineReviews",
      api_key: "123456",
      search: { Wine_ID: wineID },
      return: "*",
    };

    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        let objectData = JSON.parse(this.responseText);

        var total = 0;
        for (let i = 0; i < objectData.data.length; i++) {
          total += objectData.data[i].Rating;
        }

        var averagepercentage = total / (objectData.data.length * 5);

        var averagerating = averagepercentage * 5;
        var integerRating = Math.floor(averagerating);
        //alert("integerRating is: " + integerRating);

        resolve(integerRating);
      } else if (xhr.readyState == 4 && xhr.status != 200) {
        reject("Api link not accessible.");
      }
    };

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.send(JSON.stringify(data));
  });
}

document.addEventListener("click", function (event) {
  if (event.target.matches(".favouriteWine")) {
    var btnElement = event.target;
    console.log(btnElement);

    var buttonId = btnElement.id;
    console.log(buttonId);
    //alert("You clicked on wine with ID: " + buttonId);
    addToFavourites(buttonId);
  }
});

function addToFavourites(wineID) {
  var favWineID = wineID;

  const xhr = new XMLHttpRequest();
  const url = "PHP/api.php";

  var data = {
    type: "AddFavouriteWine",
    api_key: "123456",
    UserID: userid,
    WineID: favWineID,
  };

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      alert("Wine successfully added to favourites!");
    } else {
      console.log("Api link not accessible.");
    }
  };

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(data));
}

/* Event listener is set for the apply button.
var applyButton = document.getElementById("applyFilterButton");
applyButton.addEventListener("click", applyFilter);

//Call applyFilter to check the options that were selected.
function applyFilter() {
  //Selected Sorting Option
  var dropdown4 = document.getElementById("navbarDropdownMenuLink4");
  var selectedSort = dropdown4.textContent.trim();
  //Selected Price_Category Option
  var dropdown3 = document.getElementById("navbarDropdownMenuLink3");
  var selectedPrice_Category = dropdown3.textContent.trim();
  //Selected Sweetness Option


  //Selected Category Option
  


  executeFilter(selectedSort, selectedPrice_Category);
}

function executeFilter(Sort, Price_Category) {
  //Firstly, populate the page with all the wines.
  populateExploreWines();//NB: MIGHT NOT NECESSARY

  //Now you can start with the actual execution of the function
  
  //This is to deal with the sort option
  var selected_option = Sort;
  var getactualOption = selected_option.split(':');
  var realSortOption;
  var parts;
  var sort;
  var order;
  if (getactualOption.length === 2){
    realSortOption = getactualOption[1].trim();
    parts = realSortOption.split('-');
    sort = parts[0].trim();
    order = parts[1].trim();
  }
  
  //This is to deal with the Price Category Option
  var selected_option = Price_Category;
  var getactualOption = selected_option.split(':');
  var realPrice_CategoryOption = getactualOption[1].trim();












  const xhr = new XMLHttpRequest();
  const url = "PHP/api.php";

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
 */
