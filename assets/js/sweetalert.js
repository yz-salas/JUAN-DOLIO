document.addEventListener("DOMContentLoaded", function () {
	const urlParams = new URLSearchParams(window.location.search);
	const message = urlParams.get("message");
	const type = urlParams.get("type");

	if (message) {
		Swal.fire({
			title: type === "success" ? "¡Éxito!" : "¡Error!",
			text: message,
			icon: type,
			position: "top-end",
			showConfirmButton: false,
			timer: 1500,
		});
	}
});

function confirmarEliminacion(id, imageName) {
	Swal.fire({
		title: "¿Estás seguro?",
		text: "No podrás revertir esto!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Sí, eliminar!",
		cancelButtonText: "Cancelar",
	}).then((result) => {
		if (result.isConfirmed) {
			// Realizar una solicitud AJAX para eliminar la imagen
			fetch(
				`delete.php?ID=${encodeURIComponent(
					id
				)}&imageName=${encodeURIComponent(
					imageName
				)}`
			)
				.then((response) => response.json())
				.then((data) => {
					if (data.success) {
						Swal.fire(
							"Eliminada!",
							"La imagen ha sido eliminada.",
							"success"
						);
						// Eliminar la imagen del DOM
						const imgElement =
							document.querySelector(
								`img[src="../assets/imgbasedata/${imageName}"]`
							);
						if (imgElement) {
							imgElement.parentElement.parentElement.remove();
						}
					} else {
						Swal.fire(
							"Error!",
							data.error ||
								"Hubo un problema al eliminar la imagen.",
							"error"
						);
					}
				})
				.catch((error) => {
					Swal.fire(
						"Error!",
						"Hubo un problema al eliminar la imagen.",
						"error"
					);
				});
		}
	});
}

/*
function confirmarEliminacion(id, imageName) {
	if (
		confirm(
			"¿Estás seguro que deseas eliminar la imagen " + imageName + "?"
		)
	) {
		window.location.href = "delete.php?ID=" + id;
	} else {
		return false;
	}
}

		*/
