const toggleBtn = document.querySelector('.toggle-btn');
const signInForm = document.getElementById('sign_in');
const signUpForm = document.getElementById('sign_up');

toggleBtn.addEventListener('click', function() {
    if (signInForm.classList.contains('form-sign-up')) {
        signInForm.classList.remove('form-sign-up');
        signUpForm.classList.add('form-sign-up');
    } else {
        signInForm.classList.add('form-sign-up');
        signUpForm.classList.remove('form-sign-up');
    }
});
