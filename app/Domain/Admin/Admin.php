<?php

namespace App\Domain\Admin;

class Admin
{
    public function __construct(
        protected string $adminId,
        protected string $firstName,
        protected string $lastName,
        protected string $branchName,
        protected string $address,
        protected string $email,
        protected string $password
    ) {
        $this->adminId = $adminId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->branchName = $branchName;
        $this->address = $address;
        $this->email = $email;
        $this->password = $password;
    }

    public function getAdminId()
    {
        return $this->adminId;
    }
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function getLastName()
    {
        return $this->lastName;
    }
    public function getBranchName()
    {
        return $this->branchName;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
}
