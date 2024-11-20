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
        <button type="button" class="nav-link py-1" id="quickAdd" store-route="{{ route('roles.store') }}" data-bs-toggle="modal" data-bs-target="#quickModal" >
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
                <a href="javascript:void(0);" class="text-dark quick-edit" update-route="{{ route('roles.update', $role->id) }}" data-title="{{ $role->title }}" data-description="{{ $role->description }}" data-slug="{{ $role->slug }}" data-bs-toggle="modal" data-bs-target="#quickModal" >
                  <strong>{{ $role->title }}</strong>
                </a>
              </td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $role->users->count() }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <span>{{ ucfirst($role->status) }}</span>
              </td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $role->created_at->diffForHumans() }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-info">
                  <i class="fas fa-edit"> </i>
                </a>
              </td>
            </tr>
          @endforeach
        </x-data-table>
      </x-card-design>
    </div>
    <div class="tab-pane fade" id="pills-trash" role="tabpanel" aria-labelledby="pills-trash-tab" tabindex="0" >
      <x-card-design :header="__('Trashed Roles')" :tool="__('nav-item topbar-icon')" :dropdowns="[['label' => 'Add New', 'icon' => 'plus', 'route' => route('roles.create')]]" >
        <p>{{ __('Inner page content goes here.') }}</p>
      </x-card-design>
    </div>
  </section>

  <x-quick-form :centered="true" :scrollable="true" >
    <div class="col-6" >
      <x-form-input :label="__('Title')" :type="__('text')" :name="__('title')" :count="true" :max="__(25)" :required="true" />
    </div>
    <div class="col-6" >
      <x-form-input :label="__('Slug')" :type="__('text')" :name="__('slug')" :check="true" :count="true" :slug="__('title')" :max="__(25)" :required="true" />
    </div>
    <div class="col-12" >
      <x-form-textarea :label="__('Description')" :name="__('description')" :rows="__('4')" :count="true" :max="__(250)" />
    </div>
  </x-quick-form>

  @push('scripts')
    <script>
      $(document).ready(function () {
        $("#quickAdd").click(function () {
          var store = $(this).attr('store-route');
          $("#quickForm #quickTitle").text("Quick Add");
          $("#quickForm #quickButton").removeClass('btn-success').addClass('btn-primary');
          $("#quickForm #quickIcon").removeClass('fa-check').addClass('fa-plus');
          $("#quickForm #quickLabel").text("Create");
          $("#quickForm #title").val('');
          $("#quickForm #description").val('');
          $("#quickForm #slug").val('');
          $('#quickForm').attr('action', store);
          $("#quickForm").find("input[name='_method']").remove();
        });
        $(".quick-edit").click(function () {
          var update = $(this).attr('update-route');
          var id = $(this).data('id');
          var title = $(this).data('title');
          var description = $(this).data('description');
          var slug = $(this).data('slug');
          $("#quickForm #quickTitle").text("Quick Edit");
          $("#quickForm #title").val(title);
          $("#quickForm #description").val(description);
          $("#quickForm #slug").val(slug);
          $("#quickForm #quickButton").removeClass('btn-primary').addClass('btn-success');
          $("#quickForm #quickIcon").removeClass('fa-plus').addClass('fa-check');
          $("#quickForm #quickLabel").text("Update");
          $('#quickForm').attr('action', update);
          if ($("#quickForm").find("input[name='_method']").length === 0) {
            $("#quickForm").prepend('<input type="hidden" name="_method" value="put" />');
          }
        });
      });
    </script>
  @endpush

</x-backend-layout>
