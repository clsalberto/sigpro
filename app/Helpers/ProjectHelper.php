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
    function ctoi($score)
    {
        if ($score == "") {
            return null;
        } elseif ($score == '1._' || $score == '1_._') {
            $score = 1.0;
        } elseif ($score == '2._' || $score == '2_._') {
            $score = 2.0;
        } elseif ($score == '3._' || $score == '3_._') {
            $score = 3.0;
        } elseif ($score == '4._' || $score == '4_._') {
            $score = 4.0;
        } elseif ($score == '5._' || $score == '5_._') {
            $score = 5.0;
        } elseif ($score == '6._' || $score == '6_._') {
            $score = 6.0;
        } elseif ($score == '7._' || $score == '7_._') {
            $score = 7.0;
        } elseif ($score == '8._' || $score == '8_._') {
            $score = 8.0;
        } elseif ($score == '9._' || $score == '9_._') {
            $score = 9.0;
        } elseif ($score == '10._') {
            $score = 10.0;
        }
        return (int) ($score * 10);
    }
}

if (!function_exists("ctof")) {
    function ctof($score)
    {
        if (is_null($score)) {
            return "";
        } elseif ($score <= 0) {
            return "0.0";
        } elseif ($score == 10) {
            return "1.0";
        } elseif ($score == 20) {
            return "2.0";
        } elseif ($score == 30) {
            return "3.0";
        } elseif ($score == 40) {
            return "4.0";
        } elseif ($score == 50) {
            return "5.0";
        } elseif ($score == 60) {
            return "6.0";
        } elseif ($score == 70) {
            return "7.0";
        } elseif ($score == 80) {
            return "8.0";
        } elseif ($score == 90) {
            return "9.0";
        } elseif ($score >= 100) {
            return "10.0";
        } else {
            return (float) ($score / 10);
        }
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

if (!function_exists("format_date_name")) {
    function format_date_name($date, $year = false, $template = false)
    {

        $mes = date("m", strtotime($date));
        $ano = date("Y", strtotime($date));

        switch ($mes){
            case 1: $mes = "Jan"; break;
            case 2: $mes = "Fev"; break;
            case 3: $mes = "Mar"; break;
            case 4: $mes = "Abr"; break;
            case 5: $mes = "Mai"; break;
            case 6: $mes = "Jun"; break;
            case 7: $mes = "Jul"; break;
            case 8: $mes = "Ago"; break;
            case 9: $mes = "Set"; break;
            case 10: $mes = "Out"; break;
            case 11: $mes = "Nov"; break;
            case 12: $mes = "Dez"; break;
        }

        if ($year) {
            if ($template) {
                return "<h5 style=\"margin:-5px\">{$mes}<br><small>{$ano}</small></h5>";
            } else {
                return "{$mes}{$ano}";
            }
        }

        return "{$mes}";
    }
}

if (!function_exists("round_score")) {
    function round_score($score)
    {
        if (is_null($score)) {
            return null;
        } elseif ($score >= 0 && $score < 0.5) {
            return "0.0";
        } elseif ($score >= 0.5 && $score < 1) {
            return "0.5";
        } elseif ($score >= 1 && $score < 1.5) {
            return "1.0";
        } elseif ($score >= 1.5 && $score < 2) {
            return "1.5";
        } elseif ($score >= 2 && $score < 2.5) {
            return "2.0";
        } elseif ($score >= 2.5 && $score < 3) {
            return "2.5";
        } elseif ($score >= 3 && $score < 3.5) {
            return "3.0";
        } elseif ($score >= 3.5 && $score < 4) {
            return "3.5";
        } elseif ($score >= 4 && $score < 4.5) {
            return "4.0";
        } elseif ($score >= 4.5 && $score < 5) {
            return "4.5";
        } elseif ($score >= 5 && $score < 5.5) {
            return "5.0";
        } elseif ($score >= 5.5 && $score < 6) {
            return "5.5";
        } elseif ($score >= 6 && $score < 6.5) {
            return "6.0";
        } elseif ($score >= 6.5 && $score < 7) {
            return "6.5";
        } elseif ($score >= 7 && $score < 7.5) {
            return "7.0";
        } elseif ($score >= 7.5 && $score < 8) {
            return "7.5";
        } elseif ($score >= 8 && $score < 8.5) {
            return "8.0";
        } elseif ($score >= 8.5 && $score < 9) {
            return "8.5";
        } elseif ($score >= 9 && $score < 9.5) {
            return "9.0";
        } elseif ($score >= 9.5 && $score < 10) {
            return "9.5";
        } else {
            return "10.0";
        }
    }
}