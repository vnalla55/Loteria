<?php
require_once ('./resource/jpgraph/src/jpgraph.php');
require_once ('./resource/jpgraph/src/jpgraph_bar.php');
 
$datay=$nooftimesnoappearedarray;
//print_r($datay);
//$datay=array();

 
$datax=array();
//$datax=array(1,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100);
  for( $i=2; $i <= 100; $i=$i+2 )
        {
          
           
          $datax[]=$i;
          
           
        }
        //print_r($datax);

 // Create the graph. These two calls are always required
$graph = new Graph(800,400,'auto');
$graph->SetScale('intint');
 //$graph->SetScale('textlin');
// Add a drop shadow
$graph->SetShadow();
 
// Adjust the margin a bit to make more room for titles
//$graph->SetMargin(40,30,20,40);
 // Setup X-axis
//$graph->xaxis->SetTickLabels(array(0,1,2,3,4,5,6));
//$graph->xaxis->SetTickPositions(array(0,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91,93,95,97,99));
$graph->xaxis->SetTickPositions(array(0,5,10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,85,90,95,100));

//$graph->xaxis->SetTickLabels($datax);
//$graph->xaxis->SetFont(FF_VERDANA,FS_NORMAL,6);
 
// Create a bar pot
$bplot = new BarPlot($datay);

// Adjust fill color
$bplot->SetFillColor('orange');
$graph->Add($bplot);

//$bplot->value->Show();
//$bplot->value->SetFormat('%01.0f');  
//$bplot->value->SetColor("black","darkred"); 
 
// Setup the titles
$graph->title->Set('Loto Group:'.$lotogroupname.'     Lottery Game:'.$lotterygamename);
$graph->xaxis->title->Set('Numbers',"center");
//$graph->xaxis->title->SetTitle('Numbers',"center");
$graph->yaxis->title->Set('No of Times appeared');
 
//$graph->title->SetFont(FF_FONT1,FS_BOLD);
//$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
//$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
//$graph->img->SetImgFormat('png');

//$graph->img->SetQuality(100);
 


if (file_exists('./barchartsimages/mybar.png')) {
    @unlink("./barchartsimages/mybar.png");   
}
$graph->Stroke('./barchartsimages/mybar.png',0777);

?>
<div class="container">
    <div class="row">
        <img src="<?php echo base_url();?>barchartsimages/mybar.png" height="400" width="800"/>
    </div>
    
</div>
<div class="gap">
    
</div>