<?php

namespace App\Repositories\Organization;

use App\Models\Organization;
use App\Repositories\Organization\OrganizationInterface;
use Illuminate\Support\Facades\Auth;

class OrganizationRepository implements OrganizationInterface
{
    public function getAllOrganizations(){
        
    }
    public function getOrganizationById($organizationId)
    {
        return Organization::find($organizationId);
    }

    public function storeOrganization($data)
    {

        return Organization::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'organization_id' => Auth::user()->organization_id
        ]);
    }

    public function updateOrganization($organization, $data)
    {
        $organization->update($data);
    }

    public function deleteOrganization($organization)
    {
        $organization->delete();
    }
}
