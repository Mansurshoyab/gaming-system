@props(['type' => 'button', 'theme' => 'primary', 'class' => 'py-1', 'id' => null, 'disabled' => false, 'icon' => null, 'label' => 'Button'])

<button type="{{ $type }}" class="btn btn-{{ $theme }}" @class([$class]) @if ( $id !== null ) id="{{ $id }}" @endif @disabled($disabled) >
  @if ( $icon !== null )
    <i class="fas fa-{{ $icon }}" ></i>
  @endif
  <strong @if ( $icon !== null ) class="ms-1" @endif >{{ $label }}</strong>
</button>
