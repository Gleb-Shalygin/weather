document.querySelector('.city-act').addEventListener('click', function(){
    document.querySelector('.rename-city').classList.toggle('active');
    document.querySelector('.city').classList.toggle('mask');
    document.querySelector('.city-button').classList.toggle('mask');
});

window.addEventListener('click', e => {
    const target = e.target;
    if(!target.closest('.city-act') && !target.closest('.rename-city')){
        document.querySelector('.city').classList.remove('mask');
        document.querySelector('.city-button').classList.remove('mask');
        document.querySelector('.rename-city').classList.remove('active');
    }
});