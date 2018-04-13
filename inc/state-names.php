<?php

function us_get_state() {
    $us_state_abbrevs_names = array(
        'AL'=>'Alabama',
    'AK'=>'Alaska',
    'AZ'=>'Arizona',
    'AR'=>'Arkansas',
    'CA'=>'California',
    'CO'=>'Colorado',
    'CT'=>'Connecticut',
    'DE'=>'Delaware',
    'DC'=>'District of Columbia',
    'FL'=>'Florida',
    'GA'=>'Georgia',
    'HI'=>'Hawaii',
    'ID'=>'Idaho',
    'IL'=>'Illinois',
    'IN'=>'Indiana',
    'IA'=>'Iowa',
    'KS'=>'Kansas',
    'KY'=>'Kentucky',
    'LA'=>'Louisiana',
    'ME'=>'Maine',
    'MD'=>'Maryland',
    'MA'=>'Massachusetts',
    'MI'=>'Michigan',
    'MN'=>'Minnesota',
    'MS'=>'Mississippi',
    'MO'=>'Missouri',
    'MT'=>'Montana',
    'NE'=>'Nebraska',
    'NV'=>'Nevada',
    'NH'=>'New Hampshire',
    'NJ'=>'New Jersey',
    'NM'=>'New Mexico',
    'NY'=>'New York',
    'NC'=>'North Carolina',
    'ND'=>'North Dakota',
    'OH'=>'Ohio',
    'OK'=>'Oklahoma',
    'OR'=>'Oregon',
    'PA'=>'Pennsylvania',
    'RI'=>'Rhode Island',
    'SC'=>'South Carolina',
    'SD'=>'South Dakota',
    'TN'=>'Tennessee',
    'TX'=>'Texas',
    'UT'=>'Utah',
    'VT'=>'Vermont',
    'VA'=>'Virginia',
    'WA'=>'Washington',
    'WV'=>'West Virginia',
    'WI'=>'Wisconsin',
    'WY'=>'Wyoming',
    );

    return $us_state_abbrevs_names;
}


function us_get_state_name( $states){

    switch($states ) {
        case "DC":
            $state = "District of Columbia";
            break;
        case "AK":
            $state = "Alaska";
            break;
        case "AL":
            $state = "Alabama";
            break;
        case "AR":
            $state = "Arkansas";
            break;
        case "AZ":
            $state = "Arizona";
            break;
        case "CA":
            $state = "California";
            break;
        case "CO":
            $state = "Colorado";
            break;
        case "CT":
            $state = "Connecticut";
            break;
        case "DE":
            $state = "Delaware";
            break;
        case "FL":
            $state = "Florida";
            break;
        case "GA":
            $state = "Georgia";
            break;
        case "HI":
            $state = "Hawaii";
            break;
        case "IA":
            $state = "Iowa";
            break;
        case "ID":
            $state = "Idaho";
            break;
        case "IL":
            $state = "Illinois";
            break;
        case "IN":
            $state = "Indiana";
            break;
        case "KS":
            $state = "Kansas";
            break;
        case "KY":
            $state = "Kentucky";
            break;
        case "LA":
            $state = "Louisiana";
            break;
        case "MA":
            $state = "Massachusetts";
            break;
        case "MD":
            $state = "Maryland";
            break;
        case "ME":
            $state = "Maine";
            break;
        case "MI":
            $state = "Michigan";
            break;
        case "MN":
            $state = "Minnesota";
            break;
        case "MO":
            $state = "Missouri";
            break;
        case "MS":
            $state = "Mississippi";
            break;
        case "MT":
            $state = "Montana";
            break;
        case "NC":
            $state = "North Carolina";
            break;
        case "ND":
            $state = "North Dakota";
            break;
        case "NE":
            $state = "Nebraska";
            break;
        case "NH":
            $state = "New Hampshire";
            break;
        case "NJ":
            $state = "New Jersey";
            break;
        case "NM":
            $state = "New Mexico";
            break;
        case "NV":
            $state = "Nevada";
            break;
        case "NY":
            $state = "New York";
            break;
        case "OH":
            $state = "Ohio";
            break;
        case "OK":
            $state = "Oklahoma";
            break;
        case "OR":
            $state = "Oregon";
            break;
        case "PA":
            $state = "Pennsylvania";
            break;
        case "RI":
            $state = "Rhode Island";
            break;
        case "SC":
            $state = "South Carolina";
            break;
        case "SD":
            $state = "South Dakota";
            break;
        case "TN":
            $state = "Tennessee";
            break;
        case "TX":
            $state = "Texas";
            break;
        case "UT":
            $state = "Utah";
            break;
        case "VA":
            $state = "Virginia";
            break;
        case "VT":
            $state = "Vermont";
            break;
        case "WA":
            $state = "Washington";
            break;
        case "WI":
            $state = "Wisconsin";
            break;
        case "WV":
            $state = "West Virginia";
            break;
        case "WY":
            $state = "Wyoming";
            break;
    }
	return  $state;
}