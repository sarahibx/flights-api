<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;

class PassengerController extends Controller
{
    public function index(Request $request)
    {
        $passengers = QueryBuilder::for(Passenger::class)
            ->allowedFilters([
                AllowedFilter::partial('first_name'),
                AllowedFilter::partial('last_name'),
                AllowedFilter::exact('email'),
            ])
            ->allowedSorts([
                AllowedSort::field('first_name'),
                AllowedSort::field('last_name'),
                AllowedSort::field('email'),
                AllowedSort::field('created_at')
            ])
            ->paginate($request->get('per_page', 20)) 
            ->appends($request->query()); 

        return response()->json($passengers);
    }
}
