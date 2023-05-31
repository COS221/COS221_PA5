
// Function to create the table structure
function createTable() {
    // Create container div
    const containerDiv = document.createElement('div');
    containerDiv.className = 'container mt-5 vh-100';
  
    // Create inner div
    const innerDiv = document.createElement('div');
    innerDiv.className = 'd-flex justify-content-between align-items-center';
  
    // Create heading
    const heading = document.createElement('h1');
    heading.className = 'text-center';
    heading.textContent = 'My Wines';
  
    // Create button div
    const buttonDiv = document.createElement('div');
  
    // Create Add button
    const addButton = document.createElement('button');
    addButton.className = 'btn btn-success me-2';
    addButton.innerHTML = '<i class="bi bi-plus-circle-fill"></i> Add';
    addButton.onclick = addWine;
  
    // Create Update button
    const updateButton = document.createElement('button');
    updateButton.className = 'btn btn-warning me-2';
    updateButton.innerHTML = '<i class="bi bi-pencil-fill"></i> Update';
    updateButton.onclick = updateWine;
  
    // Create Remove button
    const removeButton = document.createElement('button');
    removeButton.className = 'btn btn-danger';
    removeButton.innerHTML = '<i class="bi bi-trash-fill"></i> Remove';
    removeButton.onclick = removeWine;
  
    // Append buttons to buttonDiv
    buttonDiv.appendChild(addButton);
    buttonDiv.appendChild(updateButton);
    buttonDiv.appendChild(removeButton);
  
    // Append heading and buttonDiv to innerDiv
    innerDiv.appendChild(heading);
    innerDiv.appendChild(buttonDiv);
  
    // Create table
    const table = document.createElement('table');
    table.className = 'table';
  
    // Create thead
    const thead = document.createElement('thead');
  
    // Create table row for header
    const headerRow = document.createElement('tr');
  
    // Define header column names
    const headers = [
      'WineId', 'Name', 'Body', 'Alcohol', 'Tannin', 'Acidity', 'Sweetness',
      'Vintage', 'Volume', 'Cultivars', 'Category', 'Description', 'Cost_per_bottle'
    ];
  
    // Create header cells and append them to the header row
    for (const header of headers) {
      const headerCell = document.createElement('th');
      headerCell.textContent = header;
      headerRow.appendChild(headerCell);
    }
  
    // Append the header row to the thead
    thead.appendChild(headerRow);
  
    // Create tbody
    const tbody = document.createElement('tbody');
  
    // Append thead and tbody to the table
    table.appendChild(thead);
    table.appendChild(tbody);
  
    // Append innerDiv and table to containerDiv
    containerDiv.appendChild(innerDiv);
    containerDiv.appendChild(table);
  
    // Append containerDiv to the document body
    document.body.appendChild(containerDiv);
  }
  
  // Function to be called on page load
  function onload() {
    createTable();
    getData();
  }
  
  // Add event listener for page load
  window.addEventListener('load', onload);
  
function getData(){
    const apiUrl = 'http://localhost/Pa05_api/api.php';
    const requestBody = {
        'type': 'getAllBuisinessWines',
        'api_key': '123456',// change for each user
        'businessName': 'Middelvlei Wine Estate'// change for each user
    };
    const TableBody = document.querySelector('tbody');

    // Api Request on load populate table

    const req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            var values = JSON.parse(req.responseText).data;

            for (var j = 0; j < values.length; j++) {
                var wine = values[j];
                console.log(wine);

                var rowElement = document.createElement('tr');

                var rowdata = document.createElement('td');
                rowdata.textContent = wine.WineID;
                rowElement.appendChild(rowdata);

                rowdata = document.createElement('td');
                rowdata.textContent = wine.Name;
                rowElement.appendChild(rowdata);

                rowdata = document.createElement('td');
                rowdata.textContent = wine.Body;
                rowElement.appendChild(rowdata);

                rowdata = document.createElement('td');
                rowdata.textContent = wine.Alcohol;
                rowElement.appendChild(rowdata);

                rowdata = document.createElement('td');
                rowdata.textContent = wine.Tannin;
                rowElement.appendChild(rowdata);

                rowdata = document.createElement('td');
                rowdata.textContent = wine.Acidity;
                rowElement.appendChild(rowdata);

                rowdata = document.createElement('td');
                rowdata.textContent = wine.Sweetness;
                rowElement.appendChild(rowdata);

                rowdata = document.createElement('td');
                rowdata.textContent = wine.Vintage;
                rowElement.appendChild(rowdata);

                rowdata = document.createElement('td');
                rowdata.textContent = wine.Volume;
                rowElement.appendChild(rowdata);

                rowdata = document.createElement('td');
                rowdata.textContent = wine.Cultivars;
                rowElement.appendChild(rowdata);

                rowdata = document.createElement('td');
                rowdata.textContent = wine.Category;
                rowElement.appendChild(rowdata);

                rowdata = document.createElement('td');
                rowdata.textContent = wine.Description;
                rowElement.appendChild(rowdata);

                rowdata = document.createElement('td');
                rowdata.textContent = wine.Cost_per_bottle;
                rowElement.appendChild(rowdata);

                TableBody.appendChild(rowElement);
            }
            
            
        }   
    };

    req.open('POST', apiUrl, true);
    req.send(JSON.stringify(requestBody));
}




