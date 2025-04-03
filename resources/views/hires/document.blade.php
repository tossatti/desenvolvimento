@extends('layouts.documents')

@section('content')
    <div class="header">
        <img src="{{ asset('images/mekaiso3.png') }}" alt="Logotipo Mekaiso" class="logo">
    </div>
    <div class="container">
        <div class="justificado" style="text-align: right;">
            CONTRATO DE PRESTAÇÃO DE SERVIÇO QUE ENTRE SI FAZEM A <br>
            CONTRATANTE: MEKA ENGENHARIA LTDA E <br>
            CONTRATADOS: {{ $hire->contratante }} <br>
            SOB REGIME DE PRESTAÇÃO DE SERVIÇO COM FORNECIMENTO DE MÃO DE OBRA 

        </div>

        <div class="justificado" style="text-indent: 2em;">
            Pelo presente instrumento particular de um lado, MEKA ENGENHARIA LTDA inscrita no CNPJ sob o nº 08.812.617/0001-13, com sede situada na Avenida Abunã, 2974, sala 03, Bairro Liberdade, CEP 79.803-888, Porto Velho/RO neste ato representada pelo seu sócio MARCOS ROGÉRIO MESQUITA DE PAULA, CPF 717.117.406-91, residente na rua Eduardo Lima e Silva, 1794, Bairro Agenor de Carvalho, CEP 76.820-372, Porto Velho/RO, doravante denominada CONTRATANTE e, de outro lado, {{ $hire->contratante }}, Inscrito sob o CNPJ/CPF: {{ $hire->cnpj }} doravante denominados CONTRATADOS, abaixo assinados, têm entre si justo e convencionado o seguinte:
        </div>

        <h6>CLÁUSULA 1 - DO OBJETO</h6>

        <div class="justificado" style="text-indent: 2em;">
            1.1. O presente contrato tem como objeto a prestação de serviços de encarregado pela obra de Construção do Centro de Atendimento Socioeducativo - CASE na Rua Iranir Gadelha, S/N, Bairro Escola de Polícia.
        </div>

        <div class="justificado" style="text-indent: 2em;">
            Parágrafo único: Os serviços serão prestados em conformidade com a legislação vigente e seguirão o planejamento da obra.
        </div>

        <h6>CLÁUSULA 2 - DO PRAZO</h6>

        <div class="justificado" style="text-indent: 2em;">
            2.1. O contratado&nbsp;se compromete a prestar seus serviços de forma a cumprir os horários determinados pela empresa (segunda-feira a sexta-feira das 07:30 as 17:30), o prazo desta prestação será de 5 (cinco) dias a partir de 07 de janeiro de 2025 a 07 de abril de 2025, tendo assim sua renovação automática ao fim do contrato caso não haja disposição contrária.
        </div>

        <h6>CLÁUSULA 3 - DOS RECURSOS</h6>

        <div class="justificado" style="text-indent: 2em;">
            3.1. O
            CONTRATANTE compromete-se a disponibilizar todos os recursos materiais, humanos e técnicos necessários para a execução dos serviços objeto deste contrato.
        </div>

        <div class="justificado" style="text-indent: 2em;">
            3.2.&nbsp; Os CONTRATADOS se comprometem a fornecer todos os equipamentos necessários para execução dos serviços como também todos os equipamentos de segurança individual e se responsabilizam por qualquer transporte itinerante ocorrido com o mesmo.
        </div>

        <h6>CLÁUSULA 4 - DOS VALORES</h6>

        <div class="justificado" style="text-indent: 2em;">
            4.1. O contratante pagará à contratado o valor de diária de R$150,00 e totalizando uma de R$750,00 (Setecentos e cinquenta reais) mediante pagamento ao final da prestação do serviço.
        </div>

        <div class="justificado" style="text-indent: 2em;">
            Os pagamentos serão efetuados em conta bancária indicada pelos contratados e conforme medição realizada entre ambas as partes.
        </div>

        <h6>CLÁUSULA 5 - DAS OBRIGAÇÕES DO CONTRATADO</h6>

        <div class="justificado" style="text-indent: 2em;">
            O CONTRATADO deverá exercer as funções de pedreiro conforme Programa de Gerenciamento de Riscos da empresa. Dentre as funções ele pode:
        </div>

        <div class="justificado" style="margin-left: 20px;">
            ●&nbsp;&nbsp;&nbsp;&nbsp;Organizam e preparam o local de trabalho na obra, aferem os níveis do fundo da vala, constroem e montam poços de visita, elementos de concreto armado ou de, dão acabamento nas ligações, efetuar o acabamento na massa asfáltica, podem montar escoramentos de valas, pode armar e desmontar andaimes de madeira ou metálicos para a execução da obra desejada, constroem fundações e estruturas de alvenaria, aplicam revestimentos e contrapisos, podem trabalhar em fachada de edifícios.
        </div>

        <div class="justificado" style="text-indent: 2em;">
            E, por estarem assim justas e contratadas, as partes assinam o presente instrumento em duas vias de igual teor e forma, na presença de duas testemunhas, para que produza os seus efeitos legais.
        </div>

    </div>
    
@endsection
