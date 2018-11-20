$(document).ready( function () {
    console.log('loaded edit.js');
    var quantitiy=0;
    $('#quantity-plus').click(function(e) {
        e.preventDefault();
        var quantity = parseInt($('#quantity').val());
        $('#quantity').val(quantity + 1);
    });
    $('#quantity-minus').click(function(e) {
        e.preventDefault();
        var quantity = parseInt($('#quantity').val());
        $('#quantity').val(quantity - 1);
    });
} );