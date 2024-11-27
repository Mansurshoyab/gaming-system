<x-backend-layout :page="fullname(auth()->user())" >

  @push('breadcrumb')
    <x-backend-breadcrumb :module="__('Profile Management')" :breadcrumbs="[['title' => 'Sample']]" />
  @endpush

  <x-base-section>
    <x-card-design>
      <p>{{ __('Inner page content goes here.') }}</p>
      {{-- {{ $user->profile }} --}}
      {{-- <p>
        <strong>{{ __('Fullname') }}</strong>
        <span>{{ fullname($user) }}</span>
      </p>
      <p>
        <strong>{{ __('Biography') }}</strong>
        <span>{{ $user->profile->biography }}</span>
      </p> --}}
      <p>
        <strong>{{ __('Fullname') }}</strong>
        <span>{{ fullname(auth()->user()) }}</span>
      </p>
      <p>
        <strong>{{ __('Biography') }}</strong>
        <span>{{ auth()->user()->profile->biography }}</span>
      </p>
      <p>
        <strong>{{ __('Gender') }}</strong>
        <span>{{ auth()->user()->profile->gender ?? null }}</span>
      </p>
    </x-card-design>
  </x-base-section>

  @push('scripts')
  @endpush

</x-backend-layout>
