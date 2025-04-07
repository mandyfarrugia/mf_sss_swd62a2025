handleNameSort = (event) => {
    let buttonContent = event.target.innerText;
    let sortOrder = buttonContent.includes("descending") ? 'desc' : 'asc';
    window.location.href = window.location.href.split('?')[0] + '?name_order=' + sortOrder;
};

handleFilterByCollegeId = (event) => {
    let selectedCollegeId = event.target.value;
    window.location.href = window.location.href.split('?')[0] + '?college_id=' + selectedCollegeId;
};

handleButtonDeletion = (event) => {
    event.preventDefault();
    if (confirm("Are you sure you want to delete this entity?")) {
        let action = event.target.getAttribute('href');
        let form = document.getElementById('entity-delete-form');
        form.setAttribute('action', action);
        form.submit();
    }
};

attachEvent = (target, event, callback) => target.addEventListener(event, callback);

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