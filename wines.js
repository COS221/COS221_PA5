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
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="background-color: #00192b;">Learn More</button>
                </div>
              </div>
            </div>`
          }

          data+= `<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <!-- Move the 'container' content into the modal-body -->
              <div class="modal-body" style="background-color: whitesmoke; border-radius: 10px; padding: 50px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
                <div class="row">
                  <div class="col-3">
                    <img src="img/hrw-default-300x300.jpg" alt="hrw-default" class="img-fluid" style="margin: 15px; border-radius: 15px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);" />
                    <h1>Specific Wine</h1>
                  </div>
                  
                  <div class="col-4" style="margin-left: 50px; margin-top: 10px">
                    <ul style="list-style-type: none">
                      <li class="liRating">
                        <h3>★★★★☆</h3>
                      </li>
                      <li class="liCategoryCultivar">Category & Cultivar</li>
                      <li class="liAlc">Alc: 12% pH3.43 TA: 5.32</li>
                      <li class="liProd">Producer</li>
                      <li>
                        <h2 style="margin-top: 30px">R1500.00</h2>
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
        </div>`
          row.innerHTML = data;

      }else {
          console.log("Api link not accessible.");
      }
  }

  xhr.open('POST', url, true)
  xhr.setRequestHeader('Content-type','application/json');
  xhr.send(JSON.stringify(data));  
}

