<x-backend-layout :page="__('Add New User')" >

  @push('breadcrumb')
    <x-backend-breadcrumb :module="__('User Management')" :breadcrumbs="[['title' => 'Users', 'route' => 'users.index'], ['title' => 'Add']]" />
  @endpush

  <x-base-section :class="__('col-sm-10 col-md-8 col-lg-6 offset-sm-1 offset-md-2 offset-lg-3')" >
    <x-form-design :action="route('users.store')" >
      <x-card-design :header="__('Add New User')" >
        <div class="row g-3" >
          <div class="col-6" >
            <x-form-input :label="__('First Name')" :type="__('text')" :name="__('firstname')" :count="true" :max="__(50)" :required="true" />
          </div>
          <div class="col-6" >
            <x-form-input :label="__('Last Name')" :type="__('text')" :name="__('lastname')" :count="true" :max="__(50)" />
          </div>
          <div class="col-6" >
            <x-form-input :label="__('Email Address')" :type="__('email')" :name="__('email')" :count="true" :max="__(100)" :required="true" />
          </div>
          <div class="col-6" >
            <x-form-input :label="__('Cell Phone')" :type="__('tel')" :name="__('phone')" :count="true" :max="__(19)" :required="true" />
          </div>
          <div class="col-6" >
            <x-form-input :label="__('Password')" :type="__('password')" :name="__('password')" :required="true" />
          </div>
          <div class="col-6" >
            <x-form-input :label="__('Confirm Password')" :type="__('password')" :name="__('password_confirmation')" :required="true" />
          </div>
          <div class="col-6" >
            <x-form-select :label="__('User Role')" :name="__('role_id')" :options="$roles" />
          </div>
          <div class="col-6" >
            <x-form-enum :label="__('Status')" :name="__('status')" :options="$approval" />
          </div>
        </div>
        <x-slot name="footer" >
          <div class="row" >
            <div class="col d-grid" >
              <x-form-discard :route="route('users.index')" :icon="__('arrow-left')" />
            </div>
            <div class="col d-grid" >
              <x-form-button :type="__('submit')" :icon="__('plus')" :label="__('Create')" :theme="__('primary')" />
            </div>
          </div>
        </x-slot>
      </x-card-design>
    </x-form-design>
  </x-base-section>

  @push('scripts')
  @endpush

</x-backend-layout>
