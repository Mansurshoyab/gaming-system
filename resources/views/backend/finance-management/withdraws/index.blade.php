<x-backend-layout :page="__('Total Withdraws')" >

  @push('breadcrumb')
    <x-backend-breadcrumb :module="__('Finance Management')" :breadcrumbs="[['title' => 'Withdraws', 'route' => route('withdraws.index')], ['title' => 'Total']]" />
  @endpush

  <x-base-section>
    <x-card-design>
      <p>{{ __('Inner page content goes here.') }}</p>
    </x-card-design>
  </x-base-section>

  @push('scripts')
  @endpush

</x-backend-layout>
