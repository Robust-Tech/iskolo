</div>
<div class="text-center copyright">
		<p> <small>Powered by <a href="http://www.tinyeleti.com" target="_blank">Tinyeleti Consulting</a>
	<br> <a href="<?=$this->config->item('school_domain')?>" target="_blank"><?=$website_name?></a> &copy; <?=date('Y')?> </small> </p>	</div>
<script src="<?=base_url()?>assets/js/jquery-2.2.4.min.js"></script>
<script src="<?=base_url()?>assets/js/app.js"></script>

<script type="text/javascript">
$(document).ready(function(){
 $(".dropdown-toggle").click(function(){
    $(".dropdown-menu").toggle();
});
});
</script>
</body>
</html>
