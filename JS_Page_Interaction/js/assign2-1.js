window.onload = function(){
	var thumb = document.querySelectorAll(".thumbnail");
	for(var i = 0; i < thumb.length; i++){
		thumb[i].addEventListener("mouseover", makeLarge);
		thumb[i].addEventListener("mouseout", makeRegular);
		thumb[i].addEventListener("mousedown", changePic);
	}

	function makeLarge(e){
		e.target.classList.add("dummy");
	}

	function makeRegular(e){
		e.target.classList.remove("dummy");
	}

	function changePic(e){
		var title = document.querySelector(".pageName > h2");
		title.innerHTML = e.target.nextElementSibling.innerHTML;
		var pic = document.querySelector(".column.left > img");
		pic.src = e.target.src;
	}
}