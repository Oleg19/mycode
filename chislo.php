<?php     
    function found($arrdate)
    {  
       //var_dump ($arrdate); 
       switch ( $arrdate[1]) {    //Месяца где 31 день
        case '01':
        case '03':
        case '05':
        case '07':
        case '08':
        case '10':
        case '12':
            $a = '31';          
            dey($a, $arrdate);
            return;             // Месяца по 30 дней
            break;
        case '04':
        case '06':
        case '09':
        case '11': 
            $a = '30';
            dey($a, $arrdate);
            return;
        case '02':             // Февраль
            if ( $arrdate[2] % 4 ) 
            {
               $a = '28';
               dey($a, $arrdate);
               return;
            }
            else 
            {                    // Високосный год
            	 $a = '29';
                dey($a, $arrdate); 
                return; 
             }               
        default : 
           
     } 
    } 
    function dey($a, $arrdate)             // Перебирает дни
    { while ( $arrdate[0] <> $a )                                 
                { //var_dump ( $arrdate[0] );
                  $arrdate[0] = $arrdate[0] + 1;
                  //var_dump ( $arrdate [0] );
                  $str = implode ( $arrdate );
                  data($str);
                }       
    } 
    function data($str)               // Выводит дату соответствующую числу человека
    {     
        $arr = str_split( $str, 1 );
        foreach ( $arr as $val )
            { $res = $res + $val;          
            }
        $arr = str_split( $res, 1 ); 
        $res = 0; 
        foreach ( $arr as $val )
           { $res = $res + $val ;          
           }         
        if ( $res == 8 ) // Чило по дате рождения 19+09+1969 = 8
        { echo $str ." <br> " ;
          return;
        }
       
    }
     $strdate = '01.05.2017';    // Рассчитывает без ошибок с начала года, если принять дату другую будут ошибки.
     $arrdate = explode ( '.', $strdate ); 
     while ( $arrdate[2] <> 2019 )    // До какого года расчитывать.
     {    
          //var_dump($arrdate);          
          while ( $arrdate[1] <> 13)   // Перебирает месяца с 1 по 12
                {
        	           found ($arrdate);
                    $arrdate[1] = $arrdate[1] + 1; 
                    //var_dump( $arrdate[1]); die;           
                 } 
          $arrdate[1] = '01';       
          $arrdate[2] = $arrdate[2] + 1;
      }              
      
?>