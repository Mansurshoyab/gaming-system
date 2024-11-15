<x-backend-layout page="{{ __('Manage Roles') }}" >

  @push('styles')
  @endpush

  @push('breadcrumb')
    <x-backend-breadcrumb module="{{ __('User Management') }}" :breadcrumbs="[['title' => 'Roles', 'route' => 'roles.index'], ['title' => 'List']]" />
  @endpush

  <section class="row" >
    <div class="col-sm-12" >
      <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist" >
        <li class="nav-item" role="presentation" >
          <button class="nav-link py-1 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" >
            <span>{{ __('Home') }}</span>
          </button>
        </li>
        <li class="nav-item" role="presentation" >
          <button class="nav-link py-1" id="pills-trash-tab" data-bs-toggle="pill" data-bs-target="#pills-trash" type="button" role="tab" aria-controls="pills-trash" aria-selected="false" >
            <span>{{ __('Trash') }}</span>
          </button>
        </li>
        <li class="nav-item" role="presentation" >
          <button type="button" class="nav-link py-1" data-bs-toggle="modal" data-bs-target="#quickPopup" >
            <span>{{ __('Quick Add') }}</span>
          </button>
        </li>
      </ul>
    </div>
  </section>

  <section class="tab-content" id="pills-tabContent" >
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0" >
      <div class="card" >
        <div class="card-header" >
          <div class="d-flex justify-content-between align-items-center" >
            <h4 class="card-title" >{{ __('Manage Roles') }}</h4>
            <div class="nav-item topbar-icon dropdown hidden-caret" >
              <a href="javascript:void(0);" class="btn btn-icon btn-round btn-card dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                <i class="fas fa-ellipsis-v" ></i>
              </a>
              <ul class="dropdown-menu fadeIn py-1" >
                <a class="dropdown-item py-2" href="{{ route('roles.create') }}" >
                  <i class="fas fa-plus" style="width: 1.5rem;" ></i>
                  <span>{{ __('Add New') }}</span>
                </a>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body" >
          <div class="table-responsive" >
            <table id="homeTable" class="display table table-striped table-hover table-head-bg-black datatables" >
              <thead>
                <tr>
                  <th>{{ __('SL') }}</th>
                  <th>{{ __('Title') }}</th>
                  <th>{{ __('Users') }}</th>
                  <th>{{ __('Status') }}</th>
                  <th>{{ __('Date Created') }}</th>
                  <th width="70" >{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $key => $role)
                  <tr>
                    <td>{{ str_pad($loop->iteration, strlen(count($roles)), '0', STR_PAD_LEFT) . '.' }}</td>
                    <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                      <strong>{{ $role->title }}</strong>
                    </td>
                    <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $role->users->count() }}</td>
                    <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                      <span>{{ ucfirst($role->status) }}</span>
                    </td>
                    <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $role->created_at->diffForHumans() }}</td>
                    <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" ></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="pills-trash" role="tabpanel" aria-labelledby="pills-trash-tab" tabindex="0" >
      <div class="card" >
        <div class="card-body" >
          <p>{{ __('Inner page content goes here.') }}</p>
        </div>
      </div>
    </div>
  </section>

  <section class="modal fade" id="quickPopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="quickPopupLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
      <div class="modal-content" >
        <div class="modal-header" >
          <h1 class="modal-title fs-5" id="quickPopupLabel" >
            <strong id="title" >{{ __('Quick Add') }}</strong>
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </section>

  @push('scripts')
    <script>
      $(document).ready( function () {
        $("#homeTable").DataTable({});
      });
    </script>
  @endpush

</x-backend-layout>
