<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reservation;
use App\Models\Hotel;
use App\Models\Hall;

// app/Http/Controllers/ReservationController.php <?php



//use Illuminate\Support\Facades\DB;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::with('hall', 'hall.hotel')->orderBy('arrival', 'asc')->get();
        return $reservations;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['user_id' => 1]);
        Reservation::create($request->all());
        return response()->json([
            'message' => 'Reservation created successfully',
            'reservation' => $request->all()
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //prikazi odredjenu rezervaciju
    public function show($id)
    {
        if ($id > Reservation::all()->last()->id || $id < 0) {
            return response([
                'message' => 'out of scope'
            ], 400);
        }
        $reservation = Reservation::with('hall', 'hall.hotel')->get()->find($id);
        return $reservation;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request, $id)
    {
        if ($id > Reservation::all()->last()->id || $id < 0) {
            return response([
                'message' => 'out of scope'
            ], 400);
        }
        $reservation = Reservation::with('hall', 'hall.hotel')->get()->find($id);
        $reservation->update($request->all());
        return response()->json([
            'message' => 'Reservation updated successfully',
            $reservation
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id > Reservation::all()->last()->id || $id < 0) {
            return response([
                'message' => 'out of scope'
            ], 400);
        }
        $reservation = Reservation::with('hall', 'hall.hotel')->get()->find($id);
        Reservation::destroy($id);
        return response()->json([
            'message' => 'Reservation deleted successfully',
            $reservation
        ], 201);
    }
}
