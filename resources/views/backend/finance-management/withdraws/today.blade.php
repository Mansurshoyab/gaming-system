<x-backend-layout :page="__('Today Withdraws')" >

  @push('breadcrumb')
    <x-backend-breadcrumb :module="__('Finance Management')" :breadcrumbs="[['title' => 'Withdraws', 'route' => route('withdraws.index')], ['title' => 'Today']]" />
  @endpush

  <x-base-section>
    <x-card-design>
      <p>{{ __('Inner page content goes here.') }}</p>
    </x-card-design>
  </x-base-section>

  @push('scripts')
  @endpush

</x-backend-layout>
