<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route(BladeAcl::getRoute('dashboard')) }}" class="nav-link @isActiveMenu('dashboard')">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        @roleCheck(RoleConstant::ADMIN)
        <li class="nav-item">
            <a href="{{ route(BladeAcl::getRoute('users.list')) }}" class="nav-link @isActiveMenu('users')">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Users
                </p>
            </a>
        </li>
        @endRoleCheck
        @roleCheck(RoleConstant::ADMIN, RoleConstant::OWNER)
        <li class="nav-item">
            <a href="{{ route(BladeAcl::getRoute('warehouses.list')) }}" class="nav-link @isActiveMenu('warehouses')">
                <i class="nav-icon fas fa-warehouse"></i>
                <p>
                    Warehouses
                </p>
            </a>
        </li>
        @endRoleCheck
        <li class="nav-item">
            <a href="{{ route(BladeAcl::getRoute('warehouse_requests.list')) }}" class="nav-link @isActiveMenu('warehouse_requests')">
                <i class="nav-icon fas fa-warehouse"></i>
                <p>
                    Request of Use
                </p>
            </a>
        </li>
        @roleCheck(RoleConstant::CUSTOMER)
        <li class="nav-item">
            <a href="{{ route(BladeAcl::getRoute('customer_warehouses.list')) }}" class="nav-link @isActiveMenu('warehouses')">
                <i class="nav-icon fas fa-cube"></i>
                <p>
                    Warehouses
                </p>
            </a>
        </li>
        @endRoleCheck

        @roleCheck(RoleConstant::ADMIN, RoleConstant::CUSTOMER)
        <li class="nav-item">
            <a href="{{ route(BladeAcl::getRoute('items.list')) }}" class="nav-link @isActiveMenu('items')">
                <i class="nav-icon fas fa-cube"></i>
                <p>
                    Items
                </p>
            </a>
        </li>
        @endRoleCheck

        <li class="nav-item">
            <a href="{{ route(BladeAcl::getRoute('inventories.list')) }}" class="nav-link @isActiveMenu('inventories')">
                <i class="nav-icon fas fa-cubes"></i>
                <p>
                    Inventories
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route(BladeAcl::getRoute('delivery_inbounds.list')) }}" class="nav-link @isActiveMenu('delivery_inbounds')">
                <i class="nav-icon fas fa-truck"></i>
                <p>
                    Delivery Inbound
                </p>
            </a>
        </li>

        @roleCheck(RoleConstant::ADMIN)
        <li class="nav-item">
            <a href="{{ route(BladeAcl::getRoute('couriers.list')) }}" class="nav-link @isActiveMenu('couriers')">
                <i class="nav-icon fas fa-dolly-flatbed"></i>
                <p>
                    Couriers
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route(BladeAcl::getRoute('services.list')) }}" class="nav-link @isActiveMenu('services')">
                <i class="nav-icon fas fa-broom"></i>
                <p>
                    Warehouse Services
                </p>
            </a>
        </li>
        @endRoleCheck

    </ul>
</nav>
