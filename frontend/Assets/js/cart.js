/*----------------------------------------------------
   Send Request Using Ajax for update addToCart - start
-------------------------------------------------------*/
function updateProductQuantity(productquantity, user, product, price) {
  let obj = {
    productquantity: productquantity,
    userId: user,
    productId: product,
    productPrice: price,
  };

  const xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // const response = JSON.parse(xhr.responseText);
      console.log(xhr.responseText);
      if (xhr.responseText) {
        location.reload();
      }
    }
  };

  xhr.open("POST", "../backend/updateCart.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(JSON.stringify(obj));
}

let loginUserQuantity = document.querySelectorAll("#loginUserQuantity");
let userId = document.querySelectorAll("#userId");
let productId = document.querySelectorAll("#productId");
let productPrice = document.querySelectorAll("#productPrice");
let updateCart = document.getElementById("updateCart");

updateCart.addEventListener("click", function () {
  loginUserQuantity.forEach(function (e, index) {
    // e.addEventListener("input", function() {
    let productQuantity = e.value;

    let user = userId[index].value;
    let product = productId[index].value;
    let price = productPrice[index].innerHTML;

    updateProductQuantity(productQuantity, user, product, price);
  });
});

let deleteButton = document.querySelectorAll(".deleteButton");

deleteButton.forEach(function (button) {
  button.addEventListener("click", function () {
    // Find the closest .productName element related to the clicked button
    let productId = button.parentElement.querySelector(".productId");

    if (productId) {
      let productIds = productId.textContent;

      let cookieArray = getCookie("productData");

      let productData = JSON.parse(cookieArray);

      let emptyArray = [];

      productData.forEach(function (product) {
        let productsId = product.productId;
        let quantity = product.quantity;

        if (productIds === productsId) {
          return;
        } else {
          emptyArray.push(product);
          productData = emptyArray;
        }
      });
      if (emptyArray.length === 0) {
        emptyArray = [];
        productData = emptyArray;
      }
        setCookie("productData", JSON.stringify(productData), 7);
        window.location.reload();
    } else {
      console.log("Product name not found!");
    }
  });
});

/*----------------------------------------------------
     Send Request Using Ajax for update addToCart - End
  -------------------------------------------------------*/


  let total = 0;

  document.querySelectorAll(".productTotal").forEach(function(priceElement) {
      // Get the text content and convert it to a number
      let price = parseFloat(priceElement.textContent);
  
      // Add to total if price is a valid number
      if (!isNaN(price)) {
          total += price;
      }
  });
  
  document.getElementById("total").innerHTML = total
  

