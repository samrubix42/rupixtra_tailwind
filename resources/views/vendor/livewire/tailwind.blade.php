@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? "(\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()"
    : '';
@endphp

<div class="flex items-center justify-between w-full h-16 px-3 border-t border-neutral-200">
    {{-- Showing X to Y of Z results --}}
    <p class="pl-2 text-sm text-gray-700">
        Showing <span class="font-medium">{{ $paginator->firstItem() }}</span>
        to <span class="font-medium">{{ $paginator->lastItem() }}</span>
        of <span class="font-medium">{{ $paginator->total() }}</span> results
    </p>

    {{-- Pagination --}}
    @if ($paginator->hasPages())
        <nav>
            <ul class="flex items-center text-sm leading-tight bg-white border divide-x rounded h-9 text-neutral-500 divide-neutral-200 border-neutral-200">
                
                {{-- Previous Page --}}
                <li class="h-full">
                    @if ($paginator->onFirstPage())
                        <span class="relative inline-flex items-center h-full px-3 ml-0 rounded-l text-neutral-400 cursor-default">
                            Previous
                        </span>
                    @else
                        <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" 
                                x-on:click="{{ $scrollIntoViewJsSnippet }}" 
                                class="relative inline-flex items-center h-full px-3 ml-0 rounded-l group hover:text-neutral-900">
                            Previous
                        </button>
                    @endif
                </li>

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="hidden h-full md:block">
                            <div class="relative inline-flex items-center h-full px-2.5 group">
                                {{ $element }}
                            </div>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            <li wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}" class="hidden h-full md:block">
                                @if ($page == $paginator->currentPage())
                                    <span class="relative inline-flex items-center h-full px-3 text-neutral-900 bg-gray-50 font-medium">
                                        {{ $page }}
                                        <span class="box-content absolute bottom-0 left-0 w-full h-px -mx-px translate-y-px border-l border-r bg-neutral-900 border-neutral-900"></span>
                                    </span>
                                @else
                                    <button type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" 
                                            x-on:click="{{ $scrollIntoViewJsSnippet }}" 
                                            class="relative inline-flex items-center h-full px-3 group hover:text-neutral-900">
                                        {{ $page }}
                                        <span class="box-content absolute bottom-0 w-0 h-px -mx-px duration-200 ease-out translate-y-px border-transparent bg-neutral-900 group-hover:border-l group-hover:border-r group-hover:border-neutral-900 left-1/2 group-hover:left-0 group-hover:w-full"></span>
                                    </button>
                                @endif
                            </li>
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page --}}
                <li class="h-full">
                    @if ($paginator->hasMorePages())
                        <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" 
                                x-on:click="{{ $scrollIntoViewJsSnippet }}" 
                                class="relative inline-flex items-center h-full px-3 rounded-r group hover:text-neutral-900">
                            Next
                        </button>
                    @else
                        <span class="relative inline-flex items-center h-full px-3 rounded-r text-neutral-400 cursor-default">
                            Next
                        </span>
                    @endif
                </li>
            </ul>
        </nav>
    @endif
</div>