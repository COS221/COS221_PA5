function dod(){
    alert("Dod");
}
function element(id)
{
	return document.getElementById(id);
}

function hide(id)
{
	element(id).style.display = "none";
}

function show(id)
{
	element(id).style.display = "block";
}

// function message(text)
// {
// 	element("message").innerHTML = text;
// }

function validateName(){
    var res= element('name').value;
	if (res ==="")
	return false;

    var result =/^[A-Za-z ]+$/.test(res);
    return result;
}
function validateMiddleName(){
    var res= element('name').value;
	if (res ==="")
	return false;

    var result =/^[A-Za-z ]+$/.test(res);
    return result;
}

function validatePassword(){
    var result1= document.getElementById('pass1').value;
    var result2= document.getElementById('pass2').value;
	if (result1 ==="" || result2 ==="")
	return false;
	
    
    if (result1!== result2){
        document.getElementById('pass1').focus();
        document.getElementById('pass1').value="";
        document.getElementById('pass2').value="";

        alert("Error: Passwords do not match.");
        return false;
    }
    else
    return /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test(result1) && /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test(result2);
  
}
function validateSurname(){
    var result= element('surname').value;
	if (result ==="")
	return false;
    return /^[A-Za-z ]+$/.test(result);
}
function validateCountry(){
    var result= element('country').value;
	if (result ==="")
	return false;

    return /^[A-Za-z ]+$/.test(result);
}
function validateRegion(){
    var result= element('region').value;
	if (result ==="")
	return false;
    return /^[A-Za-z ]+$/.test(result);
}

function validatePhone(){  //We may have to adjust formatting or change/remove the Regex to prevent issues
    var result= element('phone').value;

	if (result ==="")
	return false;

    return /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im.test(result);
}


function validateMail(){
    var result= element('email').value;

	if (result ==="")
	return false;

    return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(result);
}

function capitalizeFirstLetter(s) 
{
  return s.charAt(0).toUpperCase() + s.slice(1).toLowerCase();
}

function validateAll(){

    if (!validateName()){
        alert("Invalid name entered");
        return false;
    }  else if (!validateMiddleName()) {
        alert("Invalid middle name entered");
        return false;
    } 
	else if (!validateSurname()) {
        alert("Invalid surname entered");
        return false;
    } else if (!validateCountry()) {
        alert("Invalid country entered");
        return false;
    } else if (!validateRegion()) {
        alert("Invalid region entered");
        return false;
    } else if (!validatePhone()) {
        alert("Invalid phone number entered");
        return false;
    } 
     else if (!validateMail()) {
        alert("Invalid Email entered");
        return false;
    }
     else if (!validatePassword()) {
        alert("Invalid password entered");
        return false;
    } 
    else return true;
}

function sub(){
    //var form = document.getElementById('frm-submit');
    if(validateAll()){
        login();
    }
	
}

function parameterize(data)
{
	var result = [];
	for(var d in data)
	{
		result.push(encodeURIComponent(d) + '=' + encodeURIComponent(data[d]));
	}
	return result.join('&');
}


function login()
{
	ajax(
		{
			"name" : capitalizeFirstLetter(element('name').value),
			"middlename" : capitalizeFirstLetter(element('middlename').value),
			"surname":capitalizeFirstLetter(element('surname').value),
			"country":capitalizeFirstLetter(element('country').value),
			"region":capitalizeFirstLetter(element('region').value),
			"phone":capitalizeFirstLetter(element('phone').value),
			"email": (element('email').value).toLowerCase(),
			"submit": "yes",
			"pass" : document.getElementById('pass1').value,
			
		},
		function(data)
		{
			if(data.success == true)
			{
				alert("Welcome to Vineyard, "+capitalizeFirstLetter(element('name').value)+'.\nYour API KEY is: '+data.message);
				window.location = "login.php";  //CHANGE TO LOGIN PAGE?
			}
			else
			{
				alert(data.message);
			}
			
		}
	);
}

function ajax(data, callback)
{
	//alert(JSON.stringify(data));
	var req = new XMLHttpRequest();
	req.onreadystatechange = function()
	{
		if(req.readyState == 4 && req.status == 200)
		{
            //alert(req.responseText);
			var json = JSON.parse(req.responseText);
			callback(json);
		}
	};
	
	req.open("POST", "validate-signup.php", true);
	
	
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	 //alert(parameterize(data));
	req.send(parameterize(data));
}

function goHome(){ //change path later !!!
	window.location = "/index.html";
}
