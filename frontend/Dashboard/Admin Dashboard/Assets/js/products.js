/*-----------------
    Edit form - start
-------------------*/
   
const edtBtn = document.querySelectorAll('.productEdit'); 
const editForm = document.querySelector('#editFormContainer');
const closeForm = document.querySelector('.close');

//close form
closeForm.addEventListener("click", (eve) => {
    editForm.style.display = 'none';
});

// Close the form when clicking outside form
window.addEventListener("click", (eve) => {
    if (eve.target === editForm) {
        editForm.style.display = 'none';
    }
});



/*-----------------
    Edit form - End
-------------------*/