
<div class="col-md-2" style="margin-left: 40%;">
                        <a class="logo mt5" href="<?php echo base_url();?>lottofront/home">
                            <img title="Tu Banquita" alt="Tu Banquita" src="<?php echo base_url();?>img/tulogo.png">
                        </a>
                    
<?php 
foreach($results->result() as $row){
?>

<?php echo $row->offline_data;
break;
?>
<?php
}
?>


</div>
