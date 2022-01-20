<?php

function capitaleFirst( $str )
{
        if ( $str == '' )
            return '';
        
        $firstLetter = $str[0];
        $str = strtolower( $str );

        $correspondence =[

            'é' => 'E',
            'è' => 'E',
            'ê' => 'E',
            'ë' => 'E',
        ];

        if ( array_key_exists( $firstLetter, $correspondence ))
            $firstLetter = $correspondence[ $firstLetter  ];




        switch( $firstLetter )
        {
            case 'é' :
            case 'è' :
            case 'ê' :
                $firstLetter = 'E';
                break;
            
            case 'ù' :
            case 'û' :
                $firstLetter = 'U';
                break;
            
        }

        $str[0] = $firstLetter;
        $str = ucfirst( $str );
        return  $str ;
}

?>