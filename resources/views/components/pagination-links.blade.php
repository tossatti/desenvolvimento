{{-- resources/views/components/pagination-links.blade.php --}}

@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            {{-- Mostrar as duas primeiras páginas --}}
            @for ($i = 1; $i <= min(2, $paginator->lastPage()); $i++)
                <li class="page-item {{ $paginator->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            {{-- Mostrar três pontos antes da página atual --}}
            @if ($paginator->lastPage() > 4 && $paginator->currentPage() > 3)
                <li class="page-item disabled">
                    <span class="page-link">...</span>
                </li>
            @endif

            {{-- Mostrar a página atual (se não for uma das duas primeiras ou últimas) --}}
            @if ($paginator->lastPage() > 4 && $paginator->currentPage() > 2 && $paginator->currentPage() < $paginator->lastPage() - 1)
                <li class="page-item active">
                    <a class="page-link" href="{{ $paginator->url($paginator->currentPage()) }}">{{ $paginator->currentPage() }}</a>
                </li>
            @endif

            {{-- Mostrar três pontos após a página atual --}}
            @if ($paginator->lastPage() > 4 && $paginator->currentPage() < $paginator->lastPage() - 2)
                <li class="page-item disabled">
                    <span class="page-link">...</span>
                </li>
            @endif

            {{-- Mostrar as duas últimas páginas --}}
            @if ($paginator->lastPage() > 2)
                @for ($i = max(3, $paginator->lastPage() - 1); $i <= $paginator->lastPage(); $i++)
                    <li class="page-item {{ $paginator->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
            @endif

            <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
@endif