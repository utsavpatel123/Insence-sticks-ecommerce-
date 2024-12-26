
// for change the color of scroll bar
window.addEventListener("scroll", function () {
  const navbar = document.getElementById("navigation");
  if (window.scrollY > 50) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
});

/*--------------------
   Navigation - End 
--------------------*/

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

/*-------------------
   Review - start 
--------------------*/

const reviewSwiperContainer = document.querySelector(
  "#customerReviewSlider .swiperContainer"
);
const reviewSwiperWrapper = document.querySelector(
  "#customerReviewSlider .swiperWrapper"
);
const reviewSwiperSlide = document.querySelectorAll(
  "#customerReviewSlider .reviewSwiperSlide"
);
const reviewNextButton = document.querySelector(
  "#customerReviewSlider .productSwiperButtonNext"
);
const reviewPrevButton = document.querySelector(
  "#customerReviewSlider .productSwiperButtonPrev"
);

let Index = 0;
window.addEventListener("resize", () => {
  Index = 0;
  reviewPrevButton.click();
});

function reviewUpdateSlidePosition() {
  const slideWidth = reviewSwiperSlide[0].offsetWidth + 10;
  const offset = -Index * slideWidth;
  reviewSwiperWrapper.style.transform = `translateX(${offset}px)`;
}

reviewNextButton.addEventListener("click", function nextButton() {
  if (window.innerWidth > 1000) {
    if (Index < reviewSwiperSlide.length - 4) {
      Index++;
    }
  } else if (window.innerWidth > 750 && window.innerWidth < 1000) {
    if (Index < reviewSwiperSlide.length - 3) {
      Index++;
    }
  } else if (window.innerWidth > 550 && window.innerWidth < 750) {
    if (Index < reviewSwiperSlide.length - 2) {
      Index++;
    }
  } else if (window.innerWidth > 200 && window.innerWidth < 550) {
    if (Index < reviewSwiperSlide.length - 1) {
      Index++;
    }
  }

  reviewUpdateSlidePosition();
});
reviewPrevButton.addEventListener("click", function prevButton() {
  if (Index > 0) {
    Index--;
  }

  reviewUpdateSlidePosition();
});

/*-------------------
   Review - End 
--------------------*/

/*-- ----------------------
    Product Details - start  
----------------------- --*/
function productSlider() {
  var currentIndex = 0;
  const slides = document.querySelector(".slides");
  const totalSlides = document.querySelectorAll(".slide").length;
  const preBtn = document.querySelector(".prev");
  const nextBtn = document.querySelector(".next");
  const dotsContainer = document.querySelector(".dotsContainer");

  // Create dots dynamically
  for (let i = 0; i < totalSlides; i++) {
    let dot = document.createElement("span");
    dot.classList.add("dot");
    if (i === 0) dot.classList.add("active"); 
    dotsContainer.appendChild(dot);
  }
  const dots = document.querySelectorAll(".dot");

  function showSlide(index) {
    const slideWidth = document.querySelector(".slide").clientWidth;
    slides.style.transform = `translateX(-${index * slideWidth}px)`;
    updateDots(index);
  }

  // Update active dot
  function updateDots(index) {
    dots.forEach((dot, i) => {
      dot.classList.toggle("active", i === index);
    });
  }

  nextBtn.addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % totalSlides;
    showSlide(currentIndex);
  });

  preBtn.addEventListener("click", () => {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    showSlide(currentIndex);
  });

  // Add click event for dots
  dots.forEach((dot, i) => {
    dot.addEventListener("click", () => {
      currentIndex = i;
      showSlide(currentIndex);
    });
  });
}

productSlider();

/*-- ----------------------
    Product Details - End  
----------------------- --*/

/*-----------------------------
    Product Catagory - Start
------------------------------*/

let productImgBox = document.querySelectorAll(".productCategoriesImage");

productImgBox.forEach(function (elem) {
  const goProductPage = elem.childNodes[1];

  elem.addEventListener("mouseenter", function () {
    goProductPage.style.opacity = 1;
    goProductPage.style.transform = "scale(1)";

    elem.addEventListener("mouseleave", function () {
      goProductPage.style.opacity = 0;
      goProductPage.style.transform = "scale(0)";
    });

    elem.addEventListener("mousemove", function (dets) {
      const rect = elem.getBoundingClientRect();
      let x = dets.x - rect.left - 50;
      let y = dets.y - rect.top - 40;
      goProductPage.style.transform = `translate(${x}px, ${y}px)`;
    });
  });
});
/*-----------------------------
    Product Catagory - End
------------------------------*/


// /*-----------------------------
//     User Review - start
// ------------------------------*/


let starNumbers = document.querySelectorAll("#starNumber"); // All star number elements
let productRatingGroups = document.querySelectorAll(".stars"); // All star groups

document.addEventListener("DOMContentLoaded", function () {
    starNumbers.forEach(function (e, index) {
        // Get the star number for this group
        let starNumber = parseInt(e.textContent || e.value || 0);

        // Get the stars for this group
        let stars = productRatingGroups[index].querySelectorAll("span");

        // Add or remove the active class based on starNumber
        stars.forEach((star, i) => {
            if (i < starNumber) {
                star.classList.add("active");
                
            } else {
                star.classList.remove("active");
            }
        });
    });
});

/*-----------------------------
    User Review - End
------------------------------*/


/*-----------------------------
    send data in cookie - start
------------------------------*/

function cartData(){

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
  
}

cartData();
/*-----------------------------
    send data in cookie - End
------------------------------*/