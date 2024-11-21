@props(['route' => null, 'theme' => 'info', 'class' => 'py-1', 'icon' => null, 'label' => 'Discard'])

<a href="{{ $route !== null ? $route : 'javascript:void(0);' }}" class="btn btn-{{ $theme }}" @class([$class]) role="button" >
  @if ( $icon !== null )
    <i class="fas fa-{{ $icon }}" ></i>
  @endif
  <strong @if ( $icon !== null ) class="ms-1" @endif >{{ $label }}</strong>
</a>
