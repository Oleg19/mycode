<?php     
    function found($arrdate)
    {         
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
    { 
        while ( $arrdate[0] <> $a )                                 
             { 
                  $arrdate[0] = $arrdate[0] + 1 . ".";                
                  $str = implode ( $arrdate );//var_dump ($str); die;
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
        { echo $str  ." <br>" ;
          $file = fopen("/var/www/html/mycode/chislo","ab");
          fwrite($file, $str . ",");
          fclose($file);
          return;
        }
       
    }
     $strdate = '01.09.2019';    // Рассчитывает без ошибок в интервале с начала года  и  до 2000 года, а также с 2000 г и более поздние даты.
     $arrdate = explode ( '.', $strdate );  // Если брать интервал с проходящий через 2000г будут ошибки.
     $arrdate[1] = $arrdate[1] . ".";
     while ( $arrdate[2] <> 2020 )    // До какого года расчитывать.
     {                       
          while ( $arrdate[1] <> 13)   // Перебирает месяца с 1 по 12
                {
        	    found ($arrdate);
                    $arrdate[1] = $arrdate[1] + 1 . ".";                                
                 } 
          $arrdate[1] = '01';       
          $arrdate[2] = $arrdate[2] + 1;
      }        
?>