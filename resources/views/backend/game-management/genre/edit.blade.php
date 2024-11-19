<x-backend-layout :page="__('Edit Genre')" >

  @push('breadcrumb')
    <x-backend-breadcrumb :module="__('Game Management')" :breadcrumbs="[['title' => 'Genre', 'route' => 'genre.index'], ['title' => 'Edit']]" />
  @endpush

  <x-base-section :class="__('col-sm-10 col-md-8 col-lg-6 offset-sm-1 offset-md-2 offset-lg-3')" >
    <x-form-design :action="route('genres.update', $genre->id)" :spoof="__('put')" >
      <x-card-design :header="__('Update Genre')" >
        <div class="row g-3" >
          <div class="col-12" >
            <x-form-input :label="__('Title')" :type="__('text')" :name="__('title')" :value="$genre->title" :count="true" :max="__(25)" :required="true" />
          </div>
          <div class="col-12" >
            <x-form-textarea :label="__('Description')" :name="__('description')" :value="$genre->description" :rows="__('4')" :count="true" :max="__(250)" />
          </div>
          <div class="col-6" >
            <x-form-input :label="__('Slug')" :type="__('text')" :name="__('slug')" :value="$genre->slug" :check="true" :count="true" :slug="__('title')" :max="__(25)" :required="true" />
          </div>
          <div class="col-6" >
            <x-form-enum :label="__('Status')" :name="__('status')" :options="$status" :required="true" :value="$genre->status" />
          </div>
        </div>
        <x-slot name="footer" >
          <div class="row" >
            <div class="col d-grid" >
              <x-form-discard :route="route('genres.index')" :icon="__('arrow-left')" />
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