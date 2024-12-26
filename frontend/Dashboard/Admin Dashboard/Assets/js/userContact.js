

/*--------------------------
   userContact Email  - start
--------------------------*/

var email = document.querySelectorAll(".email")

var emailArray = Array.from(email);

emailArray.forEach((element,index) => {

    var fullEmails = element.textContent // Print the length of the first element's text content

    var fullEmail = fullEmails.trim();
    console.log(fullEmail.length);
    

    if (fullEmail.length > 20) {

      const truncatedEmail = fullEmail.substring(0, 20);
      element.textContent = truncatedEmail + '...';
    }

    
});

const emailBox = document.querySelectorAll('.userMessage .email')
const hoverEmails = document.querySelectorAll('.userMessage .hoverEmail')

emailBox.forEach((emailBox,index)=>{
  const hoverEmail = hoverEmails[index];

  emailBox.addEventListener("mouseenter", () => {
      emailBox.style.display = "none";
      hoverEmail.style.display = "block";
  });

  hoverEmail.addEventListener("mouseleave", () => {
      hoverEmail.style.display = "none";
      emailBox.style.display = "block";
  });

});

/*--------------------------
   userContact Email  - end
--------------------------*/
