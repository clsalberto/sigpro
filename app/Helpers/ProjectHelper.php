<?php

if (!function_exists("set_active")) {
    function set_active($uri, $output = 'active')
    {
        if(is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)){
                return $output;
            }
        }
    }
}

if (!function_exists("proper_case")) {
    function proper_case($string)
    {
        $ignore = 'da de do das dos em';
        $string = ucwords(mb_strtolower($string));
        return str_replace(explode(' ', ucwords( $ignore)), explode(' ', $ignore), $string);
    }
}

if (!function_exists("ctoi")) {
    function ctoi($number)
    {
        return (int) ($number * 10);
    }
}

if (!function_exists("ctof")) {
    function ctof($number)
    {
        return (float) ($number / 10);
    }
}

if (!function_exists("generate_password")) {
    function generate_password($size = 8, $uppercase = true, $numbers = true, $symbols = false)
    {
        $lower = 'abcdefghijklmnopqrstuvwxyz';
        $upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numb = '1234567890';
        $simb = '!@#$%*-';
        $result = '';
        $characters = '';
        $characters .= $lower;

        if ($uppercase) $characters .= $upper;
        if ($numbers) $characters .= $numb;
        if ($symbols) $characters .= $simb;
        $len = strlen($characters);

        for ($n = 1; $n <= $size; $n++) {
            $rand = mt_rand(1, $len);
            $result .= $characters[$rand - 1];
        }

        return $result;
    }
}

if (!function_exists("format_date")) {
    function format_date($date)
    {
        $dia = date("d", strtotime($date));
        $mes = date("m", strtotime($date));
        $ano = date("Y", strtotime($date));
        $sem = date("w", strtotime($date));

        switch ($mes){
            case 1: $mes = "Janeiro"; break;
            case 2: $mes = "Fevereiro"; break;
            case 3: $mes = "Março"; break;
            case 4: $mes = "Abril"; break;
            case 5: $mes = "Maio"; break;
            case 6: $mes = "Junho"; break;
            case 7: $mes = "Julho"; break;
            case 8: $mes = "Agosto"; break;
            case 9: $mes = "Setembro"; break;
            case 10: $mes = "Outubro"; break;
            case 11: $mes = "Novembro"; break;
            case 12: $mes = "Dezembro"; break;
        }

        switch ($sem) {
            case 0: $sem = "Domingo"; break;
            case 1: $sem = "Segunda-feira"; break;
            case 2: $sem = "Terça-feira"; break;
            case 3: $sem = "Quarta-feira"; break;
            case 4: $sem = "Quinta-feira"; break;
            case 5: $sem = "Sexta-feira"; break;
            case 6: $sem = "Sábado"; break;
        }

        return "{$sem}<br><b>{$dia}</b> <i class='fa fa-angle-double-right'></i> {$mes} {$ano}";
    }
}
