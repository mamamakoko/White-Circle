<div class="sidebar">
    <div class="logo-details">
        <img src="<?php echo base_url ?>database/SystemData/<?php echo $system_info["SystemLogo"]; ?>" alt="profileImg"
            class="icon" loading="lazy">
        <div class="logo_name">
            <?php echo $system_info["SystemName"]; ?>
        </div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
        <li>
            <a href="./admin.php">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li>
            <a href="./admin.php?page=plugins/Admin-books-php/">
                <i class='bx bx-book'></i>
                <span class="links_name">Books</span>
            </a>
            <span class="tooltip">Books</span>
        </li>
        <li>
            <a href="./admin.php?page=plugins/Admin-users-php/">
                <i class='bx bx-user'></i>
                <span class="links_name">User</span>
            </a>
            <span class="tooltip">User</span>
        </li>
        <li>
            <a href="./admin.php?page=plugins/Admin-messages-php/">
                <i class='bx bx-chat'></i>
                <span class="links_name">Messages</span>
            </a>
            <span class="tooltip">Messages</span>
        </li>
        <li>
            <a href="./admin.php?page=plugins/Admin-file-manager-php/">
                <i class='bx bx-folder'></i>
                <span class="links_name">File Manager</span>
            </a>
            <span class="tooltip">Files</span>
        </li>
        <li>
            <a href="./admin.php?page=plugins/Admin-Settings-php/">
                <i class='bx bx-cog'></i>
                <span class="links_name">Setting</span>
            </a>
            <span class="tooltip">Setting</span>
        </li>
        <li class="profile">
            <div class="profile-details">
                <img src="profile.png" alt="profileImg" loading="lazy">
                <div class="name_job">
                    <div class="name">John Llenard</div>
                    <div class="job">Admin</div>
                </div>
            </div>
            <i class='bx bx-log-out' id="log_out"></i>
        </li>
    </ul>
</div>
<script src="plugins/Admin-manual-js/script.js"></script>