<?php

namespace App\Controllers;

use App\Models\IndexModel;

class IndexController extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        $usr = $this->request->getPost("usr");
        $pass = $this->request->getPost("pass");
        $index = new IndexModel();

        $request = $index->where("usr", $usr)->where("password", $pass)->find();

        if (!empty($request)) {
            $data = [
                'session' => 'si'
            ];

            $session = session();
            $session->set($data);

            $arrResponse = array('status' => true, 'msg' => '.');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Usuario y/o Contraseña incorrectos.');
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to("/");
    }
}
