@props(['label' => null, 'name', 'rows' => 3, 'placeholder' => null])

<div class="form-group px-0" >
  @if ( $label !== null )
    <label for="{{ snake_to_camel_case($name) ?? normal_to_camel_case($label) }}" class="form-label mb-0" >
      <strong>{{ $label }}</strong>
    </label>
  @endif
  <div class="input-group" >
    <textarea name="{{ $name ?? normal_to_snake_case($label) }}" class="form-control py-1 resize-none" id="{{ snake_to_camel_case($name) ?? normal_to_camel_case($label) }}" rows="{{ $rows }}" placeholder="{{ $placeholder ?? __('Type your text here ...') }}" aria-describedby="{{ snake_to_kebab_case($name) ?? normal_to_kebab_case($label) }}-helper-text" ></textarea>
  </div>
  <div class="form-text" id="{{ snake_to_kebab_case($name) ?? normal_to_kebab_case($label) }}-helper-text" >
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
