<?php 

namespace App\Rules;

use Illuminate\Http\Request;

class ClassLevelRules{

    public function ValidateClassLevelData(Request $request)
    {
        return $request->validate([
          'section_id' => 'required|string|exists:sections,id',
          'name' => 'required|string',
        ]);
    }

}