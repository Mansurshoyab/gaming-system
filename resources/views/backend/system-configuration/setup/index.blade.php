<x-backend-layout page="{{ __('General Settings') }}" >

  @push('styles')
  @endpush

  @push('breadcrumb')
    <x-backend-breadcrumb module="{{ __('System and Configuration') }}" :breadcrumbs="[['title' => 'Setup', 'route' => 'system.settings' ], ['title' => 'General']]" />
  @endpush

  <section class="row" >
    <div class="col-sm-12" >
      <div class="card" >
        <div class="card-header py-1" >
          <h4 class="card-title" >{{ __('General Settings') }}</h4>
        </div>
        <div class="card-body px-md-5 mx-md-5" >
          <div class="row g-2 align-items-center mb-4" >
            <div class="col-md-5" >
              <label for="title" >
                <strong>{{ __('Application Title') }}</strong>
              </label>
            </div>
            <div class="col-md-7" >
              <input type="text" name="title" class="form-control py-1" id="title" placeholder="Application Title" value="{{ config('app.name') }}" required />
            </div>
          </div>
          <div class="row g-2 align-items-center mb-4" >
            <div class="col-md-5" >
              <label for="debug" >
                <strong>{{ __('Application Debug') }}</strong>
              </label>
            </div>
            <div class="col-md-7" >
              <select name="debug" class="form-select" id="debug" required >
                <option value="true" @if ( config('app.debug') === true ) selected @endif >{{ __('Enable') }}</option>
                <option value="false" @if ( config('app.debug') === false ) selected @endif >{{ __('Disable') }}</option>
              </select>
            </div>
          </div>
          <div class="row g-2 align-items-center mb-4" >
            <div class="col-md-5" >
              <label for="timezone" >
                <strong>{{ __('Application Timezone') }}</strong>
              </label>
            </div>
            <div class="col-md-7" >
              <select name="timezone" class="form-select" id="timezone" required >
                @foreach ($timezones as $timezone)
                  <option value="{{ $timezone }}" @if ( config('app.timezone') === $timezone ) selected @endif >{{ $timezone }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row g-2 align-items-center mb-4" >
            <div class="col-md-5" >
              <label for="language" >
                <strong>{{ __('Application Lanaguage') }}</strong>
              </label>
            </div>
            <div class="col-md-7" >
              <select name="language" class="form-select" id="language" required >
                @foreach($languages as $localeCode => $languageName)
                  <option value="{{ $localeCode }}" @if ( config('app.locale') === $localeCode ) selected @endif >{{ $languageName }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row g-2 align-items-center mb-4" >
            <div class="col-md-5" >
              <label for="url" >
                <strong>{{ __('Application URl') }}</strong>
              </label>
            </div>
            <div class="col-md-7" >
              <input type="url" name="url" class="form-control py-1" id="url" placeholder="Application URl" value="{{ config('app.url') }}" required />
            </div>
          </div>
        </div>
        <div class="card-footer py-2" >
          <button type="submit" class="btn btn-success px-5 py-1" >
            <strong>{{ __('Update') }}</strong>
          </button>
        </div>
      </div>
    </div>
  </section>

  @push('scripts')
    <script>
      $(document).ready( function () {
        var lang = $('#language');
        $(lang).change( function () {
            alert(lang.val());
        });
      });
    </script>
  @endpush

</x-backend-layout>