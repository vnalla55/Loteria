

        <div class="container">
            <div class="row row-wrap">
                <div class="col-md-9">
                    <div class="panel-group" id="accordion">
                        
                        <?php 
                        $i=1;
foreach($result->result() as $row){
?>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $i?>"><?php echo $row->question;?></a></h4>
                            </div>
                            <div class="panel-collapse collapse <?php if($i==1)echo 'in';?>" id="collapse-<?php echo $i?>">
                                <div class="panel-body">
                                    <p><?php echo $row->answer;?></p>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                        $i++;
}
?>
                        
                       
                    </div>
                </div>
                <div class="col-md-3">
                    <aside class="sidebar-right">
                        <span id="faqenquirymessagespan"></span>
                        <h4>¿Tiene preguntas?</h4>

                        <form class="box" action="<?php echo base_url();?>lottofront/sendemailforfaq" id="faqenquiryform" onsubmit="return faqenquiry(event)">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input id="name" type="text" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label>Correo electrónico</label>
                                <input id="email" type="email" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label>Pregunta</label>
                                <textarea id="message" class="form-control" required></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Enviar Pregunta" />
                        </form>
                    </aside>
                </div>
            </div>
            <div class="gap gap-small"></div>
        </div>


        <!-- //////////////////////////////////

	//////////////END PAGE CONTENT///////// 

	////////////////////////////////////-->

 