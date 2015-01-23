// JavaScript Document

window.onload = superawesome;

//this is in several parts...this first example is working just onclick/onchange/onblur, but the submit button does nothing.  start with this one!

var theForm;

function superawesome(){
	//onclick for the button!  (not an input submit, but just the button element)
	document.querySelector("#btnSubmit").onclick = processForm;
	
	//onchange for select menus
	document.querySelector("#charType").onchange = getImage;
	document.querySelector("#charJob").onchange = checkJob;
	
	//onblurs for the two text fields
	document.querySelector("#email").onblur = checkEmail;
	document.querySelector("#charName").onblur = checkName;
	
	//onclick for the checkbox
	document.querySelector("#spam").onclick = checkChecker;
	
	//get the whole form and keep it in a global variable.  with the whole form we can call fields by name, like methods (if anyone cares, this is a javascript object)
	theForm = document.querySelector("#yourChar");
}

//function that process the information in the form on submit
function processForm(){	
	//prevent form from submitting
	return false;
}

/**************************************************************************************************/

/*******   check on blurs    *******/

//check the name
function checkName(){
	//rules:  	must be longer than 1 characters, no more than 25
	//			can not contain numbers
	var name = theForm.charName;
	//use a local message variable
	var msg = "";
	
	//use the trim function (from the trim document) to get rid of leading and
	//trailing spaces
	nameVal = trim(name.value);
	
	//|| (double pipeline) is 'or'
	if(nameVal.length < 2 || nameVal.length > 25){
		msg += "Your name must be longer than a single charcter but no more than 25. ";
	}
	
	//check for numbers
	//isNaN = 'is not a number'
	//use a for loop to loop through the characters and see if any of them are numbers (by checking if they are not numbers)
	for(var n=0;n<nameVal.length;n++){
		//get each character
		var thisChar = nameVal.substring(n,n+1);
		if(isNaN(thisChar) == false){
			msg += "No numbers!";
			break;
		}
	}
	
	//check for error message
	if(msg != ""){
		name.parentNode.childNodes[5].innerHTML = '<span class="error">' + msg + '</span>';
	}else{
		name.parentNode.childNodes[5].innerHTML = '<span class="correct">A good, strong name.</span>';
	}
}

function checkEmail(){
	//rules:	must have @ symbol, must have . after @
	//			only one @ symbol, at least one .
	//			the last . must be at least two characters from the end
	//			the @ cannot be the first character
	var emailElem = theForm.email;
	var email = theForm.email.value;
	
	//get the positions of various things in the email
	var firstAt = email.indexOf("@");
	var lastAt = email.lastIndexOf("@");
	var firstDot = email.indexOf(".");
	var lastDot = email.lastIndexOf(".");
	var wrongEmail = false;
	
	//check for position of @ symbol
	//can't be first - so less than 1 covers position or position -1
	//can't be more than one, so first position must also be last position
	if(firstAt < 1 || firstAt != lastAt){
		//firstAt == 0: @ is first character
		//firstAt == -1: there is no @
		//firstAt != lastAt: there is more than one @
		wrongEmail = true;
	}
	
	//check for position of dot
	//must be at least one, so position can't be -1
	//one must come after last @, so last position must be greater than last at
	//must be at least 2 characters after the last dot, so last dot must be at least 2 places from the length
	if(firstDot == -1 || lastDot < lastAt || (lastDot >= email.length-2)){
		//firstDot == -1: no .
		//lastDot < lastAt: no . after @
		//lastDot+1 >= email.length-2: the dot is one of the last two characters
		wrongEmail = true;
	}
	
	//finally, enter the necessary message
	if(wrongEmail == true){
		emailElem.parentNode.childNodes[5].innerHTML = '<span class="error">Please enter a valid email.</span>';
	}else{
		emailElem.parentNode.childNodes[5].innerHTML = '<span class="correct">What a lovely email.</span>';
	}
}


/*    onclick for checkbox function    */
function checkChecker(){
	var spam = theForm.spam;
	if(spam.checked == false){
		spam.parentNode.childNodes[5].innerHTML = '<span class="error">You must accept spam to play this game!</span>';	
	}else{
		spam.parentNode.childNodes[5].innerHTML = '<span class="correct">Selling your soul to us keeps this game free.</span>';	
	}
}

/*   onchange functions for select menus   */
function getImage(){
	//check to see if they chose a character
	var sel = this.options[this.selectedIndex];
	//get div for message
	var div = this.parentNode.childNodes[5];
	
	if(sel.value == "X"){
		//alert error
		div.innerHTML = '<span class="error">Please choose a character</span>';
	}else{
		//get image
		var img = (sel.text);
		img = img.toLowerCase();
		img = img + ".gif";
		
		//make innerHTML
		div.innerHTML = '<img src="images/' + img + '" class="imgFloat" />' + '<span class="correct">Your character choice says something about you.</span>';
	}
}

function checkJob(){
	//check to see if they chose a character
	var sel = this.options[this.selectedIndex];
	//get div
	var div = this.parentNode.childNodes[5];
	
	if(sel.value == "X"){
		//alert error
		div.innerHTML = '<span class="error">Please choose a job</span>';
	}else{
		div.innerHTML = '<span class="correct">A good choice of job.</span>';
	}
}



