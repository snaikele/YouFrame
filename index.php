<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi Image Upload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body class="bg-dark" id="body">
	<div style="background-color:#2c5282;">
		<h4 class="text-center pb-2 p-3 text-white">Gallery</h4>
	</div>


<div class="container">
	
	<div class="row justify-content-center">
		<div class="col-lg-5 bg-light mt-4 p-2 rounded">
			

			<form method="post" enctype="multipart/form-data" id="image_upload">
				<div class="form-group">
					<div class="custome-file" mt-4>
						<input type="file" name="images[]" class="custom-file-input" id="image" accept=".png, .jpg, .jpeg" onchange="validateFileType()" multiple>
						<label for="image" class="custom-file-label">Choose File</label>
					</div>
				</div>	
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-info btn-block" value="Upload">
				</div>
				<h5 class="text-center text-success" id="result"></h5>
			</form>


		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-lg-12 mt-4">
			<div class="row p-2" id="preview-image"></div>
		</div>
	</div>
</div>
<footer class="font-small tile pt-4">

  
  <div style="background-color: #2c5282 !important;" class="text-center py-3 text-white">Fullstack Challenge - 2020

  </div>
  

</footer>
<script
			  src="http://code.jquery.com/jquery-3.5.1.min.js"
			  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
			  crossorigin="anonymous"></script>
			  <script type="text/javascript">
			  	function validateFileType(){
										        var fileName = document.getElementById("fileName").value;
										        var idxDot = fileName.lastIndexOf(".") + 1;
										        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
										        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
										            //TO DO
										        }else{
										            alert("Only jpg/jpeg and png files are allowed!");
										        }   
										    }

			  	$(document).ready(function(){
			  		$("#image").on('change', function(){
			  			var filename = $(this).val();
			  			$(".custom-file-label").html(filename);
			  		});

			  		$("#image_upload").submit(function(e){
			  			e.preventDefault();
			  			var filename = $(":file").val();
						if (!filename) {
						alert("First Image Must Be Selected");
						e.preventDefault();
						}
			  			$.ajax({
			  				url: 'insert.php',
			  				method: 'post',
			  				processData: false,
			  				contentType: false,
			  				cache: false,
			  				data: new FormData(this),
			  				success: function(response){
			  					$("#result").html(response);
			  					$('.custom-file-label').html('Choose file');
			  					load_images();
			  				}
			  			});
			  		});
			  		load_images();
			  		function load_images(){
			  			$.ajax({
			  				url: 'load.php',
			  				method: 'get',
			  				success: function(data){
			  					$("#preview-image").html(data);


			  				}
			  			});
			  		}

			  	});
			  </script>

</body>
</html>