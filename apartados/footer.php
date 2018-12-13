<footer class="text-center">
                <div class="footer-above">
                    <div class="container">
                        <div class="row">
                            <div class="footer-col col-md-4">
                                <div class="footer-left">
                                <h3><?php echo $lang["navega"]?></h3>
                                <ul class="footer-nav">
                                <li><a href="index.php"><?php echo $lang["inicio"]?> </a></li>
                                <li><a href="recetas.php"><?php echo $lang["recetas"]?></a></li>
                                <li><a href="micocina.php"><?php echo $lang["micocina"]?></a></li>
                                <li><a href="/blog">Blog</a></li>
                                <li><a href="contacto.php"><?php echo $lang["contacto"]?></a></li>
                                </ul>
                                <a class="to-top" href="#move-top">▲</a>
                            </div>
                            <div class="clearfix"> </div>
                            </div>
                              <div class="footer-col col-md-4">
                               <!-- <h3>Recetas</h3> -->
                               <img src="images/dinahosting.jpg" alt="" >
                                <img src="images/puntcat.png" alt="" width="150px">
                               <!-- <p>Consiga llevar una vida saludable gracias a nuestras consejos y recetas. Aprenda a cocinar los mejores platos en tu cocina gracias a nuestra comunidad.</p> -->
                            </div>
                            <div class="footer-col col-md-4">
                               <h3>Mi Cocina</h3> 
                               <p style="font-style: italic; text-align: center;">"La excelencia está en la diversidad y el modo de progresar es conocer y comparar las diversidades de productos, culturas y técnicas"</p>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6" style="text-align:right;margin-bottom:1em;"><p><?php echo $lang["cmidioma"]; ?></p></div>
                                <div class="col-md-6">
                                    <form method="POST" >
                                    <select name="lang" onchange="this.form.submit()" class="selectpicker form-control" style="width:200px;">
                                        <option value="" selected><?php echo $lang["menu_lenguaje"]?></option>
                                        <option value="es"><?php echo $lang["esp"]?></option>
                                        <option value="ca"><?php echo $lang["cata"]?></option>
                                        <option value="en"><?php echo $lang["eng"]?></option>
                                    </select>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-below">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                               <a href="#"><img src="images/medio.png" title="Mi Cocina" class="footerimg"/></a>
                            <p>©Copyright 2018, Design by David & Alessandro</p><a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Llicència de Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/4.0/80x15.png" /></a>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
