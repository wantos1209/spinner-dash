<?php

use App\Models\ApkBo;

function getDataBo()
{
    return ApkBo::all();
}

function getDataBo2()
{
    $session_id = session('id_bo');
    $bonama = '';
    if ($session_id != '') {
        $bo = ApkBo::where('id', $session_id)->first();
        $bonama = $bo->nama;
    } else {
        $bonama = 'arwana';
    }
    return $bonama;
}


function backToDashboard()
{
    return redirect()->route('dashboard');
}

function getDataBo3()
{
    return ApkBo::orderBy('id', 'ASC')->first();
}
