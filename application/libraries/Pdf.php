<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf 
{
	public function cetak($html,$filename)
 	{
	    define('DOMPDF_ENABLE_AUTOLOAD', false);
	    require_once("./vendor/dompdf/dompdf/dompdf_config.inc.php");
	    $dompdf = new DOMPDF();
	    $dompdf->load_html($html);
	    $dompdf->render();
    	$dompdf->stream($filename.'.pdf',array("Attachment"=>0));
    }
}