var backButtonAdded = false;
var buttonAdd = false;
var buttonUpdate = false;
var buttonRemove = false;
var elements = ["Name", "Wine_URL", "Body", "Alcohol", "Tannin", "Acidity", "Sweetness", "Producer", "Vintage", "Volume", "Cultivars", "Category", "Description", "Cost_per_bottle", "Cost_per_glass", "Price_Category"];

function addWine() {
  console.log("Add wine function called");

  var table = document.querySelector('.table');
  var heading = document.querySelector('.text-center');
  var updateButton = document.querySelector('.btn-warning');
  var removeButton = document.querySelector('.btn-danger');
  var formContainer = document.getElementById('formContainer');

  // Check if the Back button is already added
  if (!backButtonAdded) {
    var backButton = document.createElement('button');
    backButton.className = 'btn btn-danger me-2';
    backButton.innerHTML = '<i class="bi bi-arrow-left-circle-fill"></i> Back';

    document.querySelector('.container div').appendChild(backButton);
    backButton.onclick = backButtonFunction;
    // Set the flag variable to true
    backButtonAdded = true;
  }

  table.style.display = "none";
  heading.style.display = "none";
  updateButton.style.display = "none";
  removeButton.style.display = "none";

  if (!buttonAdd) {
    console.log("Add text boxes");

    elements.forEach(function (element) {
      var div = document.createElement("div");
      div.className = "mb-3";

      var label = document.createElement("label");
      label.className = "form-label";
      label.textContent = element;
      label.id = element + "_label"; // Give unique id to label

      var input = document.createElement("input");
      input.type = "text";
      input.className = "form-control";
      input.id = element + "_input"; // Give unique id to input

      div.appendChild(label);
      div.appendChild(input);

      formContainer.appendChild(div);
    });

    buttonAdd = true;
  } else {
    // Prompt user if they are sure to add a new wine
    var confirmAdd = confirm("Are you sure you want to add a new wine?");
    if (confirmAdd) {
      // User confirmed, proceed with adding a new wine
      console.log("Adding new wine...");

      var Name = document.querySelector('#Name_input');
      var Wine_URL = document.querySelector('#Wine_URL_input');
      var Body = document.querySelector('#Body_input');
      var Alcohol = document.querySelector('#Alcohol_input');
      var Tannin = document.querySelector('#Tannin_input');
      var Acidity = document.querySelector('#Acidity_input');
      var Sweetness = document.querySelector('#Sweetness_input');
      var Producer = document.querySelector('#Producer_input');
      var Vintage = document.querySelector('#Vintage_input');
      var Volume = document.querySelector('#Volume_input');
      var Cultivars = document.querySelector('#Cultivars_input');
      var Category = document.querySelector('#Category_input');
      var Description = document.querySelector('#Description_input');
      var Cost_per_bottle = document.querySelector('#Cost_per_bottle_input');
      var Cost_per_glass = document.querySelector('#Cost_per_glass_input');
      var Price_Category = document.querySelector('#Price_Category_input');

      const apiUrl = 'http://localhost/Pa05_api/api.php';
      const requestBody = {
        "type": "addWine",
        "api_key": "123456", // change for each user
        "Name": Name.value,
        "Wine_URL": Wine_URL.value,
        "Body": Body.value,
        "Alcohol": Alcohol.value,
        "Tannin": Tannin.value,
        "Acidity": Acidity.value,
        "Sweetness": Sweetness.value,
        "Producer": Producer.value,
        "Vintage": Vintage.value,
        "Volume": Volume.value,
        "Cultivars": Cultivars.value,
        "Category": Category.value,
        "Description": Description.value,
        "Cost_per_bottle": Cost_per_bottle.value,
        "Cost_per_glass": Cost_per_glass.value,
        "Price_Category": Price_Category.value,
        "BusinessID": "1" // change for each user
      };

      const req = new XMLHttpRequest();

      req.onreadystatechange = function () {
        if (req.status == 200 || req.status === 'success') {
          alert("Successfully added a new wine");

        }
      };

      req.open('POST', apiUrl, true);
      req.send(JSON.stringify(requestBody));
      backButtonFunction();
    } else {
      // User canceled, reset the form and display the table again
      backButtonFunction();
    }
  }
}






