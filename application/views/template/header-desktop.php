<!-- begin:: Header -->
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " data-ktheader-minimize="on">
    <div class="kt-header__top">
        <div class="kt-container">

            <!-- begin:: Brand -->
            <div class="kt-header__brand   kt-grid__item" id="kt_header_brand">
                <div class="kt-header__brand-logo">
                    <a href="<?php echo base_url('dashboard/index'); ?>">
                        <img class="logo-small" alt="Logo MAKSAK" src="<?php echo base_url(); ?>asset/assets/media/logos/logo-maksak.png" class="kt-header__brand-logo-default" />
                    </a>
                </div>
            </div>

            <!-- end:: Brand -->

            <!-- begin:: Header Topbar -->
            <div class="kt-header__topbar kt-grid__item kt-grid__item--fluid">
                <!--begin: Quick actions -->
                <div class="kt-header__topbar-item dropdown">
                    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                        <span class="kt-header__topbar-icon kt-header__topbar-icon--primary"><i class="flaticon2-cup"></i></span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl back-grey">
                        <ul class="festive-list">
                            <h2>Sedang berlangsung</h2>
                            <?php if (isset($_SESSION['current_events']['event_now']) && count($_SESSION['current_events']['event_now']) > 0) {
                                foreach ($_SESSION['current_events']['event_now'] as $event_now) { ?>
                                    <li>
                                        <a class="button-top" href="<?php echo base_url() . 'events/details/' . $event_now->id; ?>">
                                            <i class="flaticon2-cup"></i>
                                        </a><br>
                                        <a class="button-bottom" href="<?php echo base_url() . 'result/index/' . $event_now->id; ?>">
                                            <i class="flaticon2-calendar"></i>
                                        </a>
                                        <a href="<?php echo base_url() . 'result/index/' . $event_now->id; ?>">
                                            <h3><?php echo $event_now->name; ?></h3>
                                        </a>
                                        <span class="festive-date">
                                            <?php
                                            $from1 = strtotime($event_now->date_from);
                                            $from = date("d M Y", $from1);

                                            $to1 = strtotime($event_now->date_to);
                                            $to = date("d M Y", $to1);

                                            echo $from . ' - ' . $to;
                                            ?>
                                        </span>
                                    </li>
                            <?php } } else { ?>
                                    <span class="small-tiada">Tiada kejohanan sedang berlangsung</span>
                            <?php } ?>
                        </ul>
                        <ul><hr style="margin-left: -40px;"></ul>
                        <ul class="next-festive-list">
                            <h2>Akan datang</h2>
                                <?php if (isset($_SESSION['current_events']['event_later']) && count($_SESSION['current_events']['event_later']) > 0) {
                                foreach ($_SESSION['current_events']['event_later'] as $event_later) { ?>
                                    <li>
                                        <a class="button-single" href="<?php echo base_url() . 'events/details/' . $event_later->id; ?>">
                                            <i class="flaticon2-cup"></i>
                                        </a>
                                        <a href="<?php echo base_url() . 'events/details/' . $event_later->id; ?>">
                                            <h3><?php echo $event_later->name; ?></h3>
                                        </a>
                                        <span class="festive-date">
                                            <?php
                                            $from1 = strtotime($event_later->date_from);
                                            $from = date("d M Y", $from1);

                                            $to1 = strtotime($event_later->date_to);
                                            $to = date("d M Y", $to1);

                                            echo $from . ' - ' . $to;
                                            ?>
                                        </span>
                                    </li>
                                <?php } } else { ?>
                                    <span class="small-tiada">Tiada kejohanan akan datang</span>
                                <?php } ?>
                        </ul>
                    </div>
                </div>

                <!--end: Quick actions -->
                <!--begin: Create event -->
                <div class="kt-header__topbar-item dropdown">
                    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                        <span class="kt-header__topbar-icon kt-header__topbar-icon--warning"><i class="flaticon2-gear"></i></span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                        <!--end: Head -->
                        <div class="tab-content">
                            <div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
                                <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="" data-mobile-height="200">
<?php if ($_SESSION['role'] != 2) { ?>
                                        <a href="<?php echo base_url(); ?>events/create" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-cup kt-font-warning"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Tambah kejohanan baru
                                                </div>
                                            </div>
                                        </a>
<?php } ?>
                                    <a href="<?php echo base_url(); ?>events/index" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-calendar-1 kt-font-warning"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                Lihat senarai kejohanan
                                            </div>
                                        </div>
                                    </a>
<?php if ($_SESSION['role'] != 2) { ?>
                                        <a href="<?php echo base_url(); ?>sports/create" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-plus-1 kt-font-warning"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Tambah acara baharu
                                                </div>
                                            </div>
                                        </a>
<?php } ?>
                                    <a href="<?php echo base_url(); ?>players/create" target="_blank" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-user kt-font-warning"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                Tambah pemain baharu
                                            </div>
                                        </div>
                                    </a>
                                    <a href="<?php echo base_url(); ?>players/index" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-avatar kt-font-warning"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                Lihat senarai pemain
                                            </div>
                                        </div>
                                    </a>
