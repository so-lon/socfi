<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Stadium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('promotion.index', ['promotions' => Promotion::orderByDesc('updated_at')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promotion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function() use($request) {
            $stadium = Stadium::where('owned_by', auth()->user()->id)->first();
            $promotion = Promotion::create($request->merge([
                'usable_from'  => date_create_from_format('d/m/Y', $request->get('usable_from'))->format('Y-m-d'),
                'usable_to'    => date_create_from_format('d/m/Y', $request->get('usable_to'))->format('Y-m-d'),
                'days_of_week' => implode(':', $request->get('days_of_week')),
                'created_by'   => auth()->user()->id,
                'updated_by'   => auth()->user()->id,
            ])->all());
            $promotion->stadiums()->attach($stadium->id);
        });
        return redirect()->route('promotion.index')->withStatus(__('Promotion successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        //
    }
}
