<x-backend-layout :page="__('Sample Page')" >

  @push('breadcrumb')
    <x-backend-breadcrumb :module="__('Sample Page')" :breadcrumbs="[['title' => 'Sample']]" />
  @endpush

  <x-base-section>
    <x-card-design>
      <p>{{ __('Inner page content goes here.') }}</p>
    </x-card-design>
  </x-base-section>

  @push('scripts')
  @endpush

</x-backend-layout>
