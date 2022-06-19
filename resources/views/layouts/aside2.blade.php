<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{url('home')}}">
                <?php
                  $settings= App\Models\System::first();
                  //$settings= App\Models\System::all()->where('added_by',auth()->user()->user_id);
?>
                <img alt="image" src="{{url('public/assets/img/logo')}}/{{$settings->picture}}" class="header-logo" />
                <span class="logo-name"></span>
            </a>
        </div>
        <ul class="sidebar-menu active show">
            @can('manage-dashboard')
            <li class="dropdown {{  request()->is('/dashboard') ? 'active' : '' }}">
                <a href="{{url('home')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            @endcan
            @can('manage-farmer')
            <li class="dropdown {{  request()->is('farmer/') ? 'active' : '' }} ">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="command"></i><span>{{__('farmer.farmer')}}</span></a>
                <ul class="dropdown-menu">
                    @can('view-farmer')
                    <li class="{{ request()->routeIs('farmer.*')? 'active': ''}} active"><a class="nav-link"
                            href="{{url('farmer/')}}">{{__('farmer.manage_farmer')}}</a></li>
                    @endcan
                    @can('view-group')
                    <li><a class="nav-link" href="{{url('manage-group')}}">{{__('farmer.manage_group')}}</a></li>
                    @endcan
                    @can('view-farmer')
                    <li><a class="nav-link" href="{{url('assign_farmer/')}}">{{__('farmer.assign_farmer')}}</a></li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('manage-farming')
            <li class="dropdown">

                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="command"></i><span>{{__('farming.farming')}}</span></a>
                <ul class="dropdown-menu">
                    @can('view-manage-farming')
                    <li><a class="nav-link" href="{{url('crop_type')}}">Crop Type</a></li>
                    @endcan
                    @can('view-manage-farming')
                    <li><a class="nav-link" href="{{url('seed_type')}}">Seed Type</a></li>
                    @endcan
                    @can('view-manage-farming')
                    <li><a class="nav-link" href="{{url('pesticide_type')}}">Pesticide Type</a></li>
                    @endcan
                    @can('view-view-farmer-assets')
                    <li><a class="nav-link" href="{{url('register_assets')}}">{{__('farming.farmer_assets')}}</a></li>
                    @endcan
                    @can('view-view-farming-cost')
                    <li><a class="nav-link" href="{{url('farming_cost')}}">{{__('farming.farming_cost')}}</a></li>
                    @endcan
                    @can('view-view-cost-centre')
                    <li><a class="nav-link" href="{{url('cost_centre')}}">{{__('farming.cost_centre')}}</a></li>
                    @endcan
                    @can('view-view-farming-process')
                    <li><a class="nav-link" href="{{url('farming_process')}}">GAP</a></li>
                    @endcan
                    @can('view-view-crop-monitoring')
                    <li><a class="nav-link" href="{{url('crops_monitoring')}}">{{__('farming.crop_monitoring')}}</a>
                    </li>
                    @endcan
                    @can('view-manage-farming')
                    <li><a class="nav-link" href="{{url('lime_base')}}">Lime Base</a></li>
                    @endcan
                    @can('view-manage_seasson')
                    <li><a class="nav-link" href="{{url('seasson')}}">{{__('farming.manage_seasson')}}</a></li>
                    @endcan
                </ul>

            </li>
            @endcan

  

            @can('manage-orders1')
            <li class="dropdown">

                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="command"></i><span>{{__('ordering.orders')}}</span></a>
                <ul class="dropdown-menu">
                    @can('view-order_list')
                    <li><a class="nav-link" href="{{url('orders')}}">{{__('ordering.order_list')}}</a></li>
                    @endcan
                    @can('view-quotation-list')
                    <li><a class="nav-link" href="{{url('quotationList')}}">{{__('ordering.quotationList')}}</a></li>
                    @endcan
                    <li><a class="nav-link" href="{{url('crops_order')}}">Create Order</a></li>

                </ul>

            </li>
            @endcan

            @can('view-cargo-list')
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Cargo
                        Management</span></a>
                <ul class="dropdown-menu">
                    @can('view-cargo-list')
                    <li><a class="nav-link" href="{{url('pacel_list')}}">Item List</a></li>
                    @endcan
                    @can('view-cargo-client-list')
                    <li><a class="nav-link" href="{{url('client')}}">Client List</a></li>
                    @endcan
                    @can('view-cargo-quotation')
                    <li><a class="nav-link" href="{{url('pacel_quotation')}}">Quotation</a></li>
                    @endcan
                    @can('view-cargo-invoice')
                    <li><a class="nav-link" href="{{url('pacel_invoice')}}">Invoice</a></li>
                    @endcan
                    @can('view-cargo-mileage')
                    <li><a class="nav-link" href="{{url('mileage')}}">Mileage List</a></li>
                    @endcan
                </ul>
            </li>
            @endcan

       

                </ul>
            </li>
@endcan


    </aside>
</div>