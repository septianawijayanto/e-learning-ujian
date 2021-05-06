@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
    <div class="flex justify-between flex-1 sm:hidden">
        @if ($paginator->onFirstPage())
        <span class="btn btn-secondary btn-flat"><i class="ni ni-bold-left"></i>
            {!! __('Sebelumnya') !!}
        </span>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-primary btn-flat"><i class="ni ni-bold-left"></i> {!! __('Sebelumnya') !!}
        </a>
        @endif

        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-primary btn-flat">
            {!! __('Selanjutnya') !!}<i class="ni ni-bold-right"></i>
        </a>
        @else
        <span class="btn btn-secondary btn-flat"> {!! __('Selanjutnya') !!}<i class="ni ni-bold-right"></i>
        </span>
        @endif
    </div>

    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
        <div>
            <p class="text-sm text-gray-700 leading-5">
                {!! __('Menampilakn') !!}
                <span class="font-medium">{{ $paginator->firstItem() }}</span>
                {!! __('ke') !!}
                <span class="font-medium">{{ $paginator->lastItem() }}</span>
                {!! __('dari') !!}
                <span class="font-medium">{{ $paginator->total() }}</span>
                {!! __('Total') !!}
            </p>
        </div>
    </div>
</nav>
@endif