// Function to remove a wine
function removeWine() {
    console.log("Remove wine function called");
    
    var table = document.querySelector('.table');
    var heading = document.querySelector('.text-center');
    var updateButton = document.querySelector('.btn-warning');
    var addButton = document.querySelector('.btn-success');
    
    // Check if the Back button is already added
    if (!backButtonAdded) {
        var backButton = document.createElement('button');
        backButton.className = 'btn btn-danger me-2';
        backButton.innerHTML = '<i class="bi bi-arrow-left-circle-fill"></i> Back';
        
        document.querySelector('.container div').appendChild(backButton);
        backButton.onclick = backButtonFunction;
        // Set the flag variable to true
        backButtonAdded = true;
    }
    
    table.style.display = "none";
    heading.style.display = "none";
    updateButton.style.display = "none";
    addButton.style.display = "none";

    if (!buttonRemove) {
      

      // Create the Wine_ID dropdown
      var wineIdDiv = document.createElement("div");
      wineIdDiv.className = "mb-3";

      var wineIdLabel = document.createElement("label");
      wineIdLabel.className = "form-label";
      wineIdLabel.textContent = "Wine_ID";

      var wineIdDropdown = document.createElement("select");
      wineIdDropdown.className = "form-select";
      wineIdDropdown.id = "Wine_ID_input"; // Give unique id to dropdown

      var emptyOption = document.createElement("option");
      emptyOption.value = ""; // Set the value of the empty option
      emptyOption.text = ""; // Set the display text of the empty option

      wineIdDropdown.appendChild(emptyOption);
      wineIdDiv.appendChild(wineIdLabel);
      wineIdDiv.appendChild(wineIdDropdown);

      formContainer.appendChild(wineIdDiv);

      // Create the rest of the text boxes
      elements.forEach(function (element) {
          if (element !== "Wine_ID") {
              var div = document.createElement("div");
              div.className = "mb-3";

              var label = document.createElement("label");
              label.className = "form-label";
              label.textContent = element;
              label.id = element + "_label"; // Give unique id to label

              var input = document.createElement("input");
              input.type = "text";
              input.className = "form-control";
              input.id = element + "_input"; // Give unique id to input

              div.appendChild(label);
              div.appendChild(input);

              formContainer.appendChild(div);
          }
      });

      // Fetch the wine IDs from the API and populate the dropdown
      fetchWineIDs(wineIdDropdown);


      buttonRemove = true;
  }else {
    
    var confirmremove = confirm("Are you sure you want to remove this wine?");
    if (confirmremove) {
      
      console.log("remove wine...");
      var WineID = document.querySelector('#Wine_ID_input').value;

      const apiUrl = 'http://localhost/Pa05_api/api.php';
      const requestBody = {
        "type": "removeWine",
        "api_key": "123456", // change for each user
        "wineId": WineID 
        
      };

      const req = new XMLHttpRequest();

      req.onreadystatechange = function () {
        if (req.status == 200 || req.status === 'success') {
          alert("Successfully removed this wine");

        }
      };

      req.open('POST', apiUrl, true);
      req.send(JSON.stringify(requestBody));
      backButtonFunction();
    } else {
      // User canceled, reset the form and display the table again
      backButtonFunction();
    }
  }
}



