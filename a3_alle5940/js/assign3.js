window.onload = function(){
	var myForm = document.querySelector("#submitInput");
	firstIn = document.querySelector("[name=firstname]");
	lastIn = document.querySelector("[name=lastname]");
	emailIn = document.querySelector("[name=email]");
	pwIn = document.querySelector("[name=password]");
	pwrIn = document.querySelector("[name=passwordRepeat]");
	phoneIn = document.querySelector("[name=phone]");
	
	myForm.addEventListener("click", chkForm);

	var node = document.createElement("IMG");  
	node.src = "images/error.png";
	node.classList.add("errorSign");

	function chkForm(e){
		var isValid = true;

		document.querySelectorAll(".errorSign").forEach(function(a) {	//remove error signs
			a.remove()
		})
		document.querySelectorAll(".invalidAgree").forEach(function(a) {	//remove error signs
			a.remove()
		})

		if !(/^[a-z]+(\s[a-z]+)*$/gi.test(firstIn.value)){

		}

		if !(/^[a-z]+(\s[a-z]+)*$/gi.test(lastIn.value)){

		}

		if !(/^\w+([\.-]?\w+)*\u0040\w+([\.-]?\w+)*(\.\w{2,3})+$/g.test(emailIn.value)){
			
		}

		if !(/^[0-9]{3}\u002D[0-9]{3}\u002D[0-9]{4}$/.test(phoneIn.value)){

		}

		var checkboxes = document.querySelectorAll("input[type='checkbox']:checked");

		if(!checkboxes.length){
			var sFour = document.querySelector("#sectionFour")
			var tdAgree = document.querySelector("#agreeInput")
			sFour.style.height = "100px";
			var headerNode = document.createElement("H2");
			var textNode = document.createTextNode("You must agree to the terms of the site");
			headerNode.classList.add("invalidAgree");
			headerNode.appendChild(textNode);
			headerNode.appendChild(node.cloneNode());
			tdAgree.parentNode.appendChild(headerNode);
			tdAgree.parentNode.style.backgroundColor = "pink";
			tdAgree.parentNode.style.border = "1px solid red";
			isValid = false;
		}
		else{
			var sFour = document.querySelector("#sectionFour")
			var tdAgree = document.querySelector("#agreeInput")
			sFour.style.height = "60px";
			tdAgree.parentNode.style.backgroundColor = "";
			tdAgree.parentNode.style.border = "";
		}

		for(var i = 0; i < inputs.length; i++){
			if(inputs[i].value === ""){
				inputs[i].style.backgroundColor = "pink";
				inputs[i].style.border = "1px solid red";
				inputs[i].parentNode.appendChild(node.cloneNode());
				isValid = false;
			}
			else{
				inputs[i].style.backgroundColor = "#EEEEEE";
				inputs[i].style.border = "1px solid #cccccc";
			}
		}
		console.log(isValid);
		if(!isValid){
			e.preventDefault();
		}
	}
}