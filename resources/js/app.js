require('./bootstrap');

require('alpinejs');
require('jquery');

function getSlug(url) {
    let index = url.lastIndexOf('/');
    return url.substr(index);
}

//This handles menu logic in admin panel where the urls are dynamically generated based on the model
if (getSlug(window.location.href) == '/admin') {
    console.log('ok');
    $('.entity').hover(function (e) {
        e.preventDefault();
        $('.operations-list').css('display', 'block');
        let name = this.id;
        $('.operation-anchor').each(function (index, value) {
            if (index != 1) {
                value.href = name + '/' + value.innerText;
                if (value.innerText == 'index') {
                    value.href = name;
                }

            } else {

                value.href = name;
            }
        })
    });
}
$(document).ready(function () {
    let $input;

    function onInputFocus(event) {
        var $target = $(event.target);
        var $parent = $target.parent();
        $parent.addClass('input--filled');
    };

    function onInputBlur(event) {
        var $target = $(event.target);
        var $parent = $target.parent();

        if (event.target.value.trim() === '') {
            $parent.removeClass('input--filled');
        }
    };

    $input = $('.input__field');

    // in case there is any value already
    $input.each(function(){
        if ($input.val().trim() !== '') {
            var $parent = $input.parent();
            $parent.addClass('input--filled');
        }
    });

    $input.on('focus', onInputFocus);
    $input.on('blur', onInputBlur);

});

$('#serviciu').on('change', function () {

    if($(this).find('option').length === 1) {
        console.log($(this).find('option').val());
    }
    console.log($(this).val());
    $('#id_serviciu').val($(this).val());

}).trigger('change');

$('#cerere').on('change', function () {

    if($(this).find('option').length === 1) {
        console.log('just 1');
    }

    $.ajax({
        url: "/incarca-cereri/" + $(this).val(),
        success: function(data) {
            console.log(data);
            $('#id_serviciu').val(data.id_serviciu);
            $('#adresa_client').val(data.adresa_client);
            $('#nume_client').val(data.nume_client);
            $('#telefon_client').val(data.telefon_client);
            $('#mesaj').val(data.mesaj);
        }
    })
}).trigger('change');

