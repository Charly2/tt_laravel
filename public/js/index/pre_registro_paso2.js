var options = {
    mode: 'wizard',
    autoButtonsNextClass: 'btn btn-primary float-right btnnet',
    autoButtonsPrevClass: 'btn btn-light mr-1 btnbac',
    stepNumberClass: 'badge badge-pill badge-primary-gin mr-1',
    autoButtonsSubmitText:'Finalizar',
    onSubmit: function(e) {

        e.preventDefault();
        alert(1);

        return false;
    }
}

$(document).ready( function() {
    $('.fecha').datepicker({
        timepicker: false,
        language: 'es',
        maxHours: 18,
        onSelect: function (fd, d, picker) {
            console.log($(picker.el).trigger('change'))
        }
    });
    $('.hora').datepicker({
        timepicker: true,
        onlyTimepicker: true,
        language: 'es',
        maxHours: 18,
        onSelect: function (fd, d, picker) {
            $(picker.el).trigger('change')
        }
    });





    //$( "#form" ).accWizard(options);

    $('#CP').change(function (e) {
        console.log(this.value);

        fetch('https://api-codigos-postales.herokuapp.com/codigo_postal/'+this.value)
            .then(function(response) {
                return response.json();
            })
            .then(function(myJson) {
                console.log(myJson);
                $('#MU').val(myJson[0].municipio).trigger('change');
                $('#EN').val(myJson[0].estado).trigger('change');

                var $_html = "";

                myJson.forEach(function (e,t) {
                    $_html += "<option value='"+e.colonia+"'>"+e.colonia+"</option>";
                    console.log(e)
                });

                $('#colonias').html($_html).trigger('change');
                console.log($_html);
            });

    });


    $('#finalizar').click(function (e) {

        if ($('#finalizar').next('.alert').length){
            $('#finalizar').next('.alert').remove();
        }

        $_Err = 0;
        $('.req_this').each(function (e) {
            if (this.value == "" ){
                $_Err +=1;
                $(this).parent().setEstatus('error',"Este campo es obligatorio");
            }
        });

        if ($_Err > 0){
            console.log("Errores");
            $(this).after('<div class="alert alert-danger alert-dismissible fade show" role="alert">\n' +
                '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                '    <span aria-hidden="true">&times;</span>\n' +
                '  </button>\n' +
                '  <strong>¡Omitiste uno o más campos marcados como obligatorios!</strong> <br> Porfavor ingresa información en los campos marcados con *.\n' +
                '</div>')
        } else{
            window.location.href = "/cendi/pre_registro/ok";
        }

    });





});

