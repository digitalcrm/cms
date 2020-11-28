<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\SettingCmsVisibility;
use App\Http\Controllers\Controller;

class CmsSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_all_visibility_data = SettingCmsVisibility::get(['id','visibility_name','action']);

        return view('settings.cms_related_settings_file.visibility', compact('get_all_visibility_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SettingCmsVisibility $cms_visibility)
    {
        // dd($cms_visibility->id);
        try {
            if ($cms_visibility->action == true){
                $action_value =false;
            } else {
                $action_value = true;
            }

            $cms_visibility->update([
                'action' => $action_value,
            ]);
            return back()->withMessage($cms_visibility->visibility_name.' visibility updated successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error','Something went wrong'.$th->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
