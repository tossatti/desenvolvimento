@component('mail::message')
# Redefinição de Senha

Você está recebendo este e-mail porque solicitou a redefinição da sua senha.

Clique no botão abaixo para definir uma nova senha:

@component('mail::button', ['url' => $resetLink])
Redefinir Senha
@endcomponent

Este link para redefinição de senha expirará em 5 minutos.

Se você não solicitou a redefinição de senha, nenhuma ação adicional é necessária.

Obrigado,<br>
{{ config('app.name') }}
@endcomponent