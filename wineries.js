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

      row.innerHTML = data;
    } else {
      console.log("Api link not accessible.");
    }
  };

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(data));
}

  
function populateSpecifications(wineryName) {
  var WineryName = wineryName.replace(/_/g, " "); //Now we have the original wine name.
  console.log("The winery name is: " + WineryName);

  //Now to make an api call and search for the wine Item in the database.
  const xhr = new XMLHttpRequest();
  const url = "http://localhost/COS221_PA5/api.php";

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

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let objectData = JSON.parse(this.responseText); //This will return one wine Item i.e the searched wine item.
      console.log("WINE NAME IN LOOP" + objectData.data[0].BName);
      var rowDisplay = document.querySelector(".rowDisplay");
      console.log(rowDisplay);

      data = ``;
      //1 Loop iteration since we return one wine item
      for (i = 0; i < objectData.data.length; i++) {
        data += `<div class="col-3">
        <img src="${objectData.data[i].Business_URL}" alt="hrw-default" id= "wineryImage" style="margin: 15px; border-radius: 15px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);" />
      </div>
      <div class="col-4" style="margin-left: 50px; margin-top: 10px">
        <ul style="list-style-type: none">
          <li class="liTitle">
            <h4>${objectData.data[i].BName}</h4>
          </li>
          <li class="liAddress">Business Address</li>
          <li class="liDescription">
          ${objectData.data[i].Description}
          </li>
        </ul>
      </div>
      <div class="col-4">
        <div id="map">
      </div>`;
      }

      rowDisplay.innerHTML = data;
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

// Search function
//const search = (event) => {
  function search(event){
    const xhr = new XMLHttpRequest();
    const url = "http://localhost/COS221_PA5/api.php";
  
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
  
  

