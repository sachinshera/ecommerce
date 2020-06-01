<?php
echo '  <div class="row animated fadeIn">
<div class="col-md-5">
    <div class="card border-0">
        <div class="card-content border-0">
            <div class="card-header bg-white border-0">
                <i class="fa fa-spinner fa-spin close d-none" id="header_spinner"></i>
                <h5>Create Category</h5>
            </div>
            <div class="card-body">
                <form id="category_form">
                    <input type="text" class="form-control" placeholder="Mobiles">
                    <div id="add_input"> </div>
                    <button type="button" class="btn btn-primary mt-3 mx-3 add_field_btn"> <i class="fa fa-plus"> </i> Add Field</button>
                    <button type="submit" class="btn btn-danger mt-3"> <i class="fa fa-save mx-1"> </i>Save</button>
                   <div id="category_msg"> </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-1"></div>
<div class="col-md-6">
    <div class="card">
        <div class="card-content">
            <div class="card-header">
                <h5>Category list</h5>
            </div>
            <div class="card-body category_list" style="overflow-x:scroll;height:600px">
         
            </div>
        </div>
    </div>
</div>
</div>';
