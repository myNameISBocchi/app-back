<?php

namespace App\Http\Controllers;

use App\Helpers\Message;
use App\Services\PersonService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    public function __construct(protected PersonService $personService)
    {
        
    }
   public function imprimirVoceros(Request $req){
    try {
        $filters = $req->all();

        $group = $this->personService->getVocerosByConsejo($filters);
        $title = "REPORTE GENERAL DE VOCEROS";
        if(!empty($filters['councilId']) && $group->isNotEmpty()){
            $firstGroup = $group->first();
            $title = "VOCEROS DEL CONSEJO: ". ($firstGroup->first()->councilName ?? 'N/A');
        }
        if(ob_get_contents()) ob_end_clean();
        $pdf = Pdf::loadView('pdf.voceros', compact('group', 'title'));
        $pdf->setPaper('letter', 'portrait');
        return $pdf->download('reporte_voceros.pdf');
    } catch(\Exception $e) {
        return response()->json(['error' => 500, 'msg' => 'Error al generar PDF']);
    }
}
}
