function getData(){ 
    const apiUrl = 'http://localhost/Pa05_api/api.php';
    const requestBody = {
        "type": "getBusinessInfo",
        "api_key": "123456", // change for each user
        "businessName": "Middelvlei Wine Estate" // change for each user
    };

    var businessNameInput = document.querySelector('#businessName');
    var businessDescriptionTextarea = document.querySelector('#businessDescription');
    var websiteURLInput = document.querySelector('#websiteURL');
    var contactPhoneInput = document.querySelector('#contactPhone');
    var contactEmailInput = document.querySelector('#contactEmail');
    var countryInput = document.querySelector('#country');
    var regionInput = document.querySelector('#region');
    var longitudeInput = document.querySelector('#longitude');
    var latitudeInput = document.querySelector('#latitude');
    var weekendOpenTimeInput = document.querySelector('#weekendOpenTime');
    var weekdayOpenTimeInput = document.querySelector('#weekdayOpenTime');
    var weekendCloseTimeInput = document.querySelector('#weekendCloseTime');
    var weekdayCloseTimeInput = document.querySelector('#weekdayCloseTime');

   
    // Api Request on load populate table

    const req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            var values = JSON.parse(req.responseText).data;
            console.log(values);
            businessNameInput.value = values.BName;
            businessDescriptionTextarea.value = values.Description;
            websiteURLInput.value = values.Website_URL;
            /*contactPhoneInput.placeholder = values.contactPhone;
            contactEmailInput.placeholder = values.contactEmail;*/
            countryInput.value = values.Country;
            regionInput.value = values.RegionName;
            longitudeInput.value = values.Longitude;
            latitudeInput.value = values.Latitude;
            weekendOpenTimeInput.value = values.Weekend_open_time;
            weekdayOpenTimeInput.value = values.Weekday_open_time;
            weekendCloseTimeInput.value = values.Weekend_close_time;
            weekdayCloseTimeInput.value = values.Weekday_close_time;
            
            
        }   
    };

    req.open('POST', apiUrl, true);
    req.send(JSON.stringify(requestBody));
}



function createForm() {
    var container = document.getElementById('container');
    container.className = 'container mt-4';
    
    var heading = document.createElement('h3');
    heading.className = 'heading';
    heading.textContent = 'Business Information';
    
    var form = document.createElement('form');
    
    var businessNameDiv = createFormInput('Business Name', 'businessName', 'text');
    var businessDescriptionDiv = createFormTextarea('Description about business', 'businessDescription', 3);
    var websiteURLDiv = createFormInput('URL for website', 'websiteURL', 'text');
    var contactPhoneDiv = createFormInput('Contact Phone', 'contactPhone', 'text');
    var contactEmailDiv = createFormInput('Contact Email', 'contactEmail', 'email');
    var countryDiv = createFormInput('Country', 'country', 'text');
    var regionDiv = createFormInput('Region Name', 'region', 'text');
    var longitudeDiv = createFormInput('Longitude', 'longitude', 'text');
    var latitudeDiv = createFormInput('Latitude', 'latitude', 'text');
    
    var timesHeading = document.createElement('h4');
    timesHeading.className = 'heading';
    timesHeading.textContent = 'Times';
    
    var timesRow = document.createElement('div');
    timesRow.className = 'row';
    
    var weekendTimesCol = document.createElement('div');
    weekendTimesCol.className = 'col-md-6';
    
    var weekendOpenTimeDiv = createFormInput('Weekend Opening Time', 'weekendOpenTime', 'text');
    var weekendCloseTimeDiv = createFormInput('Weekend Closing Time', 'weekendCloseTime', 'text');
    
    weekendTimesCol.appendChild(weekendOpenTimeDiv);
    weekendTimesCol.appendChild(weekendCloseTimeDiv);
    
    var weekdayTimesCol = document.createElement('div');
    weekdayTimesCol.className = 'col-md-6';
    
    var weekdayOpenTimeDiv = createFormInput('Weekday Opening Time', 'weekdayOpenTime', 'text');
    var weekdayCloseTimeDiv = createFormInput('Weekday Closing Time', 'weekdayCloseTime', 'text');
    
    weekdayTimesCol.appendChild(weekdayOpenTimeDiv);
    weekdayTimesCol.appendChild(weekdayCloseTimeDiv);
    
    timesRow.appendChild(weekendTimesCol);
    timesRow.appendChild(weekdayTimesCol);
    
    var eventsHeading = document.createElement('h4');
    eventsHeading.className = 'heading';
    eventsHeading.textContent = 'Events';
    
    var eventNameDiv = createFormInput('Event Name', 'eventName', 'text');
    var eventsDescriptionDiv = createFormTextarea('Events Description', 'eventsDescription', 3);
    
    
    form.appendChild(businessNameDiv);
    form.appendChild(businessDescriptionDiv);
    form.appendChild(websiteURLDiv);
    form.appendChild(contactPhoneDiv);
    form.appendChild(contactEmailDiv);
    form.appendChild(countryDiv);
    form.appendChild(regionDiv);
    form.appendChild(longitudeDiv);
    form.appendChild(latitudeDiv);
    form.appendChild(timesHeading);
    form.appendChild(timesRow);
    form.appendChild(eventsHeading);
    form.appendChild(eventNameDiv);
    form.appendChild(eventsDescriptionDiv);
    
    container.appendChild(heading);
    container.appendChild(form);
   
}

