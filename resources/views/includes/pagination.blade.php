@if($pagination->total() > $pagination->perPage())
<div class="pagination-div">
    @if($pagination->currentPage() != 1)
    <a href="{{ $pagination->previousPageUrl() }}" class="button-pagination w-inline-block">
      <div class="pagination-text">&lt; Poprzednie</div>
    </a>
    @endif
    @if($pagination->hasMorePages())
    <a href="{{ $pagination->nextPageUrl() }}" class="button-pagination w-inline-block">
      <div class="pagination-text">Następne &gt;</div>
    </a>
    @endif
  </div>
  @endif