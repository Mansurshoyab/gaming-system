<x-backend-layout :page="__('Manage Members') " >

  @push('breadcrumb')
    <x-backend-breadcrumb :module="__('User Management')" :breadcrumbs="[['title' => 'Members', 'route' => 'members.index'], ['title' => 'List']]" />
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
        <button type="button" class="nav-link py-1" id="quickAdd" store-route="{{ route('members.store') }}" data-total="{{ $total }}" data-bs-toggle="modal" data-bs-target="#quickModal" >
          <span>{{ __('Quick Add') }}</span>
        </button>
      </li>
    </ul>
  </x-base-section>

  <section class="tab-content" id="pills-tabContent" >
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0" >
      <x-card-design :header="__('Total Members')" :tool="__('nav-item topbar-icon')" :dropdowns="[['label' => 'Add New', 'icon' => 'plus', 'route' => route('members.create')]]" >
        <x-data-table :id="__('memberTable')" :striped="true" :hover="true" :theme="__('black')" :headers="['SL', 'Name of Member', 'Status', 'Date Created', 'Action']" :datatable="true" >
          @foreach ($members as $key => $member)
            <tr>
              <td>{{ str_pad($loop->iteration, strlen(count($members)), '0', STR_PAD_LEFT) . '.' }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <a href="javascript:void(0);" class="text-dark quick-edit" update-route="{{ route('members.update', $member->id) }}" data-firstname="{{ $member->firstname }}" data-lastname="{{ $member->lastname }}" data-email="{{ $member->email }}" data-phone="{{ $member->phone }}" data-updated="{{ $member->updated_at->format('d M Y h:i A') }}" data-bs-toggle="modal" data-bs-target="#quickModal" >
                  <strong>{{ fullname($member) }}</strong>
                </a>
              </td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <span>{{ ucfirst($member->status) }}</span>
              </td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $member->created_at->diffForHumans() }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <x-action-drawer>
                  <x-edit-action :href="route('members.edit', $member->id)" />
                  <x-show-action :href="route('members.show', $member->id)" />
                </x-action-drawer>
              </td>
            </tr>
          @endforeach
        </x-data-table>
      </x-card-design>
    </div>
    <div class="tab-pane fade" id="pills-trash" role="tabpanel" aria-labelledby="pills-trash-tab" tabindex="0" >
      <x-card-design :header="__('Total Trashed')" :tool="__('nav-item topbar-icon')" :dropdowns="[['label' => 'Add New', 'icon' => 'plus', 'route' => route('members.create')]]" >
        <p>{{ __('Inner page content goes here.') }}</p>
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
      <x-form-input :label="__('First Name')" :type="__('text')" :name="__('firstname')" :count="true" :max="__(50)" :required="true" />
    </div>
    <div class="col-6" >
      <x-form-input :label="__('Last Name')" :type="__('text')" :name="__('lastname')" :count="true" :max="__(50)" />
    </div>
    <div class="col-6" >
      <x-form-input :label="__('Email Address')" :type="__('email')" :name="__('email')" :count="true" :max="__(100)" :required="true" />
    </div>
    <div class="col-6" >
      <x-form-input :label="__('Cell Phone')" :type="__('tel')" :name="__('phone')" :count="true" :max="__(19)" :required="true" />
    </div>
    <div class="col-6" >
      <x-form-input :label="__('Password')" :type="__('password')" :name="__('password')" :required="true" />
    </div>
    <div class="col-6" >
      <x-form-input :label="__('Confirm Password')" :type="__('password')" :name="__('password_confirmation')" :required="true" />
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
          $("#quickForm #password").val('');
          $("#quickForm #passwordConfirmation").val('');
          $("#quickModal .modal-footer #quickFooter").text("Total Members");
          $("#quickForm #password").closest('.col-6').show();
          $("#quickForm #passwordConfirmation").closest('.col-6').show();
        });

        $(".quick-edit").click(function () {
          var firsname = $(this).data('firsname');
          var lastname = $(this).data('lastname');
          var email = $(this).data('email');
          var phone = $(this).data('phone');
          $("#quickForm #firsname").val(firsname);
          $("#quickForm #lastname").val(lastname);
          $("#quickForm #email").val(email);
          $("#quickForm #phone").val(phone);
          $("#quickForm #password").closest('.col-6').hide();
          $("#quickForm #passwordConfirmation").closest('.col-6').hide();
        });
      });
    </script>
  @endpush

</x-backend-layout>
