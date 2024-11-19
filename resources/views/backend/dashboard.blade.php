<x-backend-layout :page="__('Dashboard')" >

  @push('breadcrumb')
    <x-backend-breadcrumb :module="__('Admin Dashboard')" :breadcrumbs="[['title' => 'Dashboard']]" />
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

  <x-base-section>
    <x-card-design>
      <p>{{ __('Inner page content goes here.') }}</p>
    </x-card-design>
  </x-base-section>

  @push('scripts')
  @endpush

</x-backend-layout>
