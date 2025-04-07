handleNameSort = (event) => {
    let buttonContent = event.target.innerText; //Get the text inside the button.
    let sortOrder = buttonContent.includes("descending") ? 'desc' : 'asc'; //If text includes descending, sort in descending order. Otherwise sort in ascending order.
    window.location.href = window.location.href.split('?')[0] + '?name_order=' + sortOrder; //Attach the request to sort by name in ascending/descending order.
};

handleFilterByCollegeId = (event) => {
    let selectedCollegeId = event.target.value; //Get the value associated with the option.
    window.location.href = window.location.href.split('?')[0] + '?college_id=' + selectedCollegeId; //Attach the request to filter students by college.
};

handleButtonDeletion = (event) => {
    event.preventDefault(); //Prevent the event from being fired.
    //Confirm whether user wants to delete the entity.
    if (confirm("Are you sure you want to delete this entity?")) {
        let action = event.target.getAttribute('href'); //Get the button corresponding to the row that will be deleted.
        let form = document.getElementById('entity-delete-form'); //Get the form to simulate form submission to cause deletion of row.
        form.setAttribute('action', action); //Set the action to point to the destroy action.
        form.submit(); //Simulate form submission.
    }
};

attachEvent = (target, event, callback) => target.addEventListener(event, callback);

//Attach event handlers to the appropriate elements when the window has finished loading.
attachEvent(window, 'load', () => {
    const deleteBtns = document.querySelectorAll('.btn-delete');
    const filterByCollegeId = document.getElementById('filter_college_id');
    const sortBtn = document.getElementById('sort_btn');

    attachEvent(sortBtn, 'click', (event) => handleNameSort(event));

    attachEvent(filterByCollegeId, 'change', (event) => handleFilterByCollegeId(event));

    deleteBtns.forEach(deleteBtn => {
        attachEvent(deleteBtn, 'click', (event) => handleButtonDeletion(event));
    });
});