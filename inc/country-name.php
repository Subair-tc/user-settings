<?php
/*fucntion for diaplaying country fro  Country Code*/

function us_country_list() {
	$country_array = array(	
		"US" => "United States",
		"GB" => "United Kingdom",
		"AU" => "Australia",
		"AF" => "Afghanistan",
		"AL" => "Albania",
		"DZ" => "Algeria",
		"AS" => "American Samoa",
		"AD" => "Andorra",
		"AO" => "Angola",
		"AI" => "Anguilla",
		"AQ" => "Antarctica",
		"AG" => "Antigua and Barbuda",
		"AR" => "Argentina",
		"AM" => "Armenia",
		"AW" => "Aruba",
		
		"AT" => "Austria",
		"AZ" => "Azerbaijan",
		"BS" => "Bahamas",
		"BH" => "Bahrain",
		"BD" => "Bangladesh",
		"BB" => "Barbados",
		"BY" => "Belarus",
		"BE" => "Belgium",
		"BZ" => "Belize",
		"BJ" => "Benin",
		"BM" => "Bermuda",
		"BT" => "Bhutan",
		"BO" => "Bolivia",
		"BA" => "Bosnia and Herzegovina",
		"BW" => "Botswana",
		"BV" => "Bouvet Island",
		"BR" => "Brazil",
		"BQ" => "British Antarctic Territory",
		"IO" => "British Indian Ocean Territory",
		"VG" => "British Virgin Islands",
		"BN" => "Brunei",
		"BG" => "Bulgaria",
		"BF" => "Burkina Faso",
		"BI" => "Burundi",
		"KH" => "Cambodia",
		"CM" => "Cameroon",
		"CA" => "Canada",
		"CT" => "Canton and Enderbury Islands",
		"CV" => "Cape Verde",
		"KY" => "Cayman Islands",
		"CF" => "Central African Republic",
		"TD" => "Chad",
		"CL" => "Chile",
		"CN" => "China",
		"CX" => "Christmas Island",
		"CC" => "Cocos [Keeling] Islands",
		"CO" => "Colombia",
		"KM" => "Comoros",
		"CG" => "Congo - Brazzaville",
		"CD" => "Congo - Kinshasa",
		"CK" => "Cook Islands",
		"CR" => "Costa Rica",
		"HR" => "Croatia",
		"CU" => "Cuba",
		"CY" => "Cyprus",
		"CZ" => "Czech Republic",
		"CI" => "Côte d’Ivoire",
		"DK" => "Denmark",
		"DJ" => "Djibouti",
		"DM" => "Dominica",
		"DO" => "Dominican Republic",
		"NQ" => "Dronning Maud Land",
		"DD" => "East Germany",
		"EC" => "Ecuador",
		"EG" => "Egypt",
		"SV" => "El Salvador",
		"GQ" => "Equatorial Guinea",
		"ER" => "Eritrea",
		"EE" => "Estonia",
		"ET" => "Ethiopia",
		"FK" => "Falkland Islands",
		"FO" => "Faroe Islands",
		"FJ" => "Fiji",
		"FI" => "Finland",
		"FR" => "France",
		"GF" => "French Guiana",
		"PF" => "French Polynesia",
		"TF" => "French Southern Territories",
		"FQ" => "French Southern and Antarctic Territories",
		"GA" => "Gabon",
		"GM" => "Gambia",
		"GE" => "Georgia",
		"DE" => "Germany",
		"GH" => "Ghana",
		"GI" => "Gibraltar",
		"GR" => "Greece",
		"GL" => "Greenland",
		"GD" => "Grenada",
		"GP" => "Guadeloupe",
		"GU" => "Guam",
		"GT" => "Guatemala",
		"GG" => "Guernsey",
		"GN" => "Guinea",
		"GW" => "Guinea-Bissau",
		"GY" => "Guyana",
		"HT" => "Haiti",
		"HM" => "Heard Island and McDonald Islands",
		"HN" => "Honduras",
		"HK" => "Hong Kong SAR China",
		"HU" => "Hungary",
		"IS" => "Iceland",
		"IN" => "India",
		"ID" => "Indonesia",
		"IR" => "Iran",
		"IQ" => "Iraq",
		"IE" => "Ireland",
		"IM" => "Isle of Man",
		"IL" => "Israel",
		"IT" => "Italy",
		"JM" => "Jamaica",
		"JP" => "Japan",
		"JE" => "Jersey",
		"JT" => "Johnston Island",
		"JO" => "Jordan",
		"KZ" => "Kazakhstan",
		"KE" => "Kenya",
		"KI" => "Kiribati",
		"KW" => "Kuwait",
		"KG" => "Kyrgyzstan",
		"LA" => "Laos",
		"LV" => "Latvia",
		"LB" => "Lebanon",
		"LS" => "Lesotho",
		"LR" => "Liberia",
		"LY" => "Libya",
		"LI" => "Liechtenstein",
		"LT" => "Lithuania",
		"LU" => "Luxembourg",
		"MO" => "Macau SAR China",
		"MK" => "Macedonia",
		"MG" => "Madagascar",
		"MW" => "Malawi",
		"MY" => "Malaysia",
		"MV" => "Maldives",
		"ML" => "Mali",
		"MT" => "Malta",
		"MH" => "Marshall Islands",
		"MQ" => "Martinique",
		"MR" => "Mauritania",
		"MU" => "Mauritius",
		"YT" => "Mayotte",
		"FX" => "Metropolitan France",
		"MX" => "Mexico",
		"FM" => "Micronesia",
		"MI" => "Midway Islands",
		"MD" => "Moldova",
		"MC" => "Monaco",
		"MN" => "Mongolia",
		"ME" => "Montenegro",
		"MS" => "Montserrat",
		"MA" => "Morocco",
		"MZ" => "Mozambique",
		"MM" => "Myanmar [Burma]",
		"NA" => "Namibia",
		"NR" => "Nauru",
		"NP" => "Nepal",
		"NL" => "Netherlands",
		"AN" => "Netherlands Antilles",
		"NT" => "Neutral Zone",
		"NC" => "New Caledonia",
		"NZ" => "New Zealand",
		"NI" => "Nicaragua",
		"NE" => "Niger",
		"NG" => "Nigeria",
		"NU" => "Niue",
		"NF" => "Norfolk Island",
		"KP" => "North Korea",
		"VD" => "North Vietnam",
		"MP" => "Northern Mariana Islands",
		"NO" => "Norway",
		"OM" => "Oman",
		"PC" => "Pacific Islands Trust Territory",
		"PK" => "Pakistan",
		"PW" => "Palau",
		"PS" => "Palestinian Territories",
		"PA" => "Panama",
		"PZ" => "Panama Canal Zone",
		"PG" => "Papua New Guinea",
		"PY" => "Paraguay",
		"YD" => "People's Democratic Republic of Yemen",
		"PE" => "Peru",
		"PH" => "Philippines",
		"PN" => "Pitcairn Islands",
		"PL" => "Poland",
		"PT" => "Portugal",
		"PR" => "Puerto Rico",
		"QA" => "Qatar",
		"RO" => "Romania",
		"RU" => "Russia",
		"RW" => "Rwanda",
		"RE" => "Réunion",
		"BL" => "Saint Barthélemy",
		"SH" => "Saint Helena",
		"KN" => "Saint Kitts and Nevis",
		"LC" => "Saint Lucia",
		"MF" => "Saint Martin",
		"PM" => "Saint Pierre and Miquelon",
		"VC" => "Saint Vincent and the Grenadines",
		"WS" => "Samoa",
		"SM" => "San Marino",
		"SA" => "Saudi Arabia",
		"SN" => "Senegal",
		"RS" => "Serbia",
		"CS" => "Serbia and Montenegro",
		"SC" => "Seychelles",
		"SL" => "Sierra Leone",
		"SG" => "Singapore",
		"SK" => "Slovakia",
		"SI" => "Slovenia",
		"SB" => "Solomon Islands",
		"SO" => "Somalia",
		"ZA" => "South Africa",
		"GS" => "South Georgia and the South Sandwich Islands",
		"KR" => "South Korea",
		"ES" => "Spain",
		"LK" => "Sri Lanka",
		"SD" => "Sudan",
		"SR" => "Suriname",
		"SJ" => "Svalbard and Jan Mayen",
		"SZ" => "Swaziland",
		"SE" => "Sweden",
		"CH" => "Switzerland",
		"SY" => "Syria",
		"ST" => "São Tomé and Príncipe",
		"TW" => "Taiwan",
		"TJ" => "Tajikistan",
		"TZ" => "Tanzania",
		"TH" => "Thailand",
		"TL" => "Timor-Leste",
		"TG" => "Togo",
		"TK" => "Tokelau",
		"TO" => "Tonga",
		"TT" => "Trinidad and Tobago",
		"TN" => "Tunisia",
		"TR" => "Turkey",
		"TM" => "Turkmenistan",
		"TC" => "Turks and Caicos Islands",
		"TV" => "Tuvalu",
		"UM" => "U.S. Minor Outlying Islands",
		"PU" => "U.S. Miscellaneous Pacific Islands",
		"VI" => "U.S. Virgin Islands",
		"UG" => "Uganda",
		"UA" => "Ukraine",
		"SU" => "Union of Soviet Socialist Republics",
		"AE" => "United Arab Emirates",
		"ZZ" => "Unknown or Invalid Region",
		"UY" => "Uruguay",
		"UZ" => "Uzbekistan",
		"VU" => "Vanuatu",
		"VA" => "Vatican City",
		"VE" => "Venezuela",
		"VN" => "Vietnam",
		"WK" => "Wake Island",
		"WF" => "Wallis and Futuna",
		"EH" => "Western Sahara",
		"YE" => "Yemen",
		"ZM" => "Zambia",
		"ZW" => "Zimbabwe",
		"AX" => "Åland Islands",
	);
	return $country_array;
}
 

