<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\UserScores;
use Illuminate\Http\Request;
use App\game;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = game::get();
        return response()->json($games);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = game::find($id);
        return response()->json($game);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function score($game,$score,$id){
        return UserScores::create([
            'user_id'=>$id,
            'game_id'=>$game,
            'score'=>$score
        ]);
    }
    public function getscore($game,$id)
    {
        return UserScores::where('user_id',$id)->where('game_id',$game)->sum('score');
    }
}
