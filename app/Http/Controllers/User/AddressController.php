<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User\Address;
use App\Models\User\Place;
use App\Models\User\Region;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.settings.address.index')->withUser(Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $address = Auth::user()->profile->address()->first();

        if($address)
        {
            return redirect()->route('address.index');
        }

        $regions = Region::select('id', 'place')->orderBy('place', 'asc')->get();

        return view('user.settings.address.create')->withRegions($regions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = Auth::user()->profile;

        if($profile->address()->first())
        {
            return redirect()->route('address.index');
        }

        $validation = $this->validator($request->all())->validate();

        if($validation)
        {
            return $validation;
        }

        $address = $profile->address()->create([
            'region_id' => $request['region'],
            'place_id' => $request['place'],
            'address' => $request['address'],
        ]);

        $profile->address_id = $address->id;
        $profile->uap_number = $request['uap_number'];
        $profile->phone_number = $request['phone_number'];
        $profile->save();

        return redirect()->route('address.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        $regions = Region::select('id', 'place')->orderBy('place', 'asc')->get();
        $places = $this->ajaxCities($address->region_id);

        return view('user.settings.address.edit')->with([
                    'address' => $address, 
                    'regions' => $regions,
                    'places' => $places,
                    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $validation = $this->validator($request->all())->validate();

        if($validation)
        {
            return $validation;
        }
        $address->region_id = $request['region'];
        $address->place_id = $request['place'];
        $address->address = $request['address'];

        $address->save();

        return redirect()->route('address.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }

    public function ajaxCities($region_id)
    {
        return $regions = Place::select('places.id', 'places.place', 'c.id as p_id', 'c.place as p_place')
                        ->leftJoin('places as c', 'c.id', '=', 'places.sirsup')
                        ->whereIn('places.sirsup', Place::select('places.id')
                            ->where('places.sirsup', $region_id)
                            ->get()
                        )
                        ->orderBy('places.fsl', 'asc')->get();
    }


    /**
     * Get a validator for an incoming address request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'region' => 'required|numeric',
            'place' => 'required|numeric',
            'address' => 'required|max:190',
            'uap_number' => 'nullable|numeric|unique:profiles|digits:6',
            'phone_number' => 'nullable|numeric|unique:profiles|digits:10',
        ]);
    }
}
