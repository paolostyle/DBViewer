<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Szczegóły zamówienia nr <?php echo $id; ?></h3>
	</div>
	<ul class="list-group">
		<?php foreach ($details as $element) { ?>
			<li class="list-group-item">
				<span class="badge">
				<?php if(isset($element->price)) Helper::cln($element->price, true); ?>
				</span>
				<?php if (isset($element->name)) Helper::cln($element->name); elseif (isset($element->price)) echo "Dostawa"; ?>
			</li>
		<?php } ?>
	</ul>
</div>