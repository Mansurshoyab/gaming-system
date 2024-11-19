<aside class="sidebar" data-background-color="dark" >
  <div class="sidebar-logo" >
    {{-- Logo Header --}}
    <div class="logo-header" data-background-color="dark" >
      <a href="{{ route('admin.dashboard') }}" class="logo" >
        <img src="{{ asset('images/company/' . config('company.logo') ) }}" alt="Logo" class="navbar-brand" height="35" />
      </a>
      <div class="nav-toggle" >
        <button class="btn btn-toggle toggle-sidebar" >
          <i class="gg-menu-right" ></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler" >
          <i class="gg-menu-left" ></i>
        </button>
      </div>
      <button class="topbar-toggler more" >
        <i class="gg-more-vertical-alt" ></i>
      </button>
    </div>
  </div>
  <div class="sidebar-wrapper scrollbar scrollbar-inner" >
    <div class="sidebar-content" >
      <ul class="nav nav-secondary my-0">
        <li class="nav-item active" >
          <a href="#dashboard" data-bs-toggle="collapse" class="nav-link py-1 collapsed" aria-expanded="false" >
            <i class="fas fa-home" ></i>
            <p>{{ __('Admin Dashboard') }}</p>
            <span class="caret" ></span>
          </a>
          <div class="collapse" id="dashboard" >
            <ul class="nav nav-collapse py-0" >
              <li class="nav-item" >
                <a href="{{ route('admin.dashboard') }}" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ ('Analytic Dashboard') }}</span>
                </a>
              </li>
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ ('Game Dashboard') }}</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-section" >
          <span class="sidebar-mini-icon" >
            <i class="fa fa-ellipsis-h" ></i>
          </span>
          <h4 class="text-section py-0 my-1" >{{ __('Miscellaneous') }}</h4>
        </li>
        <li class="nav-item" >
          <a href="javascript:void(0);" class="nav-link py-1" >
            <i class="fas fa-bell" ></i>
            <p>{{ __('Notifications') }}</p>
            <span class="badge badge-secondary" >1</span>
          </a>
        </li>
        <li class="nav-item" >
          <a href="javascript:void(0);" class="nav-link py-1" >
            <i class="fas fa-envelope" ></i>
            <p>{{ __('Support Inbox') }}</p>
            <span class="badge badge-secondary" >1</span>
          </a>
        </li>
        <li class="nav-section" >
          <span class="sidebar-mini-icon" >
            <i class="fa fa-ellipsis-h" ></i>
          </span>
          <h4 class="text-section py-0 my-1" >{{ __('Game Management') }}</h4>
        </li>
        <li class="nav-item" >
          <a href="#genre" class="nav-link py-1" data-bs-toggle="collapse" >
            <i class="fas fa-code-branch" ></i>
            <p>{{ __('Game Genre') }}</p>
            <span class="caret" ></span>
          </a>
          <div class="collapse" id="genre">
            <ul class="nav nav-collapse py-0">
              <li class="nav-item" >
                <a href="{{ route('genres.index') }}" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Manage Genres') }}</span>
                </a>
              </li>
              <li class="nav-item" >
                <a href="{{ route('genres.create') }}" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Add New Genre') }}</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item" >
          <a href="#game" class="nav-link py-1" data-bs-toggle="collapse" >
            <i class="fas fa-gamepad" ></i>
            <p>{{ __('Game Listing') }}</p>
            <span class="caret" ></span>
          </a>
          <div class="collapse" id="game">
            <ul class="nav nav-collapse py-0">
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Manage Games') }}</span>
                </a>
              </li>
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Add New Game') }}</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item" >
          <a href="javascript:void(0);" class="nav-link py-1" >
            <i class="fas fa-coins" ></i>
            <p>{{ __('Bet Analysis') }}</p>
          </a>
        </li>
        <li class="nav-item" >
          <a href="javascript:void(0);" class="nav-link py-1" >
            <i class="fas fa-clipboard" ></i>
            <p>{{ __('Leaderboard') }}</p>
          </a>
        </li>
        <li class="nav-section" >
          <span class="sidebar-mini-icon" >
            <i class="fa fa-ellipsis-h" ></i>
          </span>
          <h4 class="text-section py-0 my-1" >{{ __('Finance Management') }}</h4>
        </li>
        <li class="nav-item" >
          <a href="#payment" class="nav-link py-1" data-bs-toggle="collapse" >
            <i class="fas fa-wallet" ></i>
            <p>{{ __('Payment Methods') }}</p>
            <span class="caret" ></span>
          </a>
          <div class="collapse" id="payment" >
            <ul class="nav nav-collapse py-0" >
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Manage Methods') }}</span>
                </a>
              </li>
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Add New Method') }}</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item" >
          <a href="#deposit" class="nav-link py-1" data-bs-toggle="collapse" >
            <i class="fas fa-chart-line" ></i>
            <p>{{ __('Manage Deposits') }}</p>
            <span class="caret" ></span>
          </a>
          <div class="collapse" id="deposit" >
            <ul class="nav nav-collapse py-0" >
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Today Desposits') }}</span>
                  <span class="badge badge-secondary" >1</span>
                </a>
              </li>
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Total Deposits') }}</span>
                  <span class="badge badge-secondary" >1</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item" >
          <a href="#withdraw" class="nav-link py-1" data-bs-toggle="collapse" >
            <i class="fas fa-exchange-alt"></i>
            <p>{{ __('Manage Withdrawals') }}</p>
            <span class="caret" ></span>
          </a>
          <div class="collapse" id="withdraw">
            <ul class="nav nav-collapse py-0">
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Today Withdraws') }}</span>
                  <span class="badge badge-secondary" >1</span>
                </a>
              </li>
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Total Withdraws') }}</span>
                  <span class="badge badge-secondary" >1</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-section" >
          <span class="sidebar-mini-icon" >
            <i class="fa fa-ellipsis-h" ></i>
          </span>
          <h4 class="text-section py-0 my-1" >{{ __('User Management') }}</h4>
        </li>
        <li class="nav-item" >
          <a href="#user" class="nav-link py-1" data-bs-toggle="collapse" >
            <i class="fas fa-user-lock" ></i>
            <p>{{ __('Admin Users') }}</p>
            <span class="caret" ></span>
          </a>
          <div class="collapse" id="user" >
            <ul class="nav nav-collapse py-0" >
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Manage Users') }}</span>
                </a>
              </li>
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Add New User') }}</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item" >
          <a href="#member" class="nav-link py-1" data-bs-toggle="collapse" >
            <i class="fas fa-user-astronaut" ></i>
            <p>{{ __('Manage Members') }}</p>
            <span class="caret" ></span>
          </a>
          <div class="collapse" id="member" >
            <ul class="nav nav-collapse py-0" >
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Today Members') }}</span>
                  <span class="badge badge-secondary" >1</span>
                </a>
              </li>
              <li class="nav-item" >
                <a href="{{ route('members.index') }}" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Total Members') }}</span>
                  <span class="badge badge-secondary" >1</span>
                </a>
              </li>
              <li class="nav-item" >
                <a href="{{ route('members.create') }}" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Add New Member') }}</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item" >
          <a href="#role" class="nav-link py-1" data-bs-toggle="collapse" >
            <i class="fas fa-user-shield" ></i>
            <p>{{ __('Role & Permission') }}</p>
            <span class="caret" ></span>
          </a>
          <div class="collapse" id="role" >
            <ul class="nav nav-collapse py-0" >
              <li class="nav-item" >
                <a href="{{ route('roles.index') }}" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('User Roles') }}</span>
                </a>
              </li>
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Permissions') }}</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-section" >
          <span class="sidebar-mini-icon" >
            <i class="fa fa-ellipsis-h" ></i>
          </span>
          <h4 class="text-section py-0 my-1" >{{ __('Company Setup') }}</h4>
        </li>
        <li class="nav-item" >
          <a href="javascript:void(0);" class="nav-link py-1" >
            <i class="fas fa-university" ></i>
            <p>{{ __('Manage Company') }}</p>
          </a>
        </li>
        <li class="nav-item" >
          <a href="#branch" class="nav-link py-1" data-bs-toggle="collapse" >
            <i class="fas fa-store-alt" ></i>
            <p>{{ __('Company Branches') }}</p>
            <span class="caret" ></span>
          </a>
          <div class="collapse" id="branch" >
            <ul class="nav nav-collapse py-0" >
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Manage Branches') }}</span>
                </a>
              </li>
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Add New Branch') }}</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-section" >
          <span class="sidebar-mini-icon" >
            <i class="fa fa-ellipsis-h" ></i>
          </span>
          <h4 class="text-section py-0 my-1" >{{ __('System & Configuration') }}</h4>
        </li>
        <li class="nav-item" >
          <a href="#setup" class="nav-link py-1" data-bs-toggle="collapse" >
            <i class="fas fa-cogs" ></i>
            <p>{{ __('System Setup') }}</p>
            <span class="caret" ></span>
          </a>
          <div class="collapse" id="setup" >
            <ul class="nav nav-collapse py-0" >
              <li class="nav-item" >
                <a href="{{ route('system.settings') }}" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('General Settings') }}</span>
                </a>
              </li>
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('SMTP Setup') }}</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item" >
          <a href="#location" class="nav-link py-1" data-bs-toggle="collapse" >
            <i class="fas fa-map-marker-alt" ></i>
            <p>{{ __('Locations') }}</p>
            <span class="caret" ></span>
          </a>
          <div class="collapse" id="location" >
            <ul class="nav nav-collapse py-0" >
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Manage Countries') }}</span>
                </a>
              </li>
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Manage Provinces') }}</span>
                </a>
              </li>
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Manage Cities') }}</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item" >
          <a href="#system" class="nav-link py-1" data-bs-toggle="collapse" >
            <i class="fas fa-exclamation-circle" ></i>
            <p>{{ __('About System') }}</p>
            <span class="caret" ></span>
          </a>
          <div class="collapse" id="system" >
            <ul class="nav nav-collapse py-0" >
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Informations') }}</span>
                </a>
              </li>
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Variables') }}</span>
                </a>
              </li>
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('Documentation') }}</span>
                </a>
              </li>
              <li class="nav-item" >
                <a href="javascript:void(0);" class="nav-link" style="padding-top: 0.375rem !important; padding-bottom: 0.375rem !important;" >
                  <i class="far fa-circle" ></i>
                  <span class="ms-2" >{{ __('System Modules') }}</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</aside>
