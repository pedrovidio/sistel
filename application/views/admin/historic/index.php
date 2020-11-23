<div class="contente">
  <div class="filterable col-md-12 list">
    <table id="tabela" class="table table-hover table-bordered">
      <thead>
          <tr class="filters">
            <th id="filter_col0" data-column="0">
              <input style="width:50px" class="column_filter form-control" id="col0_filter" type="text" placeholder="Handle" disabled><span style="display:none">Handle</span>
            </th>
            <th id="filter_col1" data-column="1">
              <input style="width:200px" class="column_filter form-control" id="col1_filter" type="text" placeholder="Participante" disabled><span style="display:none">Participante</span>
            </th>
            <th id="filter_col2" data-column="2">
              <input style="width:100px" class="column_filter form-control" id="col2_filter" type="text" placeholder="Município" disabled><span style="display:none">Município</span>
            </th>
            <th id="filter_col3" data-column="3">
              <input style="width:50px" class="column_filter form-control" id="col3_filter" type="text" placeholder="UF" disabled><span style="display:none">UF</span>
            </th>
            <th id="filter_col4" data-column="4">
              <input style="width:100px" class="column_filter form-control" id="col4_filter" type="text" placeholder="Status" disabled><span style="display:none">Status</span>
            </th>
            <th id="filter_col5" data-column="5">
              <input style="width:100px" class="column_filter form-control" id="col5_filter" type="text" placeholder="Status da Cota" disabled><span style="display:none">Status da Cota</span>
            </th>
            <th id="filter_col6" data-column="6">
              <input style="width:150px" class="column_filter form-control" id="col6_filter" type="text" placeholder="Status da ligação" disabled><span style="display:none">Status da ligação</span>
            </th>
            <th id="filter_col7" data-column="7">
              <input style="width:70px" class="column_filter form-control" id="col7_filter" type="text" placeholder="Operador" disabled><span style="display:none">Operador</span>
            </th>
            <th id="filter_col8" data-column="8">
              <input style="width:70px" class="column_filter form-control" id="col8_filter" type="text" placeholder="Data" disabled><span style="display:none">Data</span>
            </th>
            <th id="filter_col9" data-column="9">
              <input style="width:70px" class="column_filter form-control" id="col9_filter" type="text" placeholder="Excluir" disabled><span style="display:none">Excluir</span>
            </th>
          </tr>
      </thead>
      <tbody>
        <?php 
          foreach($historic as $key => $val){
            $status = ($val['status'] == 1) ? 'Ativo' : 'Inativo';
            $statusCota = ($val['statusCota'] == 1) ? 'Ativo' : 'Inativo';
            echo "
            <tr>
              <td>".$val['handle']."</td>
              <td>".$val['nome_participante']."</td>
              <td>".$val['municipio']."</td>
              <td>".$val['uf']."</td>
              <td><div class='".$status."'>$status</div></td>
              <td><div class='".$statusCota."'>$statusCota</div></td>
              <td>".$val['statusLigacao']."</td>
              <td>".$val['user']."</td>
              <td>".$val['created_at']."</td>
              <td align='center'>
                <a onclick='deleteHistoric(".$val['log_id'].")'>
                <svg style='enable-background:new 0 0 512 512;' version='1.1' viewBox='0 0 512 512' xml:space='preserve' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><g id='Layer_1'/><g id='Layer_2'><g><g><path class='st0' d='M388.31,110.71h-63.59C323.89,73.51,293.39,43.5,256,43.5s-67.89,30.01-68.72,67.21h-63.59     c-24.34,0-44.08,19.73-44.08,44.08v1.25c0,24.34,19.73,44.08,44.08,44.08h264.61c24.34,0,44.08-19.73,44.08-44.08v-1.25     C432.38,130.44,412.65,110.71,388.31,110.71z M256,75.05c19.99,0,36.35,15.86,37.16,35.66h-74.33     C219.65,90.91,236.01,75.05,256,75.05z'/></g><g><path class='st0' d='M123.7,231.66c-1.49,0-2.97-0.04-4.43-0.13v183.29c0,29.64,24.03,53.67,53.67,53.67h166.11     c29.64,0,53.67-24.03,53.67-53.67V231.54c-1.46,0.09-2.94,0.13-4.43,0.13H123.7z M230.95,409.91c0,8.71-7.07,15.78-15.78,15.78     c-8.72,0-15.78-7.07-15.78-15.78V294.28c0-8.72,7.06-15.78,15.78-15.78c8.71,0,15.78,7.06,15.78,15.78V409.91z M312.6,409.91     c0,8.71-7.06,15.78-15.78,15.78c-8.71,0-15.78-7.07-15.78-15.78V294.28c0-8.72,7.07-15.78,15.78-15.78     c8.72,0,15.78,7.06,15.78,15.78V409.91z'/></g></g></g></svg>
                </a>
              </td>
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

    function deleteHistoric(id){
      document.getElementById('modalCati').style.display = 'block';
      console.log(id)
      document.getElementById('log_id').value = id;
    }

    function fechaModalHistoric(){
      document.getElementById('modalCati').style.display = 'none';
    }
	</script>