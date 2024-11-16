@props(['label' => null, 'name', 'rows' => 3, 'placeholder' => null, 'required' => false, 'readonly' => false, 'disable' => false, 'value' => null, 'helper' => null, 'count' => false, 'max' => 250])

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
    <textarea
      name="{{ $name }}"
      class="form-control py-1 resize-none"
      id="{{ Str::camel($name) }}"
      rows="{{ $rows }}"
      placeholder="{{ $placeholder ?? __('Type your text here ...') }}"
      aria-describedby="{{ Str::kebab($name) }}-helper-text"
      @if ( $required !== false ) required @endif @if ( $readonly !== false && $disable === false ) readonly @endif @if ( $disable !== false && $readonly === false ) disabled @endif
    >{{ $value }}</textarea>
  </div>
  @if ($helper !== null || $count !== false)
    <div class="d-flex justify-content-between align-items-center" id="{{ Str::kebab($name) }}-helper-text">
      @if ($helper !== null)
        <p class="form-text py-0 my-0">
          <span>{{ $helper }}</span>
        </p>
      @endif
      @if ($count !== false)
        <p class="form-text py-0 my-0">
          <span id="{{ Str::camel($name) }}CharCount">0</span> / <span id="maxChar">{{ $max }}</span>
        </p>
      @endif
    </div>
  @endif
</div>

@push('styles')
  <style>
    .resize-none {
      resize: none;
    }
  </style>
@endpush

@if ($count !== false)
  @push('scripts')
    <script>
      $(document).ready(function() {
        var textareaId = "{{ Str::camel($name) }}";
        var maxChars = {{ $max }};
        var charCountId = "#" + textareaId + "CharCount";
        $('#' + textareaId).on('input', function(e) {
          var charCount = $(this).val().length;
          if (charCount > maxChars) {
            $(this).val($(this).val().substring(0, maxChars));
            charCount = maxChars;
          }
          $(charCountId).text(charCount);
        });
      });
    </script>
  @endpush
@endif
