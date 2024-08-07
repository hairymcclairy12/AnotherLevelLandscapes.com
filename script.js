function showSection(sectionId) {
    document.querySelectorAll('.section').forEach(section => {
        section.classList.remove('active');
    });
    document.getElementById(sectionId).classList.add('active');
}

document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    let formData = new FormData(this);
    
    fetch('contact.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('formFeedback').innerText = data;
    })
    .catch(error => {
        document.getElementById('formFeedback').innerText = 'An error occurred. Please try again later.';
    });
});
