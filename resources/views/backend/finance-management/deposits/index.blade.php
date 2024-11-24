<x-backend-layout :page="__('Total Deposits')" >

  @push('breadcrumb')
    <x-backend-breadcrumb :module="__('Finance Management')" :breadcrumbs="[['title' => 'Deposits', 'route' => route('deposits.index')], ['title' => 'List']]" />
  @endpush

  <x-base-section>
    <x-card-design>
      <p>{{ __('Inner page content goes here.') }}</p>
    </x-card-design>
  </x-base-section>

  @push('scripts')
  @endpush

</x-backend-layout>
