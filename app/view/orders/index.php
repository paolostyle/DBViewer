<div class="row">
	<div id="orderList" class="col-md-8 table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Imię</th>
					<th>Data zam.</th>
					<th>Dostawa</th>
					<th>Koszt</th>
					<th>Szcz.</th>
					<th>Usuń</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($orders as $order) { ?>
				<tr id="order-id-<?php if (isset($order->id)) Helper::cln($order->id); ?>">
					<td><?php if (isset($order->id)) Helper::cln($order->id); ?></td>
					<td><?php if (isset($order->name) && isset($order->surname)) 
								 Helper::cln($order->name." ".$order->surname); ?></td>
					<td><?php if (isset($order->order_date)) Helper::cln($order->order_date); ?></td>
					<td><?php if (isset($order->delivery)) Helper::cln($order->delivery); ?></td>
					<td><?php if (isset($order->amount)) Helper::cln($order->amount, true); ?></td>
					<td>
						<span class="glyphicon glyphicon-plus" aria-hidden="true" 
						 id="<?php if (isset($order->id)) echo Helper::cln($order->id); ?>"></span>
					</td>
					<td>
						<span class="glyphicon glyphicon-remove" aria-hidden="true" 
						id="<?php if (isset($order->id)) Helper::cln($order->id); ?>"></span>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div id="orderDetails" class="col-md-4">
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<p><strong>Wartość wszystkich zamówień:</strong> <?php if (isset($value->sum)) Helper::cln($value->sum, true); ?></p>
				<strong>Średnia wartość zamówienia:</strong> <?php if (isset($avg->avg)) Helper::cln($avg->avg, true); ?>
			</div>
		</div>
	</div>