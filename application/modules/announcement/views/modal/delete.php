<div class="modal-dialog">
	<div class="modal-content portlet light portlet-fit portlet-form bordered">
		<div class="modal-header  portlet-title bg-danger"> <button type="button" class="close" data-dismiss="modal">&times;</button> 
		<h4 class="modal-title caption-subject bold uppercase"><?='Delete Activity'?></h4>
		</div><?=form_open(base_url().'announcement/delete','class="form-horizontal"')?>
		<div class="portlet-body modal-body">
			<p><?='You are about to delete an item from the database.'?></p>
			<input type="hidden" name="activity" value="<?=$id?>">
		</div>
		<div class="modal-footer form-actions"> <a href="#" class="btn btn-default" data-dismiss="modal"><?='Close'?></a>
			<button type="submit" class="btn btn-danger"><?='Delete'?></button>
		</form>
	</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->