function createFormInput(labelText, id, type) {
    var div = document.createElement('div');
    div.className = 'mb-3';
    
    var label = document.createElement('label');
    label.htmlFor = id;
    label.className = 'form-label';
    label.textContent = labelText;
    
    var input = document.createElement('input');
    input.type = type;
    input.className = 'form-control';
    input.id = id;
    
    div.appendChild(label);
    div.appendChild(input);
    
    return div;
}

function createFormTextarea(labelText, id, rows) {
    var div = document.createElement('div');
    div.className = 'mb-3';
    
    var label = document.createElement('label');
    label.htmlFor = id;
    label.className = 'form-label';
    label.textContent = labelText;
    
    var textarea = document.createElement('textarea');
    textarea.className = 'form-control';
    textarea.id = id;
    textarea.rows = rows;
    
    div.appendChild(label);
    div.appendChild(textarea);
    
    return div;
}

window.onload = function() {
    createForm();
    getData();
    
};



function updateInfo() {

    
      // Collect the data from the form inputs

      var businessNameInput = document.querySelector('#businessName');
    var businessDescriptionTextarea = document.querySelector('#businessDescription');
    var websiteURLInput = document.querySelector('#websiteURL');
    var contactPhoneInput = document.querySelector('#contactPhone');
    var contactEmailInput = document.querySelector('#contactEmail');
    var countryInput = document.querySelector('#country');
    var regionInput = document.querySelector('#region');
    var longitudeInput = document.querySelector('#longitude');
    var latitudeInput = document.querySelector('#latitude');
    var weekendOpenTimeInput = document.querySelector('#weekendOpenTime');
    var weekdayOpenTimeInput = document.querySelector('#weekdayOpenTime');
    var weekendCloseTimeInput = document.querySelector('#weekendCloseTime');
    var weekdayCloseTimeInput = document.querySelector('#weekdayCloseTime');

    
      var businessName = businessNameInput.value;
      var businessDescription = businessDescriptionTextarea.value;
      var websiteURL = websiteURLInput.value;
      var contactPhone = contactPhoneInput.value;
      var contactEmail = contactEmailInput.value;
      var country = countryInput.value;
      var region = regionInput.value;
      var longitude = longitudeInput.value;
      var latitude = latitudeInput.value;
      var weekendOpenTime = weekendOpenTimeInput.value;
      var weekdayOpenTime = weekdayOpenTimeInput.value;
      var weekendCloseTime = weekendCloseTimeInput.value;
      var weekdayCloseTime = weekdayCloseTimeInput.value;
      
      // Create the JSON body
     var requestBody = {

        "type": "updateBusinessInfo",
        "api_key": "123456", //change for users
        "BusinessID": 1,  // change for users
        "BName": businessName,  //change for users
        "Business_URL": "https://middelvlei.co.za/new-website/wp-content/uploads/2020/02/cropped-middelvlei_logo_300px.png",
        "Website_URL": websiteURL,
        "Weekday_open_time": weekdayOpenTime,
        "Weekday_close_time": weekdayCloseTime,
        "Weekend_open_time": weekendOpenTime,
        "Weekend_close_time": weekendCloseTime,
        "Instagram": "https://www.instagram.com/middelvlei_wine/",
        "Twitter": "https://twitter.com/Middelvlei_Wine",
        "Facebook": "https://www.facebook.com/pages/Middelvlei%20Wine%20Estate/144921322570331/",
        "Description": businessDescription
      };
      
      // Send the request to update the data in the database
      var apiUrl = 'http://localhost/Pa05_api/api.php';
      var request = new XMLHttpRequest();
      
       request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
          // Handle the response from the server
          var response = JSON.parse(request.responseText);
          console.log(response);
          
          // Check if the update was successful
          if (response.status === 'success') {
            alert('Information has been successfully updated');
            location.reload();
          } else {
            alert('Failed to update information');
          }
        }
      };
      
      request.open('POST', apiUrl, true);
      request.send(JSON.stringify(requestBody));
    
}
  