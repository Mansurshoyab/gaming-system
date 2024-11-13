<x-authorize-layout page="{{ __('Sample Page') }}" >

  @push('styles')
  @endpush

  @push('title')
    <div class="text-center mb-8" >
      <h1 class="text-3xl font-bold text-gold" >{{ __('Casino King') }}</h1>
      <p class="text-sm text-gray-400" >{{ __('Play. Win. Earn.') }}</p>
    </div>
  @endpush

  <section class="text-center" >{{ __('Inner page content goes here.') }}</section>

  @push('scripts')
  @endpush

</x-authorize-layout>
