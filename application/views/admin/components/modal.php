<?php
echo '
<div id="modalCati">
    <div>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Atenção!</h4>
            </div>
            <div class="modal-body">
                <h4>Deseja realmente excluir esse registro?</h4>
            </div>
            <div class="modal-footer">
                <form style="display:inline" method="post" action="'.base_url('historico/update').'">
                    <input type="hidden" name="log_id" id="log_id" value="">
                    <button type="submit" class="btn btn-success">Sim</button>
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="fechaModalHistoric()">Não</button>
            </div>
        </div>
    </div>
</div>';
?>