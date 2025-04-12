/**
 * Apresentar e ocultar senha
 */
window.togglePassword = function (fieldId, toggleIcon) {
    const field = document.getElementById(fieldId);
    const icon = toggleIcon ? toggleIcon.querySelector('i') : null;

    if (!field || !icon) {
        console.error("Campo ou ícone não encontrado.");
        return;
    }

    const isPassword = field.type === "password";

    field.type = isPassword ? "text" : "password";
    icon.classList.toggle('bi-eye', !isPassword);
    icon.classList.toggle('bi-eye-slash', isPassword);
};

/**
 * Máscaras nos campos de dados de documentos quando html for carregado
 */
function applyMasks(masks) {
    for (const selector in masks) {
        const elements = document.querySelectorAll(selector);
        elements.forEach(element => {
            const mask = new Inputmask(masks[selector]);
            if (element) {
                mask.mask(element);
            }
        });
    }
}

const initialMasks = {
    '#cpf': "999.999.999-99",
    '.cpf': "999.999.999-99",
    '#telefone': "(99) 99999-9999",
    '#cep': "99999-999",
    '#pis': "999.99999.99-9",
    '#titulo': "9999 9999 9999",
    '#cnh': "99999999999",
    '#ctps': "9999999/9999"
};

applyMasks(initialMasks);

// document.addEventListener('DOMContentLoaded', function () {
//     const dependentesSelect = document.getElementById('dependentes');
//     const numeroDependentesDiv = document.getElementById('numeroDependentesDiv');
//     const dependentesContainer = document.getElementById('dependentesContainer');

//     const initialMasks = {
//         '#cpf': "999.999.999-99",
//         '#telefone': "(99) 99999-9999",
//         '#cep': "99999-999",
//         '#pis': "999.99999.99-9",
//         '#titulo': "9999 9999 9999",
//         '#cnh': "99999999999",
//         '#ctps': "9999999/9999"
//     };

//     applyMasks(initialMasks);

//     // dependentes

//     if (dependentesSelect && numeroDependentesDiv && dependentesContainer) {
//         dependentesSelect.addEventListener('change', function () {
//             dependentesContainer.innerHTML = '';
//             numeroDependentesDiv.style.display = this.value == 1 ? 'block' : 'none';
//         });

//         const numeroDependentesInput = document.getElementById('numeroDependentes');
//         if (numeroDependentesInput) {
//             numeroDependentesInput.addEventListener('change', function () {
//                 const quantidade = parseInt(this.value);
//                 dependentesContainer.innerHTML = '';

//                 if (quantidade > 0) {
//                     for (let i = 0; i < quantidade; i++) {
//                         dependentesContainer.innerHTML += `
//                                 <div class="card m-2 dependentes-group">
//                                     <h5 class="card-subtitle mt-2 mb-2 ms-4 text-body-secondary">Dependente ${i + 1}</h5>
//                                     <div class="row row-g3 m-2">
//                                         <div class="form-floating mb-2 col-md-12">
//                                             <input type="text" class="form-control" name="dependentes[${i}][nome]">
//                                             <label for="dependentes[${i}][nome]" class="form-label">Nome</label>
//                                         </div>
//                                         <div class="form-floating mb-3 col-md-6">
//                                             <input type="date" class="form-control" name="dependentes[${i}][dataNascimento]">
//                                             <label for="dependentes[${i}][dataNascimento]" class="form-label">Data de Nascimento</label>
//                                         </div>
//                                         <div class="form-floating mb-3 col-md-6">
//                                             <input type="text" class="form-control dependentes-cpf" name="dependentes[${i}][cpf]">
//                                             <label for="dependentes[${i}][cpf]" class="form-label">CPF</label>
//                                         </div>
//                                     </div>
//                                 </div>
//                             `;
//                     }
//                     applyMasks({ '.dependentes-cpf': "999.999.999-99" });
//                 }
//             });
//         }
//     }
// });

