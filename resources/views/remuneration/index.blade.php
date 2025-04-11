@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Gerenciamento de remunerações</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('remuneration.create') }}" class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                    data-placement="top" title="Cadastrar"><i class="bi bi-plus-square"></i>
                </a>
            </span>
        </div>
        <div class="card-body">
            {{-- pesquisa --}}
            <x-search-form action="{{ route('remuneration.search') }}" />
            {{-- pesquisa --}}
            <x-alert />
            <table class="table table-hover table-striped">
                <thead>
                    <tr class=" text-center">
                        <th scope="col" class="col-2">Função</th>
                        <th scope="col" class="col-2">Salário base</th>
                        <th scope="col" class="col-1">Inss (%)</th>
                        <th scope="col" class="col-2">Adicional de periculosidade (%)</th>
                        <th scope="col" class="col-2">Auxílio alimentação</th>
                        <th scope="col" class="col-1">Auxílio transporte</th>
                        <th scope="col" class="col-2 text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($remunerations as $remuneration)
                        <tr>
                            <td scope="col" class="col-2">{{ $remuneration->role->funcao }}</td>
                            <td scope="col" class="col-2  text-center">
                                {{ 'R$ ' . number_format($remuneration->salario_base, 2, ',', '.') }}</td>
                            <td scope="col" class="col-1 text-center">
                                {{ str_replace('.', ',', str_replace('.00', '', number_format($remuneration->inss, 2))) }}
                            </td>
                            <td scope="col" class="col-2  text-center">
                                {{ str_replace('.00', '', number_format($remuneration->periculosidade, 2)) }}</td>
                            <td scope="col" class="col-2  text-center">
                                {{ 'R$ ' . number_format($remuneration->alimentacao, 2, ',', '.') }}</td>
                            <td scope="col" class="col-1  text-center">
                                {{ 'R$ ' . number_format($remuneration->transporte, 2, ',', '.') }}</td>
                            <td scope="col" class="col-2  text-center">
                                <a href="{{ route('remuneration.edit', ['remuneration' => $remuneration->id]) }}"
                                    class="btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="top"
                                    title="Editar registro"><i class="bi bi-pencil-square"></i>
                                </a>
                                {{-- modal --}}
                                <button type="button" class="btn btn-outline-info btn-sm show-remuneration"
                                    data-id="{{ $remuneration->id }}" data-bs-toggle="modal"
                                    data-bs-target="#remunerationModal" data-toggle="tooltip" data-placement="top"
                                    title="Visualizar registro">
                                    <i class="bi bi-eye"></i>
                                </button>
                                {{-- modal --}}
                                <form method="POST"
                                    action="{{ route('remuneration.destroy', ['remuneration' => $remuneration->id]) }}"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        onclick="return confirm('Tem certeza que deseja apagar este registro?')"
                                        class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top"
                                        title="Excluir registro"><i class="bi bi-eraser"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            <x-pagination-links :paginator="$remunerations" />
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="remunerationModal" tabindex="-1" role="dialog" aria-labelledby="remunerationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="remunerationModalLabel">Detalhes da Remuneração</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Função:</strong> <span id="modal-funcao">{{ $remuneration->role->funcao }}</span></p>
                    <p><strong>Salário Base:</strong> <span id="modal-salario_base">
                            {{ 'R$ ' . number_format($remuneration->salario_base, 2, ',', '.') }}</span></p>
                    <p><strong>Desconto INSS (%):</strong> <span
                            id="modal-inss">{{ str_replace('.', ',', str_replace('.00', '', number_format($remuneration->inss, 2))) }}</span>
                    </p>
                    <p><strong>Adicional de periculosidade (%):</strong> <span
                            id="modal-periculosidade">{{ str_replace('.00', '', number_format($remuneration->periculosidade, 2)) }}</span>
                    </p>
                    <p><strong> Ausílio alimentação:</strong> <span
                            id="modal-alimentacao">{{ 'R$ ' . number_format($remuneration->alimentacao, 2, ',', '.') }}</span>
                    </p>
                    <p><strong>Vale transporte:</strong> <span
                            id="modal-transporte">{{ 'R$ ' . number_format($remuneration->transporte, 2, ',', '.') }}</span>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
    var remunerationModal = new bootstrap.Modal(document.getElementById('remunerationModal'));

    $('.show-remuneration').click(function() {
        console.log('Botão "visualizar" clicado!'); // Adicione esta linha
        var tr = $(this).closest('tr');
        var funcao = tr.find('td:eq(0)').text();
        var salario_base = tr.find('td:eq(1)').text();
        var inss = tr.find('td:eq(2)').text();
        var periculosidade = tr.find('td:eq(3)').text();
        var alimentacao = tr.find('td:eq(4)').text();
        var transporte = tr.find('td:eq(5)').text();

        console.log('Função:', funcao);
        console.log('Salário Base:', salario_base);
        console.log('INSS:', inss);
        console.log('Periculosidade:', periculosidade);
        console.log('Alimentação:', alimentacao);
        console.log('Transporte:', transporte);

        $('#modal-funcao').text(funcao);
        $('#modal-salario_base').text(salario_base);
        $('#modal-inss').text(inss);
        $('#modal-periculosidade').text(periculosidade);
        $('#modal-alimentacao').text(alimentacao);
        $('#modal-transporte').text(transporte);

        remunerationModal.show();
    });
});
    </script>
    {{-- modal --}}
@endsection
