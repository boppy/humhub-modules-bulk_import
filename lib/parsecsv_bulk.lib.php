<?php
require_once('parsecsv.lib.php');

class parseCSV_bulk extends parseCSV {
    /**
     * Read local file
     * @param   file   local filename
     * @return  Data from file, or false on failure
     */

    function _rfile($file=null){
        $str = parent::_rfile($file);
        if($str !== false){
            return $this->_removeBOM($str);
        }
        return false;
    }

    /**
     * Remove BOM from supplied string
     * @param   string  Input string
     *
     * @return  string  String with BOM removed
     */
    function _removeBOM($string){
        $bom = pack('H*','EFBBBF');
        $text = preg_replace("/^$bom/", '', $string);
        return $text;
    }
}
