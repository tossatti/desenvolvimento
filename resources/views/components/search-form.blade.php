
@props(['action'])

<form method="GET" action="{{ $action }}" class="mb-4" data-search="true">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Pesquisar..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
    </div>
</form>