<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> 
                    <a class="sidebar-link sidebar-link" href="/home" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link" href="/general-setting" aria-expanded="false">
                        <i data-feather="settings" class="feather-icon"></i>
                        <span class="hide-menu">General Setting</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link sidebar-link" href="/snmp-driver" aria-expanded="false">
                        <i data-feather="message-square" class="feather-icon"></i>
                        <span class="hide-menu">SNMP Driver</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="list" class="feather-icon"></i>
                        <span class="hide-menu">Variable List</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <span class="hide-menu">Slave Variables</span>
                            </a>
                            <ul aria-expanded="false" class="collapse second-level base-level-line">
                                <li class="sidebar-item">
                                    <a href="/variable-list/slave-variable" class="sidebar-link">
                                        <span class="hide-menu">Modbus Variables</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                        <span class="hide-menu">IEC61850</span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse second-level base-level-line">
                                        <li class="sidebar-item">
                                            <a href="/variable-list/iec-variable" class="sidebar-link">
                                                <span class="hide-menu">Variables</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="/variable-list/rcb-variable" class="sidebar-link">
                                                <span class="hide-menu">RCBs</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="/variable-list/master-variable" class="sidebar-link">
                                <span class="hide-menu">Master Variables</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link" href="/events-log" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">Events Log</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ==============================================================