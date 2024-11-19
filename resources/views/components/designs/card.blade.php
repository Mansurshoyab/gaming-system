@props(['class' => null, 'header' => null, 'tool' => null, 'icon' => 'ellipsis-v', 'dropdowns' => [], 'body' => null, 'footer' => null])

<div class="card" >
  @if ( $header )
    <div class="card-header py-1" >
      <div class="d-flex justify-content-between align-items-center" >
        <h4 class="card-title" >{{ $header }}</h4>
        @if ( $tool )
          <div class="dropdown hidden-caret" @class([$tool]) >
            <a href="javascript:void(0);" class="btn btn-icon btn-round btn-card dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
              <i class="fas fa-{{ $icon }}" ></i>
            </a>
            <ul class="dropdown-menu fadeIn py-1" >
              @foreach ($dropdowns as $item)
                <li>
                  <a class="dropdown-item py-2" href="{{ $item['route'] ?? 'javascript:void(0);' }}">
                    <i class="fas fa-{{ $item['icon'] }}" style="width: 1.5rem;"></i>
                    <span>{{ __($item['label']) }}</span>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        @endif
      </div>
    </div>
  @endif
  <div class="card-body" @class([$body]) >
    {{ $slot }}
  </div>
  @if ( $footer )
    <div class="card-footer" >
      {{ $footer }}
    </div>
  @endif
</div>
