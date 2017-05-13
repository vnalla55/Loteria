                                    <?php 
                                        $i=0;
foreach($lotterygames->result() as $row){
?>

<tr>

    
    <td ><label id="updatelotterygame<?php echo $i;?>" lotterygameid="<?php echo $row->game_id;?>"><?php echo $row->game_name;?></label></td>
    
  <td ><input type="checkbox" id="updatelotterygameassign<?php echo $row->game_id;?>"></td>
  
 
</tr>
<?php
$i++;
}
?><input type="hidden" id="nooflotterygamereference" nooflotterygame="<?php echo $i; ?>"/>