<nav class="navbar">
    <div class="container">
        <div class="navbar-left">
            <a href="/" class="logo">
                <img src="img/icon.ico">
            </a>
            <div class="search-box">
                <img src="img/search.png">
                <form action="/search" method="post">
                    <input type="text" placeholder="Search..." name="q">
                </form>
            </div>
        </div>
        <div class="navbar-center">
            <ul>
                <li>
                    <a href="/" class="active-link">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match" width="24" height="24" focusable="false">
                            <path d="M23 9v2h-2v7a3 3 0 01-3 3h-4v-6h-4v6H6a3 3 0 01-3-3v-7H1V9l11-7 5 3.18V2h3v5.09z"></path>
                        </svg>
                        <span>Home</span>
                    </a>
                </li>
                <li><a href="/network" class="active-link">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match" width="24" height="24" focusable="false">
                            <path d="M12 6.5a4.5 4.5 0 114.5 4.5A4.49 4.49 0 0112 6.5zm6 6.5h-3a3 3 0 00-3 3v6h9v-6a3 3 0 00-3-3zM6.5 6A3.5 3.5 0 1010 9.5 3.5 3.5 0 006.5 6zm1 9h-2A2.5 2.5 0 003 17.5V22h7v-4.5A2.5 2.5 0 007.5 15z"></path>
                        </svg>
                        <span>Network</span>
                    </a></li>

                <li>
                    <a href="/jobs" class="active-link">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match" width="24" height="24" focusable="false">
                            <path d="M22.84 10.22L21 6h-3.95V5a3 3 0 00-3-3h-4a3 3 0 00-3 3v1H2l2.22 5.18A3 3 0 007 13h14a2 2 0 001.84-2.78zM15.05 6h-6V5a1 1 0 011-1h4a1 1 0 011 1zM7 14h15v3a3 3 0 01-3 3H5a3 3 0 01-3-3V8.54l1.3 3A4 4 0 007 14z"></path>
                        </svg>
                        <span>Jobs</span>
                    </a>
                </li>
              
            </ul>
        </div>
        <div class="navbar-right">
            <div class="online">
            <img src="<?php echo $user->image_url; ?>" class="nav-profile-img" onclick="showMenu()">

            </div>
        </div>

        <div class="profile-menu-wrap" id="profileMenu">
            <div class="profile-menu">
                <div class="user-info">
                     <img src="<?php echo $user->image_url; ?>">
                    <div>
                        <a href="/profile?user=<?php echo $user->profile_path;  ?>" style="color: black">

                            <h3>
                                <?php echo $user->fullName ?>
                            </h3>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="logout-block">
                    <a href="/logout" class="profile-menu-link">
                        <ion-icon name="log-out-outline" class="logout-icon"></ion-icon>
                        Logout
                    </a>
                </div>


            </div>
        </div>
    </div>
    <script src="js/home.js"></script>
</nav>