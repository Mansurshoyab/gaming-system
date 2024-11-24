<x-backend-layout :page="__('Manage Countries')" >

  @push('breadcrumb')
    <x-backend-breadcrumb :module="__('System and Configuration')" :breadcrumbs="[['title' => 'Countries', 'route' => route('countries.index')], ['title' => 'List']]" />
  @endpush

  <x-base-section>
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
        <button type="button" class="nav-link py-1" id="quickAdd" store-route="{{ route('countries.store') }}" data-total="{{ $total }}" data-bs-toggle="modal" data-bs-target="#quickModal" >
          <span>{{ __('Quick Add') }}</span>
        </button>
      </li>
    </ul>
  </x-base-section>

  <section class="tab-content" id="pills-tabContent" >
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0" >
      <x-card-design :header="__('Manage Methods')" :tool="__('nav-item topbar-icon')" :dropdowns="[['label' => 'Add New', 'icon' => 'plus', 'route' => route('countries.create')]]" >
        <x-data-table :id="__('methodTable')" :striped="true" :hover="true" :theme="__('black')" :headers="['SL', 'Name of Country', 'Code', 'Status', 'Date Created', 'Action']" :datatable="true" >
          @foreach ($countries as $key => $country)
            <tr>
              <td>{{ str_pad($loop->iteration, strlen(count($countries)), '0', STR_PAD_LEFT) . '.' }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <a href="javascript:void(0);" class="text-dark quick-edit" update-route="{{ route('countries.update', $country->id) }}" data-name="{{ $country->name }}" data-updated="{{ $country->updated_at->format('d M Y h:i A') }}" data-bs-toggle="modal" data-bs-target="#quickModal" >
                  <strong>{{ $country->name }}</strong>
                </a>
              </td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $country->iso3 }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <span class="badge bg-{{ $country->status === status('enable') ? 'success' : ( $country->status === status('disable') ? 'danger' : 'secondary' ) }}" >{{ ucfirst($country->status) }}</span>
              </td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $country->created_at->diffForHumans() }}</td>
              <td class="d-flex justify-content-between align-items-center" style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                {{-- <x-toggle-switch :name="__('status')" :href="route('roles.status', $role->id)" :id="$role->id" :enable="status('enable')" :disable="status('disable')" :value="$role->status" />
                <x-action-drawer>
                  <x-edit-action :href="route('roles.edit', $role->id)" />
                  <x-show-action :href="route('roles.show', $role->id)" :header="$role->title" :item="$role" />
                  <x-delete-action :href="route('roles.destroy', $role->id)" class="mx-1" :id="$role->id" :title="__('Trash')" />
                  <x-delete-action :href="route('roles.remove', $role->id)" :theme="__('danger')" :icon="__('times')" :id="$role->id" :title="__('Remove')" />
                </x-action-drawer> --}}
              </td>
            </tr>
          @endforeach
        </x-data-table>
      </x-card-design>
    </div>
    <div class="tab-pane fade" id="pills-trash" role="tabpanel" aria-labelledby="pills-trash-tab" tabindex="0" >
      <x-card-design :header="__('Trashed Methods')" :tool="__('nav-item topbar-icon')" :dropdowns="[['label' => 'Add New', 'icon' => 'plus', 'route' => route('accounts.create')]]" >
        <x-data-table :id="__('trashTable')" :striped="true" :hover="true" :theme="__('black')" :headers="['SL', 'Title', 'Code', 'Date Deleted', 'Action']" :datatable="true" >
          @foreach ($trashes as $key => $trash)
            <tr>
              <td>{{ str_pad($loop->iteration, strlen(count($trashes)), '0', STR_PAD_LEFT) . '.' }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <a href="javascript:void(0);" class="text-dark" >
                  <strong>{{ $trash->name }}</strong>
                </a>
              </td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $trash->iso3 }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $trash->deleted_at->diffForHumans() }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                {{-- <x-restore-action :href="route('roles.restore', $trash->id)" :item="$trash->id" />
                <x-delete-action :href="route('roles.remove', $trash->id)" :theme="__('danger')" :icon="__('times')" :id="$trash->id" :title="__('Remove')" /> --}}
              </td>
            </tr>
          @endforeach
        </x-data-table>
      </x-card-design>
    </div>
  </section>

  @push('scripts')
  @endpush

</x-backend-layout>
