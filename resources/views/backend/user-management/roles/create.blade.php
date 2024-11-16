<x-backend-layout page="{{ __('Add New Role') }}" >

  @push('breadcrumb')
    <x-backend-breadcrumb module="{{ __('User Management') }}" :breadcrumbs="[['title' => 'Roles', 'route' => 'roles.index'], ['title' => 'Add']]" />
  @endpush

  <section class="row" >
    <div class="col-sm-10 col-md-8 col-lg-6 offset-sm-1 offset-md-2 offset-lg-3" >
      <div class="card" >
        <div class="card-header py-1" >
          <h4 class="card-title" >{{ __('Add New Role') }}</h4>
        </div>
        <div class="card-body" >
          <div class="row g-3" >
            <div class="col-12" >
              <label for="title" class="form-label mb-0" >
                <strong>{{ __('Title') }}</strong>
              </label>
              <div class="input-group" >
                <input type="text" class="form-control py-1" id="title" aria-describedby="basic-addon3 basic-addon4" />
              </div>
              <div class="form-text" id="basic-addon4" >
                <span>Example help text goes here.</span>
              </div>
            </div>
            <div class="col-12" >
              <x-form-textarea :label="__('Description')" :rows="__('4')" />
            </div>
            <div class="col-6" >
              <label for="slug" class="form-label mb-0" >
                <strong>{{ __('Slug') }}</strong>
              </label>
              <div class="input-group" >
                <input type="text" class="form-control py-1" id="slug" aria-describedby="basic-addon3 basic-addon4" />
              </div>
              <div class="form-text" id="basic-addon4" >
                <span>Example help text goes here.</span>
              </div>
            </div>
            <div class="col-6" >
              <label for="status" class="form-label mb-0" >
                <strong>{{ __('Status') }}</strong>
              </label>
              <select class="form-select" aria-label="Default select example" id="status" >
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
        </div>
        <div class="card-footer" >
          <div class="row" >
            <div class="col d-grid" >
              <a href="{{ route('roles.index') }}" class="btn btn-info py-1" role="button" >
                <i class="fas fa-arrow-left" ></i>
                <strong class="ms-1" >{{ __('Discard') }}</strong>
              </a>
            </div>
            <div class="col d-grid" >
              <x-form-button :type="__('submit')" :icon="true" :name="__('plus')" :label="__('Create')" :theme="__('primary py-1')" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @push('scripts')
  @endpush

</x-backend-layout>
