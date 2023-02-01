<?php

namespace App\Controllers;

use App\Models\IncidenciasModel;

class IncidenciasController extends BaseController
{

    public function index()
    {
        $data = [
            "page_functions" => "functions_incidencias.js"
        ];
        return view("templates/header", $data) . view('modals/incidencias/verIncidencia') .
            view('modals/incidencias/baja') . view('modals/incidencias/reparado') .
            view('modals/incidencias/noReparado') . view('incidencias') . view("templates/footer");
    }

    public function getAll()
    {
        $incidencias = new IncidenciasModel();
        $arrData = $incidencias->findAll();
        for ($i = 0; $i < count($arrData); $i++) {
            if ($arrData[$i]['status'] == 0) {
                $arrData[$i]['status'] = $incidencias->status("success", "Reparado");
                $arrData[$i]['acciones'] = $incidencias->reparado($arrData[$i]['idIncidencia']);
            } else if ($arrData[$i]['status'] == 1) {
                $arrData[$i]['status'] = $incidencias->status("warning", "Pendiente");
                $arrData[$i]['acciones'] = $incidencias->pendiente($arrData[$i]['idIncidencia']);
            } else {
                $arrData[$i]['status'] = $incidencias->status("danger", "No Reparado");
                $arrData[$i]['acciones'] = $incidencias->noReparado($arrData[$i]['idIncidencia']);
            }
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }

    public function new()
    {
        $incidencias = new IncidenciasModel();
        $arrResponse = "";
        $request = "";

        $idPrestamo = $this->request->getPost("idPrestamo");
        $folio = $this->request->getPost("folio");
        $desReporte = $this->request->getPost("desReporte");
        $dateReporte = $this->request->getPost("dateReporte");

        $datos = array(
            'idPrestamo' => $idPrestamo, 'folio' => $folio,
            'desReporte' => $desReporte, 'fechaReporte' => $dateReporte
        );

        $incidencias->insert($datos);
        $request = $incidencias->getInsertID();
        if ($request > 0) {
            $arrResponse = array('status' => true, 'msg' => 'Reporte Realizado Correctamente.');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'No es posible realizar el reporte.');
        }
        return json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function show($idIncidencia)
    {
        $db = \Config\Database::connect();
        $query = $db->table('incidencias as i');
        $query->select('i.idIncidencia,i.fechaReporte,i.desReporte,
        i.fechaSolucion,i.desSolucion,i.status,
        p.idPrestamo,p.folio,p.matricula,p.alumno,p.gradoGrupo,p.fechaPrestamo');
        $query->join('prestamos as p', 'i.idPrestamo = p.idPrestamo');
        $query->where('i.idIncidencia',$idIncidencia);
        $arrData = $query->get()->getResult();
        return json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }

    public function update()
    {
        $incidencias = new IncidenciasModel();
        $request = "";
        $arrResponse = "";

        $idIncidencia = $this->request->getPost("idIncidencia");
        $dateSolucion = $this->request->getPost("dateSolucion");
        $desSolucion = $this->request->getPost("desSolucion");
        $opcion = $this->request->getPost("opcion");

        if ($opcion == 1) { //reparar
            $datos = array('fechaSolucion' => $dateSolucion, 'desSolucion' => $desSolucion, 'status' => 0);
            $request = $incidencias->update($idIncidencia, $datos);
        } else { //dar baja
            $datos = array('fechaSolucion' => $dateSolucion, 'desSolucion' => $desSolucion, 'status' => 2);
            $request = $incidencias->update($idIncidencia, $datos);
        }

        if ($request > 0) {
            $arrResponse = array('status' => true, 'msg' => 'Asistencia Registrada Correctamente.');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'No es posible registrar la asistencia.');
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
}
