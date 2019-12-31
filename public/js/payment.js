Stripe.setPublishableKey('pk_test_vmlLXFWKIiSghnuIws73rWiN009QRGKc37');
const form = $('#payment');

form.submit(function (event) {
    event.preventDefault();
    Stripe.card.createToken({
        number: $('#number').val(),
        exp_month: $('#exp_month').val(),
        exp_year: $('#exp_year').val(),
        cvc: $('#cvc').val(),
        name: $('#name').val()
    }, stripeResponseHandler);
});

function stripeResponseHandler(status, response) {
    if (response.error){
        alert(response.error.message);
    }else {
        form.append($('<input type="hidden" name="stripeToken" />').val(response.id));
        form.get(0).submit();
    }
}
