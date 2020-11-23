<div class="contente">
  <div class="filterable col-md-12 list">
    <table id="tabela" class="table table-hover table-bordered">
      <thead>
          <tr class="filters">
            <th id="filter_col0" data-column="0">
              <input style="width:100px" class="column_filter form-control" id="col0_filter" type="text" placeholder="Nome" disabled><span style="display:none">Nome</span>
            </th>
            <th id="filter_col1" data-column="1">
              <input style="width:100px" class="column_filter form-control" id="col1_filter" type="text" placeholder="Tipo de público" disabled><span style="display:none">Tipo de público</span>
            </th>
            <th id="filter_col2" data-column="2">
              <input style="width:50px" class="column_filter form-control" id="col2_filter" type="text" placeholder="UF" disabled><span style="display:none">UF</span>
            </th>
            <th id="filter_col3" data-column="3">
              <input style="width:150px" class="column_filter form-control" id="col3_filter" type="text" placeholder="Plano benefício" disabled><span style="display:none">Plano benefício</span>
            </th>
            <th id="filter_col4" data-column="4">
              <input style="width:150px" class="column_filter form-control" id="col4_filter" type="text" placeholder="Patrocinadora" disabled><span style="display:none">Patrocinadora</span>
            </th>
            <th id="filter_col5" data-column="5">
              <input style="width:100px" class="column_filter form-control" id="col5_filter" type="text" placeholder="Celular" disabled><span style="display:none">Celular</span>
            </th>
            <th id="filter_col6" data-column="6">
              <input style="width:50px" class="column_filter form-control" id="col6_filter" type="text" placeholder="Telefone" disabled><span style="display:none">Telefone</span>
            </th>
            <th id="filter_col7" data-column="7">
              <input style="width:70px" class="column_filter form-control" id="col7_filter" type="text" placeholder="Dia" disabled><span style="display:none">Dia</span>
            </th>
            <th id="filter_col8" data-column="8">
              <input style="width:70px" class="column_filter form-control" id="col8_filter" type="text" placeholder="Hora" disabled><span style="display:none">Hora</span>
            </th>
            <th id="filter_col9" data-column="9">
              <input style="width:70px" class="column_filter form-control" id="col9_filter" type="text" placeholder="Status" disabled><span style="display:none">Status</span>
            </th>
          </tr>
      </thead>
      <tbody>
        <?php 
          foreach($contacts as $key => $val){
            $status = ($val['status'] == 1) ? 'Ativo' : 'Inativo';
            echo "
            <tr>
              <td>".$val['nome']."</td>
              <td>".$val['tipo_publico']."</td>
              <td>".$val['uf']."</td>
              <td>".$val['plano_beneficio']."</td>
              <td>".$val['patrocinadora']."</td>
              <td>(".$val['ddd_celular']. ") " .$val['telefone_celular']."</td>
              <td>(".$val['ddd_fixo']. ") " .$val['telefone_fixo']."</td>
              <td>".implode('/',array_reverse(explode('-',$val['dia'])))."</td>
              <td>".$val['hora']."</td>
              <td>".$val['statusLigacao']."</td>
            </tr>
            ";
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<!-- tabela -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<!-- botões tabela -->
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
<script type="text/javascript">
    function filterColumn ( i ) {
        $('#tabela').DataTable().column( i ).search(
            $('#col'+i+'_filter').val(),
            $('#col'+i+'_smart').prop('checked')
        ).draw();
    }
		//cria a tabela pela api DataTable
		$(document).ready(function() {
				function date () {
					var today = new Date();
					var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
					var time = today.getHours() + "-" + today.getMinutes() + "-" + today.getSeconds();
					var dateTime = date+'_'+time;
					return dateTime
				};
				var table = $('#tabela').DataTable({
					stateSave: false,
					scrollY: '60vh',
					scrollCollapse: true,
					"scrollX": true,
					"lengthMenu": [[10, 50, 100, 500], [10, 50, 100, 500]],
          "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"
          },
					"dom": "<'row'<'col-lg-12'B>>"+"<'row'<'col-lg-12'tr>>"+"<'row'<'col-lg-3'l><'col-lg-3'i><'col-lg-6'p>>",
          "columnDefs": [ 
            {
              "targets": [6],
              "orderable": false
            }
          ],
					buttons: [
            {
							className: 'btn btn-secondary btn-filter',
							text: 'Filtrar',
              action: function(){
                var $panel = $('.filterable').parents(),
                  $filters = $panel.find('.filters input');
                  console.log($panel)
                if ($filters.prop('disabled') == true) {
                  $filters.prop('disabled', false);
                } else {
                  $filters.val('').prop('disabled', true);
                }
              }
						},
						{
							extend: 'excelHtml5',
							className: 'btn btn-secondary btn-export',
							title: null,
							filename: date,
							text: 'Exportar',
							exportOptions: {
								columns: ':visible:not(.notexport)'
							}
						}
					],
					order: []
				});
        $('input.column_filter').on( 'keyup click', function () {
          filterColumn( $(this).parents('th').attr('data-column') );
        } );
			$(document).ready(function (){
				//desabilitar ordenação quando filtro está habilitado
				var table = $('#table').DataTable();

				$('.form-control').on('click', function(e){
					e.stopPropagation();
				});
			});
		});
	</script>