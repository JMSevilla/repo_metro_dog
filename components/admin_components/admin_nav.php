<div id="admin_dash_nav">
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <img src="assets/metrodogs logo.jpg" style="width: 25%; height: auto;" class="img-fluid" alt="">
            <el-tag type="success" size="small" style="margin-left: 40px;">BETA v1.0</el-tag>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>
        <div class="app-header__content" style="margin-left: 50px;">
            <div class="app-header-left">
                <ul class="header-menu nav">
                    <li class="nav-item">
                        <a href="javascript:void(0);" class="nav-link">
                            <i class="nav-link-icon fa fa-database"> </i>
                            Statistics
                        </a>
                    </li>
                    <li class="btn-group nav-item">
                        <a href="javascript:void(0);" class="nav-link">
                            <i class="nav-link-icon fa fa-edit"></i>
                            Projects
                        </a>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="javascript:void(0);" class="nav-link">
                            <i class="nav-link-icon fa fa-cog"></i>
                            Settings
                        </a>
                    </li>
                </ul>
            </div>
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                        <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                       <a href="profilemanagement" style="text-decoration:none;"><button type="button" tabindex="0" class="dropdown-item"><i class="fas fa-user"></i>&nbspMy Profile</button></a>
                                        <button type="button" tabindex="0" class="dropdown-item"><i class="fas fa-cog"></i>&nbspSettings</button>
                                        <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                        <button type="button" tabindex="0" class="dropdown-item" @click="changePlatform()"><i class="fas fa-exchange-alt"></i>&nbspChange Platform</button>
                                        <div tabindex="-1" class="dropdown-divider"></div>
                                        <button type="button" tabindex="0" class="dropdown-item" @click ="onLogout()" v-loading.fullscreen.lock="fullscreenLoadingOnLogout"><i class="fas fa-sign-out-alt"></i>&nbspLog Out</button>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading">
                                    Alina Mclourd
                                </div>
                                <div class="widget-subheading">
                                    VP People Manager
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>