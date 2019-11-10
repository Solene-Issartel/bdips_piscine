function putDate(){
	console.log("in");
	document.getElementById('date_session').value=new Date();
}

function progFormValues() {
	//if is checked value = null
	var checkboxes = document.getElementsByClassName("checkbox_promo");
	for (var i = 0; i < checkboxes.length; i++) {
	    if (!checkboxes[i].checked) {
	        checkboxes[i].value=null;
	    }
	}
}

function progFormValuesID(id) {
	var checkbox = document.getElementById('promo'+id);
	    if (!checkbox.checked) {
	        checkbox.value=null;
	    } else {
	    	checkbox.value=id;
	    }
}