/*-----------------
    Edit form - start
-------------------*/
   
const edtBtn = document.querySelectorAll('.categoryEdit'); 
const editForm = document.querySelector('#editFormContainer');
const closeForm = document.querySelector('.close');

console.log(edtBtn);
edtBtn.forEach(element => {
    
element.addEventListener('click', function(){
    editForm.style.display = 'block';
})
})

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