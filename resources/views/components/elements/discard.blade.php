@props(['route' => null, 'theme' => 'info', 'classes' => 'py-1', 'icon' => null, 'label' => 'Discard'])

<a href="{{ $route !== null ? $route : 'javascript:void(0);' }}" class="btn btn-{{ $theme }} {{ $classes }}" role="button" >
  @if ( $icon !== null )
    <i class="fas fa-{{ $icon }}" ></i>
  @endif
  <strong @if ( $icon !== null ) class="ms-1" @endif >{{ $label }}</strong>
</a>
