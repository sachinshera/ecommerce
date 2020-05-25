<?php
require_once("../../db.php");

echo '  <div class="row animated fadeIn">
<div class="col-md-5 py-2 bg-white rounded-lg shadow-sm">
	<div class="card">
		<div class="card-content">
			<div class="card-header">
			<i class="fa fa-spinner fa-spin close d-none" id="header_spinner"></i>
				<h5 class="my-3">CREATE BRANDS<i class="fa fa-circle-o-notch fa-spin close" style="font-size:18px"></i></h5>
			</div>
			<div class="card-body">

				<form id="create_brand_form">


					<select class="form-control mb-3 selected_brand">
						<option value=""choose category">Choose Category</option>';
$response = $db->query("SELECT * FROM category");
if ($response) {
	while ($data = $response->fetch_assoc()) {
		$cate_name = $data["category_name"];
		echo  "<option value='" . $cate_name . "'> " . $cate_name . " </option>";
	}
};
echo '
					</select>

					<input type="text" class="form-control mb-3" placeholder="Nokia">
					<div id="add_brand_fields"> </div> 
					<button type="button" class="btn btn-primary mt-3 mx-3 add_brand_btn"> <i class="fa fa-plus"> </i> Add Field</button>
					<button type="submit" class="btn btn-danger mt-3"> <i class="fa fa-save mx-1"> </i>Save</button>
					<div id="brand_msg"> </div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-md-1">

</div>
<div class="col-md-6 bg-white rounded-lg shadow-sm">
	<div class="card">
		<div class="card-content">
			<div class="card-header">
				<h5 class="my-3">BRANDS LIST</h5>
			</div>
			<div class="card-body">
			<div class="category_box"> 
			<select class="form-control mb-3 selected_brand">
			<option value=""choose category">Choose Category</option>';
$response = $db->query("SELECT * FROM category");
if ($response) {
	while ($data = $response->fetch_assoc()) {
		$cate_name = $data["category_name"];
		echo  "<option value='" . $cate_name . "'> " . $cate_name . " </option>";
	}
};

echo '
			</div>
			</div>
		</div>
	</div>

</div>
</div>';
