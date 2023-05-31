	<!-- jquery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<form id="uploadForm" enctype="multipart/form-data">
  <input type="file" id="fileInput" name="userfile">
  <input type="submit" value="upload">
</form>
<div class="progress" >
  <div id="progressBar" class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<script>
	$(document).ready(function() {
		$('#uploadForm').submit(function(e) {
			e.preventDefault(); // Prevent form submission
			var formData = new FormData($(this)[0]);
			$(".progress").show();
			$.ajax({
      url: '<?php echo base_url("home/upload_file") ?>', // Replace with your CodeIgniter upload URL
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      xhr: function() {
        var xhr = new window.XMLHttpRequest();
        xhr.upload.addEventListener('progress', function(e) {
          if (e.lengthComputable) {
            var percent = Math.round((e.loaded / e.total) * 100);
            $('#progressBar').width(percent + '%').text(percent + '%');
          }
        });
        return xhr;
      },
      success: function(response) {
        // Handle the response after successful upload
		console.log(response);
		$(".progress").hide();
      },
      error: function() {
        // Handle any errors
		console.log(response);
      }
    });
		});
	});
</script>
