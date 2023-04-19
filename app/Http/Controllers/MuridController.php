<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MuridController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create()
    {
        return view("tambah", [
            "title" => "tambah data"
        ]);
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->validate([
            "gambar" => "image|file|max:2048",
            "nama" => "required",
            "kelas" => "required",
            "jurusan" => "required"
        ]);

        if($request->file("gambar")) {
            $user["gambar"] = $request->file("gambar")->store("img");
        } 

        if(empty($user["nama"]) && empty($user["kelas"]) && empty($user["jurusan"])) {
            return redirect("/tambah")->with("gagal", "gagal menambah data");
        }

        Murid::create($user);
        return redirect("/dashboard")->with("message", "data berhasil ditambahkan");
    }

    /**
     * Display the resource.
     */
    public function show()
    {
        $murid = Murid::all();
        return view("dashboard", [
            "title" => "dashboard",
            "murid" => $murid
        ]);
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit($id)
    {

        $murid = DB::table('murids')->where("id", $id)->get();

        return view("ubah", [
            "title" => "ubah data",
            "murid" => $murid
        ]);
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request, Murid $murid)
    {

        $user = $request->validate([
            "gambar" => "image|file|max:2048",
            "nama" => "required",
            "kelas" => "required",
            "jurusan" => "required"
        ]);

        if($request->file("gambar")) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $user["gambar"] = $request->file("gambar")->store("img");
        }
        
        Murid::where("id", $request->id)->update($user);

        return redirect("/dashboard")->with("message", "Data berhasil diubah");
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(Murid $murid)
    {
        if($murid->destroy($murid->id)) {
            if($murid->gambar) {
                Storage::delete($murid->gambar);
            }
            Session::flash("session", "sukses");
            Session::flash("message", "data berhasil dihapus");
        }
        return back()->with("message", "data berhasil dihapus");
    }
}
