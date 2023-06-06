function dod(){ //this was for testing
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



function validatePassword(){
    var result1= document.getElementById('pass1').value;
    
	if (result1 ==="")
	return false;
	
    return /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test(result1);
  
}


function validateMail(){
    //console.log(document.getElementById('email').value);
    var result= document.getElementById('email').value;

	if (result ==="")
	return false;

  
    return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(result);
}



function validateAll(){

 if (!validateMail()) {
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

function capitalizeFirstLetter(s) 
{
  return s.charAt(0).toUpperCase() + s.slice(1).toLowerCase();
}

function login()
{
	ajax(
		{
			"email": (element('email').value).toLowerCase(),
			"submit": "yes",
			"pass" : document.getElementById('pass1').value,
		},
		function(data)
		{
			if(data.success == true)
			{
				window.location = "index.php";  //CHANGE LINK IF NEED BE
			}
			else
			{
				alert(data.message+ " ಠ ಠ");
			}
			
		}
	);
}

function ajax(data, callback)
{
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
	
	req.open("POST", "validate-login.php", true);
	
	
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	req.send(parameterize(data));
}

