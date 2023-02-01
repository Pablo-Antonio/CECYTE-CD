<?php

namespace App\Controllers;

use App\Models\EquiposModel;

class InventarioController extends BaseController
{
    
    public function index()
    {
        $data = [
            "page_functions" => "functions_inventario.js"
        ];
        return view("templates/header", $data) . view('modals/inventario/nuevoEquipo') .
            view('modals/inventario/actualizarEquipo') . view('modals/inventario/verEquipo') .
            view('inventario') . view("templates/footer");
    }

    public function getAll()
    {
        $inventario = new EquiposModel();
        $arrData = $inventario->findAll();

        for ($i = 0; $i < count($arrData); $i++) {
            if ($arrData[$i]['status'] == 0) {
                $arrData[$i]['status'] = $inventario->stat1();
                $arrData[$i]['acciones'] = $inventario->btnEmpty();
            } else if ($arrData[$i]['status'] == 1) {
                $arrData[$i]['status'] = $inventario->stat2();
                $arrData[$i]['acciones'] = $inventario->btnFull($arrData[$i]['idEquipo']);
            } else if ($arrData[$i]['status'] == 2) {
                $arrData[$i]['status'] = $inventario->stat3();
                $arrData[$i]['acciones'] = $inventario->btnEmpty();
            }
        }
        //$arrResponse = array('status' => false, 'msg' => 'No es posible actualizar el equipo.');
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }

    public function new()
    {
        $inventario = new EquiposModel();
        $arrResponse = "";
        $request = "";

        $folio = $this->request->getPost("folio");
        $nomEquipo = $this->request->getPost("nomEquipo");
        $desEquipo = $this->request->getPost("desEquipo");
        $dateIngreso = $this->request->getPost("dateIngreso");

        $request = $inventario->where('folio', $folio)->findAll();

        if (!empty($request)) {
            $arrResponse = array('status' => false, 'msg' => 'Ya existe un equipo registrado con ese FOLIO.');
        } else {
            $datos = [
                'folio' => $folio,
                'nombreEquipo' => $nomEquipo,
                'descripcionEquipo' => $desEquipo,
                'fechaIngreso' => $dateIngreso
            ];
            $inventario->insert($datos);
            $request = $inventario->getInsertID();
            if ($request > 0) {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible guardar los datos.');
            }
        }
        return json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function show($idEquipo)
    {
        $inventario = new EquiposModel();
        $arrData = $inventario->find($idEquipo);
        return json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }

    public function update()
    {
        $inventario = new EquiposModel();
        $idEquipo = $this->request->getPost("idEquipo");
        $nomEquipo = $this->request->getPost("nomEquipoUpd");
        $desEquipo = $this->request->getPost("desEquipoUpd");
        $datos = [
            'nombreEquipo' => $nomEquipo,
            'descripcionEquipo' => $desEquipo
        ];
       
        $request = $inventario->update($idEquipo, $datos);

        if ($request > 0) {
            $arrResponse = array('status' => true, 'msg' => 'Equipo Actualizado Correctamente.');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'No es posible actualizar el equipo.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
}
