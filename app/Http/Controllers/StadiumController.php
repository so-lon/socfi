<?php

namespace App\Http\Controllers;

use Stadium;
use StadiumRequest;
use SearchRequest;
use Auth;
use Illuminate\Http\Request;

class StadiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == constants('user.role.admin')) {
            return view('stadium.index', ['stadiums' => Stadium::withTrashed()->orderByDesc('updated_at')->paginate(6)]);
        } else {
            $stadium = Stadium::where('owned_by', auth()->user()->id)->first();
            return view('stadium.show', [
                'stadium' => $stadium,
                'fields'  => $stadium->fields,
            ]);
        }
    }

    /**
     * Display a listing of the resource with search keywords
     *
     * @param  \App\Http\Requests\SearchRequest  $request
     * @return \Illuminate\View\View
     */
    public function search(SearchRequest $request)
    {
        $terms = $request->get('terms');

        return view('stadium.index', [
            'stadiums' => Stadium::withTrashed()->whereLike(['name', 'address'], $terms)->orderByDesc('updated_at')->paginate(6),
            'terms'    => $terms
        ]);
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
     * @param  \App\Models\Stadium  $stadium
     * @return \Illuminate\Http\Response
     */
    public function show(Stadium $stadium)
    {
        return view('stadium.show', [
            'stadium' => $stadium,
            'fields'  => $stadium->fields,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stadium  $stadium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stadium $stadium)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stadium  $stadium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stadium $stadium)
    {
        //
    }
}
