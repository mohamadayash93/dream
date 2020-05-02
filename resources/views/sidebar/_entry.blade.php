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

        <!-- Slides -->
        <li class="nav-item">
            <a href="{{route('slides.index')}}"
               class="nav-link {{request()->is('*/slides/*') || request()->is('*/slides') ? 'active' : ''}}">
                <i class="icon-screen3"></i>
                <span>{{trans('app.slides')}}</span>
            </a>
        </li>
        <!-- End Slides -->

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-collaboration"></i> <span>{{trans('app.relations')}}</span></a>
            <ul class="nav nav-group-sub">

                <!-- Clients -->
                <li class="nav-item">
                    <a href="{{route('clients.index')}}"
                       class="nav-link {{request()->is('*/clients/*') || request()->is('*/clients') ? 'active' : ''}}">
                        <i class="icon-users4"></i>
                        <span>{{trans('app.clients')}}</span>
                    </a>
                </li>
                <!-- End Clients -->

                <!-- Vendors -->
                <li class="nav-item">
                    <a href="{{route('vendors.index')}}"
                       class="nav-link {{request()->is('*/vendors/*') || request()->is('*/vendors') ? 'active' : ''}}">
                        <i class="icon-users2"></i>
                        <span>{{trans('app.vendors')}}</span>
                    </a>
                </li>
                <!-- End Vendors -->

            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-comment"></i> <span>{{trans('app.contact')}}</span></a>
            <ul class="nav nav-group-sub">

                <!-- Contacts -->
                <li class="nav-item">
                    <a href="{{route('contacts.index')}}"
                       class="nav-link {{request()->is('*/contacts/*') || request()->is('*/contacts') ? 'active' : ''}}">
                        <i class="icon-address-book"></i>
                        <span>{{trans('app.contacts')}}</span>
                    </a>
                </li>
                <!-- End Contacts -->


                <!-- Addresses -->
                <li class="nav-item">
                    <a href="{{route('addresses.index')}}"
                       class="nav-link {{request()->is('*/addresses/*') || request()->is('*/addresses') ? 'active' : ''}}">
                        <i class="icon-location3"></i>
                        <span>{{trans('app.addresses')}}</span>
                    </a>
                </li>
                <!-- End Addresses -->

                <!-- Socials -->
                <li class="nav-item">
                    <a href="{{route('socials.index')}}"
                       class="nav-link {{request()->is('*/socials/*') || request()->is('*/socials') ? 'active' : ''}}">
                        <i class="icon-facebook2"></i>
                        <span>{{trans('app.socials')}}</span>
                    </a>
                </li>
                <!-- End Socials -->

                <!-- Forms -->
                <li class="nav-item">
                    <a href="{{route('forms.index')}}"
                       class="nav-link {{request()->is('*/forms/*') || request()->is('*/forms') ? 'active' : ''}}">
                        <i class="icon-comment-discussion"></i>
                        <span>{{trans('app.forms')}}</span>
                    </a>
                </li>
                <!-- End Forms -->

            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-stack"></i> <span>{{trans('app.products management')}}</span></a>
            <ul class="nav nav-group-sub">


                <!-- Products Categories -->
                <li class="nav-item">
                    <a href="{{route('productCategories.index')}}"
                       class="nav-link {{request()->is('*/productCategories/*') || request()->is('*/productCategories') ? 'active' : ''}}">
                        <i class="icon-paragraph-center2"></i>
                        <span>{{trans('app.productCategories')}}</span>
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

        <!-- Services -->
        <li class="nav-item">
            <a href="{{route('services.index')}}"
               class="nav-link {{request()->is('*/services/*') || request()->is('*/services') ? 'active' : ''}}">
                <i class="icon-versions"></i>
                <span>{{trans('app.services')}}</span>
            </a>
        </li>
        <!-- End Services -->

        <!-- Posts -->
        <li class="nav-item">
            <a href="{{route('posts.index')}}"
               class="nav-link {{request()->is('*/posts/*') || request()->is('*/posts') ? 'active' : ''}}">
                <i class="icon-browser"></i>
                <span>{{trans('app.posts')}}</span>
            </a>
        </li>
        <!-- End Posts -->

        <!-- Projects -->
        <li class="nav-item">
            <a href="{{route('projects.index')}}"
               class="nav-link {{request()->is('*/projects/*') || request()->is('*/projects') ? 'active' : ''}}">
                <i class="icon-wall"></i>
                <span>{{trans('app.projects')}}</span>
            </a>
        </li>
        <!-- End Projects -->

    </ul>
</div>
<!-- /main navigation -->
