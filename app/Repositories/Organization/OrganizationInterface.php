<?php

namespace App\Repositories\Organization;


interface OrganizationInterface {
    public function getAllOrganizations();
    public function getOrganizationById($todoId);
    public function storeOrganization($data);
    public function updateOrganization($todo, $data);
    public function deleteOrganization($todo);
}