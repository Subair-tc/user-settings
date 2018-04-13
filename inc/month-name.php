<?php


function us_get_month_name( $month ) {
    switch( $month ) {
        case 1: 
            $name = 'January';
            break;
        case 2: 
            $name = 'February';
            break;
        case 3:
            $name = 'March';
            break;
        case 4: 
            $name = 'April';
            break;
        case 5:
            $name = 'May';
            break;
        case 6: 
            $name = 'June';
            break;
        case 7: 
            $name = 'July';
            break;
        case 8:
            $name = 'August';
            break;
        case 9: 
            $name = 'September';
            break;
        case 10:
            $name = 'October';
            break;
         case 11: 
            $name = 'November';
            break;
        case 12:
            $name = 'December';
            break;
    }
    return $name;
}

function us_get_month_drop_down( $selected_month ){
    $jan ='';
    $fab ='';
    $mar ='';
    $apr ='';
    $may ='';
    $jun ='';
    $jul ='';
    $aug ='';
    $sep ='';
    $oct ='';
    $nov ='';
    $dec ='';
    switch ( $selected_month ) {
        case 1: 
            $jan = 'selected';break;
        case 2: 
            $fab = 'selected';break;
        case 3: 
            $mar = 'selected';break;
        case 4: 
            $apr = 'selected';break;
        case 5: 
            $may = 'selected';break;
        case 6: 
            $jun = 'selected';break;
        case 7: 
            $jul = 'selected';break;
        case 8: 
            $aug = 'selected';break;
        case 9: 
            $sep = 'selected';break;
        case 10: 
            $oct = 'selected';break;
         case 11: 
            $nov = 'selected';break;
        case 12: 
            $dec = 'selected';break;
        default:
            $month = 'selected';break;
    }

    $return = '<option value="0">Month</option>
                <option '.$jan.' value="1">January</option>
                <option '.$feb.'  value="2">February</option>
                <option '.$mar.'  value="3">March</option>
                <option '.$apr.' value="4">April</option>
                <option '.$may.' value="5">May</option>
                <option '.$jun.' value="6">June</option>
                <option '.$jul.' value="7">July</option>
                <option '.$aug.' value="8">August</option>
                <option '.$sep.'  value="9">September</option>
                <option '.$oct.' value="10">October</option>
                <option '.$nov.' value="11">November</option>
                <option '.$dec.' value="12">December</option>';
    return  $return ;
}