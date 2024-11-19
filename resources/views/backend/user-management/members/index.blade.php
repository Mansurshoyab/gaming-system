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
      <x-card-design :header="__('Total Members')" :tool="__('nav-item topbar-icon')" :dropdowns="[['label' => 'Add New', 'icon' => 'plus', 'route' => route('members.create')]]" >
        <div class="table-responsive" >
          <table id="homeTable" class="display table table-striped table-hover table-head-bg-black datatables" >
            <thead>
              <tr>
                <th>{{ __('SL') }}</th>
                <th>{{ __('Name of Member') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Date Created') }}</th>
                <th width="70" >{{ __('Action') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($members as $key => $member)
                <tr>
                  <td>{{ str_pad($loop->iteration, strlen(count($members)), '0', STR_PAD_LEFT) . '.' }}</td>
                  <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                    <strong>{{ fullname($member) }}</strong>
                  </td>
                  <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                    <span>{{ ucfirst($member->status) }}</span>
                  </td>
                  <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $member->created_at->diffForHumans() }}</td>
                  <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                    <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-info" >
                      <i class="fas fa-edit"> </i>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </x-card-design>
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