<?php
require_once("../../db.php");
if ($db->query("SELECT * FROM branding")) {
    $sql = $db->query("SELECT * FROM branding");
    if ($sql) {
        $data = $sql->fetch_assoc();
        $brand_name = $data["brand_name"];
        $logo = $data["logo"];
        $domain =  $data["domain"];
        $email = $data["email"];
        $facebook = $data["facebook"];
        $twitter = $data["twitter"];
        $instagram = $data["instagram"];
        $address = $data["address"];
        $phone = $data["phone"];
        $about = $data["about"];
        $policy = $data["policy"];
        $cookies = $data["cookies"];
        $terms = $data["terms"];
    } else {
        $brand_name = "";
        $logo = "";
        $domain = "";
        $email = "";
        $facebook = "";
        $twitter = "";
        $instagram = "";
        $address = "";
        $phone = "";
        $about = "";
        $policy = "";
        $cookies = "";
        $terms = "";
    }
} else {
    $brand_name = "";
    $logo = "";
    $domain = "";
    $email = "";
    $facebook = "";
    $twitter = "";
    $instagram = "";
    $address = "";
    $phone = "";
    $about = "";
    $policy = "";
    $cookies = "";
    $terms = "";
}
echo ' <form id="brand_form" action="post">
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 update_brand_box py-3">
        <h4 class="text-center mb-3">Update brand details</h4>
        <label for="brand_name" style="font-weight: bold">Enter your brand name</label>
        <input type="text" placeholder="brand name" class="form-control mb-3" id="brand_name" name="brand_name" norequired="no" value="';
echo $brand_name;
echo '">

<div>';
echo "<img style='width:80px;height:80px' src='data:image/gif;base64," . base64_encode($logo) . "'> </img>";
echo '

</div>
<label for="logo" style="font-weight: bold">Logo</label>
<input type="file" accept="image/*" class="form-control mb-3" id="logo" placeholder="choose your logo" name="logo" norequired="no">
<label for="domain" style="font-weight: bold">Domain Name</label>
<input type="website" class="form-control mb-3" id="domain" placeholder="Enter your domain" name="domain" norequired="no" value="';
echo $domain;
echo '">
<label for="email" style="font-weight: bold">Enter your email address</label>
<input type="email" class="form-control mb-3" id="email" placeholder="Enter your email" name="email" norequired="no" value="';
echo $email;
echo '">
<label for="socialaccounts" style="font-weight: bold">Social accounts</label>
<br><small>facebook</small>
<input type="website" class="form-control mb-3" id="socialaccounts" placeholder="facebook url" name="facebook" value="';
echo $facebook;
echo '">
<small>twitter</small>
<input type="website" class="form-control mb-3" id="socialaccounts" placeholder="twitter url" name="twitter" value="';
echo $twitter;
echo '">
<small>instagram</small>
<input type="website" class="form-control mb-3" id="socialaccounts" placeholder="instagram url" name="instagram" value="';
echo $instagram;
echo '">
<label for="address" style="font-weight: bold">Address</label><small class="float-right">max 1500</small>
<textarea name="address" id="address" cols="30" rows="5" class="form-control mb-3" norequired="no" maxlength="1500" minlength="10">';
echo $address;
echo '</textarea>
<label for="phone" style="font-weight: bold">Phone Number</label>
<input type="text" name="phone" id="phone" class="form-control mb-3" maxlength="12" minlength="10" norequired="no" value="';
echo $phone;
echo '">
<label for="about" style="font-weight: bold">About us</label><small class="float-right">max 10000</small>
<textarea name="about" id="about" cols="30" rows="7" class="form-control mb-3" norequired="no" maxlength="10000" minlength="1000">
        ';
echo $about;
echo '
</textarea>
<label for="policy" style="font-weight: bold">Privacy Policy</label><small class="float-right">max 10000</small>
<textarea name="policy" id="policy" cols="30" rows="12" class="form-control mb-3" norequired="no" maxlength="10000" minlength="1000">';
echo $policy;
echo '</textarea>
<label for="cookies" style="font-weight: bold">Cookies Policy</label> <small class="float-right">max 10000</small>
<textarea name="cookies" id="cookies" cols="30" rows="12" class="form-control mb-3" norequired="no" maxlength="10000" minlength="1000">';
echo $cookies;
echo '</textarea>
<label for="terms" style="font-weight: bold"><span class="float-left">Terms and conditions </span></label> <small class="float-right">max 10000</small>
<textarea name="terms" id="terms" cols="30" rows="12" class="form-control mb-3" norequired="no" maxlength="10000" minlength="1000">';
echo $terms;
echo '</textarea>
<button type="submit" class="btn btn-dark text-light">Update details</button>

</div>
<div class="col-md-3"></div>

</div>
</form>';
