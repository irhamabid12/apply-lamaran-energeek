<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Jobs;
use App\Models\Skills;
use App\Models\Skill_sets;
use App\Models\Candidates;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{

    public function index()
    {
        $jobs = Jobs::all();
        $skills = Skills::all();
        return view('apply-lamaran')->with([
            'jobs' => $jobs,
            'skills' => $skills
        ]);
    }

    public function store(Request $request){
        // dd($request->set_skill);die;
        
        $request->validate([
            'name' => 'required',
            'jabatan' => 'required',
            'email' => 'required|unique:candidates|email',
            'telepon' => 'required|unique:candidates,phone|numeric',
            'year' => 'required',
            'set_skill' => 'required'

        ]);

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
        if($set_job) {
            Alert::success('Berhasil', 'Lamaran Berhasil Dikirim');
            return redirect('/');
        }
        if(!$set_job) {
            Alert::error('Berhasil', 'Lamaran Gagal Dikirim');
            return redirect('/');
        } else {
            Alert::error('Berhasil', 'Lamaran Gagal Dikirim');
            return redirect('/');
        }
    }
}
