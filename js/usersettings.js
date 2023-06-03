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