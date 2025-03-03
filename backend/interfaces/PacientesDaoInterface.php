<?php
namespace backend\interfaces;

interface PacientesDaoInterface {
    public function getAll($sEcho,$iDisplayStart,$iDisplayLength,$sSearch,$iSortCol_0, $sSortDir_0);
    
}
