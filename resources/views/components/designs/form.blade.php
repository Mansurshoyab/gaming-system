@props(['action' => null, 'method' => 'POST', 'class' => null, 'attachment' => false, 'spoof' => null ])

<form action="{{ $action }}" method="{{ $method }}" @class([$class]) @if ( $attachment ) enctype="multipart/form-data" @endif >
  @csrf
  @if(in_array($spoof, ['put', 'patch', 'delete']))
    @method( $spoof )
  @endif
  {{ $slot }}
</form>
