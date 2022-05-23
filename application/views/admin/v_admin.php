<?php 
        if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-sm-xm sukses" id="alert">
                <button type="button" class="closeBtn">&times;</button>
                <h5><i class="fa-solid fa-circle-check"></i> Success!</h5>';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
        }
        ?>
 <!-- INSIGHTS START -->

 <div class="insights">
                         <!-- SALES START -->
                         <div class="sales">
                              <span class="material-icons-sharp">analytics</span>
                              <div class="middle">
                                   <div class="left">
                                        <h3>Total Sales</h3>
                                        <h1>$25,024</h1>
                                   </div>
                                   <div class="progress">
                                        <svg>
                                             <circle cx='38' cy='38' r='36'></circle>
                                        </svg>
                                        <div class="number">
                                             <div class="number">
                                                  <p>50%</p>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <small class="text-muted">Last 24 Hours</small>
                         </div>

                         <!-- SALES END -->

                         <!-- EXPENSES START -->
                         <div class="expenses">
                              <span class="material-icons-sharp">bar_chart</span>
                              <div class="middle">
                                   <div class="left">
                                        <h3>Total Expenses</h3>
                                        <h1>$14,168</h1>
                                   </div>
                                   <div class="progress">
                                        <svg>
                                             <circle cx='38' cy='38' r='36'></circle>
                                        </svg>
                                        <div class="number">
                                             <p>62%</p>
                                        </div>
                                   </div>
                              </div>
                              <small class="text-muted">Last 24 Hours</small>
                         </div>
                         <!-- EXPENSES END -->

                         <!-- INCOME START -->
                         <div class="income">
                              <span class="material-icons-sharp">stacked_line_chart</span>
                              <div class="middle">
                                   <div class="left">
                                        <h3>Total Income</h3>
                                        <h1>$10,864</h1>
                                   </div>
                                   <div class="progress">
                                        <svg>
                                             <circle cx='38' cy='38' r='36'></circle>
                                        </svg>
                                        <div class="number">
                                             <p>44%</p>
                                        </div>
                                   </div>
                              </div>
                              <small class="text-muted">Last 24 Hours</small>
                         </div>
                         <!-- INCOME END -->
 
                    </div>
                    <!-- INSIGHTS END -->

                    <!-- RECENT ORDERS START -->
               <div class="recent-orders">
                    <h2>Daftar Jadwal</h2>
                    <table id="datatable" class="compact">
                         <thead>
                              <tr>
                                   <th>Product Name</th>
                                   <th>Product Number</th>
                                   <th>Payment</th>
                                   <th>Status</th>
                                   <th></th>
                              </tr>
                         </thead>
                         <tbody>
                              <tr>
                                   <td>Foldable over Drone</td>
                                   <td>85631</td>
                                   <td>Due</td>
                                   <td class="warning">Pending</td>
                                   <td class="primary">Details</td>
                              </tr>                         
                              <tr>
                                   <td>Foldable over Drone</td>
                                   <td>85631</td>
                                   <td>Due</td>
                                   <td class="warning">Pending</td>
                                   <td class="primary">Details</td>
                              </tr>                         
                              <tr>
                                   <td>Foldable over Drone</td>
                                   <td>85631</td>
                                   <td>Due</td>
                                   <td class="warning">Pending</td>
                                   <td class="primary">Details</td>
                              </tr>
                         </tbody>
                    </table>
               </div>
                    <!-- RECENT ORDERS END -->
