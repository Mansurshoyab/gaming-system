<x-authorize-layout page="{{ __('Sample Page') }}" >

  @push('styles')
  @endpush

  <section>{{ __('Inner page content goes here.') }}</section>

  @push('scripts')
  @endpush

</x-authorize-layout>
