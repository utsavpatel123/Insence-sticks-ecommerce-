 
document.addEventListener("DOMContentLoaded", function () {
  const cartButtons = document.querySelectorAll("#cartButton");
  if (cartButtons.length) {
    cartButtons.forEach((button) => {
      button.addEventListener("click", function () {
        let userId = "";
        if (button.getAttribute("data-userId")) {
          userId = button.getAttribute("data-userId");
        } else {
          userId = "";
        }

        const productId = button.value;
        const quantitys = document.getElementById("quantity").value; // Get the input value (not the element)
        console.log(quantitys);
        console.log(productId);
        console.log(userId);

        if (userId === "") {
          let cookieArray = getCookie("productData");
          cookieArray = cookieArray ? JSON.parse(cookieArray) : [];

          const existingProduct = cookieArray.find(item => item.productId === productId);

          if (existingProduct) {
            existingProduct.quantity += parseInt(quantitys); // Add quantity correctly
          } else {
            const productObj = {
              productId: productId,
              quantity: parseInt(quantitys) // Ensure quantity is a number
            };

            cookieArray.push(productObj);
          }
          setCookie("productData", JSON.stringify(cookieArray), 7);
        } else {
          sendData(productId, quantitys); // Send the correct quantity here
        }
      });
    });
  } else {
    console.error("Buttons not found");
  }
});







/*---------------------------------------------
   Product Images/Sub Images show - start 
----------------------------------------------*/
function showSubImages(){
  const mainImage = document.querySelector(".productImage img");
  const subImages = document.querySelectorAll(".smallImagecontainer img");
  // console.log(mainImage);
  subImages.forEach((img)=>{
    img.addEventListener("click",()=>{
      let mainImg = mainImage.src
      mainImage.src = img.src;
      img.src = mainImg
    })
  })
}
showSubImages();
/*---------------------------------------------
   Product Images/Sub Images show - start 
----------------------------------------------*/

/*-------------------
Product Slider - start 
--------------------*/
const swiperContainer = document.querySelector(
  "#productSlider .swiperContainer"
);
const swiperWrapper = document.querySelector("#productSlider .swiperWrapper");
const swiperSlides = document.querySelectorAll(
  "#productSlider .productSwiperSlide"
);
const nextButton = document.querySelector(
  "#productSlider .productSwiperButtonNext"
);
const prevButton = document.querySelector(
  "#productSlider .productSwiperButtonPrev"
);

let currentIndex = 0;
window.addEventListener("resize", () => {
  currentIndex = 0;
  prevButton.click();
});

function updateSlidePosition() {
  const slideWidth = swiperSlides[0].offsetWidth + 5;
  const offset = -currentIndex * slideWidth;
  swiperWrapper.style.transform = `translateX(${offset}px)`;
}

autoPlaySlider();

var productSliderInterval;
var isCalled = false;

// automatic move product slider after 3 second
function autoPlaySlider() {
  productSliderInterval = setInterval(function () {
    nextButtonClick("Auto");
  }, 3000);
}

function nextButtonClick(clickType) {
  if (window.innerWidth > 1200) {
    if (currentIndex < swiperSlides.length - 5) {
      currentIndex++;
    }
  } else if (window.innerWidth > 1000 && window.innerWidth < 1200) {
    if (currentIndex < swiperSlides.length - 4) {
      currentIndex++;
    }
  } else if (window.innerWidth > 628 && window.innerWidth < 1000) {
    if (currentIndex < swiperSlides.length - 3) {
      currentIndex++;
    }
  } else if (window.innerWidth > 496 && window.innerWidth < 628) {
    if (currentIndex < swiperSlides.length - 2) {
      currentIndex++;
    }
  } else if (window.innerWidth > 200 && window.innerWidth < 496) {
    if (currentIndex < swiperSlides.length - 1) {
      currentIndex++;
    }
  }

  updateSlidePosition();

  if (swiperSlides.length - 5 <= currentIndex) {
    currentIndex = -1;
  }

  if (clickType == "manual" && !isCalled) {
    isCalled = true;
    clearInterval(productSliderInterval);
    setTimeout(() => {
      autoPlaySlider();
      isCalled = false;
    }, 10000);
  }
}

function previousButton(clickType) {
  if (currentIndex > 0) {
    currentIndex--;
  }

  updateSlidePosition();

  if (swiperSlides.length - 5 <= currentIndex) {
    currentIndex = -1;
  }

  if (clickType == "manual" && !isCalled) {
    isCalled = true;
    clearInterval(productSliderInterval);
    setTimeout(() => {
      autoPlaySlider();
      isCalled = false;
    }, 10000);
  }
}

/*-------------------
  Product Slider - End 
--------------------*/

