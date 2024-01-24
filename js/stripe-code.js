var stripe = Stripe('pk_test_51L5EqJCrcg0PjdIzMcRdmm1KvQ1Rd7NtVn4xFgl7xnOnpbAPgnLjpkFsxPqaaDTtRKTjqxFIZyDU9vcz3Mmi6Kfp00L1ZlZQJM');

console.log(stripe);
  
var elements =stripe.elements();
var style = {
       base: {
        color: "#32325d",
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
        "::placeholder": {
        color: "#000"
         }
     },
 invalid: {
 color: "#fa755a",
iconColor: "#fa755a"
}
};
var card = elements.create("card", {hidePostalCode: true,style: style });

card.mount("#card-element");
card.on('change', ({error}) => {
let displayError = document.getElementById('card-errors');
if (error) {
displayError.textContent = error.message;
} else {
displayError.textContent = '';
}
})


var form =document.getElementById('payment-form');
var cardBtn = document.getElementById('card-button');
var cardHolderName = document.getElementById('card-holder-name');


form.addEventListener('submit',async(e)=>{
    e.preventDefault();

   cardBtn.disabled = true
    const {setupIntent,error} =await stripe.confirmCardSetup(
        cardBtn.dataset.secret,{
            payment_method:{
                card:card,
                billing_details:{
                    name:cardHolderName.value
                }
            }
        }
    )

    if (error) {
        cardBtn.disabled = false
    } else {
        let token = document.createElement('input')
        token.setAttribute('type','hidden')
        token.setAttribute('name','token')
        token.setAttribute('value',setupIntent.payment_method)
        form.appendChild(token)
        form.submit();
    }
});

// submitButton.addEventListener('click', function(ev) {
// ev.preventDefault();
// submitButton.disabled =true;
// stripe.confirmCardPayment("{{$clientSecret}}", {
// payment_method: {
// card: card

// }
// }).then(function(result) {
// if (result.error) {
// submitButton.disabled =false;
// // Show error to your customer (e.g., insufficient funds)
// console.log(result.error.message);
// } else {
// // The payment has been processed!
// if (result.paymentIntent.status === 'succeeded') {
// //console.log(result.paymentIntent);
// var paymentIntent = result.paymentIntent;
// var token=document.querySelector('meta[name="csrf-token"]').getAttribute('content');
// var form = document.getElementById('payment-form');
// var url = form.action;
// var redirect ='/merci';
// console.log(url);
// fetch(url, {
//     headers: {
//     "Content-Type": "application/json",
//     "Accept": "application/json, text-plain, */*",
//     "X-Requested-With": "XMLHttpRequest",
//     "X-CSRF-TOKEN": token
//     },
//     method: 'post',
//     body: JSON.stringify({
//         paymentIntent: paymentIntent
//      })
//     }).then((data)=>{

//         console.log(data)
//         window.location.href = redirect;
//     }).catch(function(error) {
//         console.log(error);
//     });
// }


// }
// });
// });
