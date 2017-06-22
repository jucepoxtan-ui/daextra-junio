    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/material.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <script src="assets/js/nouislider.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="assets/js/material-kit.js" type="text/javascript"></script>
    <script src="js/jquery.scrollme.js"></script>
    <script src="js/rellax-master/rellax.min.js"></script>
    <script src="https://use.fontawesome.com/143e79af74.js"></script>
    <script src="js/masking-input/masking-input.js" data-autoinit="true"></script>
    <script>var rellax = new Rellax('.rellax');</script>
    <script type="text/javascript"> $("#password").password('toggle');</script>
    <script type="text/javascript" src="js/input-pass.js"></script>
    <script type="text/javascript" src="js/bootstrap-editable.js"></script>
    <script>
        $(function(){
            $('#banco-cambio').editable({
                value: 1,    
                source: [
                      {value: 1, text: 'BanCoppel'},
                      {value: 2, text: 'Bancomer'},
                      {value: 3, text: 'Banamex'},
                      {value: 4, text: 'Banorte'},
                      {value: 5, text: 'Banco Azteca'},
                      {value: 6, text: 'Scotiabank'},
                      {value: 7, text: 'Santander'},
                   ]
            });
        });
        $('#numero-tarjeta-cambio').editable({
            type: 'text',
            pk: 1,
            // url: '/post',
            title: 'Cambia tu celular'
        });
        $('#celular-cambio').editable({
            type: 'text',
            pk: 1,
            // url: '/post',
            title: 'Cambia tu celular'
        });
        $('#clave-interbancaria-cambiar').editable({
            type: 'text',
            pk: 1,
            // url: '/post',
            title: 'CLABE SPEI 18 digitos'
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-primary');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
    </script>
