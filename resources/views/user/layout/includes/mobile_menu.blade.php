 <!-- Start Mobile Menu Area  -->
 <div class="popup-mobilemenu-area">
    <div class="inner">
        <div class="mobile-menu-top">
            @include("web.layouts.includes.logo_section" , ["classes" => "d"])
            <div class="mobile-close">
                <div class="icon">
                    <i class="fal fa-times"></i>
                </div>
            </div>
        </div>
        @include("dashboards.user.layout.includes.menu_links")
    </div>
</div>
<!-- End Mobile Menu Area  -->
