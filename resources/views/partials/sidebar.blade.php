<nav id="sidebar">
                <div class="" id="dismiss" onclick="toggleSidebar()">
                    <i class="fas fa-arrow-left"></i>
                </div>

                <div class="sidebar-header">
                    {{-- <h3>LOGO</h3> --}}
                    <a class="navbar-brand ml-4" href="{{ url('/home') }}">
                        {{ config('app.name', 'LibStats') }}
                    </a>
                    
                </div>
                

                <ul class="list-unstyled components">
                    {{-- <p>User Info</p> --}}
                    {{-- <i class="fas fa-user-circle"></i> --}}
                    <p>
                    {{-- {{ Auth::user()->name }} --}}
                    </p>
                    <li>
                        <a href="{{ route('home') }}" class="py-3">
                            <i class="fas fa-tachometer-alt fa-lg ml-3 mr-4"></i>
                            <span class="sidebar-link">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="#subStatistics" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle py-3">
                            <i class="fas fa-chart-pie fa-lg ml-3 mr-4"></i>
                            <span class="sidebar-link">Statistics</span>
                        </a>
                        <ul class="collapse list-unstyled" id="subStatistics">
                            <li>
                                <a href="{{ route('customstat') }}">Custom</a>
                            </li>
                            <li>
                                <a href="{{ route('dailystat') }}">Daily</a>
                            </li>
                            <li>
                                <a href="{{ route('weeklystat') }}">Weekly</a>
                            </li>
                            <li>
                                <a href="{{ route('monthlystat') }}">Monthly</a>
                            </li>
                            <li>
                                <a href="{{ route('yearlystat') }}">Yearly</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="{{route('maintenance')}}" class="py-3">
                            <i class="fas fa-graduation-cap fa-lg ml-3 mr-4"></i>
                            <span class="sidebar-link">Maintenance</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('counter') }}" class="py-3">
                            <i class="fas fa-user fa-lg ml-3 mr-4"></i>
                            <span class="sidebar-link">Counter</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('logout') }}" class="py-3" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fa-lg ml-3 mr-4"></i>
                            <span class="sidebar-link">Logout</span>
                        </a>
                    </li>
                </ul>



            </nav>