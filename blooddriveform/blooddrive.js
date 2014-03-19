function verifyForm(theForm) {
	
	if(theForm.usremail.value != theForm.usremail2.value){
		alert("Those emails don't match!");
		return false;
	}
	else {
		return true;
	}



}

function verifyFullname() {

	var x=document.getElementById("fullname");
	if (x.value.indexOf(' ') == -1) {
		alert("Did you include your first AND last name?");
		return false;
	}
}