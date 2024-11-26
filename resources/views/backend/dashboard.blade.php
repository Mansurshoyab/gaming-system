<x-backend-layout :page="__('Admin Dashboard')" >

  @push('breadcrumb')
    <x-backend-breadcrumb :module="__('Dashboard')" :breadcrumbs="[['title' => 'Dashboard', 'route' => route('admin.dashboard')], ['title' => 'Analytic']]" />
  @endpush

  <x-base-section>
    <div class="card" >
      <div class="d-flex align-items-end row" >
        <div class="col-sm-8" >
          <div class="card-body" >
            <h5 class="card-title text-primary" >
              <span>{{ __('Greetings') }}</span>
              <strong>{{ auth()->user()->firstname . ' ' . auth()->user()->lastname . '!' }}</strong>
              <span>🚀</span>
            </h5>
            <p class="mb-2" style="font-size: 1rem !important;" >
              <span>{{ __('Welcome to Casino King!') }}</span>
              <span>{{ __('Take charge to') }}</span>
              <span class="fw-bold" >{{ __('oversee, control, and elevate performance!') }}</span>
              <span>{{ __('Your passion drives our success as we reach new heights together.') }}</span>
              <span>{{ __('We\'re thrilled to have you lead this exciting journey at Casino King, where each decision makes a difference.') }}</span>
            </p>
          </div>
        </div>
        <div class="col-sm-4 text-center text-sm-left" >
          <div class="card-body pb-0 px-0 px-md-4" >
            <img src="{{ asset('images/others/man-with-laptop-light.png') }}" height="120" alt="View Badge User" />
          </div>
        </div>
      </div>
    </div>
  </x-base-section>

  <hr class="mb-5" >

  <section class="row" >
    @foreach ($widgets as $item)
      <div class="col-6 col-sm-6 col-md-3" >
        <a href="{{ $item['href'] ?: 'javascript:void(0);' }}" >
          <div class="card card-stats card-round" >
            <div class="card-body" >
              <div class="row align-items-center" >
                <div class="col-icon" >
                  <div class="icon-big text-center icon-{{ $item['theme'] ?: 'primary' }} bubble-shadow-small" >
                    <i class="fas fa-{{ $item['icon'] ?: 'stream' }}"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0" >
                  <div class="numbers" >
                    <p class="card-category" >{{ ucwords($item['label']) ?: 'Widget Title' }}</p>
                    <h4 class="card-title" >{{ $item['data'] ?: 0 }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    @endforeach
  </section>

  @push('scripts')
  @endpush

</x-backend-layout>
