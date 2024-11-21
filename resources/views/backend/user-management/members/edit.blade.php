<x-backend-layout page="{{ __('Edit Member') }}" >

  @push('breadcrumb')
    <x-backend-breadcrumb module="{{ __('User Management') }}" :breadcrumbs="[['title' => 'Members', 'route' => 'members.index'], ['title' => 'Edit']]" />
  @endpush

  <x-base-section :class="__('col-sm-10 col-md-8 col-lg-6 offset-sm-1 offset-md-2 offset-lg-3')" >
    <x-form-design :action="route('members.update', $member->id)" :spoof="__('put')">
      <x-card-design :header="__('Edit Member')" >
        <div class="row g-3" >
          <div class="col-6" >
            <x-form-input :label="__('First Name')" :type="__('text')" :name="__('firstname')" :count="true" :max="__(50)" :required="true" :value="$member->firstname" />
          </div>
          <div class="col-6" >
            <x-form-input :label="__('Last Name')" :type="__('text')" :name="__('lastname')" :count="true" :max="__(50)" :value="$member->lastname" />
          </div>
          <div class="col-6" >
            <x-form-input :label="__('Cell Phone')" :type="__('tel')" :name="__('phone')" :count="true" :max="__(19)" :required="true" :value="$member->phone" />
          </div>
          <div class="col-6" >
            <x-form-enum :label="__('Status')" :name="__('status')" :options="$status" :required="true" :value="$member->status" />
          </div>
          <div class="col-12" >
            <x-form-input :label="__('Email Address')" :type="__('email')" :name="__('email')" :count="true" :max="__(100)" :required="true" :value="$member->email" />
          </div>
          <div class="col-6" >
            <x-form-input :label="__('Password')" :type="__('password')" :name="__('password')" />
          </div>
          <div class="col-6" >
            <x-form-input :label="__('Confirm Password')" :type="__('password')" :name="__('password_confirmation')" />
          </div>
        </div>
        <x-slot name="footer" >
          <div class="row" >
            <div class="col d-grid" >
              <x-form-discard :route="route('members.index')" :icon="__('arrow-left')" />
            </div>
            <div class="col d-grid" >
              <x-form-button :type="__('submit')" :icon="__('plus')" :label="__('Update')" :theme="__('primary')" />
            </div>
          </div>
        </x-slot>
      </x-card-design>
    </x-form-design>
  </x-base-section>

  @push('scripts')
  @endpush

</x-backend-layout>
