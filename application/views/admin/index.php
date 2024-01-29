<?php
if (isset($this->session->userdata['creativehandsadmin'])) {
	$adminid = $this->session->userdata['creativehandsadmin']['usr_id'];
	$adminname = $this->db->select('name')->get_where('admin', ['id' => $adminid])->row('name');
}else{
	redirect (base_url());
	die();
}
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
	<meta charset="utf-8" />
	<title><?=$title?> | Creative Hands</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
	<meta content="Themesbrand" name="author" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="<?=base_url()?>artistassets/images/favicon.ico">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<!-- Sweet Alert css-->
	<link href="<?=base_url()?>artistassets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
	<!-- Layout config Js -->
	<script src="<?=base_url()?>artistassets/js/layout.js"></script>
	<!-- Bootstrap Css -->
	<link href="<?=base_url()?>artistassets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url()?>artistassets/libs/gridjs/theme/mermaid.min.css" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="<?=base_url()?>artistassets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="<?=base_url()?>artistassets/css/app.min.css" rel="stylesheet" type="text/css" />
	<!-- custom Css-->
	<link href="<?=base_url()?>artistassets/css/custom.min.css" rel="stylesheet" type="text/css" />  
</head>
<body>
	<div id="layout-wrapper">
		<header id="page-topbar">
			<div class="layout-width">
				<div class="navbar-header">
					<div class="d-flex">
						<!-- LOGO -->
						<div class="navbar-brand-box horizontal-logo">
							<a href="<?=base_url()?>administrator/dashboard" class="logo logo-dark">
								<span class="logo-sm">
									<img src="<?=base_url()?>artistassets/images/logo-sm.png" alt="" height="22">
								</span>
								<span class="logo-lg">
								</span>
							</a>
							<a href="<?=base_url()?>administrator/dashboard" class="logo logo-light">
								<span class="logo-sm">
									<img src="<?=base_url()?>artistassets/images/logo-sm.png" alt="" height="22">
								</span>
								<span class="logo-lg">
								</span>
							</a>
						</div>
						<button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
							<span class="hamburger-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</button>
					</div>
					<div class="d-flex align-items-center">
						<div class="ms-1 header-item d-none d-sm-flex">
							<button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
								<i class="bx bx-fullscreen fs-22"></i>
							</button>
						</div>
						<div class="ms-1 header-item d-none d-sm-flex">
							<button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
								<i class="bx bx-moon fs-22"></i>
							</button>
						</div>
						<div class="dropdown ms-sm-3 header-item topbar-user">
							<button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="d-flex align-items-center">
									<img class="rounded-circle header-profile-user" src="<?=base_url()?>artistassets/altuser.jpg" alt="Header Avatar">
									<span class="text-start ms-xl-2">
										<span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?=$adminname?></span>
										</span>
								</span>
							</button>
							<div class="dropdown-menu dropdown-menu-end">
								<!-- item-->
								
								<a class="dropdown-item" href="<?=base_url()?>administrator/view-profile"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i><span class="align-middle">Profile</span></a>
								<a class="dropdown-item" href="<?=base_url()?>administrator/edit-profile"><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?=base_url()?>administratorlogout"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
					</div>
					<div class="modal-body">
						<div class="mt-2 text-center">
							<lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
							<div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
								<h4>Are you sure ?</h4>
								<p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
							</div>
						</div>
						<div class="d-flex gap-2 justify-content-center mt-4 mb-2">
							<button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
							<button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="app-menu navbar-menu">
			<div class="navbar-brand-box">
				<a href="<?=base_url()?>administrator/dashboard" class="logo logo-dark">
					<span class="logo-sm">
						<img src="<?=base_url()?>artistassets/images/logo-sm.png" alt="" height="22">
					</span>
					<span class="logo-lg">
						<img src="<?=base_url()?>artistassets/images/logo1.png" alt="" height="50">
					</span>
				</a>
				<a href="<?=base_url()?>administrator/dashboard" class="logo logo-light">
					<span class="logo-sm">
						<img src="<?=base_url()?>artistassets/images/logo-sm.png" alt="" height="22">
					</span>
					<span class="logo-lg">
						<img src="<?=base_url()?>artistassets/images/logo1.png" alt="" height="100">
					</span>
				</a>
				<button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
					<i class="ri-record-circle-line"></i>
				</button>
			</div>
			<div id="scrollbar">
				<div class="container-fluid">
					<div id="two-column-menu">
					</div>
					<ul class="navbar-nav" id="navbar-nav">
						<li class="menu-title"><span data-key="t-menu">Menu</span></li>
						<li class="nav-item">
							<a class="nav-link menu-link <?= ($title === 'Dashboard') ? 'active' : ''; ?>" href="<?=base_url()?>administrator/dashboard">
								<i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
							</a>
						</li>
						<li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">In House Arts</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApps">
                                <ul class="nav nav-sm flex-column">

                                    <li class="nav-item">
                                        <a href="<?=base_url()?>administrator/art-shop-list" class="nav-link" data-key="t-calendar">List of
                                            Arts
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?=base_url()?>administrator/orders" class="nav-link" data-key="t-chat">
                                            Orders </a>
                                    </li>
									<li class="nav-item">
                                        <a href="<?=base_url()?>administrator/category-list" class="nav-link" data-key="t-chat"> Categories </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?=base_url()?>administrator/subcategories-list" class="nav-link" data-key="t-chat">Sub Categories </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
						<li class="nav-item">
							<a class="nav-link menu-link <?= ($title === 'List of Arts' || $title === 'List of Artist' || $title === 'Artist Detail') ? 'active' : ''; ?>" href="#sidebarLayouts" data-bs-toggle="collapse" role="button"
								aria-expanded="false" aria-controls="sidebarLayouts">
								<i class="ri-layout-3-line"></i> <span data-key="t-layouts">Artist</span>
							</a>
							<div class="collapse menu-dropdown <?= ($title === 'List of Arts' || $title === 'List of Artist' || $title === 'Artist Detail') ? 'show' : ''; ?>" id="sidebarLayouts">
								<ul class="nav nav-sm flex-column">
									<li class="nav-item">
										<a href="<?=base_url()?>administrator/artist-list" class="nav-link <?= ($title === 'List of Artist' || $title === 'Artist Detail') ? 'active' : ''; ?>" data-key="t-horizontal">List of Artist</a>
									</li>
									<li class="nav-item">
										<a href="<?=base_url()?>administrator/list-arts" class="nav-link <?= ($title === 'List of Arts') ? 'active' : ''; ?>" data-key="t-horizontal">List of Arts</a>
									</li>

								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link menu-link <?= ($title === 'Event List') ? 'active' : ''; ?>" href="<?=base_url()?>administrator/event-list" role="button"
								aria-expanded="false" aria-controls="sidebarLayouts">
								<i class="ri-layout-3-line"></i> <span data-key="t-layouts">Events</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link menu-link <?= ($title === 'Blog List') ? 'active' : ''; ?>" href="<?=base_url()?>administrator/blog-list" role="button"
								aria-expanded="false" aria-controls="sidebarLayouts">
								<i class="ri-layout-3-line"></i> <span data-key="t-layouts">Blog</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link menu-link <?= ($title === 'bannerlist') ? 'active' : ''; ?>" href="<?=base_url()?>administrator/banner-list" role="button"
								aria-expanded="false" aria-controls="sidebarLayouts">
								<i class="ri-layout-3-line"></i> <span data-key="t-layouts">Banner</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="sidebar-background"></div>
		</div>
		<div class="vertical-overlay"></div>
		<div class="main-content">
			<div class="page-content">
				<?php include_once($content);?>
			</div>
		</div>
	</div>
	<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
		<i class="ri-arrow-up-line"></i>
	</button>
	<div id="preloader">
		<div id="status">
			<div class="spinner-border text-primary avatar-sm" role="status">
				<span class="visually-hidden">Loading...</span>
			</div>
		</div>
	</div>
	<div class="customizer-setting d-none d-md-block">
		<div class="btn-info btn-rounded shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
			<i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
		</div>
	</div>
	<div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
		<div class="d-flex align-items-center bg-primary bg-gradient p-3 offcanvas-header">
			<h5 class="m-0 me-2 text-white">Theme Customizer</h5>
			<button type="button" class="btn-close btn-close-white ms-auto" id="customizerclose-btn" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body p-0">
			<div data-simplebar class="h-100">
				<div class="p-4">
					<h6 class="mb-0 fw-semibold text-uppercase">Layout</h6>
					<p class="text-muted">Choose your layout</p>
					<div class="row gy-3">
						<div class="col-4">
							<div class="form-check card-radio">
								<input id="customizer-layout01" name="data-layout" type="radio" value="vertical" class="form-check-input">
								<label class="form-check-label p-0 avatar-md w-100" for="customizer-layout01">
									<span class="d-flex gap-1 h-100">
										<span class="flex-shrink-0">
											<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
												<span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
												<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column">
												<span class="bg-light d-block p-1"></span>
												<span class="bg-light d-block p-1 mt-auto"></span>
											</span>
										</span>
									</span>
								</label>
							</div>
							<h5 class="fs-13 text-center mt-2">Vertical</h5>
						</div>
						<div class="col-4">
							<div class="form-check card-radio">
								<input id="customizer-layout02" name="data-layout" type="radio" value="horizontal" class="form-check-input">
								<label class="form-check-label p-0 avatar-md w-100" for="customizer-layout02">
									<span class="d-flex h-100 flex-column gap-1">
										<span class="bg-light d-flex p-1 gap-1 align-items-center">
											<span class="d-block p-1 bg-soft-primary rounded me-1"></span>
											<span class="d-block p-1 pb-0 px-2 bg-soft-primary ms-auto"></span>
											<span class="d-block p-1 pb-0 px-2 bg-soft-primary"></span>
										</span>
										<span class="bg-light d-block p-1"></span>
										<span class="bg-light d-block p-1 mt-auto"></span>
									</span>
								</label>
							</div>
							<h5 class="fs-13 text-center mt-2">Horizontal</h5>
						</div>
						<div class="col-4">
							<div class="form-check card-radio">
								<input id="customizer-layout03" name="data-layout" type="radio" value="twocolumn" class="form-check-input">
								<label class="form-check-label p-0 avatar-md w-100" for="customizer-layout03">
									<span class="d-flex gap-1 h-100">
										<span class="flex-shrink-0">
											<span class="bg-light d-flex h-100 flex-column gap-1">
												<span class="d-block p-1 bg-soft-primary mb-2"></span>
												<span class="d-block p-1 pb-0 bg-soft-primary"></span>
												<span class="d-block p-1 pb-0 bg-soft-primary"></span>
												<span class="d-block p-1 pb-0 bg-soft-primary"></span>
											</span>
										</span>
										<span class="flex-shrink-0">
											<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
												<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column">
												<span class="bg-light d-block p-1"></span>
												<span class="bg-light d-block p-1 mt-auto"></span>
											</span>
										</span>
									</span>
								</label>
							</div>
							<h5 class="fs-13 text-center mt-2">Two Column</h5>
						</div>
						<div class="col-4">
							<div class="form-check card-radio">
								<input id="customizer-layout04" name="data-layout" type="radio" value="semibox" class="form-check-input">
								<label class="form-check-label p-0 avatar-md w-100" for="customizer-layout04">
									<span class="d-flex gap-1 h-100">
										<span class="flex-shrink-0 p-1">
											<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
												<span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
												<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column pt-1 pe-2">
												<span class="bg-light d-block p-1"></span>
												<span class="bg-light d-block p-1 mt-auto"></span>
											</span>
										</span>
									</span>
								</label>
							</div>
							<h5 class="fs-13 text-center mt-2">Semi Box</h5>
						</div>
						<!-- end col -->
					</div>
					<h6 class="mt-4 mb-0 fw-semibold text-uppercase">Color Scheme</h6>
					<p class="text-muted">Choose Light or Dark Scheme.</p>
					<div class="colorscheme-cardradio">
						<div class="row">
							<div class="col-4">
								<div class="form-check card-radio">
									<input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-light" value="light">
									<label class="form-check-label p-0 avatar-md w-100" for="layout-mode-light">
										<span class="d-flex gap-1 h-100">
											<span class="flex-shrink-0">
												<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
													<span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-light d-block p-1"></span>
													<span class="bg-light d-block p-1 mt-auto"></span>
												</span>
											</span>
										</span>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">Light</h5>
							</div>
							<div class="col-4">
								<div class="form-check card-radio dark">
									<input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-dark" value="dark">
									<label class="form-check-label p-0 avatar-md w-100 bg-dark" for="layout-mode-dark">
										<span class="d-flex gap-1 h-100">
											<span class="flex-shrink-0">
												<span class="bg-soft-light d-flex h-100 flex-column gap-1 p-1">
													<span class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-soft-light d-block p-1"></span>
													<span class="bg-soft-light d-block p-1 mt-auto"></span>
												</span>
											</span>
										</span>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">Dark</h5>
							</div>
						</div>
					</div>
					<div id="sidebar-visibility">
						<h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Visibility</h6>
						<p class="text-muted">Choose show or Hidden sidebar.</p>
						<div class="row">
							<div class="col-4">
								<div class="form-check card-radio">
									<input class="form-check-input" type="radio" name="data-sidebar-visibility" id="sidebar-visibility-show" value="show">
									<label class="form-check-label p-0 avatar-md w-100" for="sidebar-visibility-show">
										<span class="d-flex gap-1 h-100">
											<span class="flex-shrink-0 p-1">
												<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
													<span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column pt-1 pe-2">
													<span class="bg-light d-block p-1"></span>
													<span class="bg-light d-block p-1 mt-auto"></span>
												</span>
											</span>
										</span>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">Show</h5>
							</div>
							<div class="col-4">
								<div class="form-check card-radio">
									<input class="form-check-input" type="radio" name="data-sidebar-visibility" id="sidebar-visibility-hidden" value="hidden">
									<label class="form-check-label p-0 avatar-md w-100 px-2" for="sidebar-visibility-hidden">
										<span class="d-flex gap-1 h-100">
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column pt-1 px-2">
													<span class="bg-light d-block p-1"></span>
													<span class="bg-light d-block p-1 mt-auto"></span>
												</span>
											</span>
										</span>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">Hidden</h5>
							</div>
						</div>
					</div>
					<div id="layout-width">
						<h6 class="mt-4 mb-0 fw-semibold text-uppercase">Layout Width</h6>
						<p class="text-muted">Choose Fluid or Boxed layout.</p>
						<div class="row">
							<div class="col-4">
								<div class="form-check card-radio">
									<input class="form-check-input" type="radio" name="data-layout-width" id="layout-width-fluid" value="fluid">
									<label class="form-check-label p-0 avatar-md w-100" for="layout-width-fluid">
										<span class="d-flex gap-1 h-100">
											<span class="flex-shrink-0">
												<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
													<span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-light d-block p-1"></span>
													<span class="bg-light d-block p-1 mt-auto"></span>
												</span>
											</span>
										</span>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">Fluid</h5>
							</div>
							<div class="col-4">
								<div class="form-check card-radio">
									<input class="form-check-input" type="radio" name="data-layout-width" id="layout-width-boxed" value="boxed">
									<label class="form-check-label p-0 avatar-md w-100 px-2" for="layout-width-boxed">
										<span class="d-flex gap-1 h-100 border-start border-end">
											<span class="flex-shrink-0">
												<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
													<span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-light d-block p-1"></span>
													<span class="bg-light d-block p-1 mt-auto"></span>
												</span>
											</span>
										</span>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">Boxed</h5>
							</div>
						</div>
					</div>
					<div id="layout-position">
						<h6 class="mt-4 mb-0 fw-semibold text-uppercase">Layout Position</h6>
						<p class="text-muted">Choose Fixed or Scrollable Layout Position.</p>
						<div class="btn-group radio" role="group">
							<input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed" value="fixed">
							<label class="btn btn-light w-sm" for="layout-position-fixed">Fixed</label>
							<input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable" value="scrollable">
							<label class="btn btn-light w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
						</div>
					</div>
					<h6 class="mt-4 mb-0 fw-semibold text-uppercase">Topbar Color</h6>
					<p class="text-muted">Choose Light or Dark Topbar Color.</p>
					<div class="row">
						<div class="col-4">
							<div class="form-check card-radio">
								<input class="form-check-input" type="radio" name="data-topbar" id="topbar-color-light" value="light">
								<label class="form-check-label p-0 avatar-md w-100" for="topbar-color-light">
									<span class="d-flex gap-1 h-100">
										<span class="flex-shrink-0">
											<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
												<span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
												<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column">
												<span class="bg-light d-block p-1"></span>
												<span class="bg-light d-block p-1 mt-auto"></span>
											</span>
										</span>
									</span>
								</label>
							</div>
							<h5 class="fs-13 text-center mt-2">Light</h5>
						</div>
						<div class="col-4">
							<div class="form-check card-radio">
								<input class="form-check-input" type="radio" name="data-topbar" id="topbar-color-dark" value="dark">
								<label class="form-check-label p-0 avatar-md w-100" for="topbar-color-dark">
									<span class="d-flex gap-1 h-100">
										<span class="flex-shrink-0">
											<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
												<span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
												<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column">
												<span class="bg-primary d-block p-1"></span>
												<span class="bg-light d-block p-1 mt-auto"></span>
											</span>
										</span>
									</span>
								</label>
							</div>
							<h5 class="fs-13 text-center mt-2">Dark</h5>
						</div>
					</div>
					<div id="sidebar-size">
						<h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Size</h6>
						<p class="text-muted">Choose a size of Sidebar.</p>
						<div class="row">
							<div class="col-4">
								<div class="form-check sidebar-setting card-radio">
									<input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-default" value="lg">
									<label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-default">
										<span class="d-flex gap-1 h-100">
											<span class="flex-shrink-0">
												<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
													<span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-light d-block p-1"></span>
													<span class="bg-light d-block p-1 mt-auto"></span>
												</span>
											</span>
										</span>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">Default</h5>
							</div>
							<div class="col-4">
								<div class="form-check sidebar-setting card-radio">
									<input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-compact" value="md">
									<label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-compact">
										<span class="d-flex gap-1 h-100">
											<span class="flex-shrink-0">
												<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
													<span class="d-block p-1 bg-soft-primary rounded mb-2"></span>
													<span class="d-block p-1 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 pb-0 bg-soft-primary"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-light d-block p-1"></span>
													<span class="bg-light d-block p-1 mt-auto"></span>
												</span>
											</span>
										</span>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">Compact</h5>
							</div>
							<div class="col-4">
								<div class="form-check sidebar-setting card-radio">
									<input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-small" value="sm">
									<label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-small">
										<span class="d-flex gap-1 h-100">
											<span class="flex-shrink-0">
												<span class="bg-light d-flex h-100 flex-column gap-1">
													<span class="d-block p-1 bg-soft-primary mb-2"></span>
													<span class="d-block p-1 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 pb-0 bg-soft-primary"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-light d-block p-1"></span>
													<span class="bg-light d-block p-1 mt-auto"></span>
												</span>
											</span>
										</span>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">Small (Icon View)</h5>
							</div>
							<div class="col-4">
								<div class="form-check sidebar-setting card-radio">
									<input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-small-hover" value="sm-hover">
									<label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-small-hover">
										<span class="d-flex gap-1 h-100">
											<span class="flex-shrink-0">
												<span class="bg-light d-flex h-100 flex-column gap-1">
													<span class="d-block p-1 bg-soft-primary mb-2"></span>
													<span class="d-block p-1 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 pb-0 bg-soft-primary"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-light d-block p-1"></span>
													<span class="bg-light d-block p-1 mt-auto"></span>
												</span>
											</span>
										</span>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">Small Hover View</h5>
							</div>
						</div>
					</div>
					<div id="sidebar-view">
						<h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar View</h6>
						<p class="text-muted">Choose Default or Detached Sidebar view.</p>
						<div class="row">
							<div class="col-4">
								<div class="form-check sidebar-setting card-radio">
									<input class="form-check-input" type="radio" name="data-layout-style" id="sidebar-view-default" value="default">
									<label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-default">
										<span class="d-flex gap-1 h-100">
											<span class="flex-shrink-0">
												<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
													<span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-light d-block p-1"></span>
													<span class="bg-light d-block p-1 mt-auto"></span>
												</span>
											</span>
										</span>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">Default</h5>
							</div>
							<div class="col-4">
								<div class="form-check sidebar-setting card-radio">
									<input class="form-check-input" type="radio" name="data-layout-style" id="sidebar-view-detached" value="detached">
									<label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-detached">
										<span class="d-flex h-100 flex-column">
											<span class="bg-light d-flex p-1 gap-1 align-items-center px-2">
												<span class="d-block p-1 bg-soft-primary rounded me-1"></span>
												<span class="d-block p-1 pb-0 px-2 bg-soft-primary ms-auto"></span>
												<span class="d-block p-1 pb-0 px-2 bg-soft-primary"></span>
											</span>
											<span class="d-flex gap-1 h-100 p-1 px-2">
												<span class="flex-shrink-0">
													<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
														<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
														<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
														<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
													</span>
												</span>
											</span>
											<span class="bg-light d-block p-1 mt-auto px-2"></span>
										</span>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">Detached</h5>
							</div>
						</div>
					</div>
					<div id="sidebar-color">
						<h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Color</h6>
						<p class="text-muted">Choose a color of Sidebar.</p>
						<div class="row">
							<div class="col-4">
								<div class="form-check sidebar-setting card-radio" data-bs-toggle="collapse" data-bs-target="#collapseBgGradient.show">
									<input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-light" value="light">
									<label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-light">
										<span class="d-flex gap-1 h-100">
											<span class="flex-shrink-0">
												<span class="bg-white border-end d-flex h-100 flex-column gap-1 p-1">
													<span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-light d-block p-1"></span>
													<span class="bg-light d-block p-1 mt-auto"></span>
												</span>
											</span>
										</span>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">Light</h5>
							</div>
							<div class="col-4">
								<div class="form-check sidebar-setting card-radio" data-bs-toggle="collapse" data-bs-target="#collapseBgGradient.show">
									<input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-dark" value="dark">
									<label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-dark">
										<span class="d-flex gap-1 h-100">
											<span class="flex-shrink-0">
												<span class="bg-primary d-flex h-100 flex-column gap-1 p-1">
													<span class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-light d-block p-1"></span>
													<span class="bg-light d-block p-1 mt-auto"></span>
												</span>
											</span>
										</span>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">Dark</h5>
							</div>
							<div class="col-4">
								<button class="btn btn-link avatar-md w-100 p-0 overflow-hidden border collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBgGradient" aria-expanded="false" aria-controls="collapseBgGradient">
									<span class="d-flex gap-1 h-100">
										<span class="flex-shrink-0">
											<span class="bg-vertical-gradient d-flex h-100 flex-column gap-1 p-1">
												<span class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
												<span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
												<span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
												<span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column">
												<span class="bg-light d-block p-1"></span>
												<span class="bg-light d-block p-1 mt-auto"></span>
											</span>
										</span>
									</span>
								</button>
								<h5 class="fs-13 text-center mt-2">Gradient</h5>
							</div>
						</div>
						<div class="collapse" id="collapseBgGradient">
							<div class="d-flex gap-2 flex-wrap img-switch p-2 px-3 bg-light rounded">
								<div class="form-check sidebar-setting card-radio">
									<input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient" value="gradient">
									<label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient">
										<span class="avatar-title rounded-circle bg-vertical-gradient"></span>
									</label>
								</div>
								<div class="form-check sidebar-setting card-radio">
									<input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient-2" value="gradient-2">
									<label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient-2">
										<span class="avatar-title rounded-circle bg-vertical-gradient-2"></span>
									</label>
								</div>
								<div class="form-check sidebar-setting card-radio">
									<input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient-3" value="gradient-3">
									<label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient-3">
										<span class="avatar-title rounded-circle bg-vertical-gradient-3"></span>
									</label>
								</div>
								<div class="form-check sidebar-setting card-radio">
									<input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient-4" value="gradient-4">
									<label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient-4">
										<span class="avatar-title rounded-circle bg-vertical-gradient-4"></span>
									</label>
								</div>
							</div>
						</div>
					</div>
					<div id="sidebar-img">
						<h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Images</h6>
						<p class="text-muted">Choose a image of Sidebar.</p>
						<div class="d-flex gap-2 flex-wrap img-switch">
							<div class="form-check sidebar-setting card-radio">
								<input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-none" value="none">
								<label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-none">
									<span class="avatar-md w-auto bg-light d-flex align-items-center justify-content-center">
										<i class="ri-close-fill fs-20"></i>
									</span>
								</label>
							</div>
							<div class="form-check sidebar-setting card-radio">
								<input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-01" value="img-1">
								<label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-01">
									<img src="<?=base_url()?>artistassets/images/sidebar/img-1.jpg" alt="" class="avatar-md w-auto object-cover">
								</label>
							</div>
							<div class="form-check sidebar-setting card-radio">
								<input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-02" value="img-2">
								<label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-02">
									<img src="<?=base_url()?>artistassets/images/sidebar/img-2.jpg" alt="" class="avatar-md w-auto object-cover">
								</label>
							</div>
							<div class="form-check sidebar-setting card-radio">
								<input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-03" value="img-3">
								<label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-03">
									<img src="<?=base_url()?>artistassets/images/sidebar/img-3.jpg" alt="" class="avatar-md w-auto object-cover">
								</label>
							</div>
							<div class="form-check sidebar-setting card-radio">
								<input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-04" value="img-4">
								<label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-04">
									<img src="<?=base_url()?>artistassets/images/sidebar/img-4.jpg" alt="" class="avatar-md w-auto object-cover">
								</label>
							</div>
						</div>
					</div>
					<div id="preloader-menu">
						<h6 class="mt-4 mb-0 fw-semibold text-uppercase">Preloader</h6>
						<p class="text-muted">Choose a preloader.</p>
						<div class="row">
							<div class="col-4">
								<div class="form-check sidebar-setting card-radio">
									<input class="form-check-input" type="radio" name="data-preloader" id="preloader-view-custom" value="enable">
									<label class="form-check-label p-0 avatar-md w-100" for="preloader-view-custom">
										<span class="d-flex gap-1 h-100">
											<span class="flex-shrink-0">
												<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
													<span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-light d-block p-1"></span>
													<span class="bg-light d-block p-1 mt-auto"></span>
												</span>
											</span>
										</span>
										<div id="status" class="d-flex align-items-center justify-content-center">
											<div class="spinner-border text-primary avatar-xxs m-auto" role="status">
												<span class="visually-hidden">Loading...</span>
											</div>
										</div>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">Enable</h5>
							</div>
							<div class="col-4">
								<div class="form-check sidebar-setting card-radio">
									<input class="form-check-input" type="radio" name="data-preloader" id="preloader-view-none" value="disable">
									<label class="form-check-label p-0 avatar-md w-100" for="preloader-view-none">
										<span class="d-flex gap-1 h-100">
											<span class="flex-shrink-0">
												<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
													<span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
													<span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-light d-block p-1"></span>
													<span class="bg-light d-block p-1 mt-auto"></span>
												</span>
											</span>
										</span>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">Disable</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?=base_url()?>artistassets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?=base_url()?>artistassets/libs/simplebar/simplebar.min.js"></script>
	<script src="<?=base_url()?>artistassets/libs/node-waves/waves.min.js"></script>
	<script src="<?=base_url()?>artistassets/libs/feather-icons/feather.min.js"></script>
	<script src="<?=base_url()?>artistassets/js/pages/plugins/lord-icon-2.1.0.js"></script>
	<script src="<?=base_url()?>artistassets/libs/list.js/list.min.js"></script>
	<script src="<?=base_url()?>artistassets/libs/list.pagination.js/list.pagination.min.js"></script>
	<script src="<?=base_url()?>artistassets/libs/sweetalert2/sweetalert2.min.js"></script>
	<script src="<?=base_url()?>artistassets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="<?=base_url()?>artistassets/js/pages/select2.init.js"></script>
	<script src="<?=base_url()?>artistassets/js/app.js"></script>
	<script src="<?=base_url()?>artistassets/libs/gridjs/gridjs.umd.js"></script>
	<script src="<?=base_url()?>artistassets/js/pages/gridjs.init.js"></script>
	<script src="<?=base_url()?>adminassets/js/table.min.js"></script>
	<script src="<?=base_url()?>adminassets/js/pages/jquery-datatable.js"></script>
	<script>
    $(document).ready(function() {
        $('#categorySelect').change(function() {
            var category_id = $(this).val();
            // Make AJAX request to fetch subcategories
            $.ajax({
                url: '<?php echo base_url('ArtistController/getSubcategoriesByCategoryID'); ?>',
                type: 'post',
                dataType: 'json',
                data: {category_id: category_id},
                success: function(response) {
                    // Clear existing options
                    $('#subcategory').empty();

                    // Add new subcategory options
                    $.each(response, function(index, value) {
                        $('#subcategory').append('<option value="' + value.id + '">' + value.subcategoriesname + '</option>');
                    });
                }
            });
        });
    });
	$(document).ready(function() {
		$('input[type="search"]').removeClass('form-control-sm');
		$('input[type="search"]').attr('placeholder', 'Search');
		$('#tableExport_filter label').contents().filter(function() {
			return this.nodeType === 3 && this.nodeValue.trim() === 'Search:';
		}).remove();
	});

</script>
</body>
</html>