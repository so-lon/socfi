<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\PriceForFieldPerHour;
use App\Models\Promotion;
use App\Models\Stadium;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stadium = Stadium::where('owned_by', auth()->user()->id)->first();
        $fields  = $stadium->fields;

        $bookings = [];
        foreach ($fields as $field) {
            if ($request->get('date')) {
                $date = date_create_from_format('d/m/Y', $request->get('date'))->format('Y-m-d');
                $bookings[$field->id] = Booking::where('field_id', $field->id)->whereLike('start_datetime', $date)->get();
            } else {
                $bookings[$field->id] = Booking::where('field_id', $field->id)->whereLike('start_datetime', now()->format('Y-m-d'))->get();
            }
        }

        $slots = [];
        $interval = strtotime($stadium->closing_time) - strtotime($stadium->opening_time);
        if ($interval < 0) $interval += 86400;
        for ($i = 0; $i <= $interval; $i += 1800) {
            array_push($slots, date("H:i", strtotime($stadium->opening_time) + $i));
        }

        return view('schedule', [
            'stadium'  => $stadium,
            'fields'   => $fields,
            'bookings' => $bookings,
            'slots'    => $slots,
            'now'      => $request->get('date') ?? now()->format('d/m/Y'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stadium = Stadium::where('owned_by', auth()->user()->id)->first();
        $fields  = $stadium->fields;

        $slots = [];
        $interval = strtotime($stadium->closing_time) - strtotime($stadium->opening_time);
        if ($interval < 0) $interval += constants('second.1_day');
        for ($i = 0; $i <= $interval; $i += constants('second.30_minutes')) {
            array_push($slots, date("H:i", strtotime($stadium->opening_time) + $i));
        }

        $prices = [];
        foreach ($stadium->prices as $price) {
            $prices[$price->field_id][$price->days_of_week][date("H:i", strtotime($price->slot_start)) . ' - ' . date("H:i", strtotime($price->slot_end))] = $price->price_per_hour;
        }

        $promotions = [];
        foreach ($stadium->promotions as $promotion) {
            $promotions[$promotion->code] = $promotion->value;
        }
        return view('booking.create', [
            'fields'     => $fields,
            'prices'     => json_encode($prices),
            'slots'      => $slots,
            'promotions' => json_encode($promotions),
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
        $start_datetime = date_create_from_format('d/m/Y H:i', $request->get('date') . ' ' . $request->get('slot'))->format('Y-m-d H:i:s');
        $price_per_hour = PriceForFieldPerHour::where('field_id', $request->get('field_id'))
                                            ->where('days_of_week', date('w', strtotime($start_datetime)))
                                            ->where('slot_start', '<=', $request->get('slot'))
                                            ->where('slot_end', '>', $request->get('slot'))->first()->price_per_hour;
        $promotion = Promotion::where('code', $request->get('code'))
                                ->where('usable_from', '<=', now())
                                ->where('usable_to', '>=', now())->first();
        $promotion_value = $promotion->value ?? 0;
        $price = $price_per_hour / 60 * $request->get('duration') - $promotion_value;
        Booking::create($request->merge([
            'start_datetime' => $start_datetime,
            'state'          => constants('booking.state.ready'),
            'price'          => $price,
        ])->all());
        return redirect()->route('schedule')->withStatus(__('Booking successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function approve(Booking $booking)
    {
        $booking->update(['state' => constants('booking.state.ready')]);
        return redirect()->route('schedule')->withStatus(__('Booking successfully approved.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->forceDelete();
        return redirect()->route('schedule')->withStatus(__('Booking successfully deleted.'));
    }
}
