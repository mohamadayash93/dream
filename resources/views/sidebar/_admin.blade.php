<!-- Main navigation -->
<div class="card card-sidebar-mobile">
    <ul class="nav nav-sidebar" data-nav-type="accordion">

        <!-- Main -->
        <li class="nav-item-header">
            <div class="text-uppercase font-size-xs line-height-xs">{{trans('app.menu')}}</div>
            <i class="icon-menu" title="{{trans('app.menu')}}"></i>
        </li>

        <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link {{request()->is('*/home') ? 'active' : ''}}">
                <i class="icon-home4"></i>
                <span>{{trans('app.dashboard')}}</span>
            </a>
        </li>

        <!-- Users -->
        <li class="nav-item">
            <a href="{{route('users.index')}}"
               class="nav-link {{request()->is('*/users/*') || request()->is('*/users') ? 'active' : ''}}">
                <i class="icon-users"></i>
                <span>{{trans('app.users')}}</span>
            </a>
        </li>
        <!-- End Users -->

        <!-- Slides -->
        <li class="nav-item">
            <a href="{{route('slides.index')}}"
               class="nav-link {{request()->is('*/slides/*') || request()->is('*/slides') ? 'active' : ''}}">
                <i class="icon-screen3"></i>
                <span>{{trans('app.slides')}}</span>
            </a>
        </li>
        <!-- End Slides -->

        <!-- Clients -->
        <li class="nav-item">
            <a href="{{route('partners.index')}}"
               class="nav-link {{request()->is('*/partners/*') || request()->is('*/partners') ? 'active' : ''}}">
                <i class="fa fa-handshake-o"></i>
                <span>{{trans('app.partners')}}</span>
            </a>
        </li>
        <!-- End Clients -->





        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-stack"></i> <span>{{trans('app.products management')}}</span></a>
            <ul class="nav nav-group-sub">


                <!-- Products Categories -->
                <li class="nav-item">
                    <a href="{{route('categories.index')}}"
                       class="nav-link {{request()->is('*/categories/*') || request()->is('*/categories') ? 'active' : ''}}">
                        <i class="icon-paragraph-center2"></i>
                        <span>{{trans('app.categories')}}</span>
                    </a>
                </li>
                <!-- End Products Categories -->

                <!-- Products -->
                <li class="nav-item">
                    <a href="{{route('products.index')}}"
                       class="nav-link {{request()->is('*/products/*') || request()->is('*/products') ? 'active' : ''}}">
                        <i class="icon-stack"></i>
                        <span>{{trans('app.products')}}</span>
                    </a>
                </li>
                <!-- End Products -->

            </ul>
        </li>


        <!-- Offers -->
        <li class="nav-item">
            <a href="{{route('offers.index')}}"
               class="nav-link {{request()->is('*/offers/*') || request()->is('*/offers') ? 'active' : ''}}">
                <i class="icon-versions"></i>
                <span>{{trans('app.offers')}}</span>
            </a>
        </li>
        <!-- End Offers -->

        <!-- Additions -->
        <li class="nav-item">
            <a href="{{route('additions.index')}}"
               class="nav-link {{request()->is('*/additions/*') || request()->is('*/additions') ? 'active' : ''}}">
                <i class="icon-stack-plus"></i>
                <span>{{trans('app.additions')}}</span>
            </a>
        </li>
        <!-- End Additions -->

        <!-- Galleries -->
        <li class="nav-item">
            <a href="{{route('galleries.index')}}"
               class="nav-link {{request()->is('*/galleries/*') || request()->is('*/galleries') ? 'active' : ''}}">
                <i class="icon-images3"></i>
                <span>{{trans('app.galleries')}}</span>
            </a>
        </li>
        <!-- End Galleries -->

        <!-- Blogs -->
        <li class="nav-item">
            <a href="{{route('blogs.index')}}"
               class="nav-link {{request()->is('*/blogs/*') || request()->is('*/blogs') ? 'active' : ''}}">
                <i class="icon-browser"></i>
                <span>{{trans('app.blogs')}}</span>
            </a>
        </li>
        <!-- End Blogs -->

        <!-- Contacts -->
        <li class="nav-item">
            <a href="{{route('contacts.index')}}"
               class="nav-link {{request()->is('*/contacts/*') || request()->is('*/contacts') ? 'active' : ''}}">
                <i class="icon-address-book"></i>
                <span>{{trans('app.contacts')}}</span>
            </a>
        </li>
        <!-- End Contacts -->

    </ul>
</div>
<!-- /main navigation -->
