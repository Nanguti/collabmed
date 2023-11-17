<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrganizationResource;
use App\Models\Organization;
use App\Repositories\Organization\OrganizationRepository;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    protected $organizationRepository;

    public function __construct(OrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

    public function index()
    {
        $organizations = $this->organizationRepository->getAllOrganizations();
        return OrganizationResource::collection($organizations);
        

    }

    public function show(Organization $organization)
    {
        $organization = $this->organizationRepository->getOrganizationById($organization);
        return OrganizationResource::collection($organization);
    }

    public function store(Request $request)
    {
        
       $organization =  $this->organizationRepository->storeOrganization($request->all());
       return new OrganizationResource($organization);
        
    }

    public function update(Request $request, Organization $organization)
    {

        $this->organizationRepository->updateOrganization($organization, $request->all());
        return new OrganizationResource($organization);
        
    }

    public function destroy(Organization $organization)
    {
        $this->organizationRepository->deleteOrganization($organization);
        return response()->json(null, 204);
    }
}
