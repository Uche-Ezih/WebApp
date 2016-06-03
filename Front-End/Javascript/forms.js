
/*validates drop-down selection option*/
function validate(object, divToChange)
{
  var selectedValue = object.options[object.selectedIndex].value;
   var content = document.getElementById(divToChange);
   if (selectedValue == "")
   {
    content.innerHTML="*field required";
   }
   else{
    content.innerHTML="";
   }
}

/*validates text input*/
function validateBox(object, divToChange)
{
 var selectedValue = object.value;
   var content = document.getElementById(divToChange);
   if (selectedValue == "")
   {
     content.innerHTML="*field required";
   }
   else{
    content.innerHTML="";
   }
}

/*check this to submit the "make-posts" form*/
function formSubmission(){
 var verify=document.getElementsByClassName("check");
 var redField=document.getElementsByClassName("red");
 
 for (index = 0; index < verify.length; index++) {
   
    if(verify[index].value=="")
    {
       for (i = 0; i < redField.length; i++) 
       {
         if(verify[i].value=="") redField[i].innerHTML="*field required";
       }
      return false;
    }
}
 return true;
}