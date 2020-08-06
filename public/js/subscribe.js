

var elements = stripe.elements();

var cardElement = elements.create('card',
    {classes:
            {base: 'input', focus: 'border-black', invalid: 'border-red-500'}
    });
cardElement.mount('#card-element');

stripe.createToken(cardElement).then(function(result) {
    // Handle result.error or result.token
});

$(document).ready(function () {

})
