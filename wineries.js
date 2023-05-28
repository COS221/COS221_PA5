function populateExploreWineries() {
    const xhr = new XMLHttpRequest();
    const url = 'http://localhost/COS221_PA5/api.php';
  
    var data = {
      "type":"GetAllWineries",
      "api_key":"123456",
      "page": "index.php",
      //"search":{"BName":"Franschhoek Cellar"},
      "order":"desc",
      //"limit":10,
      "sort":"BName",
      "fuzzy":false,
      "return":"*"
    }
  
    xhr.onreadystatechange = function(){
        if (xhr.readyState == 4 && xhr.status == 200) {
            let objectData = JSON.parse(this.responseText); 
            
            let row = document.querySelector('.row');
            //row.innerHTML = '';
            
            data= ``;
            
            for (i=0; i < objectData.data.length; i++){
  
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
                    <a href="wineriesSpec.php" class="btn btn-primary" style="background-color: #00192b">Read More</a>
                  </div>
                </div>
              </div>`
  
            }
            row.innerHTML=data;
  
  
        }else {
            console.log("Api link not accessible.");
        }
    }
  
    xhr.open('POST', url, true)
    xhr.setRequestHeader('Content-type','application/json');
    xhr.send(JSON.stringify(data));  
  }
  