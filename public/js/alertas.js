document.addEventListener('DOMContentLoaded', function() {
    // Lógica para confirmação de exclusão (SweetAlert)
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.dataset.id;
            const deleteRoute = this.dataset.route;
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            Swal.fire({
                title: 'Tem certeza?',
                text: "Você não poderá reverter isso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, deletar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = deleteRoute;

                    const csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_token';
                    csrfInput.value = csrfToken;

                    const methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'DELETE';

                    form.appendChild(csrfInput);
                    form.appendChild(methodInput);

                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    });

    // Lógica para mensagem de sucesso (SweetAlert)
    let successMessage = document.querySelector('meta[name="success-message"]')?.getAttribute('content');
    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: successMessage,
            timer: 2000,
            showConfirmButton: false
        });
    }

    // Lógica para mensagem de erro (SweetAlert)
    let errorMessage = document.querySelector('meta[name="error-message"]')?.getAttribute('content');
    if (errorMessage) {
        Swal.fire({
            icon: 'error',
            title: 'Erro!',
            text: errorMessage,
            // timer: 3000, // Opcional: tempo para desaparecer
            // showConfirmButton: false // Opcional: esconde o botão
        });
    }
});