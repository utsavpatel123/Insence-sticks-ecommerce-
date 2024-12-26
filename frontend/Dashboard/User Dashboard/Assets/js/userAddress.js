
// all buttons
let editButtonNextFirst = document.querySelector("#editAddressPopup #buttonNextFirst")
let editButtonNextsecond = document.querySelector("#editAddressPopup #buttonNextsecond") 
let editButtonPrevFirst = document.querySelector("#editAddressPopup #buttonPrevFirst") 
let editButtonPrevSecond = document.querySelector("#editAddressPopup #buttonPrevSecond") 
let editBubmitButton = document.querySelector("#editAddressPopup #submitButton") 
// all form box
let editFirstInfoBox = document.querySelector("#editAddressPopup #firstInfoBox")
let editSecondInfoBox = document.querySelector("#editAddressPopup #secondInfoBox")
let editThirdInfoBox = document.querySelector("#editAddressPopup #thirdInfoBox")

editButtonNextFirst.addEventListener("click", function(){

   editFirstInfoBox.style.zIndex = 1
   editSecondInfoBox.style.zIndex = 3
   editThirdInfoBox.style.zIndex = 2
})

editButtonPrevFirst.addEventListener("click", function(){

   editFirstInfoBox.style.zIndex = 3
   editSecondInfoBox.style.zIndex = 2
   editThirdInfoBox.style.zIndex = 1
})

editButtonNextsecond.addEventListener("click", function(){

   editSecondInfoBox.style.zIndex = 1
   editThirdInfoBox.style.zIndex = 3
   editFirstInfoBox.style.zIndex = 2
})

editButtonPrevSecond.addEventListener("click", function(){

   editSecondInfoBox.style.zIndex = 3
   editThirdInfoBox.style.zIndex = 1
   editFirstInfoBox.style.zIndex = 2
})



let editAddressPopup = document.querySelector("#editAddressPopup");
let editCross = document.querySelector("#editAddressPopup .container i");


editCross.addEventListener("click", function() {
    editAddressPopup.classList.remove("removeEditUserAddressPopup");
});

/*-----------------------
   Address Popup  - End 
-----------------------*/