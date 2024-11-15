<x-backend-layout page="{{ __('Dashboard') }}" >

  @push('styles')
  @endpush

  @push('breadcrumb')
    <x-backend-breadcrumb module="{{ __('Admin Dashboard') }}" :breadcrumbs="[['title' => 'Dashboard']]" />
  @endpush

  <section class="row" >
    <div class="col-sm-12">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-8">
            <div class="card-body">
              <h5 class="card-title text-primary">
                <span>{{ __('Greetings') }}</span>
                <strong>{{ auth()->user()->firstname . ' ' . auth()->user()->lastname . '!' }}</strong>
                <span>🚀</span>
              </h5>
              <p class="mb-2" style="font-size: 1rem !important;">
                <span>{{ __('Welcome to Casino King!') }}</span>
                <span>{{ __('Take charge to') }}</span>
                <span class="fw-bold">{{ __('oversee, control, and elevate performance!') }}</span>
                <span>{{ __('Your passion drives our success as we reach new heights together.') }}</span>
                <span>{{ __('We\'re thrilled to have you lead this exciting journey at Casino King, where each decision makes a difference.') }}</span>
              </p>
              <x-form-button :icon="true" :name="__('plus')" :label="__('Submit')" />
            </div>
          </div>
          <div class="col-sm-4 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img src="{{ asset('images/others/man-with-laptop-light.png') }}" height="120" alt="View Badge User" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="row" >
    <div class="col-sm-12" >
      <div class="card" >
        <div class="card-body" >
          <p>{{ __('Inner page content goes here.') }}</p>
        </div>
      </div>
    </div>
  </section>

  @push('scripts')
  @endpush

</x-backend-layout>
