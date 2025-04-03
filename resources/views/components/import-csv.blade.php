<div class="card border-light mt-4 mb-4 shadow">
    <div class="card-header hstack gap-2">
        <span><strong>Importar dados</strong></span>
    </div>
    <div class="card-body">
        <x-alert />
        <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <input type="file" class="form-control" name="{{ $inputId }}" id="{{ $inputId }}" accept=".csv">
                <button type="submit" class="btn btn-outline-success" name="{{ $buttonId }}" id="{{ $buttonId }}">Importar</button>
            </div>
        </form>
    </div>
</div>