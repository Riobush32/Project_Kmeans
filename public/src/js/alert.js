const successToogle = document.querySelector('#successToggle');
const hideSuccess = document.querySelector('#xsuccess');

successToggle.addEventListener('click', () => {
    hideSuccess.classList.toggle('hidden');
});