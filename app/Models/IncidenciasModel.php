<?php

namespace App\Models;

use CodeIgniter\Model;

class IncidenciasModel extends Model
{

    protected $table            = 'incidencias';
    protected $primaryKey       = 'idIncidencia';
    protected $allowedFields    = [
        'idPrestamo', 'folio', 'desReporte', 'fechaReporte',
        'fechaSolucion', 'desSolucion', 'status'
    ];

    function status($type, $title)
    {
        $status = '<span class="label label-' . $type . '" >' . $title . '</span>';
        return $status;
    }

    function reparado($idIncidencia)
    {
        $btnView = '<button class="btn btn-info btn-sm" onClick="viewReparado(' . $idIncidencia . ')" title="Ver Detalles"><i class="fa fa-eye"></i></button>';
        $btn = '<div class="text-center">' . $btnView . '</div>';
        return $btn;
    }

    function noReparado($idIncidencia)
    {
        $btnView = '<button class="btn btn-info btn-sm" onClick="viewNoReparado(' . $idIncidencia . ')" title="Ver Detalles"><i class="fa fa-eye"></i></button>';
        $btn = '<div class="text-center">' . $btnView . '</div>';
        return $btn;
    }

    function pendiente($idIncidencia)
    {
        $btnView = '<button class="btn btn-info btn-sm" onClick="viewIncidencia(' . $idIncidencia . ')" title="Ver Detalles"><i class="fa fa-eye"></i></button>';
        $btnRep = '<button class="btn btn-success btn-sm" onClick="viewReparar(' . $idIncidencia . ')" title="Reparar"><i class="fa fa-check"></i></button>';
        $btnBaj = '<button class="btn btn-danger btn-sm" onClick="viewBaja(' . $idIncidencia . ')" title="Dar Baja"><i class="fa fa-times"></i></button>';
        $btn = '<div class="text-center">' . $btnView . ' ' . $btnRep . ' ' . $btnBaj . '</div>';
        return $btn;
    }
}
