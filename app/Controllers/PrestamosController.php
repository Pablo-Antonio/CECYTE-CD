<?php

namespace App\Controllers;

use App\Models\PrestamosModel;
use App\Models\EquiposModel;

class PrestamosController extends BaseController
{

    public function index()
    {
        $data = [
            "page_functions" => "functions_prestamos.js"
        ];
        return view("templates/header", $data) . view('modals/prestamos/nuevoPrestamo') .
            view('modals/prestamos/verPrestamo') . view('modals/prestamos/devolverEquipo') .
            view('modals/prestamos/reportarEquipo') . view('prestamos') . view("templates/footer");
    }

    public function getAll()
    {
        $prestamos = new PrestamosModel();
        $arrData = $prestamos->findAll();
        for ($i = 0; $i < count($arrData); $i++) {
            if ($arrData[$i]['status'] == 0) {
                if ($arrData[$i]['incidencia'] == 1) {
                    $arrData[$i]['status'] = $prestamos->status("danger", "Reportado");
                    $arrData[$i]['acciones'] = $prestamos->btnEmpty();
                } else {
                    $arrData[$i]['status'] = $prestamos->status("success", "Entregado");
                    $arrData[$i]['acciones'] = $prestamos->btnView($arrData[$i]['idPrestamo']);
                }
            } else {
                $arrData[$i]['status'] = $prestamos->status("warning", "Prestamo");
                $arrData[$i]['acciones'] = $prestamos->btnFull($arrData[$i]['idPrestamo']);
            }
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }

    public function new()
    {
        $prestamos = new PrestamosModel();
        $arrResponse = "";
        $request = "";

        $folio = $this->request->getPost("folio");
        $matricula = $this->request->getPost("matricula");
        $alumno = $this->request->getPost("nomAlum");
        $graGru = $this->request->getPost("graGru");
        $datePrestamo = $this->request->getPost("datePrestamo");

        $inventario = new EquiposModel();
        $request = $inventario->where("folio", $folio)->findAll();

        //print_r($request);
        if (empty($request)) {
            $arrResponse = array('status' => false, 'msg' => 'FOLIO NO REGISTRADO.');
        } else {
            if ($request[0]['status'] == 0) {
                $arrResponse = array('status' => false, 'msg' => 'EUIPO EN ASISTENCIA.');
            } else if ($request[0]['status'] == 2) {
                $arrResponse = array('status' => false, 'msg' => 'EQUIPO PRESTADO.');
            } else {
                $datos = array(
                    "folio" => $folio,
                    "matricula" => $matricula,
                    "alumno" => $alumno,
                    "gradoGrupo" => $graGru,
                    "fechaPrestamo" => $datePrestamo
                );
                $prestamos->insert($datos);
                $request = $prestamos->getInsertID();
                if ($request > 0) {
                    $arrResponse = array('status' => true, 'msg' => 'Prestamo registrado correctamente.');
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'No es posible realizar el prestamo.');
                }
            }
        }
        return json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function show($idPrestamo)
    {
        $prestamos = new PrestamosModel();
        $arrData = $prestamos->find($idPrestamo);
        return json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }

    public function update()
    {
        $prestamos = new PrestamosModel();
        $idPrestamo = $this->request->getPost("idPrestamo");
        $dateDevolucion = $this->request->getPost("dateDevolucion");
        $folio = $this->request->getPost("folio");
        $datos = [
            'fechaDevolucion' => $dateDevolucion,
            'folio' => $folio,
            'incidencia' => 0,
            'status' => 0
        ];

        $request = $prestamos->update($idPrestamo, $datos);

        if ($request > 0) {
            $arrResponse = array('status' => true, 'msg' => 'Devolución Registrada Correctamente.');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'No es posible registrar la devolución.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
}
