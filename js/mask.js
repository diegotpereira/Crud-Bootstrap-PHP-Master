
    $(document).ready(function() {
        $('#dataNascimento').mask('99/99/9999');
        // $('#cpf').mask('999.999.999-99');
        $('#cpf').mask('000.000.000-00', {
        onKeyPress : function(cpfcnpj, e, field, options) {
            const masks = ['000.000.000-000', '00.000.000/0000-00'];
            const mask = (cpfcnpj.length > 14) ? masks[1] : masks[0];
            $('#cpf').mask(mask, options);
        }
        });
        $('#telefone').mask('(999) 99999-9999');
        $('#celular').mask('(999) 99999-9999');
    });


