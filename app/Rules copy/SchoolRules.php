<?php 

namespace App\Rules;

use Illuminate\Http\Request;

class SchoolRules{

    public function ValidateSechoolData(Request $request)
    {
        return $request->validate([
          'name' => 'required|string',
        ]);
    }

}