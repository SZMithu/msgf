<?php

namespace App\Services;

class PdfService
{
    public function generate($html)
    {
        // Load the DOMPDF library manually
        require_once public_path('dompdf/autoload.inc.php');

        // Initialize and use DOMPDF
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output the generated PDF
        return $dompdf->output();
    }
}
