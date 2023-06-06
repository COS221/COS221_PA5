var apikey = document.getElementById('API_Key').value;
var userid = document.getElementById('UserID').value;
var firstname = document.getElementById('First_name').value;
var lastname = document.getElementById('Middle_name').value;
var email = document.getElementById('Email').value;
var phonenumber = document.getElementById('PhoneNumber').value;


async function populateExploreWines() {
    const xhr = new XMLHttpRequest();
    const url = "PHP/Myapi.php";
  
    var data = {
        type:"FavouriteWine",
        api_key:"123456",
        userID: userid,
        return:"*"
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
                      <img src="${objectData.data[i].Wine_URL}" style="    width:200px;
                      height:180px;"/>
                    </div>
                    <h3 class="card-price" style="margin: 0px; margin-bottom: 15px"> R
                    ${objectData.data[i].Cost_per_bottle}
                    </h3>
                    <button class="ourSpecButton btn btn-primary " id="${underscoredName}" data-bs-toggle="modal" data-bs-target="#myModal" style="background-color: #00192b;">Learn More</button>
                    <button class="removeFavouriteWine btn btn-primary" id="${objectData.data[i].WineID}" style="color: white; background-color:#00192b"
                    onclick="this.style.backgroundColor = this.style.backgroundColor === 'red' ? '#00192b' : 'red'">Remove
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
      const url = "PHP/Myapi.php";
  
      var data = {
        type: "GetWineReviews",
        api_key: "123456",
        search: { "Wine_ID": wineID },
        return: "*"
      };
  
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log("Here is the " + this.responseText);
          let objectData = JSON.parse(this.responseText);

  
          var total = 0;
          for (let i = 0; i < objectData.data.length; i++) {
            total += objectData.data[i].Rating;
          }
          
          
          var averagepercentage = (total/(objectData.data.length*5));
          
          var averagerating = averagepercentage*5;
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
    if (event.target.matches(".removeFavouriteWine")) {
      var btnElement = event.target;
      console.log(btnElement);
  
      var buttonId = btnElement.id;
      console.log(buttonId);
      //alert("You clicked on wine with ID: " + buttonId);
      removeFromFavourites(buttonId);
    }
  });

  function removeFromFavourites(wineID){
    var favWineID = wineID;

    const xhr = new XMLHttpRequest();
    const url = "PHP/Myapi.php";

    var data = {
      "type":"RemoveFavouriteWine",
      "api_key":"123456",
      "UserID":userid,
      "WineID":favWineID
    };

    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        alert("Wine successfully removed from favourites!");
      } else {
        console.log("Api link not accessible.");
      }
    };

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.send(JSON.stringify(data));

  }