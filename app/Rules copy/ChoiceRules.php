<?php 

namespace App\Rules;

use Illuminate\Http\Request;

class ChoiceRules{

    public function ValidateChoiceData(Request $request)
    {
        return $request->validate([
          'school_type' => 'required|string',
          'school_level' => 'required|string',
          'class_level' => 'required|string',
        ]);
    }

}