@props(['label' => null, 'rows' => 3, 'placeholder' => null])

<div class="form-group px-0" >
  @if ( $label !== null )
    <label for="description" class="form-label mb-0" >
      <strong>{{ $label }}</strong>
    </label>
  @endif
  <div class="input-group" >
    <textarea class="form-control py-1 resize-none" id="description" rows="{{ $rows }}" placeholder="{{ $placeholder ?? __('Type your text here ...') }}" aria-describedby="helper-text" ></textarea>
  </div>
  <div class="form-text" id="helper-text" >
    <span>Example help text goes here.</span>
  </div>
</div>

@push('styles')
  <style>
    .resize-none {
      resize: none;
    }
  </style>
@endpush
