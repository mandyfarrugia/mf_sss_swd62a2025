document.querySelectorAll('.btn-delete').forEach((button) => {
    button.addEventListener('click', function(event) {
        event.preventDefault()
        if (confirm("Are you sure?")) {
            let action = this.getAttribute('href');
            let form = document.getElementById('entity-delete-form');
            form.setAttribute('action', action)
            form.submit()
        }
    })
})