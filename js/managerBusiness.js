function getData() {
  const apiUrl = 'PHP/api.php';
  const requestBody = {
      "type": "getBusinessInfo",
      "api_key": document.getElementById('API_Key').value, // change for each user
      "businessID": document.getElementById('Business_ID').value // change for each business
  };


    var businessNameInput = document.querySelector('#businessName');
    var businessDescriptionTextarea = document.querySelector('#businessDescription');
    var websiteURLInput = document.querySelector('#websiteURL');
    var contactPhoneInput = document.querySelector('#contactPhone');
    var contactEmailInput = document.querySelector('#contactEmail');
    var instagram = document.querySelector('#instagram');
    var facebook = document.querySelector('#facebook');
    var twitter = document.querySelector('#twitter');
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
            contactPhoneInput.value = values.Numbers[0];
            contactEmailInput.value = values.Emails[0];
            instagram.value = values.Instagram;
            facebook.value = values.Facebook;
            twitter.value = values.Twitter;
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
    var instagram = createFormInput('Instagram', 'instagram', 'text');
    var Facebook = createFormInput('Facebook', 'facebook', 'text');
    var Twitter = createFormInput('Twitter', 'twitter', 'text');
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
    
    form.appendChild(businessNameDiv);
    form.appendChild(businessDescriptionDiv);
    form.appendChild(websiteURLDiv);
    form.appendChild(contactPhoneDiv);
    form.appendChild(contactEmailDiv);
    form.appendChild(Twitter);
    form.appendChild(Facebook);
    form.appendChild(instagram);
    form.appendChild(countryDiv);
    form.appendChild(regionDiv);
    form.appendChild(longitudeDiv);
    form.appendChild(latitudeDiv);
    form.appendChild(timesHeading);
    form.appendChild(timesRow);
    
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
    var instagram = document.querySelector('#instagram');
    var facebook = document.querySelector('#facebook');
    var twitter = document.querySelector('#twitter');
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
      var instagram = instagram.value;
      var facebook = facebook.value;
      var twitter = twitter.value;
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
        "api_key": document.getElementById('API_Key').value, //change for users
        "BusinessID": document.getElementById('Business_ID').value,  // change for users
        "BName": document.getElementById('businessName').value,  //change for users
        "Business_URL": "https://middelvlei.co.za/new-website/wp-content/uploads/2020/02/cropped-middelvlei_logo_300px.png",
        "Website_URL": websiteURL,
        "Weekday_open_time": weekdayOpenTime,
        "Weekday_close_time": weekdayCloseTime,
        "Weekend_open_time": weekendOpenTime,
        "Weekend_close_time": weekendCloseTime,
        "Instagram": instagram,
        "Twitter": twitter,
        "Facebook": facebook,
        "Description": businessDescription
      };

      var requestBody_2 = {
        "type":"updateBusinessRegion",
        "api_key": document.getElementById('API_Key').value, //change for users
        "BusinessID": document.getElementById('Business_ID').value,  // change for users
        "Country": country,
        "RegionName": region
      };
      
      // Send the request to update the data in the database
      var apiUrl = 'PHP/api.php';
      var request = new XMLHttpRequest();
      
       request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
          // Handle the response from the server
          var response = JSON.parse(request.responseText);
          console.log(response);
          
          // Check if the update was successful
          if (response.status === 'success') {

            var request_2 = new XMLHttpRequest();
            
            request_2.onreadystatechange = function() {
              if (request_2.readyState == 4 && request_2.status == 200) {
                
                var res = JSON.parse(request_2.responseText);
                if (res.status === 'success') {
                  
                  alert('Information has been successfully updated');
                  
                  location.reload();
                }
                else{
                  alert('Failed to update information');
                  
                }
              }
            };
            request_2.open('POST', apiUrl, true);
            request_2.send(JSON.stringify(requestBody_2));
          } else {
            alert('Failed to update information');
          }
        }
      };
      
      request.open('POST', apiUrl, true);
      request.send(JSON.stringify(requestBody));
    
}
  