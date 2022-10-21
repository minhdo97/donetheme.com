@if ($paginator->hasPages())
    <div class="col-lg-12 col-md-12">
    <div class="pagination-area text-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
{{--            <a class="page-numbers disabled prev">--}}
{{--                <i class="bx bx-chevron-left"></i>--}}
{{--            </a>--}}
        @else
            <a class="page-numbers prev" href="{{ $paginator->previousPageUrl() }}"><i class="bx bx-chevron-left"></i></a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="page-numbers disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="page-numbers current" >{{ $page }}</span>
                    @else
                        <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="page-numbers next" href="{{ $paginator->nextPageUrl() }}"> <i class="bx bx-chevron-right"></i>
            </a>
        @else
{{--            <a class="page-numbers next"><i class="bx bx-chevron-right"></i></a>--}}
        @endif
    </div></div>
@endif
