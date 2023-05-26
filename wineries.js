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
                    <div class="h1 mb-3">
                    <img src="${objectData[value].image}" />
                    </div>
                    <h3 class="card-title mb-3">${objectData[value].name}</h3>
                    <p class="card-text">
                    ${objectData[value].description}
                    </p>
                    <a
                    href="wineSpec.html"
                    class="btn btn-primary"
                    style="background-color: #00192b"
                    >Read More</a
                    >
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