//{{-- Script para criar mascara --}}

$('.cpf').inputmask('999.999.999-99', { 'placeholder': '___.___.___-__' })

$('.telefone_residencial').inputmask('(99) 9999-9999', { 'placeholder': '(__) ____-____' })

$('.telefone_celular').inputmask('(99) 99999-9999', { 'placeholder': '(__) _____-____' })

$('.matricula').inputmask('999999999', { 'placeholder': '' })

$('.altura').inputmask('9.99', { 'placeholder': '_.__' })

$('.pis_pasep').inputmask('99999999999999999999999999999999999', { 'placeholder': '' })

$('.titulo').inputmask('99999999999999', { 'placeholder': '' })

$('.zona').inputmask('999', { 'placeholder': '' })

$('.secao').inputmask('9999', { 'placeholder': '' })

$('.cnh_numero_registro').inputmask('99999999999', { 'placeholder': '' })

// $('.passaporte_numero').inputmask('99999999999999999999', { 'placeholder': '' }) DESATIVADO CONFORME REUNIÃO SCRUM DAILY 07052020 SGT BACKES

$('.cep').inputmask('99999-999', { 'placeholder': '_____-___' })

$('.logradouro_numero').inputmask('999999', { 'placeholder': '' })

$('.numero_sei').inputmask('9999.999999/9999-99', { 'placeholder': '____.______/____-__' })

$('.numero_documento').inputmask('99999999999999999999999999999999', { 'placeholder': '' })

$('.telefone_recado').on('focus', function() {
    $('.telefone_recado').inputmask('(99) 9999-9999[9]')
    $('.telefone_recado').keyup(function() {
        if ($('.telefone_recado').val().length >= 15) {
            $('.telefone_recado').inputmask('(99) 99999-9999', { 'placeholder': '(__) _____-____' })
        }
    })
})

//Adicionar a classe maxlenth-tamanho de digitos
$(document).ready(function() {
    let digitos = '9'
    for (let i = 1; i < 50; i++){
        $('.maxlength-' + i).inputmask(digitos, { 'placeholder': '' })

        digitos += '9'
    }
})
