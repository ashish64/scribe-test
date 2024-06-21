<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @responseField type string Description of the user object.
     * @responseField id int id of the user object.
     * @responseField attributes.name string name of the user
     * @responseField attributes.email string email of the user
     * @responseField attributes.emailVerifiedAt string emailVerifiedAt of the user
     * @responseField attributes.createdAt string createdAt of the user
     * @responseField attributes.updatedAt string updatedAt of the user
     * @responseField  attributes.cases object array of related cases for the user
     * @responseField links.self string resource endpoint of the specific user
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            'type' => 'user',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'email' => $this->email,
                'emailVerifiedAt' => $this->email_verified_at,
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at,
                'cases' => LegalCasesResource::collection($this->whenLoaded('legalCases')),
            ],
            'links' => [
                'self' => route('users.show', ['user' => $this->id])
            ]
        ];
    }
}
