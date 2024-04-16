// transition 
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add('right-panel-active');
});

signInButton.addEventListener('click', () => {
    container.classList.remove('right-panel-active');
});

// show hide password
const checkshowIn = document.querySelector('.check-show-signin');
const checkshowUp = document.querySelector('.check-show-signup');
const checkhideIn = document.querySelector('.check-hide-signin');
const checkhideUp = document.querySelector('.check-hide-signup');
const inputIn = document.querySelector("#password-in");
const inputUp = document.querySelector("#password-up");
checkshowUp.addEventListener('click', function () {
    if (inputUp.type === 'password') {
        inputUp.type = 'text';
        checkshowUp.style.display = 'none';
        checkhideUp.style.display = 'block';
    }
});
checkhideUp.addEventListener('click', function () {
    if (inputUp.type === 'text') {
        inputUp.type = 'password';
        checkshowUp.style.display = 'block';
        checkhideUp.style.display = 'none';
    }
});

const showInPass = () => {
    if (inputIn.type === 'password') {
        inputIn.type = 'text';
        checkshowIn.style.display = 'none';
        checkhideIn.style.display = 'block';
    }
}

const hideInPass = () => {
    if (inputIn.type === 'text') {
        inputIn.type = 'password';
        checkshowIn.style.display = 'block';
        checkhideIn.style.display = 'none';
    }
}

checkshowIn.addEventListener('click', showInPass);
checkhideIn.addEventListener('click', hideInPass);
