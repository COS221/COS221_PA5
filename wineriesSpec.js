var xhr = new XMLHttpRequest();

xhr.open('GET', 'https://api.example.com/wines', true);

xhr.onload=function(){
    if (this.status === 200) {
        let objectData = JSON.parse(this.responseText); 

        let container = document.querySelector('.container');
        container.innerHTML = '';
        data= ``;
        
        for (value in objectData){
            
            data += `<div class="col-3">
            <img src="${objectData[value].data[0].Business_URL}" alt="vineyard-placeholder" class="displayImg" style="
                  margin: 15px;
                  border-radius: 15px;
                  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
                " />
          </div>
          <div class="col-4" style="margin-left: 50px; margin-top: 10px">
            <ul style="list-style-type: none">
              <li class="liTitle">
                <h1>${objectData[value].data[0].BName}</h1>
              </li>
              <li class="liAddress">42 Werner Street, Stellenbosch</li>
              <li class="liDescription">
              ${objectData[value].data[0].Description}
              </li>
            </ul>
          </div>
          <div class="col-4">
            <div id="map"></div>
          </div>
        </div>`
        }
        container.innerHTML=data;


    }else {
        console.log("Api link not accessible.");
    }
}

xhr.send();