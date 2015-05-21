<script>
$(document).ready(function() {
	$("#signupForm").validate({
		//errorLabelContainer: $("#signupForm div.field_error"),
		// validate signup form on keyup and submit
		rules: {
			"59567[71516]": "required", // First name
			"59568[71517]": "required", // Last name
			"59570": { // Email
				required: true,
				email: true
			},
			"59572[71519]": "required", // Address
			"59574[71665]": "required", // City
			"59575[72411]": "required", // State
			"59576[71523]": "required", // Zip
			"59580[72017]": "required", // Program
			"59582[72307]": "required", // Ed Level
			"59584[71532]": "required", // Interest
			"59586[71582]": "required", // Ads 
		},
		messages: {
			"59567[71516]": "Please enter your first name", // First name
			"59568[71517]": "Please enter your last name", // last name
			"59570": "Please enter a valid email address", // email
			"59572[71519]": "Please enter your address", // Address
			"59574[71665]": "Please enter your city", // City
			"59575[72411]": "Please enter your state", // State
			"59576[71523]": "Please enter your zip/postal code", // Zip
			"59580[72017]": "What is your program of interest?", // Program
			"59582[72307]": "What is your current level of education?", // Ed Level
			"59584[71532]": "What is your primary area of interest?", // Ed Level
			"59586[71582]": "How did you hear about us?", // Ads
		},
		
		submitHandler: function() {
			//alert("submitted!");
			form.submit();
		}
		
	});
	$('#province').hide();
	$('#field_72432').change(function() {
	   if ($(this).val() != 'United States'){
		   $('#province').show();
		   $('#field_72411').val('N/A');
	   } else {
		   $('#province').hide();
		   $('#field_72411').val('NY');
	   };
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

<hr class="divide" />
<p><small class="red"><em>* Denotes Required Field</em></small></p>
<div id="request-info" role="form">
  <form action="http://bm5150.com/public/webform/process/" method="post" id="signupForm">
<input type="hidden" name="fid" value="eicch7w6e34a6dv9uut6lyv2mnkvg" />
<input type="hidden" name="sid" value="d4a671f6b0808e341eee3571eae99448" />
<input type="hidden" name="delid" value="" />
<input type="hidden" name="subid" value="" />
<input type="hidden" name="td" value="" />
<input type="hidden" name="formtype" value="addcontact" />
    <h3>Contact Information</h3>
    <!-- Name Info -->
    <div class="row pad-one-b">
      <div class="col-md-6 col-sm-5" field_id="71516">
        <label for="field_71516">First Name <span class="red">*</span></label>
        <div class="field">
          <input type="text" id="field_71516" class="form-control" name="59567[71516]" value="" />
        </div>
      </div>
      <div class="col-md-6 col-sm-5" field_id="71517">
        <label for="field_71517">Last Name <span class="red">*</span></label>
        <div class="field">
          <input type="text" id="field_71517" class="form-control" name="59568[71517]" value="" />
        </div>
      </div>
      <div class="col-md-3 col-sm-5" field_id="71624">
        <label for="field_71624">Middle Name</label>
        <div class="field">
          <input type="text" id="field_71624" class="form-control" name="59569[71624]" value="" />
        </div>
      </div>
    </div>
    <!-- Email Info -->
    <div class="row pad-one-b">
      <div class="col-sm-7">
        <label for="59570">E-mail Address <span class="red">*</span></label>
        <div class="field">
          <input type="text" class="form-control" name="59570" value=""  />
        </div>
      </div>
      <div class="col-sm-7 col-sm-offset-1" field_id="71525">
        <label>Phone Number </label>
        <div class="field">
          <input type="text" id="field_71525" class="form-control" name="59579[71525]" value="" />
        </div>
      </div>
    </div>
    <!-- Address Info -->
    <div class="row pad-one-b">
      <div class="col-sm-7">
        <label for="field_71519">Address 1 <span class="red">*</span></label>
        <div class="field">
          <input type="text" id="field_71519" class="form-control" name="59572[71519]" value=""  />
        </div>
      </div>
      <div class="col-sm-7 col-sm-offset-1" field_id="71527">
        <label for="field_71520">Address 2 <small>(Apt/Suite/P.O. Box)</small></label>
        <div class="field">
          <input type="text" id="field_71520" class="form-control" name="59573[71520]" value=""  />
        </div>
      </div>
    </div>
    <div class="row pad-one-b">
      <div class="col-md-6 col-sm-5" field_id="71516">
        <label for="field_71665">City <span class="red">*</span></label>
        <div class="field">
          <input type="text" id="field_71665" class="form-control" name="59574[71665]" value="" />
        </div>
      </div>
      <div class="col-md-6 col-sm-5" field_id="71517">
        <label for="field_72411">State <span class="red">*</span></label>
        <div class="field">
          <select id="field_72411" class="form-control select" name="59575[72411]" >
            <option value="AL" >Alabama</option>
            <option value="AK" >Alaska</option>
            <option value="AZ" >Arizona</option>
            <option value="AR" >Arkansas</option>
            <option value="CA" >California</option>
            <option value="CO" >Colorado</option>
            <option value="CT" >Connecticut</option>
            <option value="DE" >Delaware</option>
            <option value="DC" >District of Columbia</option>
            <option value="FL" >Florida</option>
            <option value="GA" >Georgia</option>
            <option value="HI" >Hawaii</option>
            <option value="ID" >Idaho</option>
            <option value="IL" >Illinois</option>
            <option value="IN" >Indiana</option>
            <option value="IA" >Iowa</option>
            <option value="KS" >Kansas</option>
            <option value="KY" >Kentucky</option>
            <option value="LA" >Louisiana</option>
            <option value="ME" >Maine</option>
            <option value="MD" >Maryland</option>
            <option value="MA" >Massachusetts</option>
            <option value="MI" >Michigan</option>
            <option value="MN" >Minnesota</option>
            <option value="MS" >Mississippi</option>
            <option value="MO" >Missouri</option>
            <option value="MT" >Montana</option>
            <option value="NE" >Nebraska</option>
            <option value="NV" >Nevada</option>
            <option value="NH" >New Hampshire</option>
            <option value="NJ" >New Jersey</option>
            <option value="NM" >New Mexico</option>
            <option value="NY" selected="selected" >New York</option>
            <option value="NC" >North Carolina</option>
            <option value="ND" >North Dakota</option>
            <option value="OH" >Ohio</option>
            <option value="OK" >Oklahoma</option>
            <option value="OR" >Oregon</option>
            <option value="PA" >Pennsylvania</option>
            <option value="RI" >Rhode Island</option>
            <option value="SC" >South Carolina</option>
            <option value="SD" >South Dakota</option>
            <option value="TN" >Tennessee</option>
            <option value="TX" >Texas</option>
            <option value="UT" >Utah</option>
            <option value="VT" >Vermont</option>
            <option value="VA" >Virginia</option>
            <option value="WA" >Washington</option>
            <option value="WV" >West Virginia</option>
            <option value="WI" >Wisconsin</option>
            <option value="WY" >Wyoming</option>
            <option value="" >-------------------------</option>
            <option value="AA" >Armed Forces the Americas</option>
            <option value="AE" >Armed Forces Europe</option>
            <option value="AP" >Armed Forces Pacific</option>
            <option value="AS" >American Samoa</option>
            <option value="GU" >Guam</option>
            <option value="MP" >Northern Mariana Islands</option>
            <option value="PR" >Puerto Rico</option>
            <option value="UM" >U.S. Minor Outlying Islands</option>
            <option value="VI" >U.S. Virgin Islands</option>
            <option value="" >-------------------------</option>
            <option value="N/A" >Does not reside in the U.S.</option>
          </select>
        </div>
      </div>
      <div class="col-md-3 col-sm-5" field_id="71624">
        <label for="field_71523">Zip Code <span class="red">*</span></label>
        <div class="field">
          <input type="text" id="field_71523" class="form-control" name="59576[71523]" value="" />
        </div>
      </div>
    </div>
    <div class="row pad-one-b">
      <div class="col-sm-7" field_id="71527">
        <label for="field_72432">Country</label>
        <div class="field">
          <select id="field_72432" class="form-control select" name="59577[72432]" >
            <option value="Afganistan" >Afganistan</option>
            <option value="Aland Islands" >Aland Islands</option>
            <option value="Albania" >Albania</option>
            <option value="Algeria" >Algeria</option>
            <option value="American Samoa" >American Samoa</option>
            <option value="Andorra" >Andorra</option>
            <option value="Angola" >Angola</option>
            <option value="Anguilla" >Anguilla</option>
            <option value="Antartica" >Antartica</option>
            <option value="Antigua and Barbuda" >Antigua and Barbuda</option>
            <option value="Argentina" >Argentina</option>
            <option value="Armenia" >Armenia</option>
            <option value="Aruba" >Aruba</option>
            <option value="Australia" >Australia</option>
            <option value="Austria" >Austria</option>
            <option value="Azerbaijan" >Azerbaijan</option>
            <option value="Bahamas" >Bahamas</option>
            <option value="Bahrain" >Bahrain</option>
            <option value="Bangladesh" >Bangladesh</option>
            <option value="Barbados" >Barbados</option>
            <option value="Belarus" >Belarus</option>
            <option value="Belgium" >Belgium</option>
            <option value="Belize" >Belize</option>
            <option value="Benin" >Benin</option>
            <option value="Bermuda" >Bermuda</option>
            <option value="Bhutan" >Bhutan</option>
            <option value="Bolivia" >Bolivia</option>
            <option value="Bonaire, Sint Eustatius, Saba" >Bonaire, Sint Eustatius, Saba</option>
            <option value="Bosnia and Herzegowina" >Bosnia and Herzegowina</option>
            <option value="Botswana" >Botswana</option>
            <option value="Bouvet Island" >Bouvet Island</option>
            <option value="Brazil" >Brazil</option>
            <option value="British Indian Ocean Territory" >British Indian Ocean Territory</option>
            <option value="Brunei Darussalam" >Brunei Darussalam</option>
            <option value="Bulgaria" >Bulgaria</option>
            <option value="Burkina Faso" >Burkina Faso</option>
            <option value="Burundi" >Burundi</option>
            <option value="Cambodia" >Cambodia</option>
            <option value="Cameroon" >Cameroon</option>
            <option value="Canada" >Canada</option>
            <option value="Cape Verde" >Cape Verde</option>
            <option value="Cayman Islands" >Cayman Islands</option>
            <option value="Central African Republic" >Central African Republic</option>
            <option value="Chad" >Chad</option>
            <option value="Chile" >Chile</option>
            <option value="China" >China</option>
            <option value="Christmas Island" >Christmas Island</option>
            <option value="Cocos (Keeling) Islands" >Cocos (Keeling) Islands</option>
            <option value="Colombia" >Colombia</option>
            <option value="Comoros" >Comoros</option>
            <option value="Congo (Brazzaville)" >Congo (Brazzaville)</option>
            <option value="Congo, Democratic Republic of the" >Congo, Democratic Republic of the</option>
            <option value="Cook Islands" >Cook Islands</option>
            <option value="Costa Rica" >Costa Rica</option>
            <option value="Cote d'Ivoire" >Cote d'Ivoire</option>
            <option value="Croatia Hrvatska" >Croatia Hrvatska</option>
            <option value="Cuba" >Cuba</option>
            <option value="Curacao" >Curacao</option>
            <option value="Cyprus" >Cyprus</option>
            <option value="Czech Republic" >Czech Republic</option>
            <option value="Denmark" >Denmark</option>
            <option value="Djibouti" >Djibouti</option>
            <option value="Dominica" >Dominica</option>
            <option value="Dominican Republic" >Dominican Republic</option>
            <option value="East Timor" >East Timor</option>
            <option value="Ecuador" >Ecuador</option>
            <option value="Egypt" >Egypt</option>
            <option value="El Salvador" >El Salvador</option>
            <option value="Equatorial Guinea" >Equatorial Guinea</option>
            <option value="Eritrea" >Eritrea</option>
            <option value="Estonia" >Estonia</option>
            <option value="Ethiopia" >Ethiopia</option>
            <option value="Falkland Islands (Malvinas)" >Falkland Islands (Malvinas)</option>
            <option value="Faroe Islands" >Faroe Islands</option>
            <option value="Fiji" >Fiji</option>
            <option value="Finland" >Finland</option>
            <option value="France" >France</option>
            <option value="French Guiana" >French Guiana</option>
            <option value="French Polynesia" >French Polynesia</option>
            <option value="French Southern Territories" >French Southern Territories</option>
            <option value="Gabon" >Gabon</option>
            <option value="Gambia" >Gambia</option>
            <option value="Georgia" >Georgia</option>
            <option value="Germany" >Germany</option>
            <option value="Ghana" >Ghana</option>
            <option value="Gibraltar" >Gibraltar</option>
            <option value="Greece" >Greece</option>
            <option value="Greenland" >Greenland</option>
            <option value="Grenada" >Grenada</option>
            <option value="Guadeloupe" >Guadeloupe</option>
            <option value="Guam" >Guam</option>
            <option value="Guatemala" >Guatemala</option>
            <option value="Guernsey" >Guernsey</option>
            <option value="Guinea" >Guinea</option>
            <option value="Guinea-Bissau" >Guinea-Bissau</option>
            <option value="Guyana" >Guyana</option>
            <option value="Haiti" >Haiti</option>
            <option value="Heard and McDonald Islands" >Heard and McDonald Islands</option>
            <option value="Holy See (Vatican City State)" >Holy See (Vatican City State)</option>
            <option value="Honduras" >Honduras</option>
            <option value="Hong Kong" >Hong Kong</option>
            <option value="Hungary" >Hungary</option>
            <option value="Iceland" >Iceland</option>
            <option value="India" >India</option>
            <option value="Indonesia" >Indonesia</option>
            <option value="Iran, Islamic Republic of" >Iran, Islamic Republic of</option>
            <option value="Iraq" >Iraq</option>
            <option value="Ireland" >Ireland</option>
            <option value="Isle of Man" >Isle of Man</option>
            <option value="Israel" >Israel</option>
            <option value="Italy" >Italy</option>
            <option value="Jamaica" >Jamaica</option>
            <option value="Japan" >Japan</option>
            <option value="Jersey" >Jersey</option>
            <option value="Jordan" >Jordan</option>
            <option value="Kazakhstan" >Kazakhstan</option>
            <option value="Kenya" >Kenya</option>
            <option value="Kiribati" >Kiribati</option>
            <option value="Korea, Democratic People's Republic of" >Korea, Democratic People's Republic of</option>
            <option value="Korea, Republic of" >Korea, Republic of</option>
            <option value="Kosovo" >Kosovo</option>
            <option value="Kuwait" >Kuwait</option>
            <option value="Kyrgyzstan" >Kyrgyzstan</option>
            <option value="Lao People's Democratic Republic" >Lao People's Democratic Republic</option>
            <option value="Latvia" >Latvia</option>
            <option value="Lebanon" >Lebanon</option>
            <option value="Lesotho" >Lesotho</option>
            <option value="Liberia" >Liberia</option>
            <option value="Libya" >Libya</option>
            <option value="Liechtenstein" >Liechtenstein</option>
            <option value="Lithuania" >Lithuania</option>
            <option value="Luxembourg" >Luxembourg</option>
            <option value="Macau" >Macau</option>
            <option value="Macedonia, The Former Yugoslav Republic of" >Macedonia, The Former Yugoslav Republic of</option>
            <option value="Madagascar" >Madagascar</option>
            <option value="Malawi" >Malawi</option>
            <option value="Malaysia" >Malaysia</option>
            <option value="Maldives" >Maldives</option>
            <option value="Mali" >Mali</option>
            <option value="Malta" >Malta</option>
            <option value="Marshall Islands" >Marshall Islands</option>
            <option value="Martinique" >Martinique</option>
            <option value="Mauritania" >Mauritania</option>
            <option value="Mauritius" >Mauritius</option>
            <option value="Mayotte" >Mayotte</option>
            <option value="Mexico" >Mexico</option>
            <option value="Micronesia, Federated States of" >Micronesia, Federated States of</option>
            <option value="Moldova, Republic of" >Moldova, Republic of</option>
            <option value="Monaco" >Monaco</option>
            <option value="Mongolia" >Mongolia</option>
            <option value="Montenegro" >Montenegro</option>
            <option value="Montserrat" >Montserrat</option>
            <option value="Morocco" >Morocco</option>
            <option value="Mozambique" >Mozambique</option>
            <option value="Myanmar" >Myanmar</option>
            <option value="Namibia" >Namibia</option>
            <option value="Nauru" >Nauru</option>
            <option value="Nepal" >Nepal</option>
            <option value="Netherlands" >Netherlands</option>
            <option value="Netherlands Antilles" >Netherlands Antilles</option>
            <option value="New Caledonia" >New Caledonia</option>
            <option value="New Zealand" >New Zealand</option>
            <option value="Nicaragua" >Nicaragua</option>
            <option value="Niger" >Niger</option>
            <option value="Nigeria" >Nigeria</option>
            <option value="Niue" >Niue</option>
            <option value="Norfolk Island" >Norfolk Island</option>
            <option value="Northern Mariana Islands" >Northern Mariana Islands</option>
            <option value="Norway" >Norway</option>
            <option value="Oman" >Oman</option>
            <option value="Pakistan" >Pakistan</option>
            <option value="Palau" >Palau</option>
            <option value="Palestine, State of" >Palestine, State of</option>
            <option value="Panama" >Panama</option>
            <option value="Papua New Guinea" >Papua New Guinea</option>
            <option value="Paraguay" >Paraguay</option>
            <option value="Peru" >Peru</option>
            <option value="Philippines" >Philippines</option>
            <option value="Pitcairn" >Pitcairn</option>
            <option value="Poland" >Poland</option>
            <option value="Portugal" >Portugal</option>
            <option value="Puerto Rico" >Puerto Rico</option>
            <option value="Qatar" >Qatar</option>
            <option value="Reunion" >Reunion</option>
            <option value="Romania" >Romania</option>
            <option value="Russian Federation" >Russian Federation</option>
            <option value="Rwanda" >Rwanda</option>
            <option value="Saint Barthelemy" >Saint Barthelemy</option>
            <option value="Saint Kitts and Nevis" >Saint Kitts and Nevis</option>
            <option value="Saint Lucia" >Saint Lucia</option>
            <option value="Saint Martin (French)" >Saint Martin (French)</option>
            <option value="Saint Vincent and the Grenadines" >Saint Vincent and the Grenadines</option>
            <option value="Samoa" >Samoa</option>
            <option value="San Marino" >San Marino</option>
            <option value="Sao Tome and Principe" >Sao Tome and Principe</option>
            <option value="Saudi Arabia" >Saudi Arabia</option>
            <option value="Senegal" >Senegal</option>
            <option value="Serbia" >Serbia</option>
            <option value="Seychelles" >Seychelles</option>
            <option value="Sierra Leone" >Sierra Leone</option>
            <option value="Singapore" >Singapore</option>
            <option value="Sint Maarten (Dutch)" >Sint Maarten (Dutch)</option>
            <option value="Slovakia" >Slovakia</option>
            <option value="Slovenia" >Slovenia</option>
            <option value="Solomon Islands" >Solomon Islands</option>
            <option value="Somalia" >Somalia</option>
            <option value="South Africa" >South Africa</option>
            <option value="South Georgia and the South Sandwich Islands" >South Georgia and the South Sandwich Islands</option>
            <option value="South Sudan" >South Sudan</option>
            <option value="Spain" >Spain</option>
            <option value="Sri Lanka" >Sri Lanka</option>
            <option value="St. Helena, Ascension, Tristan" >St. Helena, Ascension, Tristan</option>
            <option value="St. Pierre and Miquelon" >St. Pierre and Miquelon</option>
            <option value="Sudan" >Sudan</option>
            <option value="Suriname" >Suriname</option>
            <option value="Svalbard and Jan Mayen Islands" >Svalbard and Jan Mayen Islands</option>
            <option value="Swaziland" >Swaziland</option>
            <option value="Sweden" >Sweden</option>
            <option value="Switzerland" >Switzerland</option>
            <option value="Syrian Arab Republic" >Syrian Arab Republic</option>
            <option value="Taiwan" >Taiwan</option>
            <option value="Tajikistan" >Tajikistan</option>
            <option value="Tanzania, United Republic of" >Tanzania, United Republic of</option>
            <option value="Thailand" >Thailand</option>
            <option value="Timor-Leste" >Timor-Leste</option>
            <option value="Togo" >Togo</option>
            <option value="Tokelau" >Tokelau</option>
            <option value="Tonga" >Tonga</option>
            <option value="Trinidad and Tobago" >Trinidad and Tobago</option>
            <option value="Tunisia" >Tunisia</option>
            <option value="Turkey" >Turkey</option>
            <option value="Turkmenistan" >Turkmenistan</option>
            <option value="Turks and Caicos Islands" >Turks and Caicos Islands</option>
            <option value="Tuvalu" >Tuvalu</option>
            <option value="Uganda" >Uganda</option>
            <option value="Ukraine" >Ukraine</option>
            <option value="United Arab Emirates" >United Arab Emirates</option>
            <option value="United Kingdom" >United Kingdom</option>
            <option value="United States" selected="selected">United States</option>
            <option value="United States Minor Outlying Islands" >United States Minor Outlying Islands</option>
            <option value="Uruguay" >Uruguay</option>
            <option value="Uzbekistan" >Uzbekistan</option>
            <option value="Vanuatu" >Vanuatu</option>
            <option value="Venezuela" >Venezuela</option>
            <option value="Viet Nam" >Viet Nam</option>
            <option value="Virgin Islands (British)" >Virgin Islands (British)</option>
            <option value="Virgin Islands (U.S.)" >Virgin Islands (U.S.)</option>
            <option value="Wallis and Futuna Islands" >Wallis and Futuna Islands</option>
            <option value="Western Sahara" >Western Sahara</option>
            <option value="Yemen" >Yemen</option>
            <option value="Zambia" >Zambia</option>
            <option value="Zimbabwe" >Zimbabwe</option>
            <option value="Unspecified" >Unspecified</option>
          </select>
        </div>
      </div>
      <div class="col-sm-7 col-sm-offset-1" field_id="72645" id="province">
        <label for="field_72645">Province/Territory/State</label>
        <div class="field">
          <input type="text" id="field_72645" class="form-control" name="59578[72645]" value="" />
        </div>
      </div>
    </div>
    <h3>Education Information</h3>
    <!-- Ed Info -->
    <div class="row pad-one-b">
      <div class="col-sm-7" field_id="72017">
        <label for="field_72017">What type of program are you interested in? <span class="red">*</span></label>
        <div class="field">
          <select id="field_72017" class="form-control select" name="59580[72017]" >
            <option value="" selected="selected">Please Choose:</option>
            <option value="Undergraduate" >Undergraduate</option>
            <option value="Graduate" >Graduate</option>
            <option value="Certificate" >Certificate</option>
            <option value="Undecided/Unsure" >Undecided/Unsure</option>
          </select>
        </div>
      </div>
      <div class="col-sm-7 col-sm-offset-1" field_id="71517">
        <label for="field_71668">Current/Past School Attended</label>
        <div class="field">
          <select id="field_71668" class="form-control select" name="59581[71668]" >
            <option value="" selected="selected">Please choose...</option>
            <option value="Broome County Community College" >Broome County Community College</option>
            <option value="Bryant & Stratton College" >Bryant & Stratton College</option>
            <option value="Cayuga Community College, Auburn Campus" >Cayuga Community College, Auburn Campus</option>
            <option value="Cayuga Community College, Fulton Campus" >Cayuga Community College, Fulton Campus</option>
            <option value="Cazenovia College" >Cazenovia College</option>
            <option value="Columbia College" >Columbia College</option>
            <option value="Corning Community College" >Corning Community College</option>
            <option value="Cortland Community College" >Cortland Community College</option>
            <option value="Empire College" >Empire College</option>
            <option value="Fingerlakes Community College" >Fingerlakes Community College</option>
            <option value="Genesee Community College" >Genesee Community College</option>
            <option value="Herkimer Community College" >Herkimer Community College</option>
            <option value="Jefferson Community College" >Jefferson Community College</option>
            <option value="LeMoyne College " >LeMoyne College </option>
            <option value="Mohawk Valley Community College" >Mohawk Valley Community College</option>
            <option value="Monroe Community College" >Monroe Community College</option>
            <option value="Morrisville Community College" >Morrisville Community College</option>
            <option value="Onondaga Community College" >Onondaga Community College</option>
            <option value="Schenectady Community College" >Schenectady Community College</option>
            <option value="SUNY Oswego" >SUNY Oswego</option>
            <option value="Syracuse University" >Syracuse University</option>
            <option value="Tompkins Cortland Community College" >Tompkins Cortland Community College</option>
            <option value="Utica College" >Utica College</option>
            <option value="Other" >Other</option>
            <option value="Not Applicable" >Not Applicable</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row pad-one-b">
      <div class="col-sm-7" field_id="72307">
        <label for="field_72307">Current Level of Education <span class="red">*</span></label>
        <div class="radio">
          <label for="fieldoption_53396">
            <input type="radio" id="fieldoption_53396" class="field" name="59582[72307]" value="No College" />
            No College</label>
        </div>
        <div class="radio">
          <label for="fieldoption_53397">
            <input type="radio" id="fieldoption_53397" class="field" name="59582[72307]" value="Some College, But No Degree" />
            Some College, But No Degree</label>
        </div>
        <div class="radio">
          <label for="fieldoption_53398">
            <input type="radio" id="fieldoption_53398" class="field" name="59582[72307]" value="Completed Bachelor's Degree" />
            Completed Bachelor's Degree</label>
        </div>
        <div class="radio">
          <label for="fieldoption_53399">
            <input type="radio" id="fieldoption_53399" class="field" name="59582[72307]" value="Completed Graduate Degree" />
            Completed Graduate Degree</label>
        </div>
        <div class="radio">
          <label for="fieldoption_55256">
            <input type="radio" id="fieldoption_55256" class="field" name="59582[72307]" value="Completed Associate Degree" />
            Completed Associate Degree</label>
        </div>
        <div class="radio">
          <label for="fieldoption_58001">
            <input type="radio" id="fieldoption_58001" class="field" name="59582[72307]" value="Unknown" />
            Unknown</label>
        </div>
        <label class="error" for="59582[72307]"></label>
      </div>
      <div class="col-sm-7 col-sm-offset-1" field_id="72131">
        <label for="field_72131">Military Status</label>
        <div class="radio">
          <label for="fieldoption_53005">
            <input type="radio" id="fieldoption_53005" class="field" name="59583[72131]" value="None" />
            None</label>
        </div>
        <div class="radio">
          <label for="fieldoption_53006">
            <input type="radio" id="fieldoption_61666" class="field" name="59583[72131]" value="Active / Currently serving" />
            Active / Currently serving</label>
        </div>
        <div class="radio">
          <label for="fieldoption_53008">
            <input type="radio" id="fieldoption_61667" class="field" name="59583[72131]" value="Veteran / Previously served" />
            Veteran / Previously served</label>
        </div>
        <div class="radio">
          <label for="fieldoption_53007">
            <input type="radio" id="fieldoption_61668" class="field" name="59583[72131]" value="Current dependent" />
            Current dependent</label>
        </div>
        <label for="59583[72131]"></label>
      </div>
    </div>
    <!-- Program Info -->
    <div class="row pad-one-b">
      <div class="col-sm-7" field_id="71532">
        <label for="field_71532">Primary Area of Interest <span class="red">*</span></label>
        <div class="field">
          <select id="field_71532" class="form-control select" name="59584[71532]" >
            <option value="" selected="selected">Please choose...</option>
            <option value="Undecided/Unsure" >Undecided/Unsure</option>
            <option value="Architecture" >Architecture</option>
            <option value="Art & Design" >Art & Design</option>
            <option value="Arts & Sciences/Liberal Studies" >Arts & Sciences/Liberal Studies</option>
            <option value="Child & Family/Marriage Therapy" >Child & Family/Marriage Therapy</option>
            <option value="Communication" >Communication</option>
            <option value="Communication & Rhetorical Studies" >Communication & Rhetorical Studies</option>
            <option value="Creative Leadership" >Creative Leadership</option>
            <option value="Drama" >Drama</option>
            <option value="Education" >Education</option>
            <option value="Engineering & Computer Science" >Engineering & Computer Science</option>
            <option value="Hospitality/Nutrition/Public Health" >Hospitality/Nutrition/Public Health</option>
            <option value="Information Studies" >Information Studies</option>
            <option value="International Relations" >International Relations</option>
            <option value="Knowledge Management" >Knowledge Management</option>
            <option value="Management/Business Administration" >Management/Business Administration</option>
            <option value="Music" >Music</option>
            <option value="Psychology" >Psychology</option>
            <option value="Social Work" >Social Work</option>
            <option value="Sports Management" >Sports Management</option>
            <option value="Other/Not Listed" >Other/Not Listed</option>
          </select>
        </div>
      </div>
      <div class="col-sm-7 col-sm-offset-1" field_id="71663">
        <label for="field_71663">Secondary Area of Interest</label>
        <div class="field">
          <select id="field_71663" class="form-control select" name="59585[71663]" >
            <option value="" selected="selected">Please choose...</option>
            <option value="Architecture" >Architecture</option>
            <option value="Art & Design" >Art & Design</option>
            <option value="Arts & Sciences/Liberal Studies" >Arts & Sciences/Liberal Studies</option>
            <option value="Child & Family/Marriage Therapy" >Child & Family/Marriage Therapy</option>
            <option value="Communication" >Communication</option>
            <option value="Communication & Rhetorical Studies" >Communication & Rhetorical Studies</option>
            <option value="Creative Leadership" >Creative Leadership</option>
            <option value="Drama" >Drama</option>
            <option value="Education" >Education</option>
            <option value="Engineering & Computer Science" >Engineering & Computer Science</option>
            <option value="Hospitality/Nutrition/Public Health" >Hospitality/Nutrition/Public Health</option>
            <option value="Information Studies" >Information Studies</option>
            <option value="International Relations" >International Relations</option>
            <option value="Knowledge Management" >Knowledge Management</option>
            <option value="Management/Business Administration" >Management/Business Administration</option>
            <option value="Music" >Music</option>
            <option value="Psychology" >Psychology</option>
            <option value="Social Work" >Social Work</option>
            <option value="Sports Management" >Sports Management</option>
            <option value="Other/Not listed" >Other/Not listed</option>
          </select>
        </div>
      </div>
    </div>
    <h3>General Questions</h3>
    <!-- General Info -->
    <div class="row pad-one-b">
      <div class="col-sm-7" field_id="71582">
        <label for="field_71582">How Did You Hear About Us? <span class="red">*</span></label>
        <div class="field">
          <select id="field_71582" class="form-control select" name="59586[71582]" >
            <option value="" selected="selected">Please choose...</option>
            <option value="Billboard" >Billboard</option>
            <option value="CH3" >CNYCentral</option>
            <option value="Daily Orange" >Daily Orange</option>
            <option value="Eagle Newspaper" >Eagle Newspaper</option>
            <option value="eLearners Website" >eLearners Website</option>
            <option value="Family/Friend Referral" >Family/Friend Referral</option>
            <option value="General Awareness of SU" >General Awareness of SU</option>
            <option value="Internet Search" >Internet Search</option>
            <option value="CH9" >LocalSYR9.com</option>
            <option value="MilitaryFriendlySchools.com" >MilitaryFriendlySchools.com</option>
            <option value="Pandora" >Pandora</option>
            <option value="Post Standard" >Post Standard</option>
            <option value="Radio Ad" >Radio Ad</option>
            <option value="Received Email" >Received Email</option>
            <option value="Recruiting Event" >Recruiting Event</option>
            <option value="SU website" >SU website</option>
            <option value="Syracuse.com" >Syracuse.com</option>
            <option value="Syracuse New Times" >Syracuse New Times</option>
            <option value="Syracuse Woman Magazine" >Syracuse Woman Magazine</option>
            <option value="Time Warner Cable" >Time Warner Cable</option>
            <option value="TV Ad" >TV Ad</option>
            <option value="Web Ad" >Web Ad</option>
            <option value="Unknown" >Unknown</option>
            <option value="Other" >Other</option>
          </select>
        </div>
      </div>
      <div class="col-sm-7 col-sm-offset-1" field_id="71843">
        <label for="field_71843">Why are you thinking about returning to school? </label>
        <div class="field">
          <select id="field_71843" class="form-control select" name="59587[71843]" >
            <option value="Please choose" selected="selected">Please choose your main reason:</option>
            <option value="I am out of work" >I am out of work</option>
            <option value="Self Improvement" >Self Improvement</option>
            <option value="Career advancement" >Career advancement</option>
            <option value="I want to finish a degree I started" >I want to finish a degree I started</option>
            <option value="Employer pays tuition benefits" >Employer pays tuition benefits</option>
            <option value="Other" >Other</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row pad-one-tb">
      <div class="col-xs-12">
        <button type="submit" name="Submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Submit My Request</button>
        <input type="hidden" id="field_71531" class="hidden field" name="45688[71531]" value="" />
        <input type="hidden" id="field_71551" class="hidden field" name="39542[71551]" value="Credit" />
        <input type="hidden" id="field_71535" class="hidden field" name="39125[71535]" value="Inquiry" />
        <input type="hidden" name="36961[350499]" value="true" />
      </div>
    </div>
  </form>
</div>
