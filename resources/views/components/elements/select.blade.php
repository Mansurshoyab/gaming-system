@props([ 'label' => null, 'name', 'options' => [], 'value' => null, 'required' => false, 'disable' => false ])

@php
  use Illuminate\Support\Str;
@endphp

<div class="form-group p-0">
  @if ($label !== null)
    <label for="{{ Str::camel($name) }}" class="form-label mb-0">
      <strong>{{ $label }}</strong>
    </label>
  @endif
  <div class="input-group">
    <select name="{{ $name }}" class="form-select" id="{{ Str::camel($name) }}" aria-label="{{ Str::kebab($name) }}"
        @if ($required !== false) required @endif
        @if ($disable !== false) disabled @endif>
      <option value="" selected disabled>{{ __('Choose One') }}</option>
      @if (!empty($options))
        @foreach ($options as $item)
          <option value="{{ $item->id }}" @if ($value !== null && $value == $item->id) selected @endif >
            {{ $item->title ?? $item->name }}
          </option>
        @endforeach
      @endif
    </select>
  </div>
</div>
