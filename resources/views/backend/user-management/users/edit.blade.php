<x-backend-layout :page="__('Edit User')" >

  @push('breadcrumb')
    <x-backend-breadcrumb :module="__('User Management')" :breadcrumbs="[['title' => 'Users', 'route' => 'users.index'], ['title' => 'Edit']]" />
  @endpush

  <x-base-section :class="__('col-sm-10 col-md-8 col-lg-6 offset-sm-1 offset-md-2 offset-lg-3')" >
    <x-form-design :action="route('users.update', $user->id)" :spoof="__('put')" >
      <x-card-design :header="__('Edit User')" >
        <div class="row g-3" >
          <div class="col-6" >
            <x-form-input :label="__('First Name')" :type="__('text')" :name="__('firstname')" :value="$user->firstname" :count="true" :max="__(50)" :required="true" />
          </div>
          <div class="col-6" >
            <x-form-input :label="__('Last Name')" :type="__('text')" :name="__('lastname')" :value="$user->lastname" :count="true" :max="__(50)" />
          </div>
          <div class="col-6" >
            <x-form-input :label="__('Email Address')" :type="__('email')" :name="__('email')" :value="$user->email" :count="true" :max="__(100)" :required="true" />
          </div>
          <div class="col-6" >
            <x-form-input :label="__('Cell Phone')" :type="__('tel')" :name="__('phone')" :value="$user->phone" :count="true" :max="__(19)" :required="true" />
          </div>
          <div class="col-6" >
            <x-form-select :label="__('User Role')" :name="__('role_id')" :options="$roles" :value="$user->role_id" />
          </div>
          <div class="col-6" >
            <x-form-enum :label="__('Status')" :name="__('status')" :options="$approval" :value="$user->status" />
          </div>
        </div>
        <x-slot name="footer" >
          <div class="row" >
            <div class="col d-grid" >
              <x-form-discard :route="route('users.index')" :icon="__('arrow-left')" />
            </div>
            <div class="col d-grid" >
              <x-form-button :type="__('submit')" :icon="__('check')" :label="__('Update')" :theme="__('success')" />
            </div>
          </div>
        </x-slot>
      </x-card-design>
    </x-form-design>
  </x-base-section>

  @push('scripts')
  @endpush

</x-backend-layout>
