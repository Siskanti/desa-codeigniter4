<?php

namespace App\Controllers;

class Desa extends BaseController
{
    function __construct()
    {
        $this->model = new \App\Models\ModelDesa();
    }
    public function simpan()
    {
        $validasi  = \Config\Services::validation();
        $aturan = [
            'nomorSurat' => [
                'label' => 'nomorSurat',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                ]
            ],

            'jenisSurat' => [
                'label' => 'jenisSurat',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                ]
            ],

            'tglSurat' => [
                'label' => 'tglSurat',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                ]
            ],
        ];

        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {

            $nomorSurat = $this->request->getPost('nomorSurat');
            $jenisSurat = $this->request->getPost('jenisSurat');
            $tglSurat = $this->request->getPost('tglSurat');

            $data = [

                'nomorSurat' => $nomorSurat,
                'jenisSurat' => $jenisSurat,
                'tglSurat' => $tglSurat
            ];

            $this->model->save($data);

            $hasil['sukses'] = "Berhasil Memasukkan data";
            $hasil['error'] = true;
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validasi->listErrors();
        }



        return json_encode($hasil);
    }

    public function index()
    {
        return view('desa_view');
    }
}
