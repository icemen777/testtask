$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



$('form.add_cart_form').on('submit', (
    function () {
        var spinner = $(this).find('span.spinner-border');
        spinner.show();
        var formData1 = $(this).children('input[name="id"]').val();
        $.ajax({
            url: '/cart/add',
            method: 'post',
            data: { id: formData1 },
            success: function (data) {
                spinner.hide();
                $("#cart_area").html(data);
            }
        });
        return false;
    }));

$('form.del_cart_form').on('submit', (
    function () {
        var spinner = $(this).find('span.spinner-border');
        spinner.show();
        var formData1 = $(this).children('input[name="id"]').val();
        $.ajax({
            url: '/cart/del',
            method: 'post',
            data: { id: formData1 },
            success: function (data) {
                spinner.hide();
                $("#cart_area").html(data);
            }
        });
        return false;
    }));

