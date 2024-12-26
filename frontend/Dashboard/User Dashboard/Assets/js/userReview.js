

/*--------------------
  Rating Star - Start 
---------------------*/

const stars = document.querySelectorAll('.stars span');
let reviewButton = document.getElementById("reviewButton")
let productName = document.getElementById("productName")
let reviewMessage = document.getElementById("reviewMessage")



var review = 1; 

stars.forEach((star,index1) => {
    star.addEventListener('click', () => {
        
        stars.forEach((star,index2) => {
            
            if (index1 >= index2) {
                star.classList.add("active")
                review = index2+1              
                
            }
            else{
                star.classList.remove("active")
            }
        });
    });
    
});


reviewButton.addEventListener("click", function(){
  
    if([review, productName, reviewMessage].some((field)=> field == "")){
      console.log("Error");
    }else{
        sendReviewCount(review, productName.value , reviewMessage.value);
    }
    
})



/*--------------------
  Rating Star - End 
---------------------*/


/*------------------------------------
  AJAX REQUEST FOR Rating Star - Start 
-------------------------------------*/

function sendReviewCount(review, productName, reviewMessage){    
    
    const xhr = new XMLHttpRequest();

 obj = {
    reviews: review,
    product: productName,
    message: reviewMessage
}

xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);
  
      if (response === "true") {
        location.reload(); 
      } else {
        console.log("Error submitting review.");
      }
    }
  };
  
  xhr.open("POST", "../../../backend/dashboard/userDashboard/userReview.php", true);
  xhr.send(JSON.stringify(obj));
  

}

/*------------------------------------
  AJAX REQUEST FOR Rating Star - End 
-------------------------------------*/
