
/*-------------------------------------------
   forgetPassword by Email or number - Start 
--------------------------------------------*/

let btn = document.querySelector(".generateOtp #btn");

btn.addEventListener('click',function(){
let email = document.querySelector(".container .byEmail");
let phoneNumber = document.querySelector(".container .byPhoneNumber");

    if (phoneNumber.style.display === "none") {
        phoneNumber.style.display = "block";
        email.style.display = "none";
        btn.innerHTML="BY EMAIL";
      } else {
        phoneNumber.style.display = "none";
        email.style.display = "block";
        btn.innerHTML="BY NUMBER";
      }
  })

  /*-------------------------------------------
   forgetPassword by Email or number - End
--------------------------------------------*/

