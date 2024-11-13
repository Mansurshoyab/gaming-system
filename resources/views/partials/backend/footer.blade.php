<footer class="footer" >
  <div class="container-fluid d-flex justify-content-between" >
    <div class="copyright" >
      <span id="year" ></span>
      <span>&copy;</span>
      <a href="{{ route('admin.dashboard') }}" >
        <strong>{{ config('company.name') }}</strong>
      </a>
      <span class="mx-1" >{{ __('|') }}</span>
      <span>{{ __('All Rights Reserved.') }}</span>
    </div>
    <div class="version" >
      <span>{{ __('Build Number') }}</span>
      <span class="mx-1" >{{ __(':') }}</span>
      <span>{{ __('v') . version() }}</span>
    </div>
  </div>
</footer>

@push('scripts')
  <script>
    var year = document.getElementById("year");
    year.textContent = new Date().getFullYear();
  </script>
@endpush
