
/*--------------------
   Register - start 
--------------------*/
// ========For validation form==========
function validationForm(){
   
}

// =======For register input fiealds=========
function showFormParts(){
   let buttonNextFirst = document.getElementById("buttonNextFirst")
let buttonNextsecond = document.getElementById("buttonNextsecond") 
let buttonPrevFirst = document.getElementById("buttonPrevFirst") 
let buttonPrevSecond = document.getElementById("buttonPrevSecond") 
let submitButton = document.getElementById("submitButton") 

// all form box
let firstInfoBox = document.getElementById("firstInfoBox")
let secondInfoBox = document.getElementById("secondInfoBox")
let thirdInfoBox = document.getElementById("thirdInfoBox")


buttonNextFirst.addEventListener("click", function(){
   firstInfoBox.style.zIndex = 1
   secondInfoBox.style.zIndex = 3
   thirdInfoBox.style.zIndex = 2
   
})


buttonPrevFirst.addEventListener("click", function(){
   firstInfoBox.style.zIndex = 3
   secondInfoBox.style.zIndex = 2
   thirdInfoBox.style.zIndex = 1

})


buttonNextsecond.addEventListener("click", function(){

   secondInfoBox.style.zIndex = 1
   thirdInfoBox.style.zIndex = 3
   firstInfoBox.style.zIndex = 2
})


buttonPrevSecond.addEventListener("click", function(){

   secondInfoBox.style.zIndex = 3
   thirdInfoBox.style.zIndex = 1
   firstInfoBox.style.zIndex = 2
})
}
showFormParts()



/*--------------------
   Register - End 
--------------------*/

