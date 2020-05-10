
function val(){
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var textbox2 = document.getElementById("inputPassword1");
	var textbox1 = document.getElementById("inputPassword");
	var textbox = document.getElementById("email");
	var emailtr ;
	if(textbox.value!="" && textbox1.value!="")
	{
		//email right or wrong
		if (reg.test(textbox.value) == false) 
		{
			alert('Invalid email address');
			textbox.value.focus();	
			emailtr = false;
		}else if (reg.test(textbox.value) != false) {
			emailtr = true;
		}
	
		//check if there is enough characters for password 
			if (textbox2.value != textbox1.value){
			alert("Passwords should be the same!");
		}
		else if(textbox1.value.length <= 10 && textbox1.value.length >= 5 ){
			if(reg.test(textbox.value) != false){
				
        		alert("success");
        	}
	    }//check if
		
	    else if(!(textbox1.value.length <= 10 && textbox1.value.length >= 5)){
	        alert("make sure the input is between 5-10 characters long");
	    }
	    else if(emailtr == false || textbox.value=="")
	    {
	    	alert('Invalid email address or password');
	    }else alert('Invalid email address or password');

	}else alert('input your data!');

}

function valid(){
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var textbox2 = document.getElementById("inputPasswordd1");
	var textbox1 = document.getElementById("inputPasswordd");
	var textbox = document.getElementById("emaila");
	var emailtr ;
	if(textbox.value!="" && textbox1.value!="")
	{
		//email right or wrong
		if (reg.test(textbox.value) == false) 
		{
			alert('Invalid email address');
			textbox.value.focus();	
			emailtr = false;
		}else if (reg.test(textbox.value) != false) {
			emailtr = true;
		}
	
		//check if there is enough characters for password 
			if (textbox2.value != textbox1.value){
			alert("Passwords should be the same!");
		}
		else if(textbox1.value.length <= 10 && textbox1.value.length >= 5 ){
			if(reg.test(textbox.value) != false){
				
        		alert("success");
        	}
	    }//check if
		
	    else if(!(textbox1.value.length <= 10 && textbox1.value.length >= 5)){
	        alert("make sure the input is between 5-10 characters long");
	    }
	    else if(emailtr == false || textbox.value=="")
	    {
	    	alert('Invalid email address or password');
	    }else alert('Invalid email address or password');

	}else alert('input your data!');

}
 


function changeTab(evt,tabname){
  var i, tabcontent,tablinks;
  tabcontent=document.getElementsByClassName("tabcontent");
  for(i=0;i<tabcontent.length;i++){
    tabcontent[i].style.display="none";
  }

  
  tablinks=document.getElementsByClassName("tablinks");
  for(i=0;i<tablinks.length;i++)
  {
    tablinks[i].className=tablinks[i].className.replace("active","");
  }
  document.getElementById(tabname).style.display="block";
  evt.currentSlide.className+="active"
}
