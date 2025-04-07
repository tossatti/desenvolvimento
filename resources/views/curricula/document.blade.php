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
                            Data e assinatura do trabalhador e empregador na ocasião da admissão.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12"
                            style="text-align: center; vertical-align: middle; justify-content: center; align-items: center;">
                            Porto Velho, <?php echo date('d/m/Y'); ?>.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6"
                            style="text-align: center; vertical-align: middle; justify-content: center; align-items: center;">
                            MEKA ENGENHARIA <br>
                            08.812.617/0001-13
                        </td>
                        <td colspan="6"
                            style="text-align: center; vertical-align: middle; justify-content: center; align-items: center;">
                            {{ $user->name }} <br>
                            {{ $user->cpf }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
