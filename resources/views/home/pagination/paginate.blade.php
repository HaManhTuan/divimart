@if ($paginator->hasPages())

                               <div class="text-center pagination p1 ">
                                  <ul>
                                    
                                    @if ($paginator->onFirstPage())
                                        <a href="#"><li class="disabled"><</li></a>
                                    @else
                                        <a href="{{ $paginator->previousPageUrl() }}"><li><</li></a>
                                    @endif
                                    @foreach ($elements as $element)
                                        {{-- "Three Dots" Separator --}}
                                        @if (is_string($element))
                                           
                                              <a href="#"><li class="disabled">{{ $element }}</li></a>
                                        @endif

                                        {{-- Array Of Links --}}
                                        @if (is_array($element))
                                            @foreach ($element as $page => $url)
                                                @if ($page == $paginator->currentPage())
                                                      <a class="is-active"><li>{{ $page }}</li></a>
                                                @else
                                                    
                                                      <a href="{{ $url }}"><li>{{ $page }}</li></a>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                  
                                    @if ($paginator->hasMorePages())
                                        
                                        <a href="{{ $paginator->nextPageUrl() }}"><li>></li></a>
                                    @else
                                          <a href="#"><li class="disabled">></li></a>
                                    @endif
                                  </ul>
                                </div>
@endif
<style>
    .pagination ul li.disabled{
        opacity: 0;
    }
</style>