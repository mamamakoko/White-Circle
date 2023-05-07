<div class="sidebar open">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">
            White Circle
        </div>

    </div>
    <ul class="nav-list">
        <li>
            <a href="./admin.php">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
                <span class="tooltip">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="./admin.php?page=Admin/plugins/Product/">
                <i class='bx bx-box'></i>
                <span class="links_name">Products</span>
                <span class="tooltip">Products</span>
            </a>
        </li>
        <li>
            <a href="./admin.php?page=Admin/plugins/Customer/">
                <i class='bx bx-user'></i>
                <span class="links_name">Customers</span>
                <span class="tooltip">Customers</span>
            </a>
        </li>
        <li>
            <a href="./admin.php?page=Admin/plugins/Order/">
                <i class='bx bx-basket'></i>
                <span class="links_name">Orders</span>
                <span class="tooltip">Orders</span>
            </a>
        </li>
        <li>
            <a href="./admin.php?page=Admin/plugins/Others/">
                <i class='bx bx-category'></i>
                <span class="links_name">Others</span>
                <span class="tooltip">Others</span>
            </a>
        </li>
        <li>
            <a href="./admin.php?page=Admin/plugins/SampleView/">
                <i class='bx bx-folder'></i>
                <span class="links_name">Preview</span>
                <span class="tooltip">Preview</span>
            </a>
        </li>
        <!-- <li>
            <a href="./admin.php?page=plugins/Admin-file-manager-php/">
                <i class='bx bx-folder'></i>
                <span class="links_name">File Manager</span>
                <span class="tooltip">Files</span>
            </a>
        </li>
        <li>
            <a href="./admin.php?page=plugins/Admin-Settings-php/">
                <i class='bx bx-cog'></i>
                <span class="links_name">Setting</span>
                <span class="tooltip">Setting</span>
            </a>
        </li> -->
        <li class="profile">
            <div class="profile-details">
                <img src="#" alt="profileImg">
                <div class="name_job">
                    <div class="name">John Llenard</div>
                    <div class="job">Admin</div>
                </div>
            </div>
            <i class='bx bx-log-out' id="log_out"></i>
        </li>
    </ul>
</div>
<script>
    const sidebar = document.querySelector('.sidebar');

    function toggleSidebar() {
        if (window.matchMedia('(max-width: 600px)').matches) {
            sidebar.classList.remove('open');
        } else {
            sidebar.classList.add('open');
        }
    }

    toggleSidebar(); // initial call

    window.addEventListener('resize', toggleSidebar);
</script>