// Function to update a wine
function updateWine() {
    console.log("Update wine function called");
    
    var table = document.querySelector('.table');
    var heading = document.querySelector('.text-center');
    var removeButton = document.querySelector('.btn-danger');
    var addButton = document.querySelector('.btn-success');
    var formContainer = document.getElementById('formContainer');
    
    // Check if the Back button is already added
    if (!backButtonAdded) {
        var backButton = document.createElement('button');
        backButton.className = 'btn btn-danger me-2';
        backButton.innerHTML = '<i class="bi bi-arrow-left-circle-fill"></i> Back';
        
        document.querySelector('.container div').appendChild(backButton);
        backButton.onclick = backButtonFunction;
        // Set the flag variable to true
        backButtonAdded = true;
    }

    table.style.display = "none";
    heading.style.display = "none";
    removeButton.style.display = "none";
    addButton.style.display = "none";

    if (!buttonUpdate) {
      console.log('Create text boxes and dropdown');

      // Create the Wine_ID dropdown
      var wineIdDiv = document.createElement("div");
      wineIdDiv.className = "mb-3";

      var wineIdLabel = document.createElement("label");
      wineIdLabel.className = "form-label";
      wineIdLabel.textContent = "Wine_ID";

      var wineIdDropdown = document.createElement("select");
      wineIdDropdown.className = "form-select";
      wineIdDropdown.id = "Wine_ID_input"; // Give unique id to dropdown

      var emptyOption = document.createElement("option");
      emptyOption.value = ""; // Set the value of the empty option
      emptyOption.text = ""; // Set the display text of the empty option

      wineIdDropdown.appendChild(emptyOption);
      wineIdDiv.appendChild(wineIdLabel);
      wineIdDiv.appendChild(wineIdDropdown);

      formContainer.appendChild(wineIdDiv);

      // Create the rest of the text boxes
      elements.forEach(function (element) {
          if (element !== "Wine_ID") {
              var div = document.createElement("div");
              div.className = "mb-3";

              var label = document.createElement("label");
              label.className = "form-label";
              label.textContent = element;
              label.id = element + "_label"; // Give unique id to label

              var input = document.createElement("input");
              input.type = "text";
              input.className = "form-control";
              input.id = element + "_input"; // Give unique id to input

              div.appendChild(label);
              div.appendChild(input);

              formContainer.appendChild(div);
          }
      });

      // Fetch the wine IDs from the API and populate the dropdown
      fetchWineIDs(wineIdDropdown);


      buttonUpdate = true;
  }else {
    
    var confirmupdate = confirm("Are you sure you want to update your wine?");
    if (confirmupdate) {
      
      console.log("update wine...");
      var WineID = document.querySelector('#Wine_ID_input').value;
      var Name = document.querySelector('#Name_input');
      var Body = document.querySelector('#Body_input');
      var Alcohol = document.querySelector('#Alcohol_input');
      var Tannin = document.querySelector('#Tannin_input');
      var Acidity = document.querySelector('#Acidity_input');
      var Sweetness = document.querySelector('#Sweetness_input');
      var Producer = document.querySelector('#Producer_input');
      var Vintage = document.querySelector('#Vintage_input');
      var Volume = document.querySelector('#Volume_input');
      var Cultivars = document.querySelector('#Cultivars_input');
      var Category = document.querySelector('#Category_input');
      var Description = document.querySelector('#Description_input');
      var Cost_per_bottle = document.querySelector('#Cost_per_bottle_input');
      var Cost_per_glass = document.querySelector('#Cost_per_glass_input');
      var Price_Category = document.querySelector('#Price_Category_input');

      const apiUrl = 'http://localhost/Pa05_api/api.php';
      const requestBody = {
        "type": "updateWine",
        "api_key": "123456", // change for each user
        "Name": Name.value,
        "WineID": WineID,
        "Body": Body.value,
        "Alcohol": Alcohol.value,
        "Tannin": Tannin.value,
        "Acidity": Acidity.value,
        "Sweetness": Sweetness.value,
        "Producer": Producer.value,
        "Vintage": Vintage.value,
        "Volume": Volume.value,
        "Cultivars": Cultivars.value,
        "Category": Category.value,
        "Description": Description.value,
        "Cost_per_bottle": Cost_per_bottle.value,
        "Cost_per_glass": Cost_per_glass.value,
        "Price_Category": Price_Category.value,
        "BusinessID": "1" // change for each user
      };

      const req = new XMLHttpRequest();

      req.onreadystatechange = function () {
        if (req.status == 200 || req.status === 'success') {
          alert("Successfully updated your wine");

        }
      };

      req.open('POST', apiUrl, true);
      req.send(JSON.stringify(requestBody));
      backButtonFunction();
    } else {
      // User canceled, reset the form and display the table again
      backButtonFunction();
    }
  }
    
    
}


function backButtonFunction() {
    console.log("Back button function called");
    var table = document.querySelector('.table');
    var heading = document.querySelector('.text-center');
    var addButton = document.querySelector('.btn-success');
    var updateButton = document.querySelector('.btn-warning');
    var removeButton = document.querySelector('.btn-danger');
    var backButton = document.querySelector('.btn-danger.me-2');
    var formContainer = document.getElementById('formContainer');
    while (formContainer.firstChild) {
      formContainer.removeChild(formContainer.firstChild);
  }
    
    // Remove the Back button
    backButton.parentNode.removeChild(backButton);
    
    table.style.display = "table";
    heading.style.display = "block";
    addButton.style.display = "inline-block";
    updateButton.style.display = "inline-block";
    removeButton.style.display = "inline-block";
    
    
    // Reset the flag variable
    backButtonAdded = false;
    buttonAdd = false;
    buttonUpdate = false;
    buttonRemove = false;

    location.reload();
}

