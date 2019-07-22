<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Pdf
{
    public function __construct(){
        
        // include autoloader
        require_once dirname(__FILE__).'/dompdf/include/autoload.inc.php';
        
        // instantiate and use the dompdf class
        $pdf = new DOMPDF();
        
        $CI =& get_instance();
        $CI->dompdf = $pdf;
        
    }
}
?>