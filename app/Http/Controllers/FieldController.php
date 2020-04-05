<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\PriceForFieldPerHour;
use App\Models\Stadium;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('field.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Field  $model
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Field $model)
    {
        $stadium = Stadium::where('owned_by', auth()->user()->id)->first();
        $field = $model->create($request->merge(['stadium_id' => $stadium->id])->all());
        $slot_start = $request->get('slot_start');
        $slot_end   = $request->get('slot_end');
        $price      = $request->get('price');
        if ($price) {
            foreach ($price as $key => $value) {
                for ($i = 0; $i < sizeof($slot_start); $i++) {
                    if ($value[$i]) {
                        PriceForFieldPerHour::create([
                            'stadium_id'     => $stadium->id,
                            'field_id'       => $field->id,
                            'slot_start'     => $slot_start[$i],
                            'slot_end'       => $slot_end[$i],
                            'days_of_week'   => $key,
                            'price_per_hour' => $value[$i],
                        ]);
                    }
                }
            }
        }
        return redirect()->route('stadium.index')->withStatus(__('Field successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Field $field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit(Field $field)
    {
        return view('field.edit', [
            'field'  => $field,
            'prices' => $field->prices->groupBy('slot_start'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Field $field)
    {
        $stadium = Stadium::where('owned_by', auth()->user()->id)->first();
        $field->update($request->all());
        PriceForFieldPerHour::where('field_id', $field->id)->delete();
        $slot_start = $request->get('slot_start');
        $slot_end   = $request->get('slot_end');
        $price      = $request->get('price');
        if ($price) {
            foreach ($price as $key => $value) {
                for ($i = 0; $i < sizeof($slot_start); $i++) {
                    if ($value[$i]) {
                        PriceForFieldPerHour::create([
                            'stadium_id'     => $stadium->id,
                            'field_id'       => $field->id,
                            'slot_start'     => $slot_start[$i],
                            'slot_end'       => $slot_end[$i],
                            'days_of_week'   => $key,
                            'price_per_hour' => $value[$i],
                        ]);
                    }
                }
            }
        }
        return redirect()->route('stadium.index')->withStatus(__('Field successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(Field $field)
    {
        $stadium = Stadium::where('owned_by', auth()->user()->id)->first();
        $field->delete();
        return redirect()->route('stadium.show')->withStatus(__('Field successfully deleted.'));
    }
}
