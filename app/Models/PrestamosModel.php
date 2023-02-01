<?php

namespace App\Models;

use CodeIgniter\Model;

class PrestamosModel extends Model
{

    protected $table            = 'prestamos';
    protected $primaryKey       = 'idPrestamo';
    protected $allowedFields    = [
        'folio', 'matricula', 'alumno', 'gradoGrupo',
        'fechaPrestamo', 'fechaDevolucion', 'incidencia', 'status'
    ];

    function status($type, $title)
    {
        $status = '<span class="label label-' . $type . '" >' . $title . '</span>';
        return $status;
    }

    function btnEmpty()
    {
        $btn = '<div class="text-center"> </div>';
        return $btn;
    }

    function btnView($idPrestamo)
    {
        $btn = "";
        $btnView = '<button class="btn btn-info btn-sm" onClick="viewDevolucion(' . $idPrestamo . ')" title="Ver Detalles"><i class="fa fa-eye"></i></button>';
        $btn = '<div class="text-center">' . $btnView . '</div>';
        return $btn;
    }

    function btnFull($idPrestamo)
    {
        $btn = "";
        $btnView = '<button class="btn btn-info btn-sm" onClick="viewPrestamo(' . $idPrestamo . ')" title="Ver Detalles"><i class="fa fa-eye"></i></button>';
        $btnEnt = '<button class="btn btn-success btn-sm" onClick="devolver(' . $idPrestamo . ')" title="Devolver Equipo"><i class="fa fa-check"></i></button>';
        $btnInc = '<button class="btn btn-warning btn-sm" onClick="reportar(' . $idPrestamo . ')" title="Reportar Equipo"><i class="fa fa-exclamation-triangle"></i></button>';
        $btn = '<div class="text-center">' . $btnView . ' ' . $btnEnt . ' ' . $btnInc . '</div>';
        return $btn;
    }
}
