<div id="myModalGroupAccounting" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="padding: 10px 20px; background:#2a4469; color: #FFF;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{trans('template.group_accounting')}}</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-bordered">
        	<thead>
        		<tr>
        			<th style="text-align: center;">{{trans('template.no')}}</th>
        			<th style="text-align: center;">{{trans('template.name')}}</th>
        		</tr>        		
        	</thead>
        	<tbody>
        		{{\App\Helpers\Helpers::getGroupAccounting()}}		
        	</tbody>
        </table>
      </div>
    </div>
  </div>
</div>
