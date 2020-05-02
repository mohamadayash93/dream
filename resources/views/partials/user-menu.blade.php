<!-- User menu -->
<div class="sidebar-user-material">
    <div class="sidebar-user-material-body">
        <div class="card-body text-center">
            <a href="#">
                <img src="{{asset('storage/'.Auth::user()->image)}}"
                     class="img-fluid rounded-circle shadow-1 mb-3" width="120" height="120" alt="">
            </a>
            <h6 class="mb-0 text-white text-shadow-dark">{{Auth::user()->name}}</h6>
            <span class="font-size-sm text-white text-shadow-dark">{{Auth::user()->email}}</span>
        </div>

        <div class="sidebar-user-material-footer">
            <a href="#user-nav"
               class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle"
               data-toggle="collapse"><span>{{trans('app.my account')}}</span></a>
        </div>
    </div>

    <div class="collapse" id="user-nav">
        <ul class="nav nav-sidebar">
            <li class="nav-item">
                <a href="{{route('profile')}}" class="nav-link">
                    <i class="icon-user-tie"></i>
                    <span>{{trans('app.profile')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();" class="nav-link">
                    <i class="icon-switch2"></i>
                    <span>{{trans('app.logout')}}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
<!-- /user menu -->