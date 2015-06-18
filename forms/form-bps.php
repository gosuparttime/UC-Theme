<script>
$(document).ready(function() {
	$("#signupForm").validate({
		//errorLabelContainer: $("#signupForm div.field_error"),
		// validate signup form on keyup and submit
		rules: {
			"56795[71516]": "required", // First name
			"56796[71517]": "required", // Last name
			"56797": { // Email
				required: true,
				email: true
			},
			"68251": { // Email
				required: true,
				email: true,
				equalTo: "#56797"
			},
		},
		messages: {
			"56795[71516]": "Please enter your first name", // First name
			"56796[71517]": "Please enter your last name", // last name
			"56797": "Please enter a valid email address", // email
			"68251": "Please make sure email addresses match", // email
		},
		
		submitHandler: function() {
			//alert("submitted!");
			form.submit();
		}
		
	});
	var currentDate = new Date()
	var day = currentDate.getDate()
	if (day < 10) { day = '0' + day; }
	var month = currentDate.getMonth() + 1
	if (month < 10) { month = '0' + month; }
	var year = currentDate.getFullYear()
	var newDay = month + "/" + day + "/" + year
	document.getElementById("field_71531").value = newDay;
});
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<div id="request-info" role="form">
  <form action="http://bm5150.com/public/webform/process/" method="post" id="signupForm">
    <input type="hidden" name="fid" value="hpvapaxc6i7ssic2if6nvyxruws6e" />
    <input type="hidden" name="sid" value="d4a671f6b0808e341eee3571eae99448" />
    <input type="hidden" name="delid" value="" />
    <input type="hidden" name="subid" value="" />
    <input type="hidden" name="td" value="" />
    <input type="hidden" name="formtype" value="addcontact" />
    <!-- Name Info -->
    <div class="row">
      <div class="col-sm-15 mar-half-b" field_id="1818263">
        <div class="checkbox">
          <label id="caption_1818263" for="field_1818263" class="caption">
            <input type="checkbox" id="field_1818263" class="checkbox" name="68036[1818263]" value="1" />
            I would like to schedule an advising appointment </label>
        </div>
      </div>
      <div class="col-sm-15 mar-half-b" field_id="71516">
        <label for="field_71516">First Name <span class="red">*</span></label>
        <div class="field">
          <input type="text" id="field_71516" class="form-control" name="56795[71516]" value="" />
        </div>
      </div>
      <div class="col-sm-15 mar-half-b" field_id="71517">
        <label for="field_71517">Last Name <span class="red">*</span></label>
        <div class="field">
          <input type="text" id="field_71517" class="form-control" name="56796[71517]" value="" />
        </div>
      </div>
      <!-- Email Info -->
      <div class="col-sm-15 mar-half-b">
        <label for="56797">E-mail Address <span class="red">*</span></label>
        <div class="field">
          <input type="text" class="form-control" name="56797" id="56797" value=""  />
        </div>
      </div>
      <div class="col-sm-15 mar-half-b">
        <label for="68251">Verify E-mail Address <span class="red">*</span></label>
        <div class="field">
          <input type="text" class="form-control" name="68251" id="68251" value=""  />
        </div>
      </div>
      <div class="col-sm-15 mar-half-b" field_id="71525">
        <label>Phone Number </label>
        <div class="field">
          <input type="text" id="field_71525" class="form-control" name="56798[71525]" value="" />
        </div>
      </div>
      <div class="col-sm-15 mar-half-b" field_id="71582">
        <label>How Did You Hear About Us </label>
        <div class="field">
          <select id="field_71582" class="form-control" name="56814[71582]" >
            <option value="Please choose..." selected="selected">Please choose...</option>
            <option value="Internet Search" >Internet Search</option>
            <option value="Print Ad" >Print Ad</option>
            <option value="TV Ad" >TV Ad</option>
            <option value="Radio Ad" >Radio Ad</option>
            <option value="Web Ad" >Web Ad</option>
            <option value="Facebook" >Facebook</option>
            <option value="Family/Friend Referral" >Family/Friend Referral</option>
            <option value="Received Email" >Received Email</option>
            <option value="Recruiting Event" >Recruiting Event</option>
            <option value="Other" >Other</option>
          </select>
        </div>
      </div>
      <div class="col-sm-15" field_id="captcha">
        <div class="g-recaptcha" data-sitekey="6Lfw1QUTAAAAAHNR-TWuga7a5aaEWINgNBC3BZ7l" ></div>
      </div>
    </div>
    <div class="row pad-one-tb">
      <div class="col-xs-15">
        <button type="submit" name="Submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>
        <input type="hidden" id="field_71531" class="hidden field" name="56810[71531]" value="" />
        <input type="hidden" name="56811[388942]" value="true" />
        <input type="hidden" name="56812[350499]" value="true" />
        <input type="hidden" id="field_71535" class="hidden field" name="56813[71535]" value="Inquiry" />
      </div>
    </div>
  </form>
</div>
<small class="red"><em>* Denotes Required Field</em></small>