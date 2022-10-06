<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\Skills;
use App\Models\Skill_sets;
use App\Models\Candidates;
use Illuminate\Support\Facades\Validator;



class ApiController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'jabatan' => 'required',
            'email' => 'required|unique:candidates|email',
            'telepon' => 'required|unique:candidates,phone|numeric',
            'year' => 'required',
            // 'set_skill' => 'required'

        ]);
        if ($validator->fails()) {    
            return response()->json(['status' => false, 'message' => $validator->messages()]);
        }
        $store = Candidates::insertGetId([
            'job_id' => $request->jabatan,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->telepon,
            'year' => $request->year
        ]);
       
        $skills = $request->set_skill;
        
        foreach ( $skills as $set) {
            $set_job = Skill_sets::insert([
                'candidate_id' => $store,
                'skill_id' => $set
            ]);
        }
        if($store) {
            return response()->json(['status' => true, 'message' => 'success insert']);
        }
        if(!$set_job) {
            return response()->json(['status' => false, 'message' => 'filed insert']);
        } else {
            return response()->json(['status' => false, 'message' => 'filed insert']);
        }
    }

    public function detail(Request $request){
        $request->validate([
            'id' => ['required']
        ]);

        $detail = Candidates::with('jobs')->where('id', $request->id)->first();
            if (!$detail) return response(['status' => false, 'message' => 'Data not found!']);
            if ($detail) {
                return response([
                    'status' => true,
                    'message' => [
                        'candidate' => $detail
                    ]
                ]);
            }
    }
}
