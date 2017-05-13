<?php
//var_dump($_SESSION);
 if ($_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin' || $_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin')
     {
     ?>
     
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
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
                  <p> <?php echo lang('lang_total_user_label');?></p>
                </div>
                
               
              </div>
            </div><!-- ./col -->
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>  <?php echo $newusersyesterday; ?> </h3>
                  <p> <?php echo lang('lang_new_user_yesterday_label');?></p>
                </div>
               
               
              </div>
            </div><!-- ./col -->
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>RD$  <?php echo $totaldeposits; ?> </h3>
                  <p>  <?php echo lang('lang_total_deposit_label');?></p>
                </div>
                
               
              </div>
            </div><!-- ./col -->
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>  RD$<?php echo $totalwithdrawals; ?> </h3>
                  <p>   <?php echo lang('lang_total_withdrawal_label');?></p>
                </div>
               
               
              </div>
            </div><!-- ./col -->
           
           
               
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>  <?php echo $noofwinnersyesterday; ?> </h3>
                  <p>  <?php echo lang('lang_number_of_winners_yesterday_label');?></p>
                </div>
               
               
              </div>
            </div><!-- ./col -->
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>  <?php echo $totalwinners; ?> </h3>
                  <p>  <?php echo lang('lang_total_winner_label');?></p>
                </div>
                
               
              </div>
            </div><!-- ./col -->
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>  <?php echo $totalnoofbets; ?> </h3>
                  <p>   <?php echo lang('lang_total_no_of_bet_label');?></p>
                </div>
               
               
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>  <?php echo $noofbetsyesterday; ?> </h3>
                  <p>  <?php echo lang('lang_no_of_bet_yesterday_label');?></p>
                </div>
                
               
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3> RD$ <?php if(!$deposityesterday) echo '0';else echo $deposityesterday; ?> </h3>
                  <p>  <?php echo lang('lang_deposit_yesterday_label');?></p>
                </div>
                
               
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3> RD$ <?php if(!$withdrawalyesterday) echo '0';else echo $withdrawalyesterday;  ?> </h3>
                  <p>  <?php echo lang('lang_withdrawal_yesterday_label');?></p>
                </div>
                
               
              </div>
            </div><!-- ./col -->
            
            
            
            
           
            
           
          </div><!-- /.row -->
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     
     
     <?php
 
 
            
           }

           else if ($_SESSION['lottobackendusertypeaftervalidation']=='backendbusinesspartner')
        { 
           ?>
     
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
                  <h3>  <?php echo $totalnooffailedbets; ?> </h3>
                  <p> <?php echo lang('lang_partner_total_failed_bet_label');?></p>
                </div>
                
               
              </div>
            </div><!-- ./col -->
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3> RD$ <?php echo $totalamountofbets; ?> </h3>
                  <p> <?php echo lang('lang_partner_total_amount_of_bet_label');?></p>
                </div>
               
               
              </div>
            </div><!-- ./col -->
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>  <?php echo $totalnoofbets; ?> </h3>
                  <p>  <?php echo lang('lang_partner_total_no_of_bet_label');?></p>
                </div>
                
               
              </div>
            </div><!-- ./col -->
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>  <?php echo $noofbetsyesterday; ?> </h3>
                  <p>   <?php echo lang('lang_partner_number_of_bet_yesterday_label');?></p>
                </div>
               
               
              </div>
            </div><!-- ./col -->
           
           
               
        
            
            
            
           
            
           
          </div><!-- /.row -->
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

                               
<?php
           } 
           
           ?> 
 
    

     
     
  


