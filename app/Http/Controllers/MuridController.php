<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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
            "nama" => "required",
            "kelas" => "required",
            "jurusan" => "required"
        ]);

        if(empty($user["nama"]) && empty($user["kelas"]) && empty($user["jurusan"])) {
            return redirect("/tambah")->with("gagal", "gagal menambah data");
        }

        Murid::create($user);
        return redirect("/dashboard")->with("sukses", "data berhasil ditambahkan");
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
    public function update(Request $request)
    {

        DB::table("murids")->where("id", $request->id)->update([
            "nama" => $request->nama,
            "kelas" => $request->kelas,
            "jurusan" => $request->jurusan,
        ]);

        return redirect("/dashboard");
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(Murid $murid)
    {
        if($murid->delete()) {
            Session::flash("session", "sukses");
            Session::flash("message", "data berhasil dihapus");
        }
        return redirect("/dashboard")->with("message", "data berhasil dihapus");
    }
}
