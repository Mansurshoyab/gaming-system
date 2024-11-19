<x-backend-layout page="{{ __('Add New Member') }}" >

    @push('breadcrumb')
      <x-backend-breadcrumb module="{{ __('User Management') }}" :breadcrumbs="[['title' => 'Members', 'route' => 'members.index'], ['title' => 'Add']]" />
    @endpush

    <section class="row" >
      <div class="col-sm-10 col-md-8 col-lg-6 offset-sm-1 offset-md-2 offset-lg-3" >
        <x-form-design :action="route('members.store')" >
          <div class="card" >
            <div class="card-header py-1" >
              <h4 class="card-title" >{{ __('Add New Member') }}</h4>
            </div>
            <div class="card-body" >
              <div class="row g-3" >
                <div class="col-6" >
                  <x-form-input :label="__('First Name')" :type="__('text')" :name="__('firstname')" :count="true" :max="__(50)" :required="true" />
                </div>
                <div class="col-6" >
                  <x-form-input :label="__('Last Name')" :type="__('text')" :name="__('lastname')" :count="true" :max="__(50)" />
                </div>
                <div class="col-6" >
                  <x-form-input :label="__('Cell Phone')" :type="__('tel')" :name="__('phone')" :count="true" :max="__(19)" :required="true" />
                </div>
                <div class="col-6" >
                  <x-form-enum :label="__('Status')" :name="__('status')" :options="$approval" :required="true" />
                </div>
                <div class="col-12" >
                  <x-form-input :label="__('Email Address')" :type="__('email')" :name="__('email')" :count="true" :max="__(100)" :required="true" />
                </div>
                <div class="col-6" >
                  <x-form-input :label="__('Password')" :type="__('password')" :name="__('password')" :required="true" />
                </div>
                <div class="col-6" >
                  <x-form-input :label="__('Confirm Password')" :type="__('password')" :name="__('password_confirmation')" :required="true" />
                </div>
              </div>
            </div>
            <div class="card-footer" >
              <div class="row" >
                <div class="col d-grid" >
                  <x-form-discard :route="route('members.index')" :icon="__('arrow-left')" />
                </div>
                <div class="col d-grid" >
                  <x-form-button :type="__('submit')" :icon="__('plus')" :label="__('Create')" :theme="__('primary')" />
                </div>
              </div>
            </div>
          </div>
        </x-form-design>
      </div>
    </section>

    @push('scripts')
    @endpush

  </x-backend-layout>
