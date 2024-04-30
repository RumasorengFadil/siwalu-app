<div class="sidebar-menu">
    <ul class="menu">

        <li class="sidebar-item {{ request()->is('admin') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class='sidebar-link'>
                <i class="bi bi-patch-check"></i>
                <span>Accept Laundry</span>
            </a>
        </li>

        <li class="sidebar-item {{ request()->is('admin/product/create') ? 'active' : '' }}">
            <a href="" class='sidebar-link'>
                <i class="bi bi-plus-square"></i>
                <span>Tambah Laundry</span>
            </a>
        </li>

        <li class="sidebar-item {{ request()->is('admin/voucher') ? 'active' : '' }}">
            <a href="" class='sidebar-link'>
                <i class="bi bi-trash"></i>
                <span>Hapus Laundry</span>
            </a>
        </li>

        <li class="sidebar-item {{ request()->is('admin/voucher') ? 'active' : '' }}">
            <a href="" class='sidebar-link'>
                <i class="bi bi-arrow-repeat"></i>
                <span>Update Laundry</span>
            </a>
        </li>

    </ul>
</div>

