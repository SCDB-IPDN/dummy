<div id="header" class="header navbar-default">
    <div class="navbar-header">
        <a href="<?php echo base_url('praja');?>" class="navbar-brand"><span class="navbar-logo"></span> <b>SCDB</b>
            IPDN</a>
        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown navbar-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="https://www.searchpng.com/wp-content/uploads/2019/02/Men-Profile-Image.png" alt="" />
                <span class="d-none d-md-inline"><?php echo $this->session->userdata('nama'); ?></span> <b
                    class="caret"></b>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-divider"></div>
            </div>
        </li>
    </ul>
</div>
