window.onload = function(){
	var myForm = document.querySelector("#submitInput");
	var inputs = document.querySelectorAll("input")
	
	myForm.addEventListener("click", chkForm);

	var node = document.createElement("IMG");  
	node.src = "images/error.png";
	node.classList.add("errorSign");

	function chkForm(e){
		console.log("submitted");
		var isValid = true;

		document.querySelectorAll(".errorSign").forEach(function(a) {	//remove error signs
			a.remove()
		})
		document.querySelectorAll(".invalidAgree").forEach(function(a) {	//remove error signs
			a.remove()
		})

		var radios = document.querySelectorAll("input[type='radio']:checked");
		var checkboxes = document.querySelectorAll("input[type='checkbox']:checked");
		var radioNodes = document.querySelectorAll(".radioTd")

		if(!radios.length){
			for(var i = 0; i < radioNodes.length; i++){
				radioNodes[i].style.backgroundColor = "pink";
				if(i === Math.floor(radioNodes.length / 2)){
					radioNodes[i].parentNode.appendChild(node.cloneNode());
				}
				if(i === 0){
					radioNodes[i].style.borderTop = "1px solid red";
				}
				if(i === radioNodes.length - 1){
					radioNodes[i].style.borderBottom = "1px solid red";
				}
				radioNodes[i].style.borderRight = "1px solid red";
				radioNodes[i].style.borderLeft = "1px solid red";
				isValid = false;
			}
		}
		else{
			for(var i = 0; i < radioNodes.length; i++){
				radioNodes[i].style.backgroundColor = "";
				radioNodes[i].style.border = "";
			}
		}

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