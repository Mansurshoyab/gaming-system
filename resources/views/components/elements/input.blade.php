@props([ 'label' => null, 'type' => 'text', 'name', 'required' => false, 'readonly' => false, 'disable' => false, 'value' => null, 'helper' => null, 'count' => false, 'check' => false, 'slug' => null, 'max' => 250 ])

@php
  use Illuminate\Support\Str;
@endphp

<div class="form-group p-0" >
  @if ($label !== null)
    <label for="{{ Str::camel($name) }}" class="form-label mb-0" >
      <strong>{{ $label }}</strong>
    </label>
  @endif
  <div class="input-group">
    @if ($check)
      <div class="input-group-text px-2">
        <input type="checkbox" onclick="toggleReadonly('{{ Str::camel($name) }}')" />
      </div>
    @endif
    <input type="{{ $type }}" name="{{ $name }}" class="form-control py-1" id="{{ Str::camel($name) }}"
      placeholder="{{ $label ? ucwords($label) : __('Type your text here ...') }}" @if ($value !== null) value="{{ $value }}" @endif
      aria-describedby="{{ Str::kebab($name) }}-helper-text" @required($required) @readonly($readonly) @disabled($disable) @if ($max) maxlength="{{ $max }}" @endif
    />
  </div>
  @if ($helper || $count)
    <div class="d-flex justify-content-between align-items-center" id="{{ Str::kebab($name) }}-helper-text">
      @if ($helper)
        <p class="form-text py-0 my-0">
          <span>{{ $helper }}</span>
        </p>
      @endif
      @if ($count)
        <p class="form-text py-0 my-0">
          <span id="{{ Str::camel($name) }}CharCount">0</span> / <span>{{ $max }}</span>
        </p>
      @endif
    </div>
  @endif
</div>

@if ($count || $check || $slug)
  @push('scripts')
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        @if ($count)
          const fieldId = "{{ Str::camel($name) }}";
          const maxChars = {{ $max }};
          const charCountId = document.getElementById(fieldId + "CharCount");
          const field = document.getElementById(fieldId);
          if (field) {
            field.addEventListener("input", function () {
              let charCount = field.value.length;
              if (charCount > maxChars) {
                field.value = field.value.substring(0, maxChars);
                charCount = maxChars;
              }
              if (charCountId) charCountId.textContent = charCount;
            });
          }
        @endif

        @if ($slug)
          const sourceField = document.getElementById("{{ $slug }}");
          const targetField = document.getElementById("{{ Str::camel($name) }}");
          if (sourceField && targetField) {
            sourceField.addEventListener("input", function () {
              const title = sourceField.value;
              const slug = generateSlug(title);
              targetField.value = slug;
            });
          }
          function generateSlug(text) {
            return text.toLowerCase().replace(/[^\w\s-]/g, '').trim().replace(/\s+/g, '-').replace(/-+/g, '-');
          }
        @endif

        @if ($check)
          window.toggleReadonly = function (id) {
            const input = document.getElementById(id);
            if (input) {
              input.readOnly = !input.readOnly;
            }
          };
        @endif
      });
    </script>
  @endpush
@endif
