<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo 'Administrar '.$subtitulo.'s' ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <?= 'Alterar dados do '.$subtitulo ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                                echo validation_errors('<div class="alert alert-danger">','</div>');
                                echo form_open('admin/publicacao/alterar');
                                foreach($publicacoes as $publicacao){
                            ?>
                            <div class="form-group">
                                    <label id="select-categoria">Categorias</label>
                                    <select id="select-categoria" name="select-categoria" class="form-control">
                                        <?php foreach ($categorias as $categoria) { ?>
                                            <option value="<?php echo $categoria->id ?>" <?php if($categoria->id == $publicacao->categoria){echo "selected";}?> ><?php echo $categoria->titulo ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                            <div class="form-group">
                                    <label id="txt-nome">Título</label>
                                    <input type="text" id="txt-titulo" name="txt-titulo" class="form-control" placeholder="Digite o titulo da publicacão..." value="<?php echo $publicacao->titulo; ?>">
                            </div>
                            <div class="form-group">
                                    <label id="txt-nome">Sub Título</label>
                                    <input type="text" id="txt-subtitulo" name="txt-subtitulo" class="form-control" placeholder="Digite o subtitulo da publicacão..." value="<?php echo $publicacao->subtitulo; ?>">
                            </div>
                            <div class="form-group">
                                    <label id="txt-conteudo">Conteudo</label>
                                    <textarea id="txt-conteudo" name="txt-conteudo" class="form-control"><?php echo $publicacao->conteudo; ?></textarea>
                            </div>
                            <div class="form-group">
                                    <label id="txt-data">Data</label>
                                    <input type="datetime-local" id="txt-data" name="txt-data" class="form-control" placeholder="Digite o login do usuário..." value="<?php echo strftime('%Y-%m-%dT%H:%M:%S', strtotime($publicacao->data)); ?>">
                            </div>
    
                            <button type="submit" class="btn btn-default">Salvar Alterações</button>
                            <?php
                                echo form_close();
                            ?>
                        </div>
                        
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <?= 'Imagem de destaque do '.$subtitulo ?>
                </div>
                <div class="panel-body">
                    <div class="row" style="padding-bottom:10px;">
                        <div class="col-lg-8 col-lg-offset-1">
                        <?php 
                            if($publicacao->img == 1){
                                echo img("assets/frontend/img/publicacao/".md5($publicacao->id).".jpg"); 
                            }else{
                                echo img("assets/frontend/img/semFoto2.png"); 
                            }
                        ?>
                        </div>  
                    </div>
                    <!-- /.row (nested) -->
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                                $divopen = '<div class="form-group">';
                                $divclose = '</div>';
                                echo form_open_multipart('admin/publicacao/nova_foto');
                                echo form_hidden('id', md5($publicacao->id));
                                echo $divopen;
                                $imagem= array('name' => 'userfile', 'id' => 'userfile', 'class' =>'form-control');
                                echo form_upload($imagem);
                                echo $divclose;
                                echo $divopen;
                                $botao= array('name' => 'btn-adicionar', 'id' => 'btn-adicionar', 'class' =>'btn btn-default', 'value' => 'Adicionar nova Imagem');
                                echo form_submit($botao);
                                echo $divclose;
                            }
                                echo form_close();

                            
                            ?>
                        </div>
                        
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

<!-- 
    <form role="form">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input class="form-control" placeholder="Entre com o texto">
                                </div>
                                <div class="form-group">
                                    <label>Foto Destaque</label>
                                    <input type="file">
                                </div>
                                <div class="form-group">
                                    <label>Conteúdo</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                               
                                <div class="form-group">
                                    <label>Selects</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default">Cadastrar</button>
                                <button type="reset" class="btn btn-default">Limpar</button>
                            </form>
-->