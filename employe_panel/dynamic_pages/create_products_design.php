<?php require_once("../../db.php");
echo '  <div class="row  slideInDown">
	<div class="card w-100">
		<div class="card-content">
			<div class="card-header">
			<h3 class="my-3 text-center">Create products <i class="fa fa-circle-o-notch fa-spin close" style="font-size:18px"></i></h3>
			</div>
			<div class="card-body">
				<form id="create_product_form">
				<div class="row">
				<div class="col-md-4 py-3" style="box-shadow:0px 0px  5px #ccc;border-radius:10px"> 
				<select class="form-control mb-3 selected_category" name="category">
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

					<select class="form-control mb-3 create_brand_list" name="brand">
						<option>Choose brands</option>
					</select>
				</div>
				
				<div class="col-md-8 px-3"  style="box-shadow:0px 0px 5px #ccc;border-radius:10px"> 
				<div class="input-group my-3">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-dark text-light">
                        Products title
                    </div>
                </div>
                <input type="text" class="form-control" placeholder="Products title" name="product_title">
            </div>
            <div class="input-group my-3">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-dark text-light">
                        Products description
                    </div>
                </div>
                <textarea class="form-control" style="height:100px;" name="product_desc"> </textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group my-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-dark text-light">
                                Products Price
                            </div>
                        </div>
                        <input type="number" class="form-control" placeholder="Products price" name="product_price">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group my-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-dark text-light">
                                Products Quantity
                            </div>
                        </div>
                        <input type="number" class="form-control" placeholder="Products Quantity" name="product_quant">
                    </div>
				</div>
				

			</div>
				</div>
				<div class="col-md-12 p-2" style="box-shadow:0px 0px 5px #ccc;border-radius:10px"> 
				<div class="row">
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-header text-center" style="border:1px solid #ccc;">Thumbnail</div>
                            <div class="card-body text-center" style="border:1px solid #ccc;">
                                150x150 px
                            </div>
                            <div class="card-footer">
                                <input type="file" accept="image/*" class="form-control" name="thumb">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-header text-center" style="border:1px solid #ccc;">Front </div>
                            <div class="card-body text-center" style="border:1px solid #ccc;">
                                274x274 px
                            </div>
                            <div class="card-footer">
                                <input type="file" accept="image/*" class="form-control" name="front">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-header text-center" style="border:1px solid #ccc;">Top</div>
                            <div class="card-body text-center" style="border:1px solid #ccc;">
                                447x447 px
                            </div>
                            <div class="card-footer">
                                <input type="file" accept="image/*" class="form-control" name="top">
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-2">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-header text-center" style="border:1px solid #ccc;">Bottom</div>
                            <div class="card-body text-center" style="border:1px solid #ccc;">
                                447x447 px
                            </div>
                            <div class="card-footer">
                                <input type="file" accept="image/*" class="form-control" name="bottom">
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-2">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-header text-center" style="border:1px solid #ccc;">Left </div>
                            <div class="card-body text-center" style="border:1px solid #ccc;">
                                447x447 px
                            </div>
                            <div class="card-footer">
                                <input type="file" accept="image/*" class="form-control" name="left">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-header text-center" style="border:1px solid #ccc;">Right</div>
                            <div class="card-body text-center" style="border:1px solid #ccc;">
                                447x447 px
                            </div>
                            <div class="card-footer">
                                <input type="file" accept="image/*" class="form-control" name="right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			</div>
			
			</div>
			<div class="row py-3">
			<div class="col-md-8 py-3">
				<div class="progress">
					<div class="progress-bar w-50">50%</div>
				</div>
			</div>
			<div class="col-md-4">
				<button type="submit" class="btn btn-primary float-right">Submit</button>
			</div>
		</div>
				</form>
			</div>
		</div>
</div>';
