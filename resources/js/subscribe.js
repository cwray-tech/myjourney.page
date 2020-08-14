const cardHolderName = document.getElementById('card-holder-name');
const cardButton = document.getElementById('card-button');
const clientSecret = cardButton.dataset.secret;
const form = document.getElementById('subscribe-form');
const elements = stripe.elements();
const errors = document.getElementById('stripe-errors');
 const paymentMethod = document.getElementById('payment-method');

const cardElement = elements.create('card',
    {
        classes: {
            base: 'input',
            focus: 'border-black',
            invalid: 'border-red-500'
        }
    });

cardElement.mount('#card-element');


cardButton.addEventListener('click', async (e) => {
    e.preventDefault();
    cardButton.setAttribute('disabled', true);
    cardButton.innerText = 'Subscribing...';
    errors.innerText ='';
    errors.classList.remove('bg-red-200', 'p-2', 'my-2', 'rounded');

    if(! cardHolderName.value){
        errors.innerText = 'Please add the card holder name.';
        errors.classList.add('bg-red-200', 'p-2', 'my-2', 'rounded');
        cardHolderName.classList.add('border-red-500');
        cardButton.removeAttribute('disabled');
        cardButton.innerText = 'Subscribe';
    }
    else{
        cardHolderName.classList.remove('border-red-500');
        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: cardElement,
                    billing_details: { name: cardHolderName.value }
                }
            }
        );

        if (error) {
            errors.innerText = error.message;
            errors.classList.add('bg-red-200', 'p-2', 'my-2', 'rounded');
            cardButton.removeAttribute('disabled');
            cardButton.innerText = 'Subscribe';
        } else {
            paymentMethod.value = setupIntent.payment_method;
            form.submit();
        }
    }
});
