<x-backend-layout :page="__('Contact Page')" >

    @push('breadcrumb')
      <x-backend-breadcrumb :module="__('Contact Page')" :breadcrumbs="[['title' => 'Contact']]" />
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
          <x-form-design :action="route('company.contact.update', $company->id)" :spoof="__('put')" >
            <x-card-design :header="__('Update company Contact')" >
              <div class="row g-3" >
                <div class="col-12" >
                  <x-form-input :label="__('Email')" :type="__('text')" :name="__('email')" :value="$company->email" :check="false" :count="true" :max="__(25)" :required="true" />
                </div>
                <div class="col-12" >
                  <x-form-input :label="__('Phone')" :type="__('text')" :name="__('phone')" :value="$company->phone" :check="false" :count="true" :max="__(25)" :required="true" />
                </div>
                <div class="col-12" >
                  <x-form-input :label="__('Hotline')" :type="__('text')" :name="__('hotline')" :value="$company->hotline" :check="false" :count="true" :max="__(8)" :required="true" />
                </div>
              </div>
              <x-slot name="footer" >
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
  