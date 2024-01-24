const nexbutton= document.querySelector('.btn-nex');
const prevbutton= document.querySelector('.btn-prev');
const steps= document.querySelectorAll('.step');
const form_steps= document.querySelectorAll('.form-step');

let active= 1;


nexbutton.addEventListener('click',() =>{
    active++;

    if (active> steps.length) {
        active = steps.length
    }
    updateProgress();
})

prevbutton.addEventListener('click', ()=>{
    active--;
    if (active < 1) {
        active = 1
    }
    updateProgress();
})

const updateProgress = () => {
    console.log('steps.length' + steps.length);
    console.log('active' + active)


// toggle active class for each item
steps.forEach((step,i) => {
    if (i == (active-1)) {
        step.classList.add('active');
        form_steps[i].classList.add('active')
        console.log('i=>'+i );
    }
    else{
        step.classList.remove('active');
        form_steps[i].classList.remove('active')
    }
});

// enable or disable prev next button 


if (active===1) {
    prevbutton.disabled= true;
}
else if (active === steps.length) {
    nexbutton.disabled =true ;
} else {
    prevbutton.disabled =false;
    nexbutton.disabled =false
}




 }