
// /*-----------------------
//    Address Popup - start 
// -----------------------*/

// // all buttons
let buttonNextFirst = document.querySelector("#addressPopup #buttonNextFirst")
let buttonNextsecond = document.querySelector("#addressPopup #buttonNextsecond") 
let buttonPrevFirst = document.querySelector("#addressPopup #buttonPrevFirst") 
let buttonPrevSecond = document.querySelector("#addressPopup #buttonPrevSecond") 
let submitButton = document.querySelector("#addressPopup #submitButton") 
// all form box
let firstInfoBox = document.querySelector("#addressPopup #firstInfoBox")
let secondInfoBox = document.querySelector("#addressPopup #secondInfoBox")
let thirdInfoBox = document.querySelector("#addressPopup #thirdInfoBox")

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
/*-----------------------
   Address Popup - End 
// -----------------------*/

/*-----------------------
   Address Popup for Edit Address - start 
-----------------------*/
