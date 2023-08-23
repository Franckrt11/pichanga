<div>
    @if ($paginator->hasPages())
        @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1)
        <nav>
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">
                            <svg class="mb-1" version="1.1" viewBox="0 0 100 100" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" height="15">
                                <path d="m87.366 15.31v69.39c0 11.348-12.906 17.863-22.046 11.128l-47.063-34.695c-7.4961-5.5208-7.4961-16.734 0-22.267l47.063-34.695c9.14-6.7356 22.046-0.20866 22.046 11.14" style="fill:currentColor"/>
                            </svg>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <button type="button" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="page-link" wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')">
                            <svg class="mb-1" version="1.1" viewBox="0 0 100 100" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" height="15">
                                <path d="m87.366 15.31v69.39c0 11.348-12.906 17.863-22.046 11.128l-47.063-34.695c-7.4961-5.5208-7.4961-16.734 0-22.267l47.063-34.695c9.14-6.7356 22.046-0.20866 22.046 11.14" style="fill:currentColor"/>
                            </svg>
                        </button>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item" wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}"><button type="button" class="page-link" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}</button></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <button type="button" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="page-link" wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">
                            <svg class="mb-1" version="1.1" viewBox="0 0 100 100" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" height="15">
                                <path transform="rotate(180 50 50)" d="m87.366 15.31v69.39c0 11.348-12.906 17.863-22.046 11.128l-47.063-34.695c-7.4961-5.5208-7.4961-16.734 0-22.267l47.063-34.695c9.14-6.7356 22.046-0.20866 22.046 11.14" style="fill:currentColor"/>
                            </svg>
                        </button>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">
                            <svg class="mb-1" version="1.1" viewBox="0 0 100 100" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" height="15">
                                <path transform="rotate(180 50 50)" d="m87.366 15.31v69.39c0 11.348-12.906 17.863-22.046 11.128l-47.063-34.695c-7.4961-5.5208-7.4961-16.734 0-22.267l47.063-34.695c9.14-6.7356 22.046-0.20866 22.046 11.14" style="fill:currentColor"/>
                            </svg>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>
