<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Carbon;

class SampleDataController extends Controller
{
    /**
     * Sample data calculation and formatting
     *
     * @return \Illuminate\Support\Collection
     */
    public function profits()
    {
        $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        $arr=array();
        $data = Order::where('payment_status','paid')->get();
        
        // $orders = collect(json_decode(file_get_contents(resource_path('samples/sales.json'))));

        $d = $data->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('Y-m');
        })->map(function ($data) {
            return [
                'profit'  => number_format($data->sum('total') / 11, 2),
                'revenue' => number_format(0, 2),
            ];
        })->sortKeys()->mapWithKeys(function ($data, $key) use ($months) {
            return [$months[Carbon::parse($key)->format('n')] => $data];
        });

        return $d;
    }

    public function getUsers()
    {
        return User::all();
    }
}
