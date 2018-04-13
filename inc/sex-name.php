<?php


function us_get_user_sex_name( $sex ) {
    switch( $sex ) {
        case 0: 
            $name = 'Female';
            break;
        case 1: 
            $name = 'Male';
            break;
        case 2:
            $name = 'Other';
            break;
        case 3: 
            $name = 'Transsexual';
            break;
        case 4:
            $name = 'Unknown';
            break;
    }
    return $name;
}