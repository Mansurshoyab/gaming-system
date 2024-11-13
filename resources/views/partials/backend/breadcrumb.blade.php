@props(['module' => 'Sample Page', 'breadcrumb' => [] ])

<section class="page-header d-sm-flex justify-content-between aligh-items-center mb-5" >
  <h4 class="page-title" >{{ $module }}</h4>
  <ul class="breadcrumbs" >
    <li class="nav-home" >
      <a href="{{ route('admin.dashboard') }}" >
        <i class="fas fa-home"></i>
      </a>
    </li>
    <li class="separator" >
      <i class="fas fa-arrow-right" ></i>
    </li>
    @foreach ($breadcrumbs as $breadcrumb)
      @if ($loop->last)
        <li class="nav-item" aria-current="page" >
          <span>{{ $breadcrumb['title'] }}</span>
        </li>
      @else
        <li class="breadcrumb-item" >
          <a href="{{ $breadcrumb['route'] !== null ? $breadcrumb['route'] : 'javascript:void(0)' }}" >{{ $breadcrumb['title'] }}</a>
        </li>
        <li class="separator" >
          <i class="fas fa-arrow-right" ></i>
        </li>
      @endif
    @endforeach
  </ul>
</section>
