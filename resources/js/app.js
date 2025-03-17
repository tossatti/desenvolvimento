/**
 * importar o ARQUIVO bootstrap
 */
import './bootstrap'; // Importa o axios e outras configurações do Laravel
import * as bootstrap from 'bootstrap'; // Importa todas as funcionalidades do Bootstrap
import Inputmask from 'inputmask';


/**
 * apresentar e ocultar senha
 */
window.togglePassword = function (fieldId, toggleIcon) {
    const field = document.getElementById(fieldId);
    const icon = toggleIcon.querySelector('i');

    if (field.type === "password") {
        field.type = "text";
        icon.classList.remove('bi', 'bi-eye');
        icon.classList.add('bi', 'bi-eye-slash');
    } else {
        field.type = "password";
        icon.classList.remove('bi', 'bi-eye-slash');
        icon.classList.add('bi', 'bi-eye');
    }

}

/**
 * Máscaras nos campos de dados de documentos quando html for carregado 
 */
document.addEventListener("DOMContentLoaded", function () {
    var cpfMask = new Inputmask("999.999.999-99");
    cpfMask.mask(document.querySelector('#cpf')); //caso usar id
    // cpfMask.mask(document.querySelector('.cpf')); // caso usar class

    var telefoneMask = new Inputmask("(99) 99999-9999");
    telefoneMask.mask(document.querySelector('#telefone')); //caso usar id

    var cepMask = new Inputmask("99999-999");
    cepMask.mask(document.querySelector('#cep')); //caso usar id

    var pispasepMask = new Inputmask("999.99999.99-9");
    pispasepMask.mask(document.querySelector('#pis')); //caso usar id

    var tituloMask = new Inputmask("9999 9999 9999");
    tituloMask.mask(document.querySelector('#titulo')); //caso usar id

    var cnhMask = new Inputmask("99999999999");
    cnhMask.mask(document.querySelector('#cnh')); //caso usar id

    var ctpsMask = new Inputmask("9999999/9999");
    ctpsMask.mask(document.querySelector('#ctps')); //caso usar id

});

/**
 * máscara de moeda
 */

function formatarMoeda(input) {
    let valor = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos

    if (valor) {
        valor = (parseInt(valor) / 100).toFixed(2); // Converte para número e formata com duas casas decimais
        const valorFormatado = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(valor); // Formata para exibição

        // Prepara o valor para o banco de dados
        const valorBanco = valor.replace('.', ''); // Remove separadores de milhar
        const valorBancoFinal = valorBanco.replace(',', '.'); // Substitui vírgula por ponto

        input.value = valorFormatado; // Atualiza o valor exibido no input
        input.dataset.valorBanco = valorBancoFinal; // Armazena o valor para o banco
    } else {
        input.value = ''; // Limpa o input se não houver valor
        input.dataset.valorBanco = ''; // Limpa o valor para o banco
    }
}

const inputsMoeda = document.querySelectorAll('.valor-input');
inputsMoeda.forEach(input => {
    input.addEventListener('input', () => {
        formatarMoeda(input);
    });

    // Garante que a máscara seja aplicada ao carregar a página
    formatarMoeda(input);
});

/**
 * escolha to tipo de pix
 */