function fetchWineIDs(dropdown) {
  // Make an API request to fetch wine IDs
  const apiUrl = 'http://localhost/Pa05_api/api.php';
  const requestBody = {
    'type': 'getAllBuisinessWines',
    'api_key': '123456',// change for each user
    'businessName': 'Middelvlei Wine Estate'// change for each user
};

  const req = new XMLHttpRequest();

  req.onreadystatechange = function () {
      if (req.readyState === 4) {
          if (req.status === 200) {
              // Parse the response and populate the dropdown
              var values = JSON.parse(req.responseText).data;

              for (var j = 0; j < values.length; j++) {
                var wine = values[j];
                  var option = document.createElement("option");
                  option.value = wine.WineID;
                  option.textContent = wine.WineID;
                  dropdown.appendChild(option);
              }
              dropdown.addEventListener("change", function () {
                var selectedWineID = dropdown.value;
                if (selectedWineID !== "") {
                    console.log(selectedWineID);
                    fetchWineDetails(selectedWineID);
                }
                else{
                  document.querySelector('#Name_input').value = "";
                  document.querySelector('#Wine_URL_input').value = "";
                  document.querySelector('#Body_input').value = "";
                  document.querySelector('#Alcohol_input').value = "";
                  document.querySelector('#Tannin_input').value = "";
                  document.querySelector('#Acidity_input').value = "";
                  document.querySelector('#Sweetness_input').value = "";
                  document.querySelector('#Producer_input').value = "";
                  document.querySelector('#Vintage_input').value = "";
                  document.querySelector('#Volume_input').value = "";
                  document.querySelector('#Cultivars_input').value = "";
                  document.querySelector('#Category_input').value = "";
                  document.querySelector('#Description_input').value = "";
                  document.querySelector('#Cost_per_bottle_input').value = "";
                  document.querySelector('#Cost_per_glass_input').value = "";
                  document.querySelector('#Price_Category_input').value = "";

                }
            });
          } else {
              console.error("Failed to fetch wine IDs: " + req.status);
          }
      }
  };

  req.open('POST', apiUrl, true);
  req.send(JSON.stringify(requestBody));
}


function fetchWineDetails(wineID) {   //for update
  // Make an API request to fetch wine details
  const apiUrl = 'http://localhost/Pa05_api/api.php';
  const requestBody = {
    'type': 'getAllBuisinessWines',
    'api_key': '123456',// change for each user
    'businessName': 'Middelvlei Wine Estate'// change for each user
  };

  const req = new XMLHttpRequest();

  req.onreadystatechange = function () {
      if (req.readyState === 4) {
          if (req.status === 200) {
              
              var wineDetails = JSON.parse(req.responseText).data;
              for (var j = 0; j < wineDetails.length; j++) {
                  if(wineDetails[j].WineID == wineID ) {
                    document.querySelector('#Name_input').value = wineDetails[j].Name;
                    document.querySelector('#Wine_URL_input').value = wineDetails[j].Wine_URL;
                    document.querySelector('#Body_input').value = wineDetails[j].Body;
                    document.querySelector('#Alcohol_input').value = wineDetails[j].Alcohol;
                    document.querySelector('#Tannin_input').value = wineDetails[j].Tannin;
                    document.querySelector('#Acidity_input').value = wineDetails[j].Acidity;
                    document.querySelector('#Sweetness_input').value = wineDetails[j].Sweetness;
                    document.querySelector('#Producer_input').value = wineDetails[j].Producer;
                    document.querySelector('#Vintage_input').value = wineDetails[j].Vintage;
                    document.querySelector('#Volume_input').value = wineDetails[j].Volume;
                    document.querySelector('#Cultivars_input').value = wineDetails[j].Cultivars;
                    document.querySelector('#Category_input').value = wineDetails[j].Category;
                    document.querySelector('#Description_input').value = wineDetails[j].Description;
                    document.querySelector('#Cost_per_bottle_input').value = wineDetails[j].Cost_per_bottle;
                    document.querySelector('#Cost_per_glass_input').value = wineDetails[j].Cost_per_glass;
                    document.querySelector('#Price_Category_input').value = wineDetails[j].Price_Category;
                  }
              }
              
              
          } else {
              console.error("Failed to fetch wine details: " + req.status);
          }
      }
  };

  req.open('POST', apiUrl, true);
  req.send(JSON.stringify(requestBody));
}
