function updateSession(session) {

	var id = document.getElementById('idSession');
	var name = document.getElementById('nombreSession');
	var peso = document.getElementById('pesoSession');
	var repeticion = document.getElementById('repeticionSession');
	var observaciones = document.getElementById('observacionesSession');
	var finalTiempoSession = document.getElementById('finalTiempoSession');
	var divfinalTiempo = document.getElementById('haAcabado');

	id.value = session.id;
	name.value = session.name;
	peso.value = session.weight;
	repeticion.value = session.repetition;
	observaciones.value = session.remark;

	if (session.finish_time != null) {
		finalTiempoSession.checked = true;
		divfinalTiempo.classList.add("d-none");
	} else {
		finalTiempoSession.checked = false;
		divfinalTiempo.classList.remove("d-none");
	}

	console.log(session);

}