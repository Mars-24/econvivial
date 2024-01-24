const open = document.getElementById('open');
const modal_container = document.getElementById('modal-container');
const close = document.getElementById('close');

open.addEventListener('click',()=>{
    modal_container.classList.add('show');
    
});

close.addEventListener('click',()=>{
    modal_container.classList.remove('show');
});

$('input[type="number"]').on('input', updateTotal);


function updateTotal(e) {
    var quantity = parseInt(e.target.value);
    var updatePlace = $('.cost');
    var date = $('.new-date');
    var qty = $('.quantity');
    var qty_stripe = $('#qty');
    var amount_paypal = $('.amount-paypal');

    console.log(amount_paypal.val());


    var cost = $(this).data('cost');
    var total = (cost * quantity);
    updatePlace.text(total);
    qty.text(quantity);
    qty_stripe.val(quantity);
    amount_paypal.val(total);
    console.log(amount_paypal.val());

    console.log(amount_paypal);
    sessionStorage['price'] = total;

    function addMonths(date, months) {
        date.setMonth(date.getMonth() + months);
      
        return date;
      }
  
    var newDate = addMonths(new Date(),quantity);
    date.text(newDate.toLocaleDateString());
}



const open_stripe = document.getElementById('open-stripe');
const modal_stripe = document.getElementById('stripe-container');
const close_stripe = document.getElementById('close-stripe');


open_stripe.addEventListener('click',()=>{
   console.log('stripe');
   modal_stripe.classList.add('show');
    
});

close_stripe.addEventListener('click',()=>{
    modal_stripe.classList.remove('show');
});