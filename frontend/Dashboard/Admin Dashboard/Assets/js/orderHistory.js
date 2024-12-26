// Select all action elements
let actions = document.querySelectorAll(".action");

actions.forEach(function (actionElement) {
  actionElement.addEventListener("change", function () {
    // Find the parent container (selectStatusBox) of the current action
    let parentBox = actionElement.closest(".selectStatusBox");

    // Retrieve corresponding userId, orderId, and productId values
    let status = actionElement.value;
    let userId = parentBox.querySelector(".userId").value;
    let orderId = parentBox.querySelector(".orderId").value;
    let productId = parentBox.querySelector(".productId").value;

    sendData(status, userId, orderId, productId);

  });
});


function sendData(status, userId, orderId, productId){
    
    let Data = {
      status: status,  
      userId: userId,  
      orderId: orderId,  
     productId: productId
    }
 
    const xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
          if (xhr.responseText) {
            window.location.reload();
          }
      }
    };
  
  xhr.open('POST', '../../../backend/updateOrderStatus.php', true);
  xhr.send(JSON.stringify(Data));
   
  }
  