<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signal;
use Illuminate\Support\Facades\DB;

class SignalController extends Controller
{
    /**
     * Load Trafic Signal Page with Data
     */
    public function index()
    {
        $signals = Signal::first();
        return view('index', compact('signals'));
    }

    /**
     * Store Data
     */
    public function store(Request $request)
    {
        //Validate Form
        $validatedData = $request->validate([
            'sequence_a' => 'required',
            'sequence_b' => 'required',
            'sequence_c' => 'required',
            'sequence_d' => 'required',
            'green_light_intervals' => 'required',
            'yellow_light_intervals' => 'required',
        ], [
            'sequence_a.required' => 'Sequence a field is required.',
            'sequence_b.required' => 'Sequence b field is required.',
            'sequence_c.required' => 'Sequence c field is required.',
            'sequence_d.required' => 'Sequence d field is required.',
            'green_light_intervals.required' => 'Green light field is required.',
            'yellow_light_intervals.required' => 'Yellow light field is required.',
        ]);

        //Create Array for Insert Record
        $data = [
            'sequence_a' => $request->sequence_a,
            'sequence_b' => $request->sequence_b,
            'sequence_c' => $request->sequence_c,
            'sequence_d' => $request->sequence_d,
            'green_light_intervals' => $request->green_light_intervals,
            'yellow_light_intervals' => $request->yellow_light_intervals,
        ];
        //Count Record
        $count = Signal::count();
        if ($count > 0) {
            //Update Data
            $data['updated_at'] = date('Y-m-d H:i:s');
            Signal::where('id', 1)->update($data);
        } else {
            //Insert Data
            $data['created_at'] = date('Y-m-d H:i:s');
            Signal::create($data);
        }
        return response()->json(['success' => 'Data submitted successfully.']);
    }
}
