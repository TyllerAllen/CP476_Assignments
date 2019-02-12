window.onload = function(){
	var myForm = document.querySelector("#submitInput");
	
	myForm.addEventListener("click", chkForm);

	var node = document.createElement("IMG");  
	node.src = "images/error.png";
	node.classList.add("errorSign");

	function chkForm(e){
		var firstIn = document.querySelector("[name=firstname]");
		var lastIn = document.querySelector("[name=lastname]");
		var emailIn = document.querySelector("[name=email]");
		var pwIn = document.querySelector("[name=password]");
		var pwrIn = document.querySelector("[name=passwordRepeat]");
		var phoneIn = document.querySelector("[name=phone]");
		var isValid = true;
		var patt;
		var eArray = [];

		document.querySelectorAll(".errorSign").forEach(function(a) {	//remove error signs
			a.remove()
		})
		document.querySelectorAll(".invalidAgree").forEach(function(a) {	//remove error signs
			a.remove()
		})
		document.querySelectorAll(".eBox").forEach(function(a) {	//remove error signs
			a.remove()
		})

		patt = /^[a-z]+(\s[a-z]+)*$/gi;
		if (!patt.test(firstIn.value)){
			console.log("firstname pass");
			firstIn.style.backgroundColor = "pink";
			firstIn.style.border = "1px solid red";
			firstIn.parentNode.appendChild(node.cloneNode());
			if(firstIn.value == ""){
				eArray.push("First name is required");
			}
			else{
				eArray.push("First name must only contain letters and single spaces");
			}
			isValid = false;
		}
		else{
			console.log("firstname fail");
			firstIn.style.backgroundColor = "#EEEEEE";
			firstIn.style.border = "1px solid #cccccc";
		}

		patt = /^[a-z]+(\s?[a-z]+)*$/gi
		if (!patt.test(lastIn.value)){
			lastIn.style.backgroundColor = "pink";
			lastIn.style.border = "1px solid red";
			lastIn.parentNode.appendChild(node.cloneNode());
			if(lastIn.value == ""){
				eArray.push("Last name is required");
			}
			else{
				eArray.push("Last name must only contain letters and single spaces");
			}
			isValid = false;
		}
		else{
			lastIn.style.backgroundColor = "#EEEEEE";
			lastIn.style.border = "1px solid #cccccc";
		}

		patt = /^\w+([\.-]?\w+)*\u0040\w+([\.-]?\w+)*(\.\w{2,3})+$/g
		if (!patt.test(emailIn.value)){
			emailIn.style.backgroundColor = "pink";
			emailIn.style.border = "1px solid red";
			emailIn.parentNode.appendChild(node.cloneNode());
			if(emailIn.value == ""){
				eArray.push("Email is required");
			}
			else{
				eArray.push("Email format must be xxx@yyy.zzz (no repeating . or - characters)");
			}
			isValid = false;
		}
		else{
			emailIn.style.backgroundColor = "#EEEEEE";
			emailIn.style.border = "1px solid #cccccc";
		}

		patt = /^[0-9]{3}\u002D[0-9]{3}\u002D[0-9]{4}$/
		if (!patt.test(phoneIn.value)){
			phoneIn.style.backgroundColor = "pink";
			phoneIn.style.border = "1px solid red";
			phoneIn.parentNode.appendChild(node.cloneNode());
			if(emailIn.value == ""){
				eArray.push("Phone number is required");
			}
			else{
				eArray.push("Phone format must be ###-###-####");
			}
			isValid = false;
		}
		else{
			phoneIn.style.backgroundColor = "#EEEEEE";
			phoneIn.style.border = "1px solid #cccccc";
		}

		patt = /^[\u0021-\u007E]{6,16}$/g
		if(pwIn.value == pwrIn.value){
			if (!patt.test(pwIn.value)){
				pwIn.style.backgroundColor = "pink";
				pwrIn.style.backgroundColor = "pink";
				pwIn.style.border = "1px solid red";
				pwrIn.style.border = "1px solid red";
				pwIn.parentNode.appendChild(node.cloneNode());
				pwrIn.parentNode.appendChild(node.cloneNode());
				if(pwIn.value == "" || pwrIn.value == ""){
					eArray.push("Password is required");
				}
				else{
					eArray.push("Password contains illegal characters");
				}
				isValid = false;
			}
			else{
				pwIn.style.backgroundColor = "#EEEEEE";
				pwrIn.style.backgroundColor = "#EEEEEE";
				pwIn.style.border = "1px solid #cccccc";
				pwrIn.style.border = "1px solid #cccccc";
			}
		}
		else{
			pwIn.style.backgroundColor = "pink";
			pwrIn.style.backgroundColor = "pink";
			pwIn.style.border = "1px solid red";
			pwrIn.style.border = "1px solid red";
			pwIn.parentNode.appendChild(node.cloneNode());
			pwrIn.parentNode.appendChild(node.cloneNode());
			eArray.push("Passwords must match");
			isValid = false;
		}

		var checkboxes = document.querySelectorAll("input[type='checkbox']:checked");

		if(!checkboxes.length){
			//var sFour = document.querySelector("#sectionFour")
			var tdAgree = document.querySelector("#agreeInput")
			/*sFour.style.height = "100px";
			var headerNode = document.createElement("H2");
			var textNode = document.createTextNode("You must agree to the terms of the site");
			headerNode.classList.add("invalidAgree");
			headerNode.appendChild(textNode);
			headerNode.appendChild(node.cloneNode());
			tdAgree.parentNode.appendChild(headerNode);*/
			tdAgree.parentNode.style.backgroundColor = "pink";
			tdAgree.parentNode.style.border = "1px solid red";
			eArray.push("You must agree to the Terms of the Site");
			isValid = false;
		}
		else{
			//var sFour = document.querySelector("#sectionFour")
			var tdAgree = document.querySelector("#agreeInput")
			//sFour.style.height = "60px";
			tdAgree.parentNode.style.backgroundColor = "";
			tdAgree.parentNode.style.border = "";
		}

		console.log(isValid);
		if(!isValid){
			e.preventDefault();
			var eSect = document.querySelector("form");
			var eTitle = document.createElement("P");
			eTitle.appendChild(document.createTextNode("Errors were encountered"))
			eSect.appendChild(eTitle);
			eTitle.classList.add("sectionHead")
			eTitle.classList.add("eBox")
			var eDiv = document.createElement("DIV");
			eDiv.classList.add("eBox")
			var ePar;
			for(var i = 0; i < eArray.length; i++){
				ePar = document.createElement("P");
				ePar.style.margin = "0px";
				ePar.appendChild(document.createTextNode(eArray[i]))
				eDiv.appendChild(ePar);
				eDiv.appendChild(document.createElement("BR"));
			}
			eDiv.style.width = "90%";
			eSect.appendChild(eDiv);
			eDiv.style.backgroundColor = "pink";
			eDiv.style.border = "1px solid red";
			eDiv.appendChild(node.cloneNode());
		}
	}
}