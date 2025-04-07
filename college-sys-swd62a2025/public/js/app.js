handleButtonDeletion = (event) => {
    event.preventDefault();
    if (confirm("Are you sure you want to delete this entity?")) {
        let action = event.target.getAttribute('href');
        let form = document.getElementById('entity-delete-form');
        form.setAttribute('action', action);
        form.submit();
    }
}

attachEvent = (target, event, callback) => {
    target.addEventListener(event, callback);
}

attachEvent(window, 'load', () => {
    const deleteBtns = document.querySelectorAll('.btn-delete');

    deleteBtns.forEach(deleteBtn => {
        attachEvent(deleteBtn, 'click', (event) => handleButtonDeletion(event));
    });
});