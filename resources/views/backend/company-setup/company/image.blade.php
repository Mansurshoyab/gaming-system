<x-backend-layout :page="__('Image Page')" >

    @push('breadcrumb')
      <x-backend-breadcrumb :module="__('Image Page')" :breadcrumbs="[['title' => 'Image']]" />
    @endpush

    <x-base-section>
        <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist" >
          <li class="nav-item" role="presentation" >
            <a href="{{ route('company.index') }}" class="nav-link py-1">
              <span>{{ __('Home') }}</span>
            </a>
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
          <form action="{{ route('company.image.update', $company->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT') {{-- Spoofing PUT method --}}
            @csrf {{-- CSRF Token --}}
            <x-card-design :header="__('Update Company')">
                <div class="row g-3">
                    <div class="col-12">
                        <label for="logo">{{ __('Logo') }}</label>
                        <div>
                          <img src="{{ Storage::url('company/' . $company->logo) }}" class="w-100" alt="" />
                          {{-- <img src="{{ asset('images/company/' . config('company.logo') ) }}" alt=""> --}}
                          {{-- @if($company->logo)
                          <img src="{{ Storage::url('company/'.$company->logo) }}" alt="{{ __('Logo') }}" style="max-height: 100px;" />
                          @else
                              <span>{{ __('No logo uploaded') }}</span>
                          @endif --}}
                        </div>
                        <input type="file" name="logo" id="logo" accept="image/*" />
                    </div>
                    <div class="col-12">
                        <label for="favicon">{{ __('Favicon') }}</label>
                        <div>
                            @if($company->favicon)
                                <img src="{{ Storage::url('company/'.$company->favicon) }}" alt="{{ __('Favicon') }}" style="max-height: 50px;" />
                            @else
                                <span>{{ __('No favicon uploaded') }}</span>
                            @endif
                        </div>
                        <input type="file" name="favicon" id="favicon" accept="image/*" />
                    </div>
                </div>
                <x-slot name="footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i> {{ __('Update') }}
                    </button>
                </x-slot>
            </x-card-design>
        </form>


          </x-base-section>
      </x-card-design>
    </x-base-section>

    @push('scripts')
    @endpush

  </x-backend-layout>
