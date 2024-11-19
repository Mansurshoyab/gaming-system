<x-backend-layout :page="__('Add New Role')" >

  @push('breadcrumb')
    <x-backend-breadcrumb :module="__('User Management')" :breadcrumbs="[['title' => 'Roles', 'route' => 'roles.index'], ['title' => 'Add']]" />
  @endpush

  <x-base-section :class="__('col-sm-10 col-md-8 col-lg-6 offset-sm-1 offset-md-2 offset-lg-3')" >
    <x-form-design :action="route('roles.store')" >
      <x-card-design :header="__('Add New Role')" >
        <div class="row g-3" >
          <div class="col-12" >
            <x-form-input :label="__('Title')" :type="__('text')" :name="__('title')" :count="true" :max="__(25)" :required="true" />
          </div>
          <div class="col-12" >
            <x-form-textarea :label="__('Description')" :name="__('description')" :rows="__('4')" :count="true" :max="__(250)" />
          </div>
          <div class="col-6" >
            <x-form-input :label="__('Slug')" :type="__('text')" :name="__('slug')" :check="true" :count="true" :slug="__('title')" :max="__(25)" :required="true" />
          </div>
          <div class="col-6" >
            <x-form-enum :label="__('Status')" :name="__('status')" :options="$status" :required="true" />
          </div>
        </div>
        <x-slot name="footer" >
          <div class="row" >
            <div class="col d-grid" >
              <x-form-discard :route="route('roles.index')" :icon="__('arrow-left')" />
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
