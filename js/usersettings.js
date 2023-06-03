window.onload = function() {
    var passwordInput = document.querySelector('#password');
    var showPasswordButton = document.querySelector('#showPasswordButton');
  
    showPasswordButton.addEventListener('click', function() {
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        showPasswordButton.textContent = 'Hide';
      } else {
        passwordInput.type = 'password';
        showPasswordButton.textContent = 'Show';
      }
    });
  
    getData();
};


function getData() {

    var usernameInput = document.querySelector('#username');
    var middleNameInput = document.querySelector('#middleName');
    var firstNameInput = document.querySelector('#firstName');
    var lastNameInput = document.querySelector('#lastName');
    var passwordInput = document.querySelector('#password');
    var regionInput = document.querySelector('#region');
    var countryInput = document.querySelector('#country');
    var emailInput = document.querySelector('#email');
    var numberInput = document.querySelector('#number');

    const apiUrl = 'http://localhost/Pa05_api/api.php';
    const requestBody = {
        "type":"getUserInfo",
        "api_key": "123456", //change for users
        "userEmail": "emily.anderson@example.com"  // change for each user
    };

    const req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            var values = JSON.parse(req.responseText).data;

            usernameInput.value = values.Email;
            middleNameInput.value = values.Middle_name;
            firstNameInput.value = values.First_name;
            lastNameInput.value = values.Last_name;
            passwordInput.value = values.Password;
            regionInput.value = values.RegionName;
            countryInput.value = values.Country;
            emailInput.value = values.Email;
            numberInput.value = values.PhoneNumber;
            
        } 
    };

    req.open('POST', apiUrl, true);
    req.send(JSON.stringify(requestBody));

}

function updateInfo() {
    var usernameInput = document.querySelector('#username');
    var middleNameInput = document.querySelector('#middleName');
    var firstNameInput = document.querySelector('#firstName');
    var lastNameInput = document.querySelector('#lastName');
    var passwordInput = document.querySelector('#password');
    var regionInput = document.querySelector('#region');
    var countryInput = document.querySelector('#country');
    var emailInput = document.querySelector('#email');
    var numberInput = document.querySelector('#number');
  
    var username = usernameInput.value;
    var middleName = middleNameInput.value;
    var firstName = firstNameInput.value;
    var lastName = lastNameInput.value;
    var password = passwordInput.value;
    var region = regionInput.value;
    var country = countryInput.value;
    var email = emailInput.value;
    var number = numberInput.value;
  
    var requestBody = {
      "type": "updateUserInfo",
      "api_key": "123456", //change for users
      "userEmail": "emily.anderson@example.com", // change for users
      "FirstName": firstName,
      "MiddleName": middleName,
      "LastName": lastName,
      "Number": number
    };
  
    var requestBody_2 = {
      "type": "updateUserRegion",
      "api_key": "123456", //change for users
      "userID": 1, // change for users
      "Country": country,
      "RegionName": region
    };
  
    var apiUrl = 'http://localhost/Pa05_api/api.php';
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
              if (request_2.responseText) { 
                var res = JSON.parse(request_2.responseText); 
                if (res.status === 'success') {
                  alert('Information has been successfully updated');
                  location.reload();
                } else {
                  alert('Failed to update information');
                }
              } else {
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
  