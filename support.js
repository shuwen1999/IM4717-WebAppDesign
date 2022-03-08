
function myName() {
	var nameform = /^[A-Za-z\s]+$/;
	if (nameform.test(document.forms["supprotform"]["Name"].value)) {
		return nameform;
	}
	else {
		alert("The name field must contain alphabet characters and character spaces.");
		document.getElementById('Name').value = '';
	}	
}

function myEmail() {
	var emailform = /^[\w.\-]+@[A-Za-z]+(?:\.[a-zA-Z]{1,}){0,2}\.(com)$/;
	if (emailform.test(document.forms["supprotform"]["email"].value)) {
		return emailform;
	}
	else {
		alert("You have entered an invalid email address!");
		document.getElementById('email').value = '';
	}	
}
