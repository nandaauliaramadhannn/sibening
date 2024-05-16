{{-- <nav aria-label="pagination-demo">
    <ul class="pagination px-3">
        <li class="page-item">
            <a class="page-link rounded-xs color-black bg-transparent bg-theme shadow-xl border-0" href="#" tabindex="-1" aria-disabled="true"><i class="bi bi-chevron-left"></i></a>
        </li>
        <li class="page-item"><a class="page-link rounded-xs color-black bg-theme shadow-l border-0" href="#">1</a></li>
        <li class="page-item"><a class="page-link rounded-xs color-black bg-theme shadow-l border-0" href="#">2</a></li>
        <li class="page-item active"><a class="page-link rounded-xs bg-highlight shadow-l border-0" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link rounded-xs color-black bg-transparent bg-theme shadow-l border-0" href="#"><i class="bi bi-chevron-right"></i></a>
        </li>
    </ul>
</nav> --}}

@if ($paginator->hasPages())
    <nav aria-label="pagination-demo">
        <ul class="pagination px-3">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a class="page-link rounded-xs bg-highlight shadow-l border-0" aria-hidden="true"><i class="bi bi-chevron-left"></i></a>
                </li>
            @else
                <li class="page-item active">
                    <a class="page-link rounded-xs color-black bg-transparent bg-theme shadow-xl border-0" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="bi bi-chevron-left"></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><a class="page-link rounded-xs bg-highlight shadow-l border-0">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><a class="page-link rounded-xs bg-highlight shadow-l border-0">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link rounded-xs color-black bg-transparent bg-theme shadow-xl border-0" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item active">
                    <a class="page-link rounded-xs color-black bg-theme shadow-l border-0" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="bi bi-chevron-right"></i></a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a class="page-link rounded-xs bg-highlight shadow-l border-0" aria-hidden="true"><i class="bi bi-chevron-right"></i></a>
                </li>
            @endif
        </ul>
    </nav>
@endif
