@if ($paginator->hasPages())
    <ul class="pagination" style="text-align: center;">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" style="cursor: not-allowed;"><i class="material-icons">chevron_left</i></li>
        @else
            <li class="waves-effect"><a style="padding:0;" href="{{ $paginator->previousPageUrl() }}"><i class="material-icons">chevron_left</i></a></li>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled">{{ $element }}</li>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" style="cursor: not-allowed;">
                            <a>{{ $page }}</a>
                        </li>
                    @else
                        <li class="waves-effect"><a class="page-link" style="background-color: #e6e6e6;" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="waves-effect"><a style="padding:0;" href="{{ $paginator->nextPageUrl() }}"><i class="material-icons">chevron_right</i></a></li>
        @else
            <li class="disabled" style="cursor: not-allowed;"><i class="material-icons">chevron_right</i></a></li>
        @endif
    </ul>
@endif