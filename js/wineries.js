async function populateExploreWineries() {
  const xhr = new XMLHttpRequest();
  const url = "PHP/Myapi.php";

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

  xhr.onreadystatechange = async function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let objectData = JSON.parse(this.responseText);

      console.log(objectData);

      let row = document.querySelector(".row");
      //row.innerHTML = '';

      data = ``;

      for (i = 0; i < objectData.data.length; i++) {
        var region_name = await getRegionName(objectData.data[i].BName);
        //alert("The Region Name is: " + region_name);
        var WineryName = objectData.data[i].BName;
        var underscoredWineryName = WineryName.replace(/\s/g, "_");
        data += `<div class="col-md">
        <div class="card" style="color: black; width: 500px;">
        <div class="card-body text-center">
        <div class="h1 mb-3">
        <img alt="hrw-default" class="displayImg" style="
        margin: 15px;
        border-radius: 15px;
        width: 250px;
        height: 210px;
        background-color: #d3d3d3;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        " src="${objectData.data[i].Business_URL}" />
        </div>
        <h5 class="card-title mb-3">${objectData.data[i].BName}</h5>
        <p>${region_name}</p>
        <p class="card-text" style=" 
        display: -webkit-box;
        max-width: 600px;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;">
        ${objectData.data[i].Description}
        </p>
        <button class="ourSpecButton btn btn-primary" id="${underscoredWineryName}" data-bs-toggle="modal" data-bs-target="#myModal" style="background-color: #00192b;">Learn More</button>
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

function getRegionName(wineryname){
  return new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    const url = "PHP/Myapi.php";

    var data = {
      type: "getBusinessInfo",
      api_key: "123456",
      businessName: wineryname,
    };

    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        let objectData = JSON.parse(this.responseText);

        //console.log("The returned BusinessINFO: " + this.responseText);
        
        resolve(objectData.data.RegionName);
      } else if (xhr.readyState == 4 && xhr.status != 200) {
        reject("Api link not accessible.");
      }
    };

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.send(JSON.stringify(data));
  });
}

function populateSpecifications(wineryName) {
  var WineryName = wineryName.replace(/_/g, " "); //Now we have the original wine name.
  console.log("The winery name is: " + WineryName);

  //Now to make an api call and search for the wine Item in the database.
  const xhr = new XMLHttpRequest();
  const url = "PHP/Myapi.php";

  var data = {
    type: "GetAllWineries",
    api_key: "123456",
    //page: "index.php",
    search: { BName: WineryName },
    order: "desc",
    //"limit":10,
    sort: "BName",
    fuzzy: false,
    return: "*",
  };

  function initMap(latitude, longitude) {
    mapboxgl.accessToken =
      "pk.eyJ1IjoiaGFzaC1zYWx0LXBlcHBlciIsImEiOiJjbGk1cjBwbHczNG92M2VudDhxa3lldXppIn0.kaCeMlQU5YjTDNIIzbTq4w";
    var map = new mapboxgl.Map({
      container: "map",
      style: "mapbox://styles/mapbox/streets-v11",
      center: [longitude, latitude],
      zoom: 15,
    });
  }
  let currName = "";
  var long;
  var lat;
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      console.log(this.responseText);
      let objectData = JSON.parse(this.responseText); //This will return one wine Item i.e the searched wine item.
      var rowDisplay = document.querySelector(".rowDisplay");
      console.log(rowDisplay);

      data = ``;
      for (i = 0; i < objectData.data.length; i++) {
        //alert(objectData.data[i].Business_ID);
        currName = objectData.data[i].BName;
        data += `
        
        <div class="col-4">
        <img src="${objectData.data[i].Business_URL}" alt="hrw-default" id= "wineryImage" style="margin: 15px; border-radius: 15px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); background-color: #00192b" />
        
        </div>
        <div class="col-8">
        <div id="map" style=" width: 100%; height: 100%; border-radius: 10px;"></div>
        </div> 
        <h4 id="WName" style="margin-top:20px">${objectData.data[i].BName}</h4>
        <hr>
        <div class="col-3">
        <p>Weekday Opening Hours</p>
        ${objectData.data[i].Weekday_open_time} - ${objectData.data[i].Weekday_close_time}
        </div>
        <div class="col-3">
        <p>Weekend Opening Hours</p>
        ${objectData.data[i].Weekend_open_time} - ${objectData.data[i].Weekend_close_time}
        </div>
        <hr style="margin-top: 20px"> 
        <ul style="list-style: none;
        display: flex;
        flex-direction: row;">
        
        <a href=${objectData.data[i].Facebook}>
        <img src="img/logo-facebook.svg" style="height:25px; width:25px;"/>
        </a>
        <a href=${objectData.data[i].Twitter} style="margin-left:20px;">
        <img src="img/logo-twitter.svg" style="height:25px; width:25px;"/>
        </a>
        <a href=${objectData.data[i].Instagram} style="margin-left:20px;">
        <img src="img/logo-instagram.svg" style="height:25px; width:25px;"/>
        </a>
        
        <a href=${objectData.data[i].Website_URL} style="margin-left:20px;">
        <p>${objectData.data[i].BName} Website</p>
        </a>
        </ul>
        
        
        <hr> 
        <div class="col-12" style="margin-bottom:20px">
        ${objectData.data[i].Description}
        </div>
        
        <div class="col-12">
        
        <button class="viewBusinessWines btn btn-md" id="${objectData.data[i].Business_ID}" style="background-color: #00192b; color:white; ">View Wines</button>
        
        </div>
        `;
      }

      rowDisplay.innerHTML = data;
      getCoordinates(currName, function (coordinates) {
        console.log(coordinates);
        initMap(coordinates.lat, coordinates.long);
      });
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

document.addEventListener("click", function (event){
  if (event.target.matches(".viewBusinessWines")) {
    var btnElement = event.target;
    console.log(btnElement);

    var businessid = btnElement.id;
    console.log(businessid);

    var businessName =
    event.target.parentNode.parentNode.parentNode.querySelector(
      "#WName"
    ).innerHTML;

    populateBusinessWines(businessid, businessName);
  }
});

function getCoordinates(WineryName, callback) {
  const xhr = new XMLHttpRequest();
  const url = "PHP/Myapi.php";

  var data = {
    type: "getBusinessInfo",
    api_key: "123456",
    businessName: WineryName,
  };

  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let responseObj = JSON.parse(this.responseText);
      let long = responseObj.data.Longitude;
      let lat = responseObj.data.Latitude;
      callback({ lat, long });
    }
  };
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(data));
}

function search(event){
  const xhr = new XMLHttpRequest();
  const url = "PHP/Myapi.php";

  if (event.keyCode === 13) {

    event.preventDefault();
    const userInput =(event.target.value).toLowerCase();
      
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

      var row = document.querySelector(".row");

      data = ``;

      for (i = 0; i < objectData.data.length; i++) {

        var wineryName=(objectData.data[i].BName).toLowerCase();
    
        if(wineryName.indexOf(userInput)!==-1)
        {
          var WineryName = objectData.data[i].BName;
          var underscoredWineryName = WineryName.replace(/\s/g, "_");
          data += `<div class="col-md">
                <div class="card" style="color: black; width: 500px;">
                  <div class="card-body text-center">
                    <div class="h1 mb-3">
                      <img alt="hrw-default" class="displayImg" style="
                            margin: 15px;
                            border-radius: 15px;
                            width: 250px;
                            height: 210px;
                            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
                          " src="${objectData.data[i].Business_URL}" />
                    </div>
                    <h5 class="card-title mb-3">${objectData.data[i].BName}</h5>
                    <p>Region</p>
                    <p class="card-text">
                    ${objectData.data[i].Description}
                    </p>
                    <button class="ourSpecButton btn btn-primary" id="${underscoredWineryName}" data-bs-toggle="modal" data-bs-target="#myModal" style="background-color: #00192b;">Learn More</button>
                  </div>
                </div>
              </div>`;
        }
      }

      row.innerHTML = data;
    } 
    else {
      console.log("Api link not accessible.");
    }
  };

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(data));
  }
}

function populateBusinessWines(business_id, business_name){
  const xhr = new XMLHttpRequest();
  const url = "PHP/Myapi.php";
  
  var data = {
    type: "getAllBusinessWines",
    api_key: "123456",
    businessName: business_name,
  };

  //alert("The business ID is: " + business_id + " and the Business Name is: " + business_name);
  
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var rowDisplay = document.querySelector(".rowDisplay");
      data = ``;
      let responseObj = JSON.parse(this.responseText);
      if (responseObj.data.includes("No wine associated with business")) {
        data += `<h3>New Wines Coming Soon!</h3>`;
      } else {
        data += `
        <div class="col-12">
        <ul class="list-group" style="height: 800px; overflow-y: scroll;">
          <li>
            <h1>Wines by ${business_name}</h1>
          </li>
          ${[...responseObj.data]
            .map(
              (_, i) => `
            <li class="list-group-item">
              <div class="WineByBusiness${i + 1}">
              <h2 style="text-align:center">${responseObj.data[i].Name}</h2>
              <hr>    
              <div class="row">
                  <div class="col-5" style="text-align:center">
                  
                  <img src=${
                    responseObj.data[i].Wine_URL
                  } class="img-fluid rounded" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);"></img>
                    
                  </div>
                  <div class="col-7">
                  <p style="background-color: #fffff2; padding: 10px; box-shadow: 0px 0px 5px #888888;">${
                    responseObj.data[i].Description
                  }</p>
                  <table>
                  <tr>
                    <th>Wine Characteristics</th>
                  </tr>
                  <tr>
                    <td>Acidity</td>
                    <td>${responseObj.data[i].Acidity}</td>
                  </tr>
                  <tr>
                    <td>Alcohol</td>
                    <td>${responseObj.data[i].Alcohol}</td>
                  </tr>
                  <tr>
                    <td>Body</td>
                    <td>${responseObj.data[i].Body}</td>
                  </tr>
                  <tr>
                    <td>Business ID</td>
                    <td>${responseObj.data[i].Business_ID}</td>
                  </tr>
                  <tr>
                    <td>Category</td>
                    <td>${responseObj.data[i].Category}</td>
                  </tr>
                  <tr>
                    <td>Cultivars</td>
                    <td>${responseObj.data[i].Cultivars}</td>
                  </tr>
                  <tr>
                    <td>Price Category</td>
                    <td>${responseObj.data[i].Price_Category}</td>
                  </tr>
                  <tr>
                    <td>Producer</td>
                    <td>${responseObj.data[i].Producer}</td>
                  </tr>
                  <tr>
                    <td>Sweetness</td>
                    <td>${responseObj.data[i].Sweetness}</td>
                  </tr>  
                  <tr>  
                    <td>Tannin</td>  
                    <td>${responseObj.data[i].Tannin}</td>  
                  </tr>  
                  <tr>  
                    <td>Vintage</td>  
                    <td>${responseObj.data[i].Vintage}</td>  
                  </tr>
                  <tr>
                  <td>Volume</td>
                  <td>${responseObj.data[i].Volume}</td>
                </tr>
                <p style="background-color:#00192b; color: yellow; border-radius:10px; margin-top:30px; text-align: center;">${
                  responseObj.data[i].Price_Category
                }</p>
                <h2>Cost per bottle: R${
                  responseObj.data[i].Cost_per_bottle
                }</h2>
                <h2>Cost per glass: R${
                  responseObj.data[i].Cost_per_glass
                }</h2>
              </table>
                    
                  </div>
                </div>
              </div>
            </li>
          `
            )
            .join("")}
        </ul>
      </div>`;
      }
      rowDisplay.innerHTML = data;
    }
  };

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(data));
}

async function sortRegion(setText){
  //alert(setText);
  const xhr = new XMLHttpRequest();
  const url = "PHP/Myapi.php";

  var data = {
    type: "GetAllWineries",
    api_key: "123456",
    //page: "index.php",
    //"search":{"BName":"Franschhoek Cellar"},
    order: "desc",
    //"limit":10,
    sort: "BName",
    fuzzy: false,
    return: "*"
  };

  //alert("The setText inside sortRegion is: " + setText);

  xhr.onreadystatechange = async function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let objectData = JSON.parse(this.responseText);

      let row = document.querySelector(".row");
      //row.innerHTML = '';

      data = ``;

      for (i = 0; i < objectData.data.length; i++) {
        var flag = await checkifCorrectRegion(objectData.data[i].BName, setText);
        if (flag === true){
        var region_name = await getRegionName(objectData.data[i].BName);
        //alert("The Region Name is: " + region_name);
        var WineryName = objectData.data[i].BName;
        var underscoredWineryName = WineryName.replace(/\s/g, "_");
        data += `<div class="col-md">
        <div class="card" style="color: black; width: 500px;">
        <div class="card-body text-center">
        <div class="h1 mb-3">
        <img alt="hrw-default" class="displayImg" style="
        margin: 15px;
        border-radius: 15px;
        width: 250px;
        height: 210px;
        background-color: #d3d3d3;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        " src="${objectData.data[i].Business_URL}" />
        </div>
        <h5 class="card-title mb-3">${objectData.data[i].BName}</h5>
        <p>${region_name}</p>
        <p class="card-text" style=" 
        display: -webkit-box;
        max-width: 600px;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;">
        ${objectData.data[i].Description}
        </p>
        <button class="ourSpecButton btn btn-primary" id="${underscoredWineryName}" data-bs-toggle="modal" data-bs-target="#myModal" style="background-color: #00192b;">Learn More</button>
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

function checkifCorrectRegion(business_Name, region_Name){
  return new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    const url = "PHP/Myapi.php";

    //alert("This is the BUSINESS NAME: " + business_Name);
  
    var data = {
      type: "getBusinessInfo",
      api_key: "123456",
      businessName:business_Name
    };
  
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        flag = false;
        let objectData = JSON.parse(this.responseText);
        //alert("This is the region name in onreadyStateChange: " + objectData.data.RegionName);
        if (objectData.data.RegionName === region_Name)
        {
          //alert("This is the business REGION name: " + objectData.data.RegionName + " and this is the business_Name: " + business_Name);
          flag = true;
        }
        
        resolve(flag);
      } else if (xhr.readyState == 4 && xhr.status != 200) {
        reject("Api link not accessible.");
      }
    };
  
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.send(JSON.stringify(data));
  });
}



