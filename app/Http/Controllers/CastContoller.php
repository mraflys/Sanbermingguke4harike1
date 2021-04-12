<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Castapp;

class CastContoller extends Controller
{
    public function create(){
        return view('cast/create');
    }
    public function store(Request $request){
        // $query = DB::table('cast')->insert([
        //     "id" => $request["id"],
        //     "nama" => $request["nama"],
        //     "umur" => $request["umur"],
        //     "bio" => $request["bio"]
        // ]);
        $cast = new Castapp;
        $cast->id = $request["id"];
        $cast->nama = $request["nama"];
        $cast->umur = $request["umur"];
        $cast->bio = $request["bio"];
        $cast->save();

        return redirect('/cast')->with('success','Post Berhasil Di Simpan');
    }
    public function index(){
        // $cast = DB::table('cast')->get();
        $cast = Castapp::all();
        return view('cast', compact('cast'));
    }

    public function show($id){
        // $cast = DB::table('cast')->where('id', $id)->first();
        $cast = Castapp::find($id);
        return view('cast.show', compact('cast'));
    }

    public function edit($id){
        // $cast = DB::table('cast')->where('id', $id)->first();
        $cast = Castapp::find($id);
        return view('cast.edit', compact('cast'));
    }

    public function update($id, Request $request){
        // $query = DB::table('cast')
        // ->where('id', $id)
        // ->update([
        //     "id" => $request["id"],
        //     "nama" => $request["nama"],
        //     "umur" => $request["umur"],
        //     "bio" => $request["bio"]
        // ]);
        $update = Castapp::where('id',$id)->update([
            "id" => $request["id"],
            "nama" => $request["nama"],
            "umur" => $request["umur"],
            "bio" => $request["bio"]
        ]);
        return redirect('/cast')->with('success', 'Berhasil Update');
    }

    public function destroy($id){
        // $query = DB::table('cast')->where('id', $id)->delete();
        $deleterow = Castapp::where('id', $id)->delete();
        return view('cast')->with('success', 'Berhasil di hapus');
    }
}