function us_user_country_name( $country ){


	switch( $country ){
		
		case 'AF':
		$name = 'Afghanistan';
		break;
	
	    case 'AL':
		$name = 'Albania';
		break;	
	
	    case 'DZ':
		$name = 'Algeria';
		break;	
	
	    case 'AS':
		$name = 'American Samoa';
		break;	
	
	    case 'AD':
		$name = 'Andorra';
		break;	
	
	    case 'AO':
		$name = 'Angola';
		break;	
	
	    case 'AI':
		$name = 'Anguilla';
		break;	
	
	    case 'AQ':
		$name = 'Antarctica';
		break;	
	
	    case 'AG':
		$name = 'Antigua and Barbuda';
		break;	
		
	    case 'AR':
		$name = 'Argentina';
		break;	
	
	    case 'AM':
		$name = 'Armenia';
		break;
			
	    case 'AW':
		$name = 'Aruba';
		break;
		
	    case 'AU':
		$name = 'Australia';
		break;
			
	    case 'AT':
		$name = 'Austria';
		break;
		
	    case 'AZ':
		$name = 'Azerbaijan';
		break;
			
	    case 'BS':
		$name = 'Bahamas';
		break;
		
	    case 'BH':
		$name = 'Bahrain';
		break;
			
	    case 'BD':
		$name = 'Bangladesh';
		break;
		
	    case 'BB':
		$name = 'Barbados';
		break;
			
	    case 'BY':
		$name = 'Belarus';
		break;
		
	    case 'BE':
		$name = 'Belgium';
		break;
			
	    case 'BZ':
		$name = 'Belize';
		break;
		
	    case 'BJ':
		$name = 'Benin';
		break;
			
	    case 'BM':
		$name = 'Bermuda';
		break;
		
	    case 'BT':
		$name = 'Bhutan';
		break;
			
	    case 'BO':
		$name = 'Bolivia';
		break;
		
	    case 'BA':
		$name = 'Bosnia and Herzegowina';
		break;
			
	    case 'BW':
		$name = 'Botswana';
		break;
		
	    case 'BV':
		$name = 'Bouvet Island';
		break;
			
	    case 'BR':
		$name = 'Brazil';
		break;
		
	    case 'IO':
		$name = 'British Indian Ocean Territory';
		break;
			
	    case 'BN':
		$name = 'Brunei Darussalam';
		break;
		
	    case 'BG':
		$name = 'Bulgaria';
		break;
			
	    case 'BF':
		$name = 'Burkina Faso';
		break;
		
	    case 'BI':
		$name = 'Burundi';
		break;
			
	    case 'KH':
		$name = 'Cambodia';
		break;
		
	    case 'CM':
		$name = 'Cameroon';
		break;
			
	    case 'CA':
		$name = 'Canada';
		break;
		
	    case 'CV':
		$name = 'Cape Verde';
		break;
			
	    case 'CY':
		$name = 'Cayman Islands';
		break;
		
	    case 'CF':
		$name = 'Central African Republic';
		break;
			
	    case 'TD':
		$name = 'Chad';
		break;
		
	    case 'CL':
		$name = 'Chile';
		break;
			
	    case 'CN':
		$name = 'China';
		break;
		
	    case 'CX':
		$name = 'Christmas Island';
		break;
			
	    case 'CC':
		$name = 'Cocos (Keeling) Islands';
		break;
		
	    case 'CO':
		$name = 'Colombia';
		break;
			
	    case 'KM':
		$name = 'Comoros';
		break;
		
	    case 'CG':
		$name = 'Congo';
		break;
			
	    case 'CD':
		$name = 'Congo, the Democratic Republic of the';
		break;
		
	    case 'CK':
		$name = 'Cook Islands';
		break;
			
	    case 'CR':
		$name = 'Costa Rica';
		break;
		
	    case 'CI':
		$name = 'Cote d\'Ivoire';
		break;
			
	    case 'HR':
		$name = 'Croatia (Hrvatska)';
		break;
		
	    case 'CU':
		$name = 'Cuba';
		break;
			
	    case 'CYP':
		$name = 'Cyprus';
		break;
		
	    case 'CZ':
		$name = 'Czech Republic';
		break;
			
	    case 'DK':
		$name = 'Denmark';
		break;
		
	    case 'DJ':
		$name = 'Djibouti';
		break;
			
	    case 'DM':
		$name = 'Dominica';
		break;
		
	    case 'DO':
		$name = 'Dominican Republic';
		break;
			
	    case 'TP':
		$name = 'East Timor';
		break;
		
	    case 'EC':
		$name = 'Ecuador';
		break;
			
	    case 'EG':
		$name = 'Egypt';
		break;
		
	    case 'SV':
		$name = 'El Salvador';
		break;
			
	    case 'GQ':
		$name = 'Equatorial Guinea';
		break;																										

	    case 'ER':
		$name = 'Eritrea';
		break;
			
	    case 'EE':
		$name = 'Estonia';
		break;
		
	    case 'ET':
		$name = 'Ethiopia';
		break;
			
	    case 'FK':
		$name = 'Falkland Islands (Malvinas)';
		break;																										

	    case 'FO':
		$name = 'Faroe Islands';
		break;
			
	    case 'FJ':
		$name = 'Fiji';
		break;
		
	    case 'FI':
		$name = 'Finland';
		break;
			
	    case 'FR':
		$name = 'France';
		break;																										

	    case 'FX':
		$name = 'France, Metropolitan';
		break;
			
	    case 'GF':
		$name = 'French Guiana';
		break;
		
	    case 'PF':
		$name = 'French Polynesia';
		break;
			
	    case 'TF':
		$name = 'French Southern Territories';
		break;																										

	    case 'GA':
		$name = 'Gabon';
		break;
			
	    case 'GM':
		$name = 'Gambia';
		break;
		
	    case 'GE':
		$name = 'Georgia';
		break;
			
	    case 'DE':
		$name = 'Germany';
		break;																										

	    case 'GH':
		$name = 'Ghana';
		break;
			
	    case 'GI':
		$name = 'Gibraltar';
		break;
		
	    case 'GR':
		$name = 'Greece';
		break;
			
	    case 'GL':
		$name = 'Greenland';
		break;																										

	    case 'GD':
		$name = 'Grenada';
		break;
			
	    case 'GP':
		$name = 'Guadeloupe';
		break;
		
	    case 'GU':
		$name = 'Guam';
		break;
			
	    case 'GT':
		$name = 'Guatemala';
		break;																										

	    case 'GN':
		$name = 'Guinea';
		break;
			
	    case 'GW':
		$name = 'Guinea-Bissau';
		break;
		
	    case 'GY':
		$name = 'Guyana';
		break;
			
	    case 'HT':
		$name = 'Haiti';
		break;																										

	    case 'HM':
		$name = 'Heard and Mc Donald Islands';
		break;
			
	    case 'VA':
		$name = 'Holy See (Vatican City State)';
		break;
		
	    case 'HN':
		$name = 'Honduras';
		break;
			
	    case 'HK':
		$name = 'Hong Kong';
		break;																										

	    case 'HU':
		$name = 'Hungary';
		break;
			
	    case 'IS':
		$name = 'Iceland';
		break;
		
	    case 'IN':
		$name = 'India';
		break;
			
	    case 'ID':
		$name = 'Indonesia';
		break;																										

	    case 'IR':
		$name = 'Iran (Islamic Republic of)';
		break;
			
	    case 'IQ':
		$name = 'Iraq';
		break;
		
	    case 'IE':
		$name = 'Ireland';
		break;
			
	    case 'IL':
		$name = 'Israel';
		break;																										

	    case 'IT':
		$name = 'Italy';
		break;
			
	    case 'JM':
		$name = 'Jamaica';
		break;
		
	    case 'JP':
		$name = 'Japan';
		break;
			
	    case 'JO':
		$name = 'Jordan';
		break;																										

	    case 'KZ':
		$name = 'Kazakhstan';
		break;
			
	    case 'KE':
		$name = 'Kenya';
		break;
		
	    case 'KI':
		$name = 'Kiribati';
		break;
			
	    case 'KP':
		$name = 'Korea, Democratic People\'s Republic of';
		break;																										

	    case 'KR':
		$name = 'Korea, Republic of';
		break;
			
	    case 'KW':
		$name = 'Kuwait';
		break;
		
	    case 'KG':
		$name = 'Kyrgyzstan';
		break;
			
	    case 'LA':
		$name = 'Lao People\'s Democratic Republic';
		break;																										

	    case 'LV':
		$name = 'Latvia';
		break;
			
	    case 'LB':
		$name = 'Lebanon';
		break;
		
	    case 'LS':
		$name = 'Lesotho';
		break;
			
	    case 'LR':
		$name = 'Liberia';
		break;																										

	    case 'LY':
		$name = 'Libyan Arab Jamahiriya';
		break;
			
	    case 'LI':
		$name = 'Liechtenstein';
		break;
		
	    case 'LT':
		$name = 'Lithuania';
		break;
			
	    case 'LU':
		$name = 'Luxembourg';
		break;																										

	    case 'MO':
		$name = 'Macau';
		break;
			
	    case 'MK':
		$name = 'Macedonia';
		break;
		
	    case 'MG':
		$name = 'Madagascar';
		break;
			
	    case 'MW':
		$name = 'Malawi';
		break;																										

	    case 'MY':
		$name = 'Malaysia';
		break;
			
	    case 'MV':
		$name = 'Maldives';
		break;
		
	    case 'ML':
		$name = 'Mali';
		break;
			
	    case 'MT':
		$name = 'Malta';
		break;																										

	    case 'MH':
		$name = 'Marshall Islands';
		break;
			
	    case 'MQ':
		$name = 'Martinique';
		break;
		
	    case 'MR':
		$name = 'Mauritania';
		break;
			
	    case 'MU':
		$name = 'Mauritius';
		break;																										

	    case 'YT':
		$name = 'Mayotte';
		break;
			
	    case 'MX':
		$name = 'Mexico';
		break;
		
	    case 'FM':
		$name = 'Micronesia, Federated States of';
		break;
			
	    case 'MD':
		$name = 'Moldova, Republic of';
		break;																										

	    case 'MC':
		$name = 'Monaco';
		break;																										

	    case 'MN':
		$name = 'Mongolia';
		break;																										

	    case 'MS':
		$name = 'Montserrat';
		break;																										

	    case 'MA':
		$name = 'Morocco';
		break;																										

	    case 'MZ':
		$name = 'Mozambique';
		break;																										

	    case 'MM':
		$name = 'Myanmar';
		break;																										

	    case 'NA':
		$name = 'Namibia';
		break;																										

	    case 'NR':
		$name = 'Nauru';
		break;																										

	    case 'NP':
		$name = 'Nepal';
		break;																										

	    case 'NL':
		$name = 'Netherlands';
		break;																										

	    case 'AN':
		$name = 'Netherlands Antilles';
		break;																										

	    case 'NC':
		$name = 'New Caledonia';
		break;																										

	    case 'NZ':
		$name = 'New Zealand';
		break;																										

	    case 'NI':
		$name = 'Nicaragua';
		break;																										

	    case 'NE':
		$name = 'Niger';
		break;																										

	    case 'NG':
		$name = 'Nigeria';
		break;																										

	    case 'NU':
		$name = 'Niue';
		break;																										

	    case 'NF':
		$name = 'Norfolk Island';
		break;																										

	    case 'MP':
		$name = 'Northern Mariana Islands';
		break;																										

	    case 'NO':
		$name = 'Norway';
		break;																										

	    case 'OM':
		$name = 'Oman';
		break;																										

	    case 'PK':
		$name = 'Pakistan';
		break;																										

	    case 'PW':
		$name = 'Palau';
		break;																										

	    case 'PA':
		$name = 'Panama';
		break;																										

	    case 'PG':
		$name = 'Papua New Guinea';
		break;																										

	    case 'PY':
		$name = 'Paraguay';
		break;																										

	    case 'PE':
		$name = 'Peru';
		break;																										

	    case 'PH':
		$name = 'Philippines';
		break;																										

	    case 'PN':
		$name = 'Pitcairn';
		break;																										

	    case 'PL':
		$name = 'Poland';
		break;																										

	    case 'PT':
		$name = 'Portugal';
		break;																										

	    case 'PR':
		$name = 'Puerto Rico';
		break;																										

	    case 'QA':
		$name = 'Qatar';
		break;																										

	    case 'RE':
		$name = 'Reunion';
		break;																										

	    case 'RO':
		$name = 'Romania';
		break;																										

	    case 'RU':
		$name = 'Russian Federation';
		break;																										

	    case 'RW':
		$name = 'Rwanda';
		break;																										

	    case 'KN':
		$name = 'Saint Kitts and Nevis';
		break;																										

	    case 'LC':
		$name = 'Saint Lucia';
		break;																										

	    case 'VC':
		$name = 'Saint Vincent and the Grenadines';
		break;																										

	    case 'WS':
		$name = 'Samoa';
		break;																										

	    case 'SM':
		$name = 'San Marino';
		break;																										

	    case 'ST':
		$name = 'Sao Tome and Principe';
		break;																										

	    case 'SA':
		$name = 'Saudi Arabia';
		break;																										

	    case 'SN':
		$name = 'Senegal';
		break;																										

	    case 'SC':
		$name = 'Seychelles';
		break;																										

	    case 'SL':
		$name = 'Sierra Leone';
		break;																										

	    case 'SK':
		$name = 'Slovakia (Slovak Republic)';
		break;																										

	    case 'SVN':
		$name = 'Slovenia';
		break;																										

	    case 'SB':
		$name = 'Solomon Islands';
		break;																										

	    case 'SO':
		$name = 'Somalia';
		break;																										

	    case 'ZA':
		$name = 'South Africa';
		break;																										

	    case 'GS':
		$name = 'South Georgia and the South Sandwich Islands';
		break;																										

	    case 'ES':
		$name = 'Spain';
		break;																										

	    case 'LK':
		$name = 'Sri Lanka';
		break;																										

	    case 'SH':
		$name = 'St. Helena';
		break;																										

	    case 'PM':
		$name = 'St. Pierre and Miquelon';
		break;																										

	    case 'SD':
		$name = 'Sudan';
		break;																										

	    case 'SR':
		$name = 'Suriname';
		break;																										

	    case 'SJ':
		$name = 'Svalbard and Jan Mayen Islands';
		break;																										

	    case 'SZ':
		$name = 'Swaziland';
		break;																										

	    case 'SE':
		$name = 'Sweden';
		break;																										

	    case 'CH':
		$name = 'Switzerland';
		break;																										

	    case 'SY':
		$name = 'Syrian Arab Republic';
		break;																										

	    case 'TW':
		$name = 'Taiwan, Province of China';
		break;																										

	    case 'TJ':
		$name = 'Tajikistan';
		break;																										

	    case 'TZ':
		$name = 'Tanzania, United Republic of';
		break;																										

	    case 'TH':
		$name = 'Thailand';
		break;																										

	    case 'TG':
		$name = 'Togo';
		break;																										

	    case 'TK':
		$name = 'Tokelau';
		break;																										

	    case 'TO':
		$name = 'Tonga';
		break;																										

	    case 'TT':
		$name = 'Trinidad and Tobago';
		break;																										

	    case 'TN':
		$name = 'Tunisia';
		break;																										

	    case 'TR':
		$name = 'Turkey';
		break;																										

	    case 'TM':
		$name = 'Turkmenistan';
		break;																										

	    case 'TC':
		$name = 'Turks and Caicos Islands';
		break;																										

	    case 'TV':
		$name = 'Tuvalu';
		break;																										

	    case 'UG':
		$name = 'Uganda';
		break;																										

	    case 'UA':
		$name = 'Ukraine';
		break;																										

	    case 'AE':
		$name = 'United Arab Emirates';
		break;																										

	    case 'GB':
		$name = 'United Kingdom';
		break;																										

	    case 'US':
		$name = 'United States';
		break;																										

	    case 'UM':
		$name = 'United States Minor Outlying Islands';
		break;																										

	    case 'UY':
		$name = 'Uruguay';
		break;																										

	    case 'UZ':
		$name = 'Uzbekistan';
		break;																										

	    case 'VU':
		$name = 'Vanuatu';
		break;																										

	    case 'VE':
		$name = 'Venezuela';
		break;																										

	    case 'VN':
		$name = 'Viet Nam';
		break;																										

	    case 'VG':
		$name = 'Virgin Islands (British)';
		break;																										

	    case 'VI':
		$name = 'Virgin Islands (U.S.)';
		break;																										

	    case 'WF':
		$name = 'Wallis and Futuna Islands';
		break;																										

	    case 'EH':
		$name = 'Western Sahara';
		break;																										

	    case 'YE':
		$name = 'Yemen';
		break;																										

	    case 'YU':
		$name = 'Yugoslavia';
		break;																										

	    case 'ZM':
		$name = 'Zambia';
		break;																										

	    case 'ZW':
		$name = 'Zimbabwe';
		break;																											
		
		}

		return  $name;
	
	
	}