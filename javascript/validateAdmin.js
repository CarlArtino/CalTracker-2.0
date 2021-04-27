function validateDelete(){
	var pass = prompt("Please enter password:");
							
	if (pass == "Password")
		return true;
	else
	{
		alert("Entry was not deleted");
		return false;
	}
}

