
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
    heading.textContent = 'My Events';
  
    // Create button div
    const buttonDiv = document.createElement('div');
  
    // Create Add button
    const addButton = document.createElement('button');
    addButton.className = 'btn btn-success me-2';
    addButton.innerHTML = '<i class="bi bi-plus-circle-fill"></i> Add';
    addButton.onclick = addEvent;
  
    // Create Update button
    const updateButton = document.createElement('button');
    updateButton.className = 'btn btn-warning me-2';
    updateButton.innerHTML = '<i class="bi bi-pencil-fill"></i> Update';
    updateButton.onclick = updateEvent;
  
    // Create Remove button
    const removeButton = document.createElement('button');
    removeButton.className = 'btn btn-danger';
    removeButton.innerHTML = '<i class="bi bi-trash-fill"></i> Remove';
    removeButton.onclick = removeEvent;
  
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
      'Name', 'Description'
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
    const apiUrl = 'PHP/api.php';
    const requestBody = {
        "type": "getBusinessEvents",
        "api_key": document.getElementById('API_Key').value, // change for each user
        "businessID": document.getElementById('Business_ID').value  // change for each user
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
                rowdata.textContent = wine.Name;
                rowElement.appendChild(rowdata);

                rowdata = document.createElement('td');
                rowdata.textContent = wine.Description;
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
var elements = ["Name",  "Description"];

function addEvent() {
  console.log("Add Event function called");

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
    // Prompt user if they are sure to add a new Event
    var confirmAdd = confirm("Are you sure you want to add a new Event?");
    if (confirmAdd) {
      // User confirmed, proceed with adding a new wine
      console.log("Adding new event...");

      var Name = document.querySelector('#Name_input').value;
      var Description = document.querySelector('#Description_input').value;

      
   
      const apiUrl = 'PHP/api.php';
      const requestBody = {
        "type": "addBuisinessEvent",
        "api_key": document.getElementById('API_Key').value, // change for each user
        "businessID": document.getElementById('Business_ID').value,   // change for each user
        "Name": Name,
        "Description" : Description
      };

      const req = new XMLHttpRequest();

      req.onreadystatechange = function () {
        if (req.status == 200 || req.status == 'success') {
          alert("Successfully added a new Event");
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
function removeEvent() {
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
      var eventIdDiv = document.createElement("div");
      eventIdDiv.className = "mb-3";

      var eventIdLabel = document.createElement("label");
      eventIdLabel.className = "form-label";
      eventIdLabel.textContent = "Event_ID";

      var eventIdDropdown = document.createElement("select");
      eventIdDropdown.className = "form-select";
      eventIdDropdown.id = "Event_ID_input"; // Give unique id to dropdown

      var emptyOption = document.createElement("option");
      emptyOption.value = ""; // Set the value of the empty option
      emptyOption.text = ""; // Set the display text of the empty option

      eventIdDropdown.appendChild(emptyOption);
      eventIdDiv.appendChild(eventIdLabel);
      eventIdDiv.appendChild(eventIdDropdown);

      formContainer.appendChild(eventIdDiv);

      // Create the rest of the text boxes
      elements.forEach(function (element) {
          if (element !== "EventID") {
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
      fetchEventIDs(eventIdDropdown);


      buttonRemove = true;
  }else {
    
    var confirmremove = confirm("Are you sure you want to remove this event?");
    if (confirmremove) {
      
      console.log("remove event...");
      var EventID = document.querySelector('#Event_ID_input').value;

      const apiUrl = 'PHP/api.php';
      const requestBody = {
        "type": "removeBuisinessEvent",
      "api_key": document.getElementById('API_Key').value, // change for each user
      "EventID" : EventID
        
      };

      const req = new XMLHttpRequest();

      req.onreadystatechange = function () {
        if (req.status == 200 || req.status === 'success') {
          alert("Successfully removed this event");

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
function updateEvent() {
    console.log("Update event function called");
    
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
      var eventIdDiv = document.createElement("div");
      eventIdDiv.className = "mb-3";

      var eventIdLabel = document.createElement("label");
      eventIdLabel.className = "form-label";
      eventIdLabel.textContent = "Event_ID";

      var eventIdDropdown = document.createElement("select");
      eventIdDropdown.className = "form-select";
      eventIdDropdown.id = "Event_ID_input"; // Give unique id to dropdown

      var emptyOption = document.createElement("option");
      emptyOption.value = ""; // Set the value of the empty option
      emptyOption.text = ""; // Set the display text of the empty option

      eventIdDropdown.appendChild(emptyOption);
      eventIdDiv.appendChild(eventIdLabel);
      eventIdDiv.appendChild(eventIdDropdown);

      formContainer.appendChild(eventIdDiv);

      // Create the rest of the text boxes
      elements.forEach(function (element) {
          if (element !== "EventID") {
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

      // Fetch the event IDs from the API and populate the dropdown
      fetchEventIDs(eventIdDropdown);


      buttonUpdate = true;
  }else {
    
    var confirmupdate = confirm("Are you sure you want to update your event?");
    if (confirmupdate) {
      
      console.log("update event...");
      var EventID = document.querySelector('#Event_ID_input').value;
      var Name = document.querySelector('#Name_input');
      var Description = document.querySelector('#Description_input');
      

      const apiUrl = 'PHP/api.php';
      const requestBody = {
        "type": "updateBuisinessEvent",
        "api_key": document.getElementById('API_Key').value, // change for each user
        "Name": Name.value,
        "Description": Description.value,
        "EventID": EventID,
        "BusinessID": document.getElementById('Business_ID').value // change for each user
      };

      const req = new XMLHttpRequest();

      req.onreadystatechange = function () {
        if (req.status == 200 || req.status === 'success') {
          alert("Successfully updated your event");

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

function fetchEventIDs(dropdown) {
  // Make an API request to fetch wine IDs
  const apiUrl = 'PHP/api.php';
  const requestBody = {
    'type': 'getBusinessEvents',
    'api_key': document.getElementById('API_Key').value,// change for each user
    'businessID': document.getElementById('Business_ID').value // change for each user
};

  const req = new XMLHttpRequest();

  req.onreadystatechange = function () {
      if (req.readyState === 4) {
          if (req.status === 200) {
              // Parse the response and populate the dropdown
              var values = JSON.parse(req.responseText).data;

              for (var j = 0; j < values.length; j++) {
                var event = values[j];
                  var option = document.createElement("option");
                  option.value = event.EventID;
                  option.textContent = event.EventID;
                  dropdown.appendChild(option);
              }
              dropdown.addEventListener("change", function () {
                var selectedEventID = dropdown.value;
                if (selectedEventID !== "") {
                    console.log(selectedEventID);
                    fetchWineDetails(selectedEventID);
                }
                else{
                  document.querySelector('#Name_input').value = "";
                  
                  document.querySelector('#Description_input').value = "";

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


function fetchWineDetails(eventID) {   //for update
  // Make an API request to fetch wine details
  const apiUrl = 'PHP/api.php';
    const requestBody = {
        'type': 'getBusinessEvents',
        'api_key': document.getElementById('API_Key').value ,// change for each user
        'businessID': document.getElementById('Business_ID').value // change for each user
    };

  const req = new XMLHttpRequest();

  req.onreadystatechange = function () {
      if (req.readyState === 4) {
          if (req.status === 200) {
              
              var eventDetails = JSON.parse(req.responseText).data;
              for (var j = 0; j < eventDetails.length; j++) {
                  if(eventDetails[j].EventID == eventID ) {
                    document.querySelector('#Name_input').value = eventDetails[j].Name;
                    document.querySelector('#Description_input').value = eventDetails[j].Description;
                    
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
