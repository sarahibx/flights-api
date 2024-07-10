<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;

class FlightController extends Controller
{
    public function index(Request $request)
    {
        $flights = QueryBuilder::for(Flight::class)
            ->allowedFilters([
                AllowedFilter::partial('number'),
                AllowedFilter::partial('departure_city'),
                AllowedFilter::partial('arrival_city'),
                AllowedFilter::exact('departure_date'),
            ])
            ->allowedSorts(['number', 'departure_city', 'arrival_city', 'departure_date', 'created_at'])
            ->paginate($request->get('per_page', 20))
            ->appends($request->query());

        return response()->json($flights);
    }
}
