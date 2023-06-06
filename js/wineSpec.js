const xhr = new XMLHttpRequest();
const url = 'PHP/api.php';

var data = {
  "type":"GetAllWines",
  "api_key":"123456",
  "page": "bruh",
  "search":{"wine_name":"Franschhoek Cellar"}, //Need to use this to somehow get the individual wine item after clicking on read more
  "order":"desc",
  //"limit":10,
  "sort":"Acidity",
  "fuzzy":false,
  "return":"*"
}

xhr.onreadystatechange = function(){
  if (xhr.readyState == 4 && xhr.status == 200) {
        let objectData = JSON.parse(this.responseText); 

        let container = document.querySelector('.container');
        container.innerHTML = '';
        data= ``;
        
        for (value in objectData){

            data += `<div class="row">
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
                  <h1>${objectData[value].data[0].Name}</h1>
                </li>
                <li class="liRating">
                  <h3>★★★★☆</h3>
                </li>
                <li class="liCategoryCultivar">${objectData[value].data.Category} ${objectData[value].data[0].Cultivars}</li>
                <li class="liAlc">Alc: ${objectData[value].data[0].Alcohol}% pH${objectData[value].data[0].Acidity} TA: ${objectData[value].data[0].Tannin}</li>
                <li class="liProd">${objectData[value].data[0].Producer}</li>
                <li>
                  <h2 style="margin-top: 30px">R${objectData[value].data[0].Cost_per_bottle}</h2>
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
          </div>`
        }
        container.innerHTML=data;


    }else {
        console.log("Api link not accessible.");
    }
}

xhr.open('POST', url, true)
xhr.setRequestHeader('Content-type','application/json');
xhr.send(JSON.stringify(data));  