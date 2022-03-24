<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Home</li>

                <li>
                    <a href="{{ url('admin/dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-title">Information</li>
                <li><a href="{{ route('banner') }}" class="waves-effect">
                        <i class='bx bx-slider'></i> <span> Banner </span></a>
                </li>
                <li><a href="{{ route('testimonial') }}" class="waves-effect">
                        <i class='bx bx-slider'></i> <span> Testimonial </span></a>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-question-mark"></i>
                        <span> FAQ </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">FAQ List</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!--========== Left Sidebar End ==========-->
