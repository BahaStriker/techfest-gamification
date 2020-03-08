<?php

namespace App\Http\Controllers\API;

use App\Events\NewMessage;
use App\Http\Controllers\Controller;
use App\UserScores;
use Illuminate\Http\Request;
use App\game;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $scores=UserScores::create([
            'user_id'=>$id,
            'game_id'=>$game,
            'score'=>$score
        ]);
        broadcast(new NewMessage('Score added'));
        return response()->json($scores);
    }
    public function getscore($game,$id)
    {
        $sum=UserScores::where('user_id',$id)->where('game_id',$game)->sum('score');
        if ($sum>10)
        {
            return 10;
        }
        return $sum;
    }
    public function ranking()
    {
        return DB::table('user_scores')
            ->select( 'users.name', \DB::raw('SUM(score) as score_count'))
            ->join('users', 'users.id', '=', 'user_scores.user_id')
            ->orderBy('score_count', 'desc')
            ->groupBy('users.id')
            ->take(3)
            ->get();

    }
}