document.addEventListener('DOMContentLoaded', function () {
    const temDependentesSelect = document.getElementById('tem_dependentes');
    const numeroDependentesDiv = document.getElementById('numeroDependentesDiv');
    const dependentesContainer = document.getElementById('dependentesContainer');
    const novosDependentesContainer = document.getElementById('novosDependentesContainer');

    // Controlar a exibição da seção "Quantos?"
    if (temDependentesSelect && numeroDependentesDiv) {
        numeroDependentesDiv.style.display = temDependentesSelect.value == 1 ? 'block' : 'none';
        temDependentesSelect.addEventListener('change', function () {
            numeroDependentesDiv.style.display = this.value == 1 ? 'block' : 'none';
            // Limpar os novos dependentes ao mudar a seleção
            novosDependentesContainer.innerHTML = '';
        });
    }

    const numeroDependentesInput = document.getElementById('numeroDependentes');
    let novoDependenteCounter = 0;
    if (numeroDependentesInput) {
        numeroDependentesInput.addEventListener('change', function () {
            const quantidade = parseInt(this.value);
            novosDependentesContainer.innerHTML = ''; // Limpa os campos de novos dependentes existentes
            novoDependenteCounter = 0; // Reinicia o contador

            if (quantidade > 0) {
                for (let i = 0; i < quantidade; i++) {
                    novosDependentesContainer.innerHTML += `
                        <div class="card m-2 dependentes-group">
                            <h5 class="card-subtitle mt-2 mb-2 ms-4 text-body-secondary">Novo Dependente ${i + 1}</h5>
                            <div class="row row-g3 m-2">
                                <div class="form-floating mb-2 col-md-12">
                                    <input type="text" class="form-control" name="novos_dependentes[${novoDependenteCounter}][name]">
                                    <label for="novos_dependentes[${novoDependenteCounter}][name]" class="form-label">Nome</label>
                                </div>
                                <div class="form-floating mb-3 col-md-6">
                                    <input type="date" class="form-control" name="novos_dependentes[${novoDependenteCounter}][nascimento]">
                                    <label for="novos_dependentes[${novoDependenteCounter}][nascimento]" class="form-label">Data de Nascimento</label>
                                </div>
                                <div class="form-floating mb-3 col-md-6">
                                    <input type="text" class="form-control dependentes-cpf" name="novos_dependentes[${novoDependenteCounter}][cpf]">
                                    <label for="novos_dependentes[${novoDependenteCounter}][cpf]" class="form-label">CPF</label>
                                </div>
                            </div>
                        </div>
                    `;
                    novoDependenteCounter++;
                }
                applyMasks({ '.dependentes-cpf': "999.999.999-99" });
            }
        });
    }
});

/**
 * máscara de moeda
 */
function formatarMoeda(input) {
    const valor = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos

    if (valor) {
        const valorNumerico = parseInt(valor) / 100;
        input.value = valorNumerico.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
        input.dataset.valorOriginal = valorNumerico; // Armazena o valor numérico original
    } else {
        input.value = '';
        input.dataset.valorOriginal = '';
    }
}

function formatarValorParaBanco(valor) {
    if (typeof valor === 'number') {
        return valor.toFixed(2).replace('.', ',');
    }
    return '';
}

const inputsMoeda = document.querySelectorAll('.valor-input');
inputsMoeda.forEach(input => {
    input.addEventListener('input', () => {
        formatarMoeda(input);
    });

    // Garante que a máscara seja aplicada ao carregar a página
    formatarMoeda(input);
    // Exemplo de uso para formatar o valor para o banco de dados:
    // const valorParaBanco = formatarValorParaBanco(input.dataset.valorOriginal);
});

/**
 * não mandar formulário com enter
 */

document.addEventListener('DOMContentLoaded', function () {
    if (window.location.pathname.indexOf('login') === -1) {
        const formularios = document.querySelectorAll('form');

        formularios.forEach(formulario => {
            // Verifica se o formulário tem o atributo data-search="true"
            if (formulario.dataset.search !== 'true') {
                const campos = formulario.querySelectorAll('input');

                campos.forEach(campo => {
                    campo.addEventListener('keydown', function (event) {
                        if (event.key === 'Enter') {
                            event.preventDefault();
                        }
                    });
                });
            }
        });
    }
});

// fechar offcanvas
document.addEventListener('DOMContentLoaded', function () {
    const closeButton = document.getElementById('closeSidebarButton');
    if (closeButton) {
        closeButton.innerHTML = ''; // Limpa o conteúdo padrão do botão
    }
});

// campos do currículo
$(document).ready(function () {
    function toggleDependentFields() {
        const experienciaAnterior = $('#anterior').val();
        const experienciaAnteriorSim = (experienciaAnterior === '1');

        $('.div-dependente').each(function () {
            $(this).toggle(experienciaAnteriorSim);
            $(this).find('input, select').prop('required', experienciaAnteriorSim);
        });

        const indicacao = $('#indicacao').val();
        const indicacaoSim = (indicacao === '1');

        $('#div_quem').toggle(indicacaoSim);
        $('#div_quem').find('input').prop('required', indicacaoSim);
    }

    toggleDependentFields();

    $('#anterior').change(toggleDependentFields);
    $('#indicacao').change(toggleDependentFields);
});

// Mantém o dropdown "Contatos" ativo apenas quando um de seus links está ativo
document.addEventListener('DOMContentLoaded', function () {
    const currentPage = new URL(window.location.href).pathname;
    const navLinks = document.querySelectorAll('.nav-link');
    const contatosDropdown = document.querySelector('.nav-item.dropdown');
    const contatosToggle = contatosDropdown ? contatosDropdown.querySelector('.nav-link.dropdown-toggle') : null;
    const contatosMenu = contatosDropdown ? contatosDropdown.querySelector('.dropdown-menu') : null;
    const contatosMenuItems = contatosMenu ? contatosMenu.querySelectorAll('.dropdown-item') : [];

    let isContatosActive = false;

    contatosMenuItems.forEach(item => {
        const href = new URL(item.getAttribute('href'), window.location.origin).pathname;
        if (href === currentPage) {
            isContatosActive = true;
        }
    });

    navLinks.forEach(link => {
        const href = new URL(link.href, window.location.origin).pathname;

        if (contatosToggle && link === contatosToggle) {
            if (isContatosActive) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        } else if (href === currentPage) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
});
// tooltips
const tooltipTriggerList = document.querySelectorAll('[data-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))



