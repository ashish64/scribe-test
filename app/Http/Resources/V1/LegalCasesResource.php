<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LegalCasesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @responseField type string Description of the user object.
     * @responseField id int id of the user object.
     * @responseField attributes.id int id of the legal case
     * @responseField attributes.user_id int id of related user legal case
     * @responseField attributes.status string id of the legal case
     * @responseField attributes.title string id of the legal case
     * @responseField attributes.description string id of the legal case
     * @responseField attributes.employee_id int id of related employee legal case
     * @responseField attributes.advisor_id int id of related advisor legal case
     * @responseField attributes.reference_id int id of related reference legal case
     * @responseField attributes.address string address of the legal case
     * @responseField attributes.metadata string metadata of the legal case
     * @responseField attributes.created_at string created_at of the legal case
     * @responseField attributes.user string creator of the legal case
     * @responseField links.self string created_at of the legal case
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);

        return [
            'type' => 'legalCase',
            'id' => $this->id,
            'attributes' => [
                "id" => $this->id,
                "user_id" => $this->user_id,
                "status" => $this->status,
                "title" => $this->title,
                "description" => $this->description,
                "employee_id" => $this->employee_id,
                "advisor_id" => $this->advisor_id,
                "reference_id" => $this->reference_id,
                "address" => $this->address,
                "metadata" => $this->metadata,
                "created_at" => $this->created_at,
                "updated_at" => $this->updated_at,
                $this->mergeWhen($request->routeIs('cases.*'), [
                    "user" => new UserResource($this->whenLoaded('user'))])
            ],
            'links' => [
                'self' => route('cases.show', ['case' => $this->id])
            ],
        ];
    }
}
