<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessCardsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => (string)$this->id,
            "attributes" => [
                "business_name" => $this->business_name,
                "contact_first_name" => $this->contact_first_name,
                "contact_middle_name" => $this->contact_middle_name,
                "contact_last_name" => $this->contact_last_name,
                "address_1" => $this->address_1,
                "address_2" => $this->address_2,
                "city" => $this->city,
                "state" => $this->state,
                "zip" => $this->zip,
                "phone_1" => $this->phone_1,
                "phone_2" => $this->phone_2,
                "fax" => $this->fax,
                "email" => $this->email,
                "email_2" => $this->email_2,
                "website" => $this->website,
                "picture_url" => $this->picture_url,
                "industry" => $this->industry,
                "sub_industry" => $this->sub_industry,
                "notes" => $this->notes,
                "created_at" => $this->created_at,
                "updated_at" => $this->updated_at
            ],
            "relationships" => [
                "id" => (string)$this->user->id,
                "user_name" => $this->user->name,
                "user_email" => $this->user->email
            ]
        ];
    }
}
