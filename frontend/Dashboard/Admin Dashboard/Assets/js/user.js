

// /*-----------------------
//    User Table - End 
// -----------------------*/


const editUser = document.querySelector('.editUser');
const editUserBtn = document.querySelectorAll('.editUserBtn');
const closeEditUesr = document.querySelector('.closeEditUser')


closeEditUesr.addEventListener("click",()=>{
  editUser.style.display = "none";
})

// Handling Next/Prev buttons for the "editUser" section
let editButtonNextFirst = document.getElementById("editButtonNextFirst");
let editButtonPrevFirst = document.getElementById("editButtonPrevFirst");
let editButtonNextSecond = document.getElementById("editButtonNextSecond");
let editButtonPrevSecond = document.getElementById("editButtonPrevSecond");

// Form boxes for "edit user" section
let editFirstInfoBox = document.getElementById("editFirstInfoBox");
let editSecondInfoBox = document.getElementById("editSecondInfoBox");
let editThirdInfoBox = document.getElementById("editThirdInfoBox");

// "Next" and "Previous" buttons navigation for the "editUser" form
editButtonNextFirst.addEventListener("click", function() {
    editFirstInfoBox.style.display = "none";
    editSecondInfoBox.style.display = "block";
});

editButtonPrevFirst.addEventListener("click", function() {
    editSecondInfoBox.style.display = "none";
    editFirstInfoBox.style.display = "block";
});

editButtonNextSecond.addEventListener("click", function() {
    editSecondInfoBox.style.display = "none";
    editThirdInfoBox.style.display = "block";
});

editButtonPrevSecond.addEventListener("click", function() {
    editThirdInfoBox.style.display = "none";
    editSecondInfoBox.style.display = "block";
});
