<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebar-menu">
                @if (auth()->user()->level == 1)
                    
                <li class="nav-devider"></li>
                <li class="nav-label">Home</li>
                <li>
                    <a href="/administrator" aria-expanded="false">
                        <i class="fa fa-tachometer"></i>
                        <span class="hide-menu">Dashboard
                            
                        </span>
                    </a>
                   
                </li>
                <li class="nav-devider"></li>
                <li class="nav-label">Option</li>
                <li>
                    <a href="/administrator/menu" aria-expanded="false">
                        <i class="fa fa-coffee"></i>
                        <span class="hide-menu">Menu
                            
                        </span>
                    </a>
                   
                </li><li>
                    <a href="/administrator/gallery" aria-expanded="false">
                        <i class="fa fa-image"></i>
                        <span class="hide-menu">Gallery
                            
                        </span>
                    </a>
                   
                </li>
                <li>
                    <a href="/administrator/reservation" aria-expanded="false">
                        <i class="fa fa-calendar-check-o"></i>
                        <span class="hide-menu">Reservation
                            
                        </span>
                    </a>
                   
                </li>
                <li>
                    <a href="/user/reservation" aria-expanded="false">
                        <i class="fa fa-calendar-check-o"></i>
                        <span class="hide-menu">Reservation
                        </span>
                    </a>
                   
                </li>
                <li>
                    <a href="/administrator/about" aria-expanded="false">
                        <i class="fa fa-info"></i>
                        <span class="hide-menu">About Us
                            
                        </span>
                    </a>
                   
                </li><li>
                    <a href="/administrator/inbox" aria-expanded="false">
                        <i class="fa fa-inbox"></i>
                        <span class="hide-menu">Inbox
                            
                        </span>
                    </a>
                   
                </li>
                <li class="nav-devider"></li>
                @elseif (auth()->user()->level == 2)
                <li class="nav-devider"></li>
                <li class="nav-label">Home</li>
                <li>
                    <a href="/user/reservation" aria-expanded="false">
                        <i class="fa fa-calendar-check-o"></i>
                        <span class="hide-menu">Reservation
                        </span>
                    </a>
                    
                </li>
                <li class="nav-devider"></li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>