@props(['type' => 'button', 'theme' => 'primary', 'icon' => false, 'name' => 'save', 'label' => 'Button'])

<button type="{{ $type }}" class="btn btn-{{ $theme }}" >
  @if ( $icon !== false )
    <i class="fas fa-{{ $name }}" ></i>
  @endif
  <strong class="ms-1" >{{ $label }}</strong>
</button>
