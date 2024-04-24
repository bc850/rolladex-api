<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBusinessCardRequest;
use App\Http\Resources\BusinessCardsResource;
use App\Models\BusinessCard;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessCardsController extends Controller
{
    use HttpResponses;

    public $testVar = "this is a testVar";
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BusinessCardsResource::collection(
            BusinessCard::where('user_id', Auth::user()->id)->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBusinessCardRequest $request)
    {
        $request->validated($request->all());

        $business_card = BusinessCard::create([
            "user_id" => Auth::user()->id,
            "business_name" => $request->business_name,
            "contact_first_name" => $request->contact_first_name,
            "contact_middle_name" => $request->contact_middle_name,
            "contact_last_name" => $request->contact_last_name,
            "address_1" => $request->address_1,
            "address_2" => $request->address_2,
            "city" => $request->city,
            "state" => $request->state,
            "zip" => $request->zip,
            "phone_1" => $request->phone_1,
            "phone_2" => $request->phone_2,
            "fax" => $request->fax,
            "email" => $request->email,
            "email_2" => $request->email_2,
            "website" => $request->website,
            "picture_url" => $request->picture_url,
            "industry" => $request->industry,
            "sub_industry" => $request->sub_industry,
            "notes" => $request->notes
        ]);

        return new BusinessCardsResource($business_card);
    }

    /**
     * Display the specified resource.
     */

     // changing show(string $id) to the entire resource
     // Laravel knows there's an id coming in, let it search through the business cards for that id
     // Also, $businesscard variable name has to be the exact same as the route {businesscard} uri
    public function show(BusinessCard $businesscard) {
        return $this->isNotAuthorized($businesscard) ?? new BusinessCardsResource($businesscard);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessCard $businesscard)
    {
        if(Auth::user()->id !== $businesscard->user_id) {
            return $this->error("", "You are not authorized to make this request", 403);
        }
        $businesscard->update($request->all());

        return new BusinessCardsResource($businesscard);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessCard $businesscard)
    {
        if(Auth::user()->id !== $businesscard->user_id) {
            return $this->error("", "You are not authorized to make this request", 403);
        }
        $name = $businesscard->business_name;
        $businesscard->delete();

        return $this->success("", "'{$name}' was successfully deleted.");
    }

    public function logout() {
        Auth::user()->currentAccessToken()->delete();

        return $this->success([
            "message" => "You have successfully logged out, and your token has been deleted."
        ]);
    }

    private function isNotAuthorized($businesscard) {
        if(Auth::user()->id !== $businesscard->user_id) {
            return $this->error("", "You are not authorized to make this request", 403);
        }
    }
}
