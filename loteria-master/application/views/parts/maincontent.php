 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
              
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>  <?php echo $totalusers; ?> </h3>
                  <p>Total Users</p>
                </div>
                
               
              </div>
            </div><!-- ./col -->
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>  <?php echo $newusersyesterday; ?> </h3>
                  <p>New Users Yesterday</p>
                </div>
               
               
              </div>
            </div><!-- ./col -->
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>  <?php echo $totaldeposits; ?> </h3>
                  <p> Total Deposits</p>
                </div>
                
               
              </div>
            </div><!-- ./col -->
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>  <?php echo $totalwithdrawals; ?> </h3>
                  <p>  Total Withdrawals</p>
                </div>
               
               
              </div>
            </div><!-- ./col -->
           
           
               
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>  <?php echo $noofwinnersyesterday; ?> </h3>
                  <p> Number of winners yesterday</p>
                </div>
               
               
              </div>
            </div><!-- ./col -->
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>  <?php echo $totalwinners; ?> </h3>
                  <p>  Total Winners</p>
                </div>
                
               
              </div>
            </div><!-- ./col -->
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>  <?php echo $totalnoofbets; ?> </h3>
                  <p>  Total Number of bets</p>
                </div>
               
               
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>  <?php echo $noofbetsyesterday; ?> </h3>
                  <p> Number of bets yesterday</p>
                </div>
                
               
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>  <?php if(!$deposityesterday) echo '0';else echo $deposityesterday; ?> </h3>
                  <p> Deposits Yesterday</p>
                </div>
                
               
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>  <?php if(!$withdrawalyesterday) echo '0';else echo $withdrawalyesterday;  ?> </h3>
                  <p> Withdrawals Yesterday</p>
                </div>
                
               
              </div>
            </div><!-- ./col -->
            
            
            
            
           
            
           
          </div><!-- /.row -->
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->