<x-backend-layout :page="__('Game Dashboard')" >

    @push('breadcrumb')
      <x-backend-breadcrumb :module="__('Dashboard')" :breadcrumbs="[['title' => 'Dashboard', 'route' => route('admin.dashboard')],['title' => 'Game']]" />
    @endpush

    <section class="row" >
      @foreach ($widgets as $item)
        <div class="col-6 col-sm-6 col-md-3" >
          <a href="{{ $item['href'] ?: 'javascript:void(0);' }}" >
            <div class="card card-stats card-round" >
              <div class="card-body" >
                <div class="row align-items-center" >
                  <div class="col-icon" >
                    <div class="icon-big text-center icon-{{ $item['theme'] ?: 'primary' }} bubble-shadow-small" >
                      <i class="fas fa-{{ $item['icon'] ?: 'stream' }}"></i>
                    </div>
                  </div>
                  <div class="col col-stats ms-3 ms-sm-0" >
                    <div class="numbers" >
                      <p class="card-category" >{{ ucwords($item['label']) ?: 'Widget Title' }}</p>
                      <h4 class="card-title" >{{ $item['data'] ?: 0 }}</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </section>

    <x-base-section>
      <x-card-design>
        <x-data-table :id="__('gamesTable')" :striped="true" :hover="true" :theme="__('black')" :headers="['SL', 'Game Name', 'Genre', 'Matches', 'Bet Placed', 'Action']" :datatable="true" >
          @foreach ($games as $key => $game)
            <tr>
              <td>{{ str_pad($loop->iteration, strlen(count($games)), '0', STR_PAD_LEFT) . '.' }}</td>
              <td>
                <strong>{{ $game->name }}</strong>
              </td>
              <td>{{ $game->genre->title }}</td>
              <td>{{ $game->contests->count() }}</td>
              <td>{{ __('0') }}</td>
              <td></td>
            </tr>
          @endforeach
        </x-data-table>
      </x-card-design>
    </x-base-section>
  
    @push('scripts')
    @endpush
  
  </x-backend-layout>
  