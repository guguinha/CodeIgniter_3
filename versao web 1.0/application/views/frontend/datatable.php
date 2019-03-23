   <link href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
   <link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet">
   
  
<div class="container-fluid">
    <div class="row-fluid">
        <h1 style="margin-top: 30px;"><?php echo 'Relatorio de Placas'?></h1>    
    </div>
     <hr>  
    
    <div class="row-fluid">
        <div class="span12">
            
                <table id="mytable" class="table table-hover" >
                    <thead>
                        <tr  style="background-color= #999">
                            <th><?= '' ?></th>
                            <th><?= 'Id Cliente' ?></th>
                            <th><?= 'Cliente' ?></th>
                            <th><?= 'Número de Placas Ativas' ?></th>
                            <th><?= 'Número de Placas Inativas' ?></th>
                            <th><?= '' ?></th>
                         </tr>
                    </thead>
                    <tbody>
                        <?php foreach($veiculos as $veiculo): ?>
                            <tr>
                                <td><?= ' ' ?></td>
                                <th><?= $veiculo->id_cliente ?></th>
                                <td><?= $veiculo->nome ?></td>
                                <td><?= $veiculo->ativos ?></td>
                                <td><?= $veiculo->inativos ?></td>
                                <td><?= ' ' ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
           
        </div>
    </div>
</div>


<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
   <script type="text/javascript">
       $(document).ready( function () {
           $('.table').DataTable( {
               "language": {
                   "decimal":        "",
                   "emptyTable":     "Nenhum registro encontrado",
                   "info":           "Registro _START_ a _END_ de _TOTAL_ registros",
                   "infoEmpty":      "0 Registros",
                   "infoFiltered":   "(filtered from _MAX_ total entries)",
                   "infoPostFix":    "",
                   "thousands":      ",",
                   "lengthMenu":     "Qntd: _MENU_",
                   "loadingRecords": "Carregando...",
                   "processing":     "Processando...",
                   "search":         "Pesquisar:",
                  "zeroRecords":    "Nenhum registro encontrado",
                   "paginate": {
                       "first":      "Anterior",
                       "last":       "Avançar",
                       "next":       "Avançar",
                       "previous":   "Início"
                   }
               }
           } );
       } );

       var loadFile = function(event) {
           var output = document.getElementById('output');
           output.src = URL.createObjectURL(event.target.files[0]);
       };
   </script>
 