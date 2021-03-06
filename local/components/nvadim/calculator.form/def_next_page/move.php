<?php
// редирект на след. шаги
// в случае успешной валидации данных
switch ($this->_step) {
case 'route':
    $nextPage = 'depart';
    $this->calcRegionTime();
    break;

case 'depart':
case 'intermediate':
case 'dest':
    $num = $this->arParams['VARIABLES']['intermediate_num'];

    if ($this->_step=='dest') {
        $nextPage = 'transport';
    } elseif (count($data[$this->stPage]['FROM']) > 1 && !$num) {
        $nextPage = 'intrm-1';
    } elseif($num && count($data[$this->stPage]['FROM']) > $num+1) {
        $nextPage = 'intrm-' . ($num+1);
    } else {
        $nextPage = 'dest';
    }

    break;

case 'transport':
case 'transport-edit':
    $nextPage = 'loaders';
    break;

case 'loaders':
case 'loaders-edit':

    $nextPage = 'packaging';
    break;

case 'packaging':
case 'packaging-edit':
    $nextPage = ($this->_sessData['RIGGING_PAGE'])? 'rigging':'confirm';
    break;
case 'rigging':
    $nextPage = 'confirm';
    break;
case 'confirm':
    $nextPage = 'success';
    break;
default:

}