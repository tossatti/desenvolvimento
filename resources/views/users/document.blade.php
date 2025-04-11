@extends('layouts.fichaindividual')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-12">
                {{-- cabeçalho --}}
                <table class="table table-bordered">
                    <tr style="height: 24px;">
                        <td rowspan="3" colspan="2"
                            style="text-align: center; vertical-align: middle; justify-content: center; align-items: center;">
                            <img src="{{ asset('images/meka2.png') }}" alt="Imagem da MEKA"
                                style="max-width: 100%; max-height: 100%;">
                        </td>
                        <td class="text-center" colspan="10">
                            <h5>Documento do Usuário {{ $user->name }}</h5>
                        </td>
                    </tr>
                    <tr style="height: 24px;">
                        <td colspan="5" style="font-size: 12px;"><strong>Empregador:</strong><br>Meka Engenharia</td>
                        <td colspan="5" style="font-size: 12px;"><strong>CNPJ:</strong><br>08.812.617/0001-13</td>
                    </tr>
                    <tr style="height: 24px;">
                        <td colspan="3" style="font-size: 12px;"><strong>Endereço:</strong><br>Rua ABUNA</td>
                        <td colspan="2" style="font-size: 12px;"><strong>Número:</strong><br>2974</td>
                        <td colspan="3" style="font-size: 12px;"><strong>Complemento:</strong><br>SALA 03</td>
                        <td colspan="3" style="font-size: 12px;"><strong>Bairro:</strong><br>Liberdade</td>
                    </tr>
                    {{-- cabeçalho --}}
                    {{-- dados do colaborador --}}
                    <tr style="height: 24px;">
                        <td rowspan="3" colspan="2"
                            style="text-align: center; vertical-align: middle; justify-content: center; align-items: center;">
                            <img src="{{ asset('images/3x4.jpg') }}" alt="Imagem do colaborador"
                                style="max-width: 100%; max-height: 100%;">
                        <td colspan="1" style="font-size: 12px;"><strong>Código:</strong><br>{{ $user->id }}</td>
                        <td colspan="1" style="font-size: 12px;"><strong>Contrato:</strong><br>{{ $user->id }}
                        </td>
                        <td colspan="6" style="font-size: 12px;"><strong>Nome do(a)
                                trabalhador(a):</strong><br>{{ $user->name }}
                        </td>
                        <td colspan="2" style="font-size: 12px;"><strong>Matrícula
                                e-social:</strong><br>{{ $esocial->numero }}</td>
                        </td>
                    <tr>
                        <td rowspan="2" style="width: 10px; text-align: center; vertical-align: middle;"
                            class="bg-secondary">
                            <span
                                style="display: inline-block; transform: rotate(270deg); white-space: nowrap; font-size: 12px"><strong>Filiação</strong></span>
                        </td>
                        <td colspan="10" style="font-size: 12px;"><strong>Nome do pai:</strong><br>Meka Engenharia
                        </td>
                    </tr>
                    <tr style="height: 24px;">
                        <td colspan="10" style="font-size: 12px;"><strong>Nome da mãe:</strong><br>Meka Engenharia
                        </td>
                    </tr>
                    {{-- nascimento --}}
                    <div name="nascimento" id="nascimento">
                        <tr style="height: 24px;">
                            <td rowspan="4" colspan="1"
                                style="width: 10px; text-align: center; vertical-align: middle;" class="bg-secondary">
                                <span
                                    style="display: inline-block; transform: rotate(270deg); white-space: nowrap; font-size: 12px"><strong>Nascimento</strong></span>
                            </td>
                            <td colspan="2" style="font-size: 12px;"><strong>Data de
                                    nascimento:</strong><br>{{ $user->nascimento }} data
                            </td>
                            <td colspan="6" style="font-size: 12px;"><strong>Raça: </strong><br>{{ $user->raca }} raça
                            </td>
                            <td colspan="3" style="font-size: 12px;"><strong>Gênero: </strong><br>{{ $user->genero }}
                                genero
                            </td>
                        </tr>
                        <tr style="height: 24px;">
                            <td colspan="2" style="font-size: 12px;"><strong>Deficiente</strong><br> sim/não</td>
                            <td colspan="6" style="font-size: 12px;"><strong>Tipo de deficiência</strong><br>tipo</td>
                            <td colspan="3" style="font-size: 12px;"><strong>Tipo sanguíneo</strong><br>tipo</td>
                        </tr>
                        <tr style="height: 24px;">
                            <td colspan="8" style="font-size: 12px;">
                                <strong>Naturalidade:</strong><br>{{ $user->naturalidade }}
                            </td>
                            <td colspan="3" style="font-size: 12px;"><strong>Estado</strong><br> Estado</td>
                        </tr>
                        <tr style="height: 24px;">
                            <td colspan="8" style="font-size: 12px;">
                                <strong>Nacionalidade:</strong><br>{{ $user->naturalidade }}
                            </td>
                            <td colspan="3" style="font-size: 12px;"><strong>Chegada ao Brasil</strong><br> data</td>
                        </tr>
                    </div>
                    {{-- nascimento --}}
                    {{-- documentos --}}
                    <div name="documentos" id="documentos">
                        <tr>
                            <td rowspan="5" colspan="1"
                                style="width: 10px; text-align: center; vertical-align: middle;" class="bg-secondary">
                                <span
                                    style="display: inline-block; transform: rotate(270deg); white-space: nowrap; font-size: 12px; "><strong>Documentos</strong></span>
                            </td>
                            <td colspan="2" style="font-size: 12px;"><strong>CPF:</strong><br>{{ $docs->cpf }}</td>
                            <td colspan="2" style="font-size: 12px;"><strong>Identidade:</strong><br>id</td>
                            <td colspan="2" style="font-size: 12px;"><strong>Data da emissão:</strong><br>data</td>
                            <td colspan="2" style="font-size: 12px;"><strong>Órgão/UF:</strong><br>ssp</td>
                            <td colspan="1" style="font-size: 12px;"><strong>CNH:</strong><br>{{ $docs->cnh }}</td>
                            <td colspan="1" style="font-size: 12px;"><strong>Categoria:</strong><br>{{ $docs->catcnh }}
                            </td>
                            <td colspan="1" style="font-size: 12px;"><strong>Validade:</strong><br>{{ $docs->catcnh }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="font-size: 12px;"><strong>CTPS:</strong><br>dado</td>
                            <td colspan="2" style="font-size: 12px;"><strong>Série:</strong><br>dado</td>
                            <td colspan="1" style="font-size: 12px;"><strong>Dígito:</strong><br>dado</td>
                            <td colspan="2" style="font-size: 12px;"><strong>Reservista:</strong><br>dado</td>
                            <td colspan="2" style="font-size: 12px;"><strong>Conta Corrente:</strong><br>dado</td>
                            <td colspan="2" style="font-size: 12px;"><strong>Dígito conta:</strong><br>dado</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="font-size: 12px;"><strong>Título de eleitor:</strong><br>dado</td>
                            <td colspan="2" style="font-size: 12px;"><strong>Zona:</strong><br>dado</td>
                            <td colspan="3" style="font-size: 12px;"><strong>Seção:</strong><br>dado</td>
                            <td colspan="3" style="font-size: 12px;"><strong>Escolaridade:</strong><br>dado</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="font-size: 12px;"><strong>PIS:</strong><br>dado</td>
                            <td colspan="3" style="font-size: 12px;"><strong>Data de cadastramento:</strong><br>dado
                            </td>
                            <td colspan="5" style="font-size: 12px;"><strong>Estado Civil:</strong><br>dado</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="font-size: 12px;"><strong>FGTS:</strong><br>dado</td>
                            <td colspan="3" style="font-size: 12px;"><strong>Data de opção:</strong><br>dado</td>
                            <td colspan="4" style="font-size: 12px;"><strong>Banco depositário de
                                    FGTS:</strong><br>dado
                            </td>
                        </tr>
                    </div>
                    {{-- documentos --}}
                    {{-- endereço --}}
                    <div name="endereço" id="endereço">
                        <tr style="height: 24px;">
                            <td rowspan="3" colspan="1"
                                style="width: 10px; text-align: center; vertical-align: middle;" class="bg-secondary">
                                <span
                                    style="display: inline-block; transform: rotate(270deg); white-space: nowrap; font-size: 12px"><strong>Endereço</strong></span>
                            </td>
                            <td colspan="6" style="font-size: 12px;"><strong>Endereço:</strong><br>dado</td>
                            <td colspan="1" style="font-size: 12px;"><strong>Nº: </strong><br>nº</td>
                            <td colspan="2" style="font-size: 12px;"><strong>Complemento: </strong><br>complemento</td>
                            <td colspan="2" style="font-size: 12px;"><strong>Bairro: </strong><br>Bairro</td>
                        </tr>
                        <tr style="height: 24px;">
                            <td colspan="6" style="font-size: 12px;"><strong>Cidade:</strong><br>cidade</td>
                            <td colspan="1" style="font-size: 12px;"><strong>Estado: </strong><br>estado</td>
                            <td colspan="2" style="font-size: 12px;"><strong>CEP: </strong><br>CEP</td>
                            <td colspan="2" style="font-size: 12px;"><strong>Telefone: </strong><br>Telefone</td>
                        </tr>
                        <tr style="height: 24px;">
                            <td colspan="8" style="font-size: 12px;"><strong>E-mail:</strong><br>email</td>
                            <td colspan="3" style="font-size: 12px;"><strong>Celular: </strong><br>nº</td>
                        </tr>
                    </div>
                    {{-- endereço --}}
                    {{-- contrato --}}
                    <div name="contrato" id="contrato">
                        <tr style="height: 24px;">
                            <td rowspan="5" colspan="1"
                                style="width: 10px; text-align: center; vertical-align: middle;" class="bg-secondary">
                                <span
                                    style="display: inline-block; transform: rotate(270deg); white-space: nowrap; font-size: 12px"><strong>Contrato</strong></span>
                            </td>
                            <td colspan="3" style="font-size: 12px;"><strong>Data de admissão:</strong><br>dados</td>
                            <td colspan="3" style="font-size: 12px;"><strong>Data do registro: </strong><br>dados</td>
                            <td colspan="3" style="font-size: 12px;"><strong>Função: </strong><br>dados</td>
                            <td colspan="2" style="font-size: 12px;"><strong>CBO: </strong><br>dados</td>
                        </tr>
                        <tr style="height: 24px;">
                            <td colspan="2" style="font-size: 12px;"><strong>Salário Inicial:</strong><br>dados</td>
                            <td colspan="1" style="font-size: 12px;"><strong>Forma de pagamento: </strong><br>dados
                            </td>
                            <td colspan="2" style="font-size: 12px;"><strong>Tipo de pagamento: </strong><br>dados</td>
                            <td colspan="2" style="font-size: 12px;"><strong>Insalubridade: </strong><br>dados</td>
                            <td colspan="2" style="font-size: 12px;"><strong>Periculosidade: </strong><br>dados</td>
                            <td colspan="2" style="font-size: 12px;"><strong>Comissão: </strong><br>dados</td>
                        </tr>
                        <tr style="height: 24px;">
                            <td colspan="5" style="font-size: 12px;"><strong>Categoria:</strong><br>dados</td>
                            <td colspan="6" style="font-size: 12px;"><strong>Sindicato: </strong><br>Sindicato</td>
                        </tr>
                        <tr style="height: 24px;">
                            <td colspan="5" style="font-size: 12px;"><strong>Centro de custo:</strong><br>dados</td>
                            <td colspan="6" style="font-size: 12px;"><strong>Localização: </strong><br>Sindicato</td>
                        </tr>
                        <tr style="height: 24px;">
                            <td colspan="11" style="font-size: 12px;"><strong>Localização:</strong><br>dados</td>
                        </tr>
                    </div>
                    {{-- Contrato --}}
                    {{-- rescisão --}}
                    <div name="rescisão" id="rescisão">
                        <tr style="height: 24px;">
                            <td rowspan="2" colspan="1"
                                style="width: 10px; text-align: center; vertical-align: middle;" class="bg-secondary">
                                <span
                                    style="display: inline-block; transform: rotate(270deg); white-space: nowrap; font-size: 12px"><strong>Rescisão</strong></span>
                            </td>
                            <td colspan="2" style="font-size: 12px;"><strong>Data da rescisão:</strong><br>dados</td>
                            <td colspan="2" style="font-size: 12px;"><strong>Aviso prévio: </strong><br>dados</td>
                            <td colspan="2" style="font-size: 12px;"><strong>Saldo FGTS: </strong><br>dados</td>
                            <td colspan="2" style="font-size: 12px;"><strong>Maior remuneração: </strong><br>dados</td>
                            <td colspan="3" style="font-size: 12px;"><strong>Recolheu FGTS na GRRF:</strong><br>dados
                            </td>
                        </tr>
                        <tr style="height: 24px;">
                            <td colspan="11" style="font-size: 12px;"><strong>Causa da rescisão:</strong><br>dados</td>
                        </tr>
                    </div>
                    {{-- rescisão --}}
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-12">
                <table class="table table-borderless">
                    <tr>
                        <td colspan="12"
                            style="text-align: center; vertical-align: middle; justify-content: center; align-items: center;">
                            Data e assinatura do trabalhador e empregador.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12"
                            style="text-align: center; vertical-align: middle; justify-content: center; align-items: center;">
                            Porto Velho,
                            {{ $signatureEmpregador ? \Carbon\Carbon::parse($signatureEmpregador->created_at)->setTimezone('America/Manaus')->format('d/m/Y') : now()->setTimezone('America/Manaus')->format('d/m/Y') }}.
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2" colspan="6"
                            style="text-align: center; vertical-align: middle; justify-content: center; align-items: center;">
                            @if (!$signatureEmpregador)
                                @if (auth()->check() && (str_contains(auth()->user()->name, 'Catiuse') || str_contains(auth()->user()->name, 'Marcos')))
                                    <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal"
                                        data-bs-target="#signatureModalEmpregador">
                                        Assinar
                                    </button>
                                    <br>
                                @endif
                                MEKA ENGENHARIA <br>
                                08.812.617/0001-13
                            @endif

                            @if ($signatureEmpregador)
                                <div class="signature-empregador">
                                    <table class="table table-bordered">
                                        <tr style="height: 24px;">
                                            <td rowspan="2" colspan="1"
                                                style="text-align: center; vertical-align: middle; justify-content: center; align-items: center;">
                                                <img src="{{ asset('images/assinatura.png') }}" width="50"
                                                    height="50" alt="Assinatura do Empregador">
                                            </td>
                                            <td class="text-center" colspan="5">
                                                <p>Assinado por:<strong> {{ $signatureEmpregador->user->name }}</strong>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Data:<strong>
                                                        {{ \Carbon\Carbon::parse($signatureEmpregador->created_at)->setTimezone('America/Manaus')->format('d/m/Y H:i') }}</strong>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @endif
                        </td>
                        <td colspan="6"
                            style="text-align: center; vertical-align: middle; justify-content: center; align-items: center;">
                            @if (!$signatureTrabalhador)
                                @if (auth()->id() === $user->id)
                                    <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal"
                                        data-bs-target="#signatureModalTrabalhador">
                                        Assinar
                                    </button>
                                    <br>
                                @endif
                                {{ $user->name }} <br>
                                {{ $user->cpf }}
                            @endif

                            @if ($signatureTrabalhador)
                                <div class="signature-trabalhador">
                                    <table class="table table-bordered">
                                        <tr style="height: 24px;">
                                            <td rowspan="2" colspan="1"
                                                style="text-align: center; vertical-align: middle; justify-content: center; align-items: center;">
                                                <img src="{{ asset('images/assinatura.png') }} " width="50"
                                                    height="50" alt="Assinatura do Trabalhador">
                                            </td>
                                            <td class="text-center" colspan="5">
                                                <p>Assinado por:<strong> {{ $signatureTrabalhador->user->name }}<strong>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Data:<strong>
                                                        {{ \Carbon\Carbon::parse($signatureTrabalhador->created_at)->setTimezone('America/Manaus')->format('d/m/Y H:i') }}<strong>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    {{-- Modais de Assinatura --}}
    <div class="modal fade" id="signatureModalTrabalhador" tabindex="-1"
        aria-labelledby="signatureModalLabelTrabalhador" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signatureModalLabelTrabalhador">Assinatura do Trabalhador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Para assinar, por favor, digite sua senha.</p>
                    <div class="mb-3">
                        <label for="passwordTrabalhador" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="passwordTrabalhador">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-outline-success"
                            onclick="submitSignature('trabalhador')">Assinar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="signatureModalEmpregador" tabindex="-1" aria-labelledby="signatureModalLabelEmpregador"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signatureModalLabelEmpregador">Assinatura do Empregador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Para assinar como empregador, por favor, digite a senha do usuário autorizado.</p>
                    <div class="mb-3">
                        <label for="passwordEmpregador" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="passwordEmpregador">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-outline-success"
                            onclick="submitSignature('empregador')">Assinar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modais de Assinatura --}}
    <script>
        function submitSignature(tipo) {
            let passwordFieldId = (tipo === 'trabalhador') ? 'passwordTrabalhador' : 'passwordEmpregador';
            let password = document.getElementById(passwordFieldId).value;
            let userId = '{{ $user->id }}'; // ID do usuário logado

            fetch('/assinar-documento', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        user_id: userId,
                        password: password,
                        // tipo_assinatura: tipo,
                        // Os campos abaixo serão preenchidos no backend
                        // nome_assinante: '',
                        // email_assinante: '',
                        // hash_assinatura: '',
                        // data_assinatura: '',
                        // token_verificacao: '',
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Assinatura Realizada!',
                            text: data.message,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro na Assinatura!',
                            text: data.message,
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch((error) => {
                    console.error('Erro:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Ocorreu um erro!',
                        text: 'Ocorreu um erro ao tentar assinar.',
                        confirmButtonText: 'OK'
                    });
                });
        }
    </script>
@endsection
@push('scripts')
    <script src="{{ asset('js/alertas.js') }}"></script>
@endpush
