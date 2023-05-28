var xhr = new XMLHttpRequest();

xhr.open('GET', 'https://api.example.com/wines', true);



xhr.onload=function(){
    if (this.status === 200 ) {
        let objectData = JSON.parse(this.responseText); 



        let row = document.querySelector('row');
        row.innerHTML = '';
        
        data= ``;
        
        //Create another loop to access each object
        for (value in objectData){

            data += `<div class="col-md">
            <div class="card" style="color: black">
              <div class="card-body text-center">
                <div class="h1 mb-3">
                  <img alt="hrw-default" class="displayImg" style="
                        margin: 15px;
                        border-radius: 15px;
                        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
                      " src="${objectData[value].data.Business_URL}" />
                </div>
                <h3 class="card-title mb-3">${objectData[value].data.BName}</h3>
                <p>Region</p>
                <p class="card-text">
                ${objectData[value].data.Description}
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

xhr.send();