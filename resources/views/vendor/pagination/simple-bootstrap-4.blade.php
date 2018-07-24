@if ($paginator->hasPages())
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        
    @else
        <a class="btn btn-primary float-left" href="{{ $paginator->previousPageUrl() }}" rel="prev">&larr; Posts Recientes</a>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a class="btn btn-primary float-right" href="{{ $paginator->nextPageUrl() }}" rel="next">Posts Anteriores &rarr;</a>
    @else
        
    @endif
@endif

