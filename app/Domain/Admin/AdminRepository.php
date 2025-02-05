<?php

namespace App\Domain\Admin;

interface AdminRepository
{
    public function create(Admin $admin);
    public function findByID(string $adminId);
}
