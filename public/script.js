$(document).ready( function () {
	if($('.btn_lista').length){
		$('.btn_lista').on('click',function(e){
			e.preventDefault();
			$.get($('.btn_lista').data('href'), {
				_token: $("meta[name='csrf-token']").attr("content")
			}, function (data) {
				var item = document.createElement('a');
				item.setAttribute('href', data);
				item.setAttribute('download', 'lista de ciudades');
				document.body.appendChild(item);
				item.click();
				document.body.removeChild(item);
			}, "html");
		});
	}
});