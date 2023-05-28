var xhr = new XMLHttpRequest();

xhr.open('GET', 'https://api.example.com/wines', true);

xhr.onload=function(){
    if (this.status === 200) {
        let objectData = JSON.parse(this.responseText); 

        let row = document.querySelector('row');
        row.innerHTML = '';
        data= ``;
        
        for (value in objectData){

            data += `<div class="col-md">
            <div class="card" style="color: black">
              <div class="card-body text-center">
                <h3 class="card-title" style="margin-top: 10px; margin-bottom: 0px">
                  ${objectData[value].data.Name}
                </h3>
                <h8 class="card-cultivar">category | ${objectData[value].data.Category}</h8>
                <h4 class="card-rating mb-3" style="margin-top: 0; padding-top: 0px">
                  ★★★★☆
                </h4>
                <div class="card-img-container" style="border-radius: 5px">
                  <img src="${objectData[value].Wine_URL}" />
                </div>
                <h3 class="card-price" style="margin: 0px; margin-bottom: 15px">
                ${objectData[value].price}
                </h3>
                <a href="wineSpec.php" class="btn btn-primary" style="background-color: #00192b; border: none">Learn
                  More</a>
              </div>
            </div>
          </div>`
        }
        row.innerHTML=data;


    }else {
        console.log("Api link not accessible.");
    }
}

xhr.send();