 <?php 
                                        $i=0;
foreach($lotterygames->result() as $row){
?>

<tr>

    
    <td ><label id="addlotterygame<?php echo $i;?>" lotterygameid="<?php echo $row->game_id;?>"><?php echo $row->game_name;?></label></td>
    
  <td ><input type="checkbox" id="addlotterygameassign<?php echo $row->game_id;?>"></td>
  
 
</tr>
<?php
$i++;
}


?>
<input type="hidden" id="nooflotterygamereference1" nooflotterygame="<?php echo $i; ?>"/>

