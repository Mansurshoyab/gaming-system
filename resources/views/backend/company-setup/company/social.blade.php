<x-backend-layout :page="__('Social Media Page')" >

    @push('breadcrumb')
      <x-backend-breadcrumb :module="__('Social Media Page')" :breadcrumbs="[['title' => 'Social Media']]" />
    @endpush

    <x-base-section>
      <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist" >
        <li class="nav-item" role="presentation" >
          <a href="{{ route('company.index') }}" class="nav-link py-1">
            <span>{{ __('Home') }}</span>
          </a>
        </li>
        <li class="nav-item" role="presentation" >
          <a href="{{ route('company.image') }}" class="nav-link py-1">
            <span>{{ __('Images') }}</span>
          </a>
        </li>
        <li class="nav-item" role="presentation" >
          <a href="{{ route('company.social') }}" class="nav-link py-1">
            <span>{{ __('Socal-Media') }}</span>
          </a>
        </li>
        <li class="nav-item" role="presentation" >
          <a href="{{ route('company.contact') }}" class="nav-link py-1">
            <span>{{ __('Contact') }}</span>
          </a>
        </li>
      </ul>
    </x-base-section>
  
    <x-base-section>
      <x-card-design>
        <p>{{ __('Inner page content goes here.') }}</p>
      </x-card-design>
    </x-base-section>
  
    @push('scripts')
    @endpush
  
  </x-backend-layout>
  