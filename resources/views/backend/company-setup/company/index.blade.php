<x-backend-layout :page="__('Sample Page')" >

@push('breadcrumb')
    <x-backend-breadcrumb :module="__('Company Setup')" :breadcrumbs="[['title' => 'Company', 'route' => 'company.index'], ['title' => 'Setup']]" />
@endpush

<x-base-section>
  <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist" >
    <li class="nav-item" role="presentation" >
      <button class="nav-link py-1 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" >
          <span>{{ __('Home') }}</span>
      </button>
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
            <x-form-design :spoof="__('put')" >
              <x-card-design :header="__('Update company')" >
                <div class="row g-3" >
                  <div class="col-12" >
                    <x-form-input :label="__('Name')" :type="__('text')" :name="__('name')" :value="$company->name" :check="true" :count="true" :max="__(25)" :required="true" />
                  </div>
                  <div class="col-12" >
                    <x-form-textarea :label="__('Description')" :name="__('description')" :value="$company->description" :rows="__('4')" :count="true" :max="__(250)" />
                  </div>
                  <div class="col-6" >
                    {{-- <x-form-input :label="__('Slug')" :type="__('text')" :name="__('slug')" :value="$company->slug" :check="true" :count="true" :slug="__('name')" :max="__(25)" :required="true" /> --}}
                  </div>
                  <div class="col-6" >
                    {{-- <x-form-enum :label="__('Status')" :name="__('status')" :options="$status" :required="true" :value="$company->status" /> --}}
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