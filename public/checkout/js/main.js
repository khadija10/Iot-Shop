$(function(){
    $("#form-total").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: false,
        autoFocus: true,
        transitionEffectSpeed: 500,
        titleTemplate : '<div class="title">#title#</div>',
        labels: {
            previous : 'Previous',
            next : 'Next Step',
            finish : 'Submit',
            current : ''
        },

        onStepChanging: function (event, currentIndex, newIndex) {
            var destName = $('#destName').val();
            var phone = $('#phone').val();
            var address = $('#address').val();
            var ville = $('#ville').val();
            var option = ('form input[type=radio]:checked').val();


            $('#destName_val').text(destName);
            $('#phone_val').text(phone);
            $('#ville_val').text(ville);
            $('#address_val').text(address);
            $('#option_val').text(option);


            return true;
        }
    });
    $("#date").datepicker({
        dateFormat: "MM - DD - yy",
        showOn: "both",
        buttonText : '<i class="zmdi zmdi-chevron-down"></i>',
    });
});
