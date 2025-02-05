<?php

namespace App\application\Admin;

use App\Domain\Admin\Admin;
use App\Domain\Admin\AdminRepository;

class RegisterAdmin
{
    protected AdminRepository $adminRepository;
    public function __construct(adminRepository $adminRepository)
    {
        return $this->adminRepository = $adminRepository;
    }

    public function create(
        string $adminId,
        string $firstName,
        string $lastName,
        string $branchName,
        string $address,
        string $email,
        string $password
    ) {
        $RecievedData = new Admin($adminId, $firstName, $lastName, $branchName, $address, $email, $password);
        return $this->adminRepository->create($RecievedData);
    }

    public function findByID(string $adminId)
    {
        return $this->adminRepository->findByID($adminId);
    }
}
