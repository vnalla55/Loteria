
        <div class="container">
            <div class="row row-wrap">
            
                <div class="col-md-6">
                
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1934938.4809130838!2d-70.1654584!3d18.7009047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1415130724276" width="550" height="300" frameborder="0" style="border:0"></iframe>
                  </div>
                <div class="col-md-3">
                    <span id="sendemailmessagespan"></span>
                    <form name="contactForm"  id="sendemailform" onsubmit="return sendemail(event)" class="contact-form" method="post" action="<?php echo base_url();?>lottofront/sendemail" >
                        <fieldset>
                            <div class="form-group">
                                <label>Nombre</label>
                                <div class="bg-warning form-alert" id="form-alert-name">Por favor, introduzca su nombre</div>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Por favor, introduzca su nombre" required />
                            </div>
                            <div class="form-group">
                                <label>Correo electrónico</label>
                                <div class="bg-warning form-alert" id="form-alert-email">Introduzca su email</div>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Introduzca su email" required/>
                            </div>
                            <div class="form-group">
                                <label>Mensaje</label>
                                <div class="bg-warning form-alert" id="form-alert-message">Entre su mensaje</div>
                                <textarea class="form-control" id="message" name="message" placeholder="Tu mensaje" required></textarea>
                            </div>
                            <div class="bg-warning alert-success form-alert" id="form-success">Tu mensaje ha sido enviado con éxito!</div>
                            <div class="bg-warning alert-error form-alert" id="form-fail">Sorry, error occured this time sending your message</div>
                            <button id="" type="submit" class="btn btn-primary">Aceptar</button>
                        </fieldset>
                    </form>
                </div>
                <div class="col-md-3">
                    <?php 
foreach($result->result() as $row){



 echo $row->page_content;
 break;



}
?>
                </div>
            </div>
            <div class="gap gap-small"></div>
        </div>


        <!-- //////////////////////////////////

	//////////////END PAGE CONTENT///////// 

	////////////////////////////////////-->

