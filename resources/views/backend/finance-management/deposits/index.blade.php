<x-backend-layout :page="__('Total Deposits')" >

  @push('breadcrumb')
    <x-backend-breadcrumb :module="__('Finance Management')" :breadcrumbs="[['title' => 'Deposits', 'route' => route('deposits.index')], ['title' => 'Total']]" />
  @endpush

  <x-base-section>
    <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist" >
      <li class="nav-item" role="presentation" >
        <button class="nav-link py-1 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" >
          <span>{{ __('Home') }}</span>
        </button>
      </li>
      <li class="nav-item" role="presentation" >
        <button class="nav-link py-1" id="pills-pending-tab" data-bs-toggle="pill" data-bs-target="#pills-pending" type="button" role="tab" aria-controls="pills-pending" aria-selected="false" >
          <span>{{ __('Pending') . '('. $pendings->count() . ')' }}</span>
        </button>
      </li>
    </ul>
  </x-base-section>

  <section class="tab-content" id="pills-tabContent" >
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0" >
      <x-card-design :header="__('Total Deposits')" >
        <x-data-table :id="__('depositTable')" :striped="true" :hover="true" :theme="__('black')" :headers="['SL', 'Name of Gamer', 'Amount', 'Trx ID', 'Date Deposit', 'Action']" :datatable="true" >
          @foreach ($deposits as $key => $deposit)
            <tr>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ str_pad($loop->iteration, strlen(count($deposits)), '0', STR_PAD_LEFT) . '.' }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <strong>{{ fullname($deposit->member) }}</strong>
              </td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ number_format($deposit->amount, 2) . '/-' }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $deposit->trx_id }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $deposit->created_at->diffForHumans() }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <x-delete-action :href="route('deposits.destroy', $deposit->id)" class="mx-1" :id="$deposit->id" :title="__('Trash')" />
              </td>
            </tr>
          @endforeach
        </x-data-table>
      </x-card-design>
    </div>
    <div class="tab-pane fade" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab" tabindex="0" >
      <x-card-design :header="__('Pending Deposits')" >
        <x-data-table :id="__('pendingTable')" :striped="true" :hover="true" :theme="__('black')" :headers="['SL', 'Name of Gamer', 'Amount', 'Trx ID', 'Date Deposit', 'Action']" :datatable="true" >
          @foreach ($pendings as $key => $pending)
            <tr>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ str_pad($loop->iteration, strlen(count($pendings)), '0', STR_PAD_LEFT) . '.' }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <strong>{{ fullname($pending->member) }}</strong>
              </td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ number_format($pending->amount, 2) . '/-' }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $pending->trx_id }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $pending->created_at->diffForHumans() }}</td>
              <td class="d-flex justify-content-start align-items-center" style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <button type="submit" class="btn btn-sm btn-success btn-icon btn-round btn-approve" approve-route="{{ route('deposits.approve', $pending->id) }}" data-id="{{ $pending->id }}" >
                  <i class="fas fa-check" ></i>
                </button>
                <x-delete-action :href="route('deposits.destroy', $pending->id)" class="mx-1" :id="$pending->id" :title="__('Trash')" />
              </td>
            </tr>
          @endforeach
        </x-data-table>
      </x-card-design>
    </div>
  </section>

  <x-base-section>
  </x-base-section>

  @push('scripts')
    <script>
      $(document).ready(function () {
        $(document).on('click', '.btn-approve', function (e) {
          e.preventDefault();
          let approvelURL = $(this).attr('approve-route');
          let approveID = $(this).data('id');
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, approve it!'
          }).then((result) => {
            if (result.isConfirmed) {
              axios.post(approvelURL, {
                id: approveID,
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              }).then(response => {
                if (response.data.code == 203) {
                  Swal.fire( 'Warning!', 'Your status id must be numeric.', 'warning' );
                } else if (response.data.code == 404) {
                  Swal.fire( 'Warning!', 'Your status info not found.', 'warning' );
                } else {
                  Swal.fire({
                    title: 'Approved!',
                    text: response.data.message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                  });
                  location.reload();
                }
              }).catch(error => {
                console.error(error);
                Swal.fire({
                    title: 'Error',
                    text: 'An error occurred while approving data.',
                    icon: 'error',
                    showConfirmButton: false
                });
              });
            }
          })
        });
      });
    </script>
  @endpush

</x-backend-layout>
