<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <div data-scrollbar="true" data-height="100%">
        <ul class="nav">
            <li class="nav-profile <?php echo $this->uri->segment(1) == "profil" ? "active" : ""; ?>">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <?php if(file_exists('assets/img/user/'.$this->session->userdata('image_url')) && $this->session->userdata('image_url') != NULL) { ?>
                        <img src="<?php echo base_url().'assets/img/user/'. $this->session->userdata('image_url');?>"
                            alt="" />
                        <?php }else{ ?>
                        <img src="https://www.searchpng.com/wp-content/uploads/2019/02/Men-Profile-Image.png" alt="" />
                        <?php } ?>
                    </div>
                    <div class="info">
                        <b class="caret pull-right"></b>
                        IPDN
                        <small>Data Praja</small>
                    </div>
                </a>
            </li>
        </ul>
        <ul class="nav">
            <li class="nav-header">Utama</li>

            <li class="<?php echo $this->uri->segment(1) == "home" ? "active" : ""; ?> has-sub">
                <a href="<?php echo base_url('home'); ?>">
                    <i class="fa fa-th-large"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="has-sub">
                <a href="https://ipdn.ac.id" target="_blank">
                    <i class="fas fa-globe"></i>
                    <span>IPDN</span>
                </a>
            </li>

            <li class="nav-header">Menu</li>

            <!-- Keprajaan -->
            <li
                class="<?php echo $this->uri->segment(1)=="praja" || $this->uri->segment(1)=="alumni" ?"active":"";?> has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-graduation-cap"></i>
                    <span>Keprajaan</span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo $this->uri->segment(1) == "praja" ? "active" : ""; ?> has-sub">

                    <li class="<?php echo $this->uri->segment(1) == "praja" ? "active" : ""; ?>"><a
                            href="<?php echo base_url('praja'); ?>">Praja</a></li>

            </li>
        </ul>
        </li>
        <!-- END keprajaan -->
    </div>
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->