var xhr = new XMLHttpRequest();

xhr.open('GET', 'https://api.example.com/wines', true);

xhr.onload=function(){
    if (this.status === 200) {
        let objectData = JSON.parse(this.responseText); 

        let container = document.querySelector('.container');
        container.innerHTML = '';
        data= ``;
        
        for (value in objectData){

            data += `<div class="row">
            <div class="col-4" style="padding-left: 30px">
              <h1>${objectData[value].name}</h1>
            </div>
          </div>`
            
            data += `<div class="row">
            <div class="col-4">
              <img
                src="${objectData[value].image}"
                alt="hrw-default"
                class="img-fluid"
                style="
                  margin: 15px;
                  border-radius: 15px;
                  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
                "
              />
            </div>
            <div class="col-3" style="margin-top: 100px">
              <h2>${objectData[value].price}</h2>
              <a href="#" class="btn btn-primary" style="background-color: #00192b"
                >Buy Now</a
              >
            </div>
          </div>
          <div class="row">
            <div class="col" style="margin-left: 20px">
              <p>
              ${objectData[value].description}
              </p>
            </div>
          </div>`
        }
        container.innerHTML=data;


    }else {
        console.log("Api link not accessible.");
    }
}

xhr.send();