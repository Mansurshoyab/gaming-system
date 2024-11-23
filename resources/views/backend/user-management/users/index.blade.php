<x-backend-layout :page="__('Manage Users')" >

  @push('breadcrumb')
    <x-backend-breadcrumb :module="__('User Management')" :breadcrumbs="[['title' => 'Users', 'route' => 'users.index'], ['title' => 'List']]" />
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
        <button type="button" class="nav-link py-1" id="quickAdd" store-route="{{ route('users.store') }}" data-total="{{ $total }}" data-bs-toggle="modal" data-bs-target="#quickModal" >
          <span>{{ __('Quick Add') }}</span>
        </button>
      </li>
    </ul>
  </x-base-section>

  <section class="tab-content" id="pills-tabContent" >
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0" >
      <x-card-design :header="__('Manage Users')" :tool="__('nav-item topbar-icon')" :dropdowns="[['label' => 'Add New', 'icon' => 'plus', 'route' => route('users.create')]]" >
        <x-data-table :id="__('userTable')" :striped="true" :hover="true" :theme="__('black')" :headers="['SL', 'Name of User', 'Role', 'Status', 'Date Created', 'Action']" :datatable="true" >
          @foreach ($users as $key => $user)
            <tr>
              <td>{{ str_pad($loop->iteration, strlen(count($users)), '0', STR_PAD_LEFT) . '.' }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <a href="javascript:void(0);" class="text-dark quick-edit" update-route="{{ route('users.update', $user->id) }}" data-firstname="{{ $user->firstname }}" data-lastname="{{ $user->lastname }}" data-email="{{ $user->email }}" data-phone="{{ $user->phone }}" data-role-id="{{ $user->role_id }}" data-updated="{{ $user->updated_at->format('d M Y h:i A') }}" data-bs-toggle="modal" data-bs-target="#quickModal" >
                  <strong>{{ fullname($user) }}</strong>
                </a>
              </td>
              <td>{{ $user->role->title }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <span class="badge bg-{{ $user->status === approval('approved') ? 'success' : ( $user->status === approval('suspended') ? 'danger' : 'secondary' ) }}" >{{ ucfirst($user->status) }}</span>
              </td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $user->created_at->diffForHumans() }}</td>
              <td class="d-flex justify-content-between align-items-center" style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <x-toggle-switch :name="__('status')" :href="route('users.status', $user->id)" :id="$user->id" :enable="approval('approved')" :disable="approval('suspended')" :value="$user->status" />
                <x-action-drawer>
                  <x-edit-action :href="route('users.edit', $user->id)" />
                  <x-show-action :href="route('users.show', $user->id)" :header="fullname($user)" :item="$user" />
                  <x-delete-action :href="route('users.destroy', $user->id)" class="mx-1" :id="$user->id" :title="__('Trash')" />
                  <x-delete-action :href="route('users.remove', $user->id)" :theme="__('danger')" :icon="__('times')" :id="$user->id" :title="__('Remove')" />
                </x-action-drawer>
              </td>
            </tr>
          @endforeach
        </x-data-table>
      </x-card-design>
    </div>
    <div class="tab-pane fade" id="pills-trash" role="tabpanel" aria-labelledby="pills-trash-tab" tabindex="0" >
      <x-card-design :header="__('Trashed Users')" :tool="__('nav-item topbar-icon')" :dropdowns="[['label' => 'Add New', 'icon' => 'plus', 'route' => route('users.create')]]" >
        <x-data-table :id="__('trashTable')" :striped="true" :hover="true" :theme="__('black')" :headers="['SL', 'Name of User', 'Role', 'Date Deleted', 'Action']" :datatable="true" >
          @foreach ($trashes as $key => $trash)
            <tr>
              <td>{{ str_pad($loop->iteration, strlen(count($trashes)), '0', STR_PAD_LEFT) . '.' }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <a href="javascript:void(0);" class="text-dark" >
                  <strong>{{ fullname($trash) }}</strong>
                </a>
              </td>
              <td>{{ $trash->role->title }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $trash->deleted_at->diffForHumans() }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <x-restore-action :href="route('users.restore', $trash->id)" :item="$trash->id" />
                <x-delete-action :href="route('users.remove', $trash->id)" :theme="__('danger')" :icon="__('times')" :id="$trash->id" :title="__('Remove')" />
              </td>
            </tr>
          @endforeach
        </x-data-table>
      </x-card-design>
    </div>
  </section>

  <x-modal-design :id="__('showModal')" :center="true" :scroll="true" >
    <p id="biography" style="text-align: justify !important;" ></p>
    <x-slot name="footer" >
      <strong id="footerTitle" >{{ __('Last Updated') }}</strong>
      <span>{{ __(':') }}</span>
      <span id="footerData" >{{ __('Update Time') }}</span>
    </x-slot>
  </x-modal-design>

  <x-quick-form :center="true" :scroll="true" >
    <div class="col-6" >
      <x-form-input :label="__('First Name')" :type="__('text')" :name="__('firstname')" :count="true" :max="__(50)" :required="true" />
    </div>
    <div class="col-6" >
      <x-form-input :label="__('Last Name')" :type="__('text')" :name="__('lastname')" :count="true" :max="__(50)" />
    </div>
    <div class="col-12" >
      <x-form-input :label="__('Email Address')" :type="__('email')" :name="__('email')" :count="true" :max="__(100)" :required="true" />
    </div>
    <div class="col-6" >
      <x-form-input :label="__('Cell Phone')" :type="__('tel')" :name="__('phone')" :count="true" :max="__(19)" :required="true" />
    </div>
    <div class="col-6" >
      <x-form-select :label="__('User Role')" :name="__('role_id')" :options="$roles" />
    </div>
    <div class="col-6" >
      <x-form-input :label="__('Password')" :type="__('password')" :name="__('password')" />
    </div>
    <div class="col-6" >
      <x-form-input :label="__('Confirm Password')" :type="__('password')" :name="__('password_confirmation')" />
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
          $("#quickForm #firsname").val('');
          $("#quickForm #lastname").val('');
          $("#quickForm #email").val('');
          $("#quickForm #phone").val('');
          $("#quickForm #roleId").val('');
          $("#quickForm #password").val('');
          $("#quickForm #passwordConfirmation").val('');
          $("#quickModal .modal-footer #quickFooter").text("Total Users");
          $("#quickForm #password").closest('.col-6').show();
          $("#quickForm #passwordConfirmation").closest('.col-6').show();
          $("#quickForm #password").attr('required', 'required');
          $("#quickForm #passwordConfirmation").attr('required', 'required');
        });

        $(".quick-edit").click(function () {
          var firstname = $(this).data('firstname');
          var lastname = $(this).data('lastname');
          var email = $(this).data('email');
          var phone = $(this).data('phone');
          var role = $(this).data('role-id');
          $("#quickForm #firstname").val(firstname);
          $("#quickForm #lastname").val(lastname);
          $("#quickForm #email").val(email);
          $("#quickForm #phone").val(phone);
          $("#quickForm #roleId").val(role);
          $("#quickForm #password").closest('.col-6').hide();
          $("#quickForm #passwordConfirmation").closest('.col-6').hide();
          $("#quickForm #password").removeAttr('required');
          $("#quickForm #passwordConfirmation").removeAttr('required');
        });

        $("#quickForm").submit(function (event) {
          if (!$("#quickForm #password").is(':visible')) {
            $("#quickForm #password").prop('disabled', true);
            $("#quickForm #passwordConfirmation").prop('disabled', true);
          }
        });

        $('#quickModal').on('hidden.bs.modal', function () {
          $("#quickForm #password").prop('disabled', false);
          $("#quickForm #passwordConfirmation").prop('disabled', false);
        });

        $(".show-action").click(function (e) {
          e.preventDefault();
          const url = $(this).attr("show-route");
          axios.get(url).then(function (response) {
            if (response.data) {
              const biography = response.data.profile.biography || "No biography available";
              $("#showModal #biography").html(biography);
            }
          }).catch(function (error) {
            console.error("Error fetching data:", error);
            $("#showModal #biography").html("<p class='text-danger'>Error loading content.</p>");
          });
        });
      });
    </script>
  @endpush

</x-backend-layout>
