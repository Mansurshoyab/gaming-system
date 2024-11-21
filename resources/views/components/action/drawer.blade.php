@props(['icon' => 'ellipsis-v'])

<div class="card-actions float-end" >
  <div class="dropdown position-relative" >
    <a href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-display="static" >
      <i class="fas fa-{{ $icon }}" ></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end icon-menu rounded-pill" style="padding: 0.4rem 0.425rem; width: 11.05rem;" >
      {{ $slot }}
    </div>
  </div>
</div>

@push('styles')
  <style>
    .icon-menu:before {
      display: none;
    }
  </style>
@endpush
