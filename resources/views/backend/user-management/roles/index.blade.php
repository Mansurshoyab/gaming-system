<x-backend-layout :page="__('Manage Roles')" >

  @push('breadcrumb')
    <x-backend-breadcrumb :module="__('User Management')" :breadcrumbs="[['title' => 'Roles', 'route' => 'roles.index'], ['title' => 'List']]" />
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
        <button type="button" class="nav-link py-1" id="quickAdd" store-route="{{ route('roles.store') }}" data-total="{{ $total }}" data-bs-toggle="modal" data-bs-target="#quickModal" >
          <span>{{ __('Quick Add') }}</span>
        </button>
      </li>
    </ul>
  </x-base-section>

  <section class="tab-content" id="pills-tabContent" >
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0" >
      <x-card-design :header="__('Manage Roles')" :tool="__('nav-item topbar-icon')" :dropdowns="[['label' => 'Add New', 'icon' => 'plus', 'route' => route('roles.create')]]" >
        <x-data-table :id="__('roleTable')" :striped="true" :hover="true" :theme="__('black')" :headers="['SL', 'Title', 'Users', 'Status', 'Date Created', 'Action']" :datatable="true" >
          @foreach ($roles as $key => $role)
            <tr>
              <td>{{ str_pad($loop->iteration, strlen(count($roles)), '0', STR_PAD_LEFT) . '.' }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <a href="javascript:void(0);" class="text-dark quick-edit" update-route="{{ route('roles.update', $role->id) }}" data-title="{{ $role->title }}" data-description="{{ $role->description }}" data-slug="{{ $role->slug }}" data-updated="{{ $role->updated_at->format('d M Y h:i A') }}" data-bs-toggle="modal" data-bs-target="#quickModal" >
                  <strong>{{ $role->title }}</strong>
                </a>
              </td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $role->users->count() }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <span class="badge bg-{{ $role->status === status('enable') ? 'success' : ( $role->status === status('disable') ? 'danger' : 'secondary' ) }}" >{{ ucfirst($role->status) }}</span>
              </td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $role->created_at->diffForHumans() }}</td>
              <td class="d-flex justify-content-between align-items-center" style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <x-toggle-switch :name="__('status')" :href="route('roles.status', $role->id)" :id="$role->id" :enable="status('enable')" :disable="status('disable')" :value="$role->status" />
                <x-action-drawer>
                  <x-edit-action :href="route('roles.edit', $role->id)" />
                  <x-show-action :href="route('roles.show', $role->id)" />
                  <x-delete-action :href="route('roles.destroy', $role->id)" :class="__('unique-id-') . $role->id" :id="$role->id" :title="__('Trash')" />
                </x-action-drawer>
              </td>
            </tr>
          @endforeach
        </x-data-table>
      </x-card-design>
    </div>
    <div class="tab-pane fade" id="pills-trash" role="tabpanel" aria-labelledby="pills-trash-tab" tabindex="0" >
      <x-card-design :header="__('Trashed Roles')" :tool="__('nav-item topbar-icon')" :dropdowns="[['label' => 'Add New', 'icon' => 'plus', 'route' => route('roles.create')]]" >
        <x-data-table :id="__('trashTable')" :striped="true" :hover="true" :theme="__('black')" :headers="['SL', 'Title', 'Users', 'Date Deleted', 'Action']" :datatable="true" >
          @foreach ($trashes as $key => $trash)
            <tr>
              <td>{{ str_pad($loop->iteration, strlen(count($trashes)), '0', STR_PAD_LEFT) . '.' }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <a href="javascript:void(0);" class="text-dark" >
                  <strong>{{ $trash->title }}</strong>
                </a>
              </td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $trash->users->count() }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $trash->deleted_at->diffForHumans() }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <x-delete-action :href="route('roles.destroy', $trash->id)" :class="__('unique-id-') . $trash->id" :id="$trash->id" :title="__('Remove')" @disabled(true) />
              </td>
            </tr>
          @endforeach
        </x-data-table>
      </x-card-design>
    </div>
  </section>

  <x-modal-design :id="__('showModal')" :center="true" :scroll="true" >
    <x-slot name="footer" >
      <strong id="footerTitle" >{{ __('Last Updated') }}</strong>
      <span>{{ __(':') }}</span>
      <span id="footerData" >{{ __('Update Time') }}</span>
    </x-slot>
  </x-modal-design>

  <x-quick-form :center="true" :scroll="true" >
    <div class="col-6" >
      <x-form-input :label="__('Title')" :type="__('text')" :name="__('title')" :count="true" :max="__(25)" :required="true" />
    </div>
    <div class="col-6" >
      <x-form-input :label="__('Slug')" :type="__('text')" :name="__('slug')" :check="true" :count="true" :slug="__('title')" :max="__(25)" :required="true" />
    </div>
    <div class="col-12" >
      <x-form-textarea :label="__('Description')" :name="__('description')" :rows="__('4')" :count="true" :max="__(250)" />
    </div>
    <x-slot name="footer" >
      <strong id="quickFooter" >{{ __('Footer Title') }}</strong>
      <span>{{ __(':') }}</span>
      <span id="quickData" >{{ __('Footer Data') }}</span>
    </x-slot>
  </x-quick-form>

  @push('scripts')
    <script>
      $(document).ready(function () {
        $("#quickAdd").click(function () {
          $("#quickForm #title").val('');
          $("#quickForm #description").val('');
          $("#quickForm #slug").val('');
          $("#quickModal .modal-footer #quickFooter").text("Total Roles");
        });

        $(".quick-edit").click(function () {
          var title = $(this).data('title');
          var description = $(this).data('description');
          var slug = $(this).data('slug');
          $("#quickForm #title").val(title);
          $("#quickForm #description").val(description);
          $("#quickForm #slug").val(slug);
        });
      });
    </script>
  @endpush

</x-backend-layout>
