@if ($paginator->hasPages())
<div class="pagination-block">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    {{-- --}}
    @else
    <a class="next page-numbers" href="{{ $paginator->previousPageUrl() }}"><i class="ti ti-arrow-left"></i></a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <span class="page-numbers current">{{$element}}</span>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <span class="page-numbers current">{{$page}}</span>
    @else
    <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}"><i class="ti ti-arrow-right"></i></a>
    @else
    @endif
</div>
@endif