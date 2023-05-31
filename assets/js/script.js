const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

$(document).ready(function () {
	showPhotos();
	$("#uploadPhoto").submit(function (e) { 
		e.preventDefault();
		$("#uploadPhoto-spinner").show();
		var formDataUploadPhoto = new FormData($("#uploadPhoto")[0]);
		$.ajax({
			url: '../upload/uploadPhotoSum',
			type: 'POST',
			data: formDataUploadPhoto,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			success: function(response) {
				console.log('Ajax success');
				$('#uploadImgStatus').show();
				$('#uploadImgStatus').html(response);
				$("#uploadPhoto-spinner").hide();
				showPhotos();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				$('#uploadImgStatus').show();
				$('#uploadImgStatus').addClass('alert-danger');
				$('#uploadImgStatus').html('<strong>Sorry!</strong> Something went wrong! Please try again later.');
				$("#uploadPhoto-spinner").hide();
				console.log('Error: ' + jqXHR);
				console.log('Error: ' + textStatus);
				console.log('Error: ' + errorThrown);
				
			}
		});
	});
});
function showPhotos() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			$("#photo_lib").html(this.responseText);
		}
	};
	xhttp.open("GET", "../upload/showPhotos", true);
	xhttp.send();
}
const img = document.getElementById('myImage');

img.addEventListener('click', function() {
  getImageSrc(this);
});

