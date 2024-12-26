

document
  .getElementById("categorySelect")
  .addEventListener("change", function () {
    const selectedCategory = this.value;

    // AJAX Request to fetch products based on category
    const xhr = new XMLHttpRequest();
    xhr.open(
      "GET",
      `../backend/getProducts.php?category=${selectedCategory}`,
      true
    );

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Update product container with the response
        //   console.log(xhr.responseText);

        document.getElementById("productContainer").innerHTML =
          xhr.responseText;
      }
    };

    xhr.send();
  });



let defaultProduct = document.getElementById("defaultProduct");

document
  .getElementById("categorySelect")
  .addEventListener("change", function () {
    defaultProduct.style.display = "none";
  });
  
  
  /*-----------------------------
  send data in cookie - start
  ------------------------------*/  
  
  
  document.addEventListener("DOMContentLoaded", function () {

  // Attach event listener to a parent element that exists when the page loads
  const productContainer = document.querySelector(".productContainer");

  // Ensure the parent element is found
  if (productContainer) {
    productContainer.addEventListener("click", function (event) {
      if (event.target && event.target.id === "cartButton") {
        let productId = event.target.value;
        let userId = event.target.getAttribute("data-userId");
        const quantity = 1;
        

        if (userId === "") {
          let cookieArray = getCookie("productData");
          cookieArray = cookieArray ? JSON.parse(cookieArray) : [];

          const existingProduct = cookieArray.find(
            (item) => item.productId === productId
          );

          if (existingProduct) {
            existingProduct.quantity += quantity;
          } else {
            const productObj = {
              productId: productId,
              quantity: quantity,
            };

            cookieArray.push(productObj);
          }
          setCookie("productData", JSON.stringify(cookieArray), 7);
          getQuantityOfProduct()
        } else {
          sendData(productId, quantity);
        }
      }
    });
  } else {
    console.error("Product container not found.");
  }
});




      
  document.addEventListener("DOMContentLoaded", function () {
      const cartButtons = document.querySelectorAll("#cartButton");
if (cartButtons.length) {
  cartButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const userId = button.getAttribute("data-userId");
      const productId = button.value;
      const quantity = 1;


      if (userId === "") {
        
        let cookieArray = getCookie("productData");
        cookieArray = cookieArray ? JSON.parse(cookieArray) : [];

        const existingProduct = cookieArray.find(item => item.productId === productId);

        if (existingProduct) {
          existingProduct.quantity += quantity;
        } else {
          const productObj = {
            productId: productId,
            quantity: quantity 
          };
          
          cookieArray.push(productObj);
        }
        setCookie("productData", JSON.stringify(cookieArray), 7);
        getQuantityOfProduct()
      } else {
        sendData(productId, quantity);
      }
    });
  });
} else {
  console.error("Buttons not found");
}
});

/*-----------------------------
    send data in cookie - End
------------------------------*/