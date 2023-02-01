<?php

namespace App\Models;

use CodeIgniter\Model;

class EquiposModel extends Model
{
    //protected $DBGroup          = 'default';
    protected $table            = 'equipos';
    protected $primaryKey       = 'idEquipo';
    protected $allowedFields    = ['folio', 'nombreEquipo', 'descripcionEquipo', 'fechaIngreso', 'status'];

    function btnEmpty()
    {
        $btnView =  '';
        $btn = '<div class="text-center">' . $btnView . '</div>';
        return $btn;
    }

    function btnFull($idEquipo)
    {
        $btnView = '<button class="btn btn-info btn-sm" onClick="viewEquipo(' .  $idEquipo . ')" title="Ver Detalles"><i class="fa fa-eye"></i></button>';
        $btnEdit = '<button class="btn btn-primary btn-sm" onClick="viewActualizar(' . $idEquipo . ')" title="Actualizar Equipo"><i class="fa fa-pencil"></i></button>';
        $btn = '<div class="text-center">' . $btnView . ' ' . $btnEdit . '</div>';
        return $btn;
    }

    function stat1()
    {
        $status = '<span class="label label-danger" >Asistencia</span>';
        return $status;
    }

    function stat2()
    {
        $status = '<span class="label label-success" >Activo</span>';
        return $status;
    }

    function stat3()
    {
        $status = '<span class="label label-warning" >Prestamo</span>';
        return $status;
    }
}
