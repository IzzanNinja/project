<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;



class TanahController extends Controller
{
    // ...

    public function index()
    {
        // $tanahList = DB::table('tanah')->get();

        return view('tanahindex');
    }

    // ...
  // ...

  public function create()
  {
      return view('senaraitanah');
  }


  public function store(Request $request)
  {
      // Validate the form data
      $validatedData = $request->validate([
          'bil' => 'required',
          'pohonid' => 'required',
        //   'pemilikgeran' => 'required',
        //   'nogeran' => 'required',
        //   'lokasi' => 'required',
        //   'luasekar' => 'required',
        //   'luaspohon' => 'required',
        //   'pemilikan' => 'required',
          // Add validation rules for other form fields
      ]);

      // Create a new record in the 'tanah' table using the validated data
      $tanah = DB::table('tanah')->insertGetId([
          'bil' => $validatedData['bil'],
          'pohonid' => $validatedData['pohonid'],
        //   'pemilikgeran' => $validatedData['pemilikgeran'],
        //   'nogeran' => $validatedData['nogeran'],
        //   'lokasi' => $validatedData['lokasi'],
        //   'luasekar' => $validatedData['luasekar'],
        //   'luaspohon' => $validatedData['luaspohon'],
        //   'pemilikan' => $validatedData['pemilikan'],
          // Add other form field values
      ]);

      // Redirect the user to the 'tanahindex' page after storing the data
      return redirect()->route('tanahindex');
  }



    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'bil' => 'required',
            'pohonid' => 'required',
            // Add validation rules for other tanah properties
        ]);

        // Update the tanah record
        DB::table('tanah')->where('table_id', $id)->update([
            'bil' => $request->bil,
            'pohonid' => $request->pohonid,
            // Update values for other tanah properties
        ]);

        return redirect()->route('tanahindex');
    }

    // ...

    public function destroy($id)
    {
        // Delete the tanah record
        DB::table('tanah')->where('table_id', $id)->delete();

        return redirect()->route('tanahindex');
    }
}
