<div class="row">
	<div class="container">
		<div class="alert alert-info alert-dismissible col-md-12" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Zamknij"><span aria-hidden="true">&times;</span></button>
		Proszę o niezmienianie cen przedmiotów które są w istniejących zamówieniach (usuwać można bez problemu), wtedy całkowita kwota zamówienia staje się niepoprawna, musiałbym dopisać trigger, który by ją uaktualniał lub w ogóle zmienić strukturę bazy.
		</div>
	</div>
</div>
<div class="row">
	<div id="itemList" class="col-md-8 table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Nazwa</th>
					<th>Cena</th>
					<th>Edytuj</th>
					<th>Usuń</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($items as $item) { ?>
					<tr id="item-id-<?php if (isset($item->id)) Helper::cln($item->id); ?>">
						<td><?php if (isset($item->id)) Helper::cln($item->id); ?></td>
						<td><?php if (isset($item->name)) Helper::cln($item->name); ?></td>
						<td><?php if (isset($item->price)) Helper::cln($item->price, true); ?></td>
						<td>
							<span class="glyphicon glyphicon-pencil" aria-hidden="true" 
							 id="<?php if (isset($item->id)) echo Helper::cln($item->id); ?>"></span>
						</td>
						<td>
							<span class="glyphicon glyphicon-remove" aria-hidden="true" 
							 id="<?php if (isset($item->id)) echo Helper::cln($item->id); ?>"></span>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div id="itemDetails" class="col-md-4">