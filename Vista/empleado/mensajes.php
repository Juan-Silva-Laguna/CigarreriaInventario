<?php include('head.php');?>
        <div class="container menu" > 
            <div class="page-header">
                <h2 class="text-titles"><i class="zmdi zmdi-email"></i> Mensajes</h2>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-2" id="divPadre" style="background: rgba(0, 0, 0, 0.85); color: #fff;">
                <br>
                </div>
                <div class="col-md-7" id="contenedor" style="box-shadow: 0 0 5px 0 #000, 0 0 5px 0 #000; width: 350px; height:400px; overflow: scroll;margin-left: 8px; display: none;">
                    <br>
                </div>
                <div class="col-md-5"></div>
                <div class="col-md-7" style="padding-left: 8px;">
                    <div class="form-group" id="chat" style="margin-top: 0px; position: absolute; bottom: -60px; display: none;">
                        <form id="frmMensaje" action="#" >
                            <textarea name="" id="mensaje" cols="42" rows="2" required></textarea>
                            <input type="submit" style="background-color: #ffc107; width: 40px; height: 50px; border-radius: 0 10px 10px 0;position: relative; bottom: 19px; right: 5px;" value=">>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <br><br><br><br><br>
<?php include('footer.php'); ?>
<script src="../../Controlador/Js/mensaje.js"></script>