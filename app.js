// Add an active class to the first button when the page loads
document.querySelector('.option-button').classList.add('active');

document.querySelectorAll('.option-button').forEach(button => {
    button.addEventListener('click', () => {
        // Remove the active class from all buttons
        document.querySelectorAll('.option-button').forEach(btn => {
            btn.classList.remove('active');
        });
        // Add the active class to the clicked button
        button.classList.add('active');

        document.querySelectorAll('.option-content').forEach(content => {
            content.style.display = 'none';
        });
        document.getElementById(button.dataset.target).style.display = 'block';
    });

    // Trigger click event on the first button when the page loads
    document.querySelector('.option-button').click();
});

