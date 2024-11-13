<x-backend-layout page="{{ __('Sample Page') }}" >

  @push('styles')
  @endpush

  @push('breadcrumb')
    <x-backend-breadcrumb module="{{ __('Sample Page') }}" :breadcrumbs="[['title' => 'Sample']]" />
  @endpush

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
