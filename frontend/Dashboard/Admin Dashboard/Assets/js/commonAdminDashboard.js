

let categoriesSubLinks = document.getElementById('categoriesSubLinks');
let productsSubLinks = document.getElementById('productsSubLinks');
let usersSubLinks = document.getElementById('usersSubLinks');

let categoriesLinks = document.getElementById('categoriesLinks');
let productsLinks = document.getElementById('productsLinks');
let usersLinks = document.getElementById('usersLinks');


categoriesLinks.addEventListener("click", function(){
    categoriesSubLinks.classList.toggle("activeCategoriesSubLinks")
    productsSubLinks.classList.remove("activeProductsSubLinks")
    usersSubLinks.classList.remove("activeUsersSubLinks")
})

productsLinks.addEventListener("click", function(){
    productsSubLinks.classList.toggle("activeProductsSubLinks")
    usersSubLinks.classList.remove("activeUsersSubLinks")
    categoriesSubLinks.classList.remove("activeCategoriesSubLinks")
})

usersLinks.addEventListener("click", function(){
    usersSubLinks.classList.toggle("activeUsersSubLinks")
    categoriesSubLinks.classList.remove("activeCategoriesSubLinks")
    productsSubLinks.classList.remove("activeProductsSubLinks")
})

