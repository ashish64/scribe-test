<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\UserUpdateRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\LegalCase;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Request;


/**
 * @group User endpoints
 */
class UserController extends Controller
{
    //
    use ApiResponses;

    /**
     * List all users resource
     * @apiResourceCollection App\Http\Resources\V1\UserResource
     * @apiResourceModel App\Models\User paginate=5 with=legalCases
     * @apiResourceAdditional  App\Http\Resources\V1\LegalCasesResource
     * @authenticate
     *
     */
    public function index(): AnonymousResourceCollection
    {
        return UserResource::collection(User::with('legalCases')->paginate(5));
    }

    /**
     * Get a user resource
     * @param User $user
     * @apiResource App\Http\Resources\V1\UserResource
     * @apiResourceModel App\Models\User
     * @authenticated
     * @return UserResource
     */
    public function show(User $user) {
        return new UserResource($user->with('legalCases'));
    }

    /**
     * Update a User resource
     * @param UserUpdateRequest $userUpdateRequest
     * @apiResource App\Http\Resources\V1\UserResource
     * @apiResourceModel App\Models\User
     * @param User $user
     * @authenticated
     * @return UserResource
     */
    public function update(UserUpdateRequest $userUpdateRequest, User $user)
    {

        $user->update($userUpdateRequest->all());
        return new UserResource($user->with('legalCases'));
    }

    /**
     * Delete a user resource
     * @param User $user
     * @authenticated
     * @return JsonResponse
     */
    public function destroy(User $user) {
        $user->delete();
        return $this->accepted('User deleted successfully.', 202);
    }
}
