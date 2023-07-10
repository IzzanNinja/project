<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




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
          'pemilikgeran' => 'required',
          'nogeran' => 'required',
          'lokasi' => 'required',
          'luasekar' => 'required',
          'luaspohon' => 'required',
          'pemilikan' => 'required',
      ]);

      // Create a new record in the 'tanah' table using the validated data
      $tanah = DB::table('tanah')->insertGetId([
          'bil' => $validatedData['bil'],
          'pohonid' => $validatedData['pohonid'],
          'pemilikgeran' => $validatedData['pemilikgeran'],
          'nogeran' => $validatedData['nogeran'],
          'lokasi' => $validatedData['lokasi'],
          'luasekar' => $validatedData['luasekar'],
          'luaspohon' => $validatedData['luaspohon'],
          'pemilikan' => $validatedData['pemilikan'],
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
        'pemilikgeran' => 'required',
        'nogeran' => 'required',
        'lokasi' => 'required',
        'luasekar' => 'required',
        'luaspohon' => 'required',
        'pemilikan' => 'required',
    ]);
}


    // ...

    public function destroy($id)
    {

    }
    public function edit($id)
    {




            // Retrieve the tanah record with the given pohonid
            $tanah = DB::table('tanah')->where('pohonid', $id)->first();

            // Pass the retrieved tanah record to the view
            return view('senaraitanah', compact('tanah'));
        }
}







