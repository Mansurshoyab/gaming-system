@props(['id' => 'dataTable', 'striped' => false, 'hover' => false, 'theme' => null, 'headers' => [], 'datatable' => false ])

<div class="table-responsive" >
  <table id="{{ $id }}" class="display table @if ( $striped ) table-striped @endif @if ( $hover ) table-hover @endif @if ( $theme ) table-head-bg-{{ $theme }} @endif datatables" >
    <thead>
      <tr>
        @foreach ($headers as $key => $header)
          <th @if ($loop->first) width="60px" @elseif ($loop->last) width="70px" @endif >
            {{ __($header) }}
          </th>
        @endforeach
      </tr>
    </thead>
    <tbody>
      {{ $slot }}
    </tbody>
  </table>
</div>

@if ( $datatable )
  @push('scripts')
    <script>
      $(document).ready(function () {
        $("#{{ $id }}").DataTable({});
      });
    </script>
  @endpush
@endif

