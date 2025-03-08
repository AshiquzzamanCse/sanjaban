@if ($paginator->hasPages())

    <style>
        .pagination {
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        .pagination li {
            padding: 10px;
            border: 1px solid #c1c1c1;
        }

        .page-link {
            position: relative;
            display: block;
            padding: 0rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #000000;
            background-color: transparent;
            border: none;
            font-size: 14px;
        }
        .page-item.disabled .page-link {
            background-color: transparent;
        }

        .page-item.active {
            background-color: #ef373e;
            border: 1px solid #ef373e;
        }

        .page-item.active a {
            color: #000000;
        }
    </style>
    <nav aria-label="Page Navigation">

        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled page-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a class="page-link" href="javascript:void();">
                        <i class="fas fa-angle-left"></i> </a>
                    {{-- <a class="page-link" href="#"><i class="fas fa-angle-left"></i> Prev</a> --}}
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev"
                        aria-label="@lang('pagination.previous')"><i class="fas fa-angle-left"></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">

                                <a class="page-link active" href="{{ $url }}">{{ $page }}</a>
                                {{-- <span>{{ $page }}</span> --}}

                            </li>
                        @else
                            <li class="page-item"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link fw-bold" rel="next"
                        aria-label="@lang('pagination.next')"> <i class="fas fa-angle-right"></i></a>
                </li>
            @else
                <li class="disabled page-item" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a class="page-link fw-bold" href="javascript:void();"> <i class="fas fa-angle-right"></i></a>
                </li>
            @endif

        </ul>
    </nav>
@endif




{{-- <nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i> Prev</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">4</a></li>
        <li class="page-item"><a class="page-link" href="#">Next <i class="fas fa-angle-right"></i></a></li>
    </ul>
</nav> --}}
