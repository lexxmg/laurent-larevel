<div class="button-container">
  <button 
    class="button-container__btn button-container__btn-js"
    id="{{$id}}"
    data-out="{{ $out }}"
    data-stat="{{ $stat }}"
    data-type="{{ $type }}"
    data-mode="{{ $mode }}"
    data-laurent-id="{{ $laurent_id }}"
    @if (!$laurentOn)
        disabled
    @endif
    aria-label="text">
  </button>

  <span class="button-container__text">{{ $name }}</span>
</div>