<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

//use App\Http\Requests;



class TestController extends Controller
{
    public function home()
    {
        $names = [
            'Neo',
            'Morpheus',
            'Tank',
            'Dozer',
            'Smith',
            'Trinity',
            'Pifia'
        ];

        return view('test.masterpage', compact('names'));
    }






    public function index()
    {
        $names = [
            'Neo',
            'Morpheus',
            'Tank',
            'Dozer',
            'Smith',
            'Trinity',
            'Pifia'
        ];

        $names = array_reverse($names);

        return view('test.masterpage', compact('names'));
        // return view('test.masterpage', ['names' => $names]);
        // return view('test.masterpage')->withNames($names);
        // return view('test.masterpage')->with('names', $names);
        // return action('TestController@test', ['name' => 'Neo', 'age' => 23, 'xxx' => 'xxx']);
        // return '<a href="'.route('xz').'">xz route</a>';
    }

    public function test($name, $age)
    {

    }

    public function forms()
    {
        $validator = \Validator::make(['name' => ''], ['name' => 'required']);

        if($validator->fails()){
            dd('error');
        }else{
            dd('ok');
        }

        return view('test');
    }

    public function postForms(TestRequest $request)
    {
        /*$this->validate(['name' => 'john'], [
            'email' => 'required|email|unique:tests',
            'age' => 'required|integer|between:18,50',
            'gender' => 'in:Mr,Ms',
            'about' => 'required|min:10|max:255'
            // 'file' => 'file'
        ]);*/
        \DB::table('tests')->insert(
            array_merge($request->except('_token'), ['updated_at' => new \DateTime(), 'created_at' => new \DateTime()])
        );

        return redirect()->route('form');
    }
}
