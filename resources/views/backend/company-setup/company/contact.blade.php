<x-backend-layout :page="__('Contact Page')" >

    @push('breadcrumb')
      <x-backend-breadcrumb :module="__('Contact Page')" :breadcrumbs="[['title' => 'Contact']]" />
    @endpush
  
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
                  <x-form-input :label="__('Phone')" :type="__('text')" :name="__('Phone')" :value="$company->phone" :check="false" :count="true" :max="__(25)" :required="true" />
                </div>
                <div class="col-12" >
                  <x-form-input :label="__('Hotline')" :type="__('text')" :name="__('Hotline')" :value="$company->hotline" :check="false" :count="true" :max="__(25)" :required="true" />
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
  