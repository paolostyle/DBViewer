//rozne fajne rzeczy tu sa, wszystko dzieki jquery(tm)
$(function() {
	//obsluguje klikniecia na plusa, czyli pokazanie szczegolow zamowienia
	$('.glyphicon-plus').on('click', function() {
		var id = $(this).attr("id");

		//odwołanie ajaxowe do metody details z parametrem id,
		//ktory bierzemy z id plusa ktory kliknelismy (linia wyzej)
		$.ajax(url + "/details/" + id)
			.done(function(result) {
				//wrzucamy widok (details.php) do diva o id orderDetails
				//cała reszta działa podobnie więc nie opisuje
				$('#orderDetails').html(result);
			});

		//podświetlanie aktywnego zamówienia
		$('tr').removeClass('active');
		$('#order-id-'+id).addClass('active');
	});

	//obsługuje usuwanie zarówno przedmiotow jak i zamowien
	$('.glyphicon-remove').on('click', function() {
		var id = $(this).attr("id");

		if(confirm("Jesteś pewien że chcesz to usunąć?")) {
			$.ajax(url + "/remove/" + id)
				.done(function(result) {
					location.reload();
				});
		}
	});

	//taki bajer nieistotny
	$('#itemDetails').on('change', 'input#id', function() {
	    if($('input#id').val() === '') $('.btn').html('Dodaj');
	});

	//"uzupełnia" formularz dodawania przedmiotu
	$('.glyphicon-pencil').on('click', function() {
		var id = $(this).attr("id");

		$.ajax(url + "/edit/" + id)
			.done(function(result) {
				$('#itemDetails').html(result);
				$('.btn').html('Edytuj');
			});
	});
});