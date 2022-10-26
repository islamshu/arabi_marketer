<?php

namespace App\Http\Controllers;

use App\Models\GeneralInfo;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GeneralInfoController extends Controller
{
    public function myfatoorah()
    {
        return view('pages.configs.myfatoorah');
    }
    public function store(Request $request)
    {
        if ($request->hasFile('general_file')) {
            foreach ($request->file('general_file') as $name => $value) {
                if ($value == null) {
                    continue;
                }
                GeneralInfo::setValue($name, $value->store('general'));
            }
        }

        foreach ($request->input('general') as $name => $value) {
            if ($value == null) {
                continue;
            }
            Generalinfo::setValue($name, $value);
        }

        session()->flash('success', 'تم تحديث البيانات بنجاح');
        return redirect()->back();
    }
    public function notification($id)
    {
        $not = Notification::find($id);
        $not->read_at = Carbon::now();
        $not->save();
        return redirect(json_decode($not->data)->url);
    }

}
