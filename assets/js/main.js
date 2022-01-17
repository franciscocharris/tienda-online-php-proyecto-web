(function(){
	var buscador = document.querySelector('#C_buscar'),
		en_gestion = document.querySelector('#en_gestion');

	if(en_gestion){

		(function recargar(){
		    setTimeout(() => {
		    	window.location.reload();
			}, 120000);//42 segundos
		}());
	}

	if(buscador){
		buscador.addEventListener('input', buscar);
	}
		
	function buscar(e){
		// console.log(e.target.value);
		const expresion = new RegExp(e.target.value, "i"),
		registros = document.querySelectorAll('tbody tr');

		registros.forEach(registro =>{
			registro.style.display = 'none';

			// console.log(registro.childNodes[3].textContent);
			if(registro.childNodes[3].textContent.replace(/\s/g, " ").search(expresion) != -1){
				registro.style.display = 'table-row';
			}
		});
	}

	var windowHeight = $(window).height();
		var barraAltura = $('.navbar-pegajoso').innerHeight();

		$(window).scroll(function(){
			var scroll = $(window).scrollTop();
			if(scroll > windowHeight){
				$('.navbar-pegajoso').addClass('fixed');
				$('body').css({'margin-top': barraAltura+'px'});
				$('.contenedor-buscador').css({'display': 'block'});
			} else{
				$('.navbar-pegajoso').removeClass('fixed');
				$('body').css({'margin-top': '0px'});
				$('.contenedor-buscador').css({'display': 'none'});
				$('.container.contenedor-header .contenedor-buscador').css({'display' : 'block'});
			}
		});
}());