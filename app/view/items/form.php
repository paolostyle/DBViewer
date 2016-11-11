	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Dodaj/modyfikuj produkty</h3>
		</div>
		<div class="panel-body">
			<form action="items/send" method="post">
				<div class="form-group" id="id-group">
					<label for="id">Identyfikator</label>
					<input type="number" class="form-control" name="id" id="id" value="<?php if (isset($itemEd->id)) Helper::cln($itemEd->id); ?>" placeholder="Zostaw puste by dodać nowy produkt">
				</div>
				<div class="form-group" id="name-group">
					<label for="name">Nazwa</label>
					<input type="text" class="form-control" name="name" id="name" value="<?php if (isset($itemEd->name)) Helper::cln($itemEd->name); ?>" placeholder="Nazwa produktu">
				</div>
				<div class="form-group" id="price-group">
					<label for="price">Cena</label>
					<input type="number" class="form-control" name="price" id="price" value="<?php if (isset($itemEd->price)) Helper::cln($itemEd->price); ?>" placeholder="Cena">
				</div>
				<div class="form-group" id="desc-group">
					<label for="desc">Opis</label>
					<textarea class="form-control" id="desc" name="desc" rows="3"><?php if (isset($itemEd->desc)) Helper::cln($itemEd->desc); ?></textarea>
				</div>
				<button type="submit" class="btn btn-default">Dodaj</button>
			</form>
		</div>
	</div>
</div>