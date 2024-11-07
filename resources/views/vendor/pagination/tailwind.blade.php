@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center space-x-1">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="flex items-center px-3 py-1 text-neutral-400 dark:text-neutral-600 cursor-not-allowed">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="none">
                    <path d="M15 6L9 12L15 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="flex items-center px-3 py-1 text-gray-700 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="none">
                    <path d="M15 6L9 12L15 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="flex items-center px-3 py-1 text-gray-700 dark:text-gray-300">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="flex items-center px-3 py-1 text-gray-700 dark:text-gray-300 bg-neutral-100 dark:bg-neutral-700 border border-neutral-200 dark:border-neutral-600 rounded">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="flex items-center px-3 py-1 text-gray-700 dark:text-gray-300 bg-white dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-600 rounded hover:bg-neutral-100 dark:hover:bg-neutral-600">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="flex items-center px-3 py-1 text-gray-700 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="none">
                    <path d="M9 6L15 12L9 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        @else
            <span class="flex items-center px-3 py-1 text-neutral-400 dark:text-neutral-600 cursor-not-allowed">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="none">
                    <path d="M9 6L15 12L9 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
        @endif
    </nav>
@endif
