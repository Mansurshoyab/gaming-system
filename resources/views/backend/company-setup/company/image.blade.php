<x-backend-layout :page="__('Image Page')" >

    @push('breadcrumb')
      <x-backend-breadcrumb :module="__('Image Page')" :breadcrumbs="[['title' => 'Image']]" />
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
        <x-base-section :class="__('col-sm-10 col-md-8 col-lg-6 offset-sm-1 offset-md-2 offset-lg-3')" >
            <x-form-design :spoof="__('put')">
                <x-card-design :header="__('Update company')">
                    <div class="row g-3">
                        <div class="col-12">
                            <label>{{ __('Logo') }}</label>
                            <div>
                                @if($company->logo)
                                    <img src="{{ asset($company->logo) }}" alt="{{ __('Logo') }}" style="max-height: 100px;" />
                                @else
                                    <span>{{ __('No logo uploaded') }}</span>
                                @endif
                            </div>
                            <input type="file" name="logo" accept="image/*" />
                        </div>
                        <div class="col-12">
                            <label>{{ __('Favicon') }}</label>
                            <div>
                                @if($company->favicon)
                                    <img src="{{ asset($company->favicon) }}" alt="{{ __('Favicon') }}" style="max-height: 50px;" />
                                @else
                                    <span>{{ __('No favicon uploaded') }}</span>
                                @endif
                            </div>
                            <input type="file" name="favicon" accept="image/*" />
                        </div>
                    </div>
                    <x-slot name="footer">
                        <x-form-button :type="__('submit')" :icon="__('check')" :label="__('Update')" :theme="__('success')" />
                    </x-slot>
                </x-card-design>
            </x-form-design>
            
          </x-base-section>
      </x-card-design>
    </x-base-section>
  
    @push('scripts')
    @endpush
  
  </x-backend-layout>