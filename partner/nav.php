<div class="overlay"></div>
        <div class="search-overlay"></div>
        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">
            
            <nav id="sidebar">

                <ul class="list-unstyled menu-categories" id="accordionExample">
                    
                    <li class="menu">
                        <a href="index?wall=1" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                <span>
                                    <?php
                        
                                        $usernv = $_SESSION['partner'];
                                        $que = "Select wallet from reseller Where `id`= '$usernv'";
                                        $data = $con->query($que);
                                        
                                        $row = $data->fetch_assoc();
                                        
                                        $wallet = ($amount + $row['wallet']);
                                        
                                        echo "₹ ".$wallet." - ".$ref_u;
                                    
                                    ?>
                                 </span>
                            </div>
                        </a>
                    </li>
                    
                    <hr class="text-center" width="90%">
                    
                    <li class="menu">
                        <a href="index" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg style="color: #004eff;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span> Dashboard Home</span>
                            </div>
                        </a>
                    </li>


                    <li class="menu">
                        <a href="profile" class="dropdown-toggle">
                            <div class="">
                            <svg style="color: orange;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <span>Partner Profile</span>
                            </div>
                        </a>
                    </li>
                    
                    
                    <li class="menu">
                        <a href="customers" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg style="color: orange;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span> Customers</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a href="renew" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg style="color: #d2d2d2;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                                <span> Renewal</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a href="msg" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                    <svg style="color: yellow;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                <span>Messages</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a href="whatsapp"class="dropdown-toggle">
                            <div class="">
                                <svg style="color: #6d6dff;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smartphone"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
                            <span>Whatsapp</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a href="transactions"class="dropdown-toggle">
                            <div class="">
                                <svg style="color: #03bafc;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            <span>Transactions</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a href="redeem"class="dropdown-toggle">
                            <div class="">
                                <svg style="color: #03bafc;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            <span>Credits</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a href="form"class="dropdown-toggle">
                            <div class="">
                                <svg style="color: orange;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                <span>Card Creation</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a href="security" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg style="color: #007103;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                <span> Password Security</span>
                            </div>
                        </a>
                    </li>
                    
                     
                    
                    <li class="menu">
                        <a href="logout" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg style="color: #ff0000;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <span> Logout</span>
                            </div>
                        </a>
                    </li>
                </ul>
                
            </nav>

        </div>