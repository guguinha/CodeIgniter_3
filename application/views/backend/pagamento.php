<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $subtitulo ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <?= $subtitulo ?>
               </div>
               <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Tela de Pagamento via paypal !</h2>
                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <?= 'Endpoints API '.$subtitulo ?>
               </div>
               <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                            $this->table->set_heading("Ambiente","Endpoint","URL de Redirecionamento");
                            $this->table->add_row("Sandbox","https://api-3t.sandbox.paypal.com/nvp","https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token={TOKEN}");
                            $this->table->add_row("Produção","https://api-3t.paypal.com/nvp","https://www.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token={TOKEN}");
                            $this->table->set_template(array(
                                'table_open' => '<table class="table table-striped">'
                            ));
                            echo $this->table->generate();
                            ?>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Como colocar em Produção
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <style>
                                img{
                                    width: 740px;
                                }
                            </style>
                            <img src="<?= base_url().'assets/backend/image/CredenciaisdeProducaoPayPalAPI.png' ?>">
                        </div>  
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->