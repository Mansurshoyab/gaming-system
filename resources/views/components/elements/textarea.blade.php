@props(['label' => null, 'name', 'rows' => 3, 'placeholder' => null, 'helper' => null, 'count' => false, 'max' => 250])

<div class="form-group px-0">
  @if ($label !== null)
    <label for="{{ snake_to_camel_case($name) ?? normal_to_camel_case($label) }}" class="form-label mb-0">
      <strong>{{ $label }}</strong>
    </label>
  @endif
  <div class="input-group">
    <textarea
      name="{{ $name ?? normal_to_snake_case($label) }}"
      class="form-control py-1 resize-none"
      id="{{ snake_to_camel_case($name) ?? normal_to_camel_case($label) }}"
      rows="{{ $rows }}"
      placeholder="{{ $placeholder ?? __('Type your text here ...') }}"
      aria-describedby="{{ snake_to_kebab_case($name) ?? normal_to_kebab_case($label) }}-helper-text"
    ></textarea>
  </div>
  @if ( $helper !== null || $count !== false)
    <div class="d-flex justify-content-between align-items-center" id="{{ snake_to_kebab_case($name) ?? normal_to_kebab_case($label) }}-helper-text">
      @if ( $helper !== null )
        <p class="form-text py-0 my-0" >
          <span>{{ $helper }}</span>
        </p>
      @endif
      @if ( $count !== false )
        <p class="form-text py-0 my-0" >
          <span id="{{ snake_to_camel_case($name) ?? normal_to_camel_case($label) }}CharCount">0</span> / <span id="maxChar">{{ $max }}</span>
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

@if ( $count !== false )
  @push('scripts')
    <script>
      $(document).ready(function() {
        var textareaId = "{{ snake_to_camel_case($name) ?? normal_to_camel_case($label) }}";
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

