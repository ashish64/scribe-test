<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\LegalCaseRequest;
use App\Http\Resources\V1\LegalCasesResource;
use App\Http\Resources\V1\UserResource;
use App\Models\LegalCase;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

/**
 * @group Legal cases endpoints
 */
class LegalCaseController extends Controller
{
    use ApiResponses;
    /**
     * Display a listing of the legal cases.
     * @apiResourceCollection App\Http\Resources\V1\LegalCasesResource
     * @apiResourceModel App\Models\LegalCase paginate=10
     */
    public function index()
    {
        //
        return LegalCasesResource::collection(LegalCase::all());
    }


    /**
     * Store a newly created legal case in database.
     * @apiResource App\Http\Resources\V1\LegalCasesResource
     * @apiResourceModel App\Models\LegalCase with=user
     */
    public function store(LegalCaseRequest $request)
    {
        //
        $case = LegalCase::create($request->all());

        return new UserResource($case->with('user'));
    }

    /**
     * Display the specified resource.
     * @apiResource App\Http\Resources\V1\LegalCasesResource
     * @apiResourceModel App\Models\LegalCase with=user
     * @param LegalCase $case
     */
    public function show(LegalCase $case)
    {
        //
        return new LegalCasesResource($case->with('user'));
    }

    /**
     * Update the specified legal case in database.
     * @apiResource App\Http\Resources\V1\LegalCasesResource
     * @apiResourceModel App\Models\LegalCase with=user
     * @param LegalCase $case
     */
    public function update(LegalCaseRequest $request, LegalCase $case)
    {
        //
        $case->update($request->validated());
        return (new LegalCasesResource($case->with('user')));
    }

    /**
     * Remove the specified legal case from database.
     * @param LegalCase $case
     */
    public function destroy(LegalCase $case)
    {
        //
        $case->delete();
        return $this->accepted("Case deleted successfully", 202);
    }
}
