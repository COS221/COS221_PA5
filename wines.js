function populateExploreWines() {
    const xhr = new XMLHttpRequest();
    const url = 'http://localhost/COS221_PA5/api.php';
  
    var data = {
      "type":"GetAllWines",
      "api_key":"123456",
      "page": "bruh",
      //"search":{"wine_name":"Franschhoek Cellar"},
      "order":"desc",
      //"limit":10,
      "sort":"Acidity",
      "fuzzy":false,
      "return":"*"
    }
  
    xhr.onreadystatechange = function(){
      if (xhr.readyState == 4 && xhr.status == 200) {
          
          let objectData = JSON.parse(this.responseText);
            
          var row = document.querySelector('.row');
            //row.innerHTML = '';
            //console.log(row.innerHTML);
            
            data= ``;
            
            for (i=0; i < objectData.data.length; i++){
                data += `<div class="col-md">
                <div class="card" style="color: black">
                  <div class="card-body text-center">
                    <h3 class="card-title" style="margin-top: 10px; margin-bottom: 0px">
                      ${objectData.data[i].Name}
                    </h3>
                    <h8 class="card-cultivar">category | ${objectData.data[i].Category}</h8>
                    <h4 class="card-rating mb-3" style="margin-top: 0; padding-top: 0px">
                      ★★★★☆
                    </h4>
                    <div class="card-img-container" style="border-radius: 5px">
                      <img src="${objectData.data[i].Wine_URL}" />
                    </div>
                    <h3 class="card-price" style="margin: 0px; margin-bottom: 15px"> R
                    ${objectData.data[i].Cost_per_bottle}
                    </h3>
                    <a href="wineSpec.php" class="btn btn-primary" style="background-color: #00192b; border: none">Learn
                      More</a>
                  </div>
                </div>
              </div>`
            }
            row.innerHTML = data;
  
        }else {
            console.log("Api link not accessible.");
        }
    }
  
    xhr.open('POST', url, true)
    xhr.setRequestHeader('Content-type','application/json');
    xhr.send(JSON.stringify(data));  
  }
  
  