<?php
function fncCheckLength($a_stString , $a_iMaxLength) {
    if (mb_strlen($a_stString , 'UTF-8') > $a_iMaxLength) {
        return false ;
    }
    return true;
}