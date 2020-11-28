<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('settings.setting');
    }

    public function general_setting()
    {
        return view('settings.setting-general');
    }

    public function appointment_setting()
    {
        return view('settings.setting-appointment');
    }

    public function cms_setting()
    {
        return view('settings.setting-cms');
    }
}
