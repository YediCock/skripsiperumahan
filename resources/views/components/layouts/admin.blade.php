<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>CORK Admin - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="/src/assets/img/favicon.ico"/>
    <link href="/layouts/vertical-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="/layouts/vertical-light-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="/layouts/vertical-light-menu/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/layouts/vertical-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="/layouts/vertical-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLE -->
    <link rel="stylesheet" href="/src/plugins/css/light/editors/markdown/simplemde.min.css">
    <link rel="stylesheet" href="/src/plugins/css/dark/editors/markdown/simplemde.min.css">
    <!-- END PAGE LEVEL STYLE -->

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link href="/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL CUSTOM STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="/src/plugins/src/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="/src/assets/css/light/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="/src/assets/css/dark/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="/src/assets/css/light/elements/search.css" rel="stylesheet" type="text/css" />
    <link href="/src/assets/css/dark/elements/search.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="/src/plugins/src/animate/animate.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="/src/assets/css/light/components/carousel.css" rel="stylesheet" type="text/css">
    <link href="/src/assets/css/light/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="/src/assets/css/light/components/tabs.css" rel="stylesheet" type="text/css">
    
    <link href="/src/assets/css/dark/components/carousel.css" rel="stylesheet" type="text/css">
    <link href="/src/assets/css/dark/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="/src/assets/css/dark/components/tabs.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="/src/plugins/src/filepond/filepond.min.css">
    <link rel="stylesheet" href="/src/plugins/src/filepond/FilePondPluginImagePreview.min.css">    
    <link href="/src/plugins/css/light/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />
    <link href="/src/plugins/css/dark/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="/src/plugins/src/tagify/tagify.css">

    <link rel="stylesheet" type="text/css" href="/src/assets/css/light/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/src/plugins/css/light/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="/src/plugins/css/light/tagify/custom-tagify.css">

    <link rel="stylesheet" type="text/css" href="/src/assets/css/dark/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/src/plugins/css/dark/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="/src/plugins/css/dark/tagify/custom-tagify.css">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" href="/src/assets/css/light/apps/blog-create.css">
    <link rel="stylesheet" href="/src/assets/css/dark/apps/blog-create.css">
    <!--  END CUSTOM STYLE FILE  -->

    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
        .modal-backdrop {
            display: none !important;
        }
        .modal {
            background-color: rgba(0, 0, 0, 0.3); /* Warna hitam dengan opacity 0.5 */
        }
    </style>
</head>
<body class="layout-boxed">
    <!-- BEGIN LOADER -->
    {{-- <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div> --}}
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container">
        <header class="header navbar navbar-expand-sm">

            <ul class="navbar-item theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="/">
                        <img src="/src/assets/img/logo_perumahan1.png" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="/" class="nav-link"> Perumahan Griya Nusantara </a>
                </li>
            </ul>
            <ul class="navbar-item flex-row ms-lg-auto ms-0 action-area">

                <li class="nav-item theme-toggle-item">
                    <a href="javascript:void(0);" class="nav-link theme-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon dark-mode"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun light-mode"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                    </a>
                </li>

                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-container">
                            <div class="avatar avatar-sm avatar-indicators avatar-online">
                                <img alt="avatar" src="/src/assets/img/profile-30.png" class="rounded-circle">
                            </div>
                        </div>
                    </a>

                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="user-profile-section">
                            <div class="media mx-auto">
                                <div class="emoji me-2">
                                    👋
                                </div>
                                <div class="media-body">
                                    <h5>{{ Auth::user()->name }}</h5>
                                    <p>Project Leader</p>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-item">
                            <a href="user-profile.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span>Profile</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="app-mailbox.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> <span>Inbox</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="auth-boxed-lockscreen.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> <span>Lock Screen</span>
                            </a>
                        </div>
                        <livewire:user.auth.logout/>
                    </div>
                    
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">

            <nav id="sidebar">

                <div class="navbar-nav theme-brand flex-row  text-center">
                    <div class="nav-logo">
                        <div class="nav-item theme-logo">
                            <a href="/">
                                <img src="/src/assets/img/logo_perumahan1.png" class="navbar-logo" alt="logo">
                            </a>
                        </div>
                        <div class="nav-item theme-text">
                            <a href="/" class="nav-link"> Perumahan Griya Nusantara </a>
                        </div>
                    </div>
                    <div class="nav-item sidebar-toggle">
                        <div class="btn-toggle sidebarCollapse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                        </div>
                    </div>
                </div>
                <div class="shadow-bottom"></div>
                <livewire:navigation.navigation-admin />
            </nav>

        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">
                    {{ $slot }}
                </div>

            </div>
            <!--  BEGIN FOOTER  -->
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank" href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
            <!--  END FOOTER  -->
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="/src/plugins/src/global/vendors.min.js"></script>
    <script src="/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="/src/plugins/src/waves/waves.min.js"></script>
    <script src="/layouts/vertical-light-menu/app.js"></script>
    <script src="/src/plugins/src/highlight/highlight.pack.js"></script>
    <script src="/src/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/src/plugins/src/editors/markdown/simplemde.min.js"></script>
    <script src="/src/plugins/src/editors/markdown/custom-markdown.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/src/plugins/src/editors/quill/quill.js"></script>

    <script src="/src/plugins/src/tagify/tagify.min.js"></script>

    <script src="/src/assets/js/apps/blog-create.js"></script>

    <!-- END PAGE LEVEL SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="/src/plugins/src/apex/apexcharts.min.js"></script>
    <script src="/src/assets/js/dashboard/dash_1.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="/src/assets/js/scrollspyNav.js"></script>
    <script>
        checkall('checkbox_parent_all', 'checkbox_child');
        checkall('hover_parent_all', 'hover_child');
        checkall('striped_parent_all', 'striped_child');
        checkall('bordered_parent_all', 'bordered_child');
        checkall('mixed_parent_all', 'mixed_child');
        checkall('noSpacing_parent_all', 'noSpacing_child');
        checkall('custom_mixed_parent_all', 'custom_mixed_child');
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->

    <!--  BEGIN CUSTOM SCRIPT FILE  -->
    <script src="/src/assets/js/scrollspyNav.js"></script>

    <script src="/src/plugins/src/filepond/filepond.min.js"></script>
    <script src="/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js"></script>
    <script src="/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js"></script>
    <script src="/src/plugins/src/filepond/FilePondPluginImagePreview.min.js"></script>
    <script src="/src/plugins/src/filepond/FilePondPluginImageCrop.min.js"></script>
    <script src="/src/plugins/src/filepond/FilePondPluginImageResize.min.js"></script>
    <script src="/src/plugins/src/filepond/FilePondPluginImageTransform.min.js"></script>
    <script src="/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js"></script>
    <script src="/src/upload-preview/script.js"></script>

    {{-- <script>
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        })
    </script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
    <x-livewire-alert::scripts />
</body>
</html>