<?php

namespace App\Http\Controllers;

use Barryvdh\Debugbar\Middleware\Debugbar;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class DbController extends Controller
{
    public function select()
    {
        /*$tests = DB::table('tests')->where(function($query){
            $query->where('email', 't')->where('age', 100);
        })->get();
        \Debugbar::info($tests);*/

        $users = DB::table('tests')->select('email', 'id')->paginate(10);
        $allUser = DB::table('tests')->count();

        return view('db.users', compact('users', 'allUser'));
    }

    public function delete()
    {
        DB::table('tests')->where('id', 9)->delete();
        // DB::table('tests')->delete();

        return view('db.db');
    }
    public function update()
    {
        /*DB::table('tests')
            ->where('id', 1)
            ->update([
            'about' => 'update',
            'updated_at' => new \DateTime()
        ]);*/
        DB::table('tests')
            ->where('id', 1)
            ->decriment('age', 5, ['about' => 'updated again']);
        return view('db.db');
    }
    
    public function insert()
    {
        $peoples = [
            ['email' => 'neo@n.com', 'age' => 21, 'about' => 'the one', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(), 'gender' => 'M'],
            ['email' => 'tank@n.com', 'age' => 23, 'about' => 'hacker', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(), 'gender' => 'M'],
            ['email' => 'morpheus@n.com', 'age' => 24, 'about' => 'boss', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(), 'gender' => 'M'],
            ['email' => 'trinity@n.com', 'age' => 64, 'about' => 'wife', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(), 'gender' => 'F'],
        ];

        DB::table('tests')->insert($peoples);
        /*DB::table('tests')->insert([
            'email' => 'a@a.com',
            'age' => 23,
            'about' => 'about',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
            'gender' => 'M'
        ]);*/
        return view('db.db');
    }

    public function model()
    {
        /*$test = \App\Test::findOrFail(212321);

        echo $test->email;

        $test->each(function($item){
            echo $item->email . '<hr>';
        });*/

        // dd($test);
    }
}
