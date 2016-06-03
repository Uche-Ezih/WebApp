
$(function(){
  /*When first tab is clicked*/
  $(".search-by #all").click(function(){
    $.post( "interact.php", {postsBy: "all"}, loadAll());
   
    $("#allUser").show();
    $("#tagUser").hide();
    $("#uniUser").hide();
    
     $("#all").addClass("changer");
     $("#byTags").removeClass("changer");
     $("#byUniversity").removeClass("changer");
  });
  
  /*When Tag second tab is clicked*/
   $(".search-by #byTags").click(function(){
    $.post( "interact.php", {postsBy: "byTags", tags: returnTagArray},tagsPost());
     $("#allUser").hide();
     $("#tagUser").show();
     $("#uniUser").hide();
     
     
     $("#all").removeClass("changer");
     $("#byTags").addClass("changer");
     $("#byUniversity").removeClass("changer");
   });
  
  /*When university third tab is clicked*/
   $(".search-by #byUniversity").click(function(){
    $.post( "interact.php", {postsBy: "byUniversity"}, function( data ) {
    $( "div.posts#uniUser" ).html( data );
    
    })
     $("#allUser").hide();
     $("#tagUser").hide();
     $("#uniUser").show();
     
     
     $("#all").removeClass("changer");
     $("#byTags").removeClass("changer");
     $("#byUniversity").addClass("changer");
  });

});


/**
 * Load "All Posts" tab as soon as browser window is loaded*
 */
$(window).load(function(){
  loadAll();
   $("#all").addClass("changer");
   $("#byTags").removeClass("changer");
   $("#byUniversity").removeClass("changer");
});

/**
 * function that does the loading ONLOAD via AJAX call
 */
function loadAll()
 {
   $.post( "interact.php", {postsBy: "all"}, function( data ) {
   $( "div.posts#allUser" ).html( data );
   });
 }
 
 
 /**
 * Load "ByTag Posts" tab as soon*
 */
 function tagsPost(){
    $.post( "interact.php", {postsBy: "byTags",tags: returnTagArray}, function( data ) {
    $( "div.posts#tagUser" ).html( data );
    });
  }
  
  
 //TAG array to POST
 var returnTagArray= new Array();
  
 function signOut(){
  session_unset(); 
  session_destroy();
 }
 //div tags container
 var dives= document.getElementById("tag_container");
 

 var isContained;
 
 /* add event listener for the tag selector options*/
 var object=document.getElementById("list_of_tags");
 object.addEventListener("change", addNode);
 
 //another listener on change to drop down.
 object.addEventListener("change",  function(){
  
   if (dives.hasChildNodes()) {
   // So, first we check if the object is not empty, if the object has child nodes
   var children = dives.childNodes;
 
   for (var i = 0; i < children.length; i++) {
     // do something with each child as children[i]
     // NOTE: List is live, Adding or removing children will change the list
     returnTagArray[i]=children[i].innerHTML;
   }
   
   }
   tagsPost();
});
 
 /*edit tags div by inserting children nodes*/
 function addNode(){
   var selectedValue = object.options[object.selectedIndex].value;
    
       var child= document.createElement("SPAN");
       child.style.backgroundColor="#E2E2E2";
       child.style.padding="4px";
       child.style.borderRadius="6px";
       child.style.cursor="pointer";
       child.style.margin="4px";
       child.style.display= "inline-block";
       child.innerHTML= selectedValue;
       
       child.addEventListener("mouseover", function(){
         child.style.background="red";
         child.style.color="white";
         child.title="delete tag";
       })
       
       child.addEventListener("mouseout", function(){
         child.style.background="#E2E2E2";
         child.style.color="black";
         
       })
       child.addEventListener("click", function(){
         document.getElementById("tag_container").removeChild(this);
         for(var j=0; j<returnTagArray.length;j++)
         {
           if(returnTagArray[j]==this.innerHTML)
           {
              delete returnTagArray[j];
              tagsPost();
           }
         }
 
       })
       
       
       if (dives.hasChildNodes()) {
       // So, first we check if the object is not empty, if the object has child nodes
       isContained=Array();
       var children = dives.childNodes;
     
       for (var i = 0; i < children.length; i++) {
         // do something with each child as children[i]
         // NOTE: List is live, Adding or removing children will change the list
         isContained[i]=children[i].innerHTML;
       }
       
        /****** Don't allow user to select an already selected tag*/
        if(!(isContained.contains(selectedValue))) {
         
         if(child.innerHTML!="") dives.appendChild(child);
         
        }
     }
     else {
        if(child.innerHTML!="") dives.appendChild(child);
     }
   }
   
   //check for element existence in an array
   Array.prototype.contains = function ( needle ) {
     for (i in this) {
         if (this[i] == needle) return true;
     }
     return false;
   }