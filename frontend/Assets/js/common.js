

/*--------------------
   profile - Start 
--------------------*/
const profileLinks = document.querySelector(".profileLinks");
const profileImg = document.querySelector(".profileImg");


if (profileImg && profileLinks) {
  console.log(profileImg, profileLinks);

  
  profileImg.addEventListener("click", (e) => {
    e.stopPropagation(); 
    profileLinks.style.top = "9%";
  });

  
  window.addEventListener("click", (e) => {
    if (!profileLinks.contains(e.target) && !profileImg.contains(e.target)) {
      profileLinks.style.top = "-14%";
    }
  });
} else {
  console.error(" not found");
}
/*--------------------
   profile - End 
--------------------*/

/*----------------------------------
   profile for userDashboard - start 
-----------------------------------*/

const profileLinksUserDashboard = document.querySelector(".profileLinksUserDashboard");
const profileImageUserDashboard = document.querySelector(".profileImg");


if (profileImageUserDashboard && profileLinksUserDashboard) {
  
  profileImageUserDashboard.addEventListener("click", (e) => {
    e.stopPropagation(); 
    profileLinksUserDashboard.style.top = "11%";
  });

  
  window.addEventListener("click", (e) => {
    if (!profileLinksUserDashboard.contains(e.target) && !profileImageUserDashboard.contains(e.target)) {
      profileLinksUserDashboard.style.top = "-14%";
    }
  });
} else {
  console.error(" not found");
}
/*----------------------------------
   profile for userDashboard - End 
-----------------------------------*/

/*--------------------
   Navigation - Start 
--------------------*/
var hamburgerMenuIcon = document.querySelector(".hamburgerMenuIcon");
var nav = document.querySelector("nav");
var navigationLinks = document.querySelector("#navigationLinks");
const leftSide = document.querySelector(".leftSide")

hamburgerMenuIcon.addEventListener("click", function () { 
  hamburgerMenuIcon.classList.toggle("burger_cross");
  if(leftSide){
   leftSide.classList.toggle("navigationLinksOpen");
//   leftSide.classList.toggle("navigationLinksClose");
  }
  else{

     navigationLinks.classList.add("navigationLinksOpen");
     navigationLinks.classList.toggle("navigationLinksClose");
  }
});
/*--------------------
Navigation - End 
--------------------*/

/*--------------------
   setcookie - start 
--------------------*/
function setCookie(name, value, days) {
  let expires = "";
  if (days) {
    let date = new Date();
    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
    expires = "; expires=" + date.toUTCString();
  }
  document.cookie =
    name + "=" + encodeURIComponent(value) + expires + "; path=/";
}

/*--------------------
   setcookie - End 
--------------------*/

/*--------------------
  getcookie - start 
--------------------*/

function getCookie(name) {
   let nameEQ = name + "=";
   let cookies = document.cookie.split(";");
   for (let i = 0; i < cookies.length; i++) {
     let cookie = cookies[i].trim();
     if (cookie.indexOf(nameEQ) === 0) {
       return decodeURIComponent(cookie.substring(nameEQ.length));
     }
   }
   return null;
 }
 
 /*--------------------
    getcookie - End 
 --------------------*/

/*-------------------------------------------
Send Request Using Ajax for database - start
--------------------------------------------*/
 function sendData(id, quantity){
    
   let productData = {
    productId: id,
    quantity: quantity 
   }


   const xhr = new XMLHttpRequest();
   
   xhr.onreadystatechange = function() {
     if (xhr.readyState === 4 && xhr.status === 200) {
       console.log(xhr.responseText);
      //  const response = JSON.parse(xhr.responseText);
     }
   };
 
 xhr.open('POST', '../backend/addToCart.php', true);
 xhr.send(JSON.stringify(productData));
  
 }


 function getQuantityOfProduct(){

  let obj = {
    "quantity": "getQuantity"
  }

  const xhr = new XMLHttpRequest();
   
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      if (xhr.responseText) {
        document.getElementById("numberOfItems").innerHTML = xhr.responseText; 
      }
    }
  };

xhr.open('POST', '../backend/productQuantity.php', true);
xhr.send(JSON.stringify(obj));

}


 getQuantityOfProduct()
 
 /*------------------------------------------
   Send Request Using Ajax for database - End
---------------------------------------------*/




