<?php

	$conn = new mysqli("localhost","root","","multi_img");
	$sql = "SELECT * FROM images ORDER BY id DESC";
	$stmt = $conn-> prepare($sql);
	$stmt-> execute();
	$result = $stmt-> get_result();
	$data = '';
	
	$x=1;
	while ($row = $result-> fetch_assoc()) {
	 	$data .= '<div class="col-lg-4">
			 	<div class="card-group">
			 		<div class="card mb-3">
			 			<a href="'.$row['image_path'].'">
			 				<img src="'.$row['image_path'].'" class="card-img-top" height="200">
			 			</a>	
			 			<h5 class="text-center">image'.$x.'</h5>
			 		</div>
			 	</div>

			 	</div>';
			 	
			 	$x++;
			 
	 } 
echo $data;

?>