<?php if ($_SESSION['role'] != 2) { ?>
                                        <a href="<?php echo base_url(); ?>jointBodies/create" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-safe kt-font-warning"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Tambah ahli badan gabungan baharu
                                                </div>
                                            </div>
                                        </a>
<?php } ?>
<?php if ($_SESSION['role'] != 2) { ?>
                                        <a href="<?php echo base_url(); ?>jointBodies/list" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-layers kt-font-warning"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Lihat senarai badan gabungan
                                                </div>
                                            </div>
                                        </a>
<?php } ?>
<?php if ($_SESSION['role'] == 0) { ?>
                                        <a href="<?php echo base_url(); ?>admins/create" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-settings kt-font-warning"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Tambah admin baharu
                                                </div>
                                            </div>
                                        </a>
<?php } ?>
<?php if ($_SESSION['role'] == 1) { ?>
                                        <a href="/manual/MAKSAK laman_utama-manual.zip" target="_blank" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-download kt-font-warning"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Muat turun manual laman utama
                                                </div>
                                            </div>
                                        </a>
                                        <a href="/manual/MAKSAK MGAMESLINK MODUL LATIHAN - WebAdmin.pdf" target="_blank" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-download kt-font-warning"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Muat turun manual laman aplikasi
                                                </div>
                                            </div>
                                        </a>
<?php } ?>
<?php if ($_SESSION['role'] == 2) { ?>
                                        <a href="/manual/MAKSAK MGAMESLINK MODUL LATIHAN - Badan Gabungan.pdf" target="_blank" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-download kt-font-warning"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Muat turun manual laman aplikasi
                                                </div>
                                            </div>
                                        </a>
<?php } ?>
<?php if ($_SESSION['role'] == 0) { ?>
                                        <a href="<?php echo base_url(); ?>admins/logs" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-list-1 kt-font-warning"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Aktiviti Catatan
                                                </div>
                                            </div>
                                        </a>
<?php } ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!--begin: User bar -->
                <div class="kt-header__topbar-item kt-header__topbar-item--user">
                    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                        <span class="kt-hidden kt-header__topbar-welcome">Hai,</span>
                        <span class="kt-hidden kt-header__topbar-username"><?php echo $_SESSION['name']; ?></span>
                        <img class="kt-hidden-" alt="Pic" src="<?php if(isset($_SESSION['image']) && $_SESSION['image'] != ''){ 
                            echo base_url() . 'images/profile/' . $_SESSION['image']; } else { echo base_url().'asset/assets/media/logos/dp.png'; }?>" />
                        <span class="kt-header__topbar-icon kt-header__topbar-icon--brand kt-hidden"><b>J</b></span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

                        <!--begin: Head -->
                        <div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
                            <div class="kt-user-card__avatar">
                                <img class="kt-hidden-" alt="Pic" src="<?php if(isset($_SESSION['image']) && $_SESSION['image'] != ''){ 
                            echo base_url() . 'images/profile/' . $_SESSION['image']; } else { echo base_url().'asset/assets/media/logos/dp.png'; }?>" />

                                <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">J</span>
                            </div>
                            <div class="kt-user-card__name">
                                    <?php echo $_SESSION['name']; ?>
                            </div>
                            <div class="kt-user-card__badge">
                                <span class="kt-font-info">
                                    <?php if ($_SESSION['role'] == 0) { ?>
                                        superadmin
                                    <?php } else if ($_SESSION['role'] == 1) { ?>
                                        admin
<?php } else if ($_SESSION['role'] == 2) { ?>
                                        manager'
<?php } ?>
                                </span>
                            </div>
                        </div>

                        <!--end: Head -->

                        <!--begin: Navigation -->
                        <div class="kt-notification">
                            <a href="<?php echo base_url(); ?>profile/index" class="kt-notification__item">
                                <div class="kt-notification__item-icon">
                                    <i class="flaticon2-calendar-3 kt-font-success"></i>
                                </div>
                                <div class="kt-notification__item-details">
                                    <div class="kt-notification__item-title kt-font-bold">
                                        Profil diri
                                    </div>
                                    <div class="kt-notification__item-time">
                                        Tetapan akaun
                                    </div>
                                </div>
                            </a>
                            <div class="kt-notification__custom kt-space-between">
                                <a href="<?php echo base_url() . 'Welcome/logout'; ?>" class="btn btn-label btn-label-brand btn-sm btn-bold">Log keluar</a>
                            </div>
                        </div>

                        <!--end: Navigation -->
                    </div>
                </div>

                <!--end: User bar -->
            </div>

            <!-- end:: Header Topbar -->
        </div>
    </div>
</div>

<!-- end:: Header -->