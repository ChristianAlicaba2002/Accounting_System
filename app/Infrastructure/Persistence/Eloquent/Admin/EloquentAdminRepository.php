<?php

namespace App\Infrastructure\Persistence\Eloquent\Admin;

use App\application\Admin\RegisterAdmin;
use App\Models\User;
use App\Domain\Admin\Admin;
use App\Domain\Admin\AdminRepository;

class EloquentAdminRepository implements AdminRepository
{
    public function create(Admin $admin)
    {
        $AdminModel = User::find($admin->getAdminId()) ?? new User;
        $AdminModel->adminId = $admin->getAdminId();
        $AdminModel->firstName = $admin->getFirstName();
        $AdminModel->lastName = $admin->getLastName();
        $AdminModel->branchName = $admin->getBranchName();
        $AdminModel->address = $admin->getAddress();
        $AdminModel->email = $admin->getEmail();
        $AdminModel->password = $admin->getPassword();
        $AdminModel->save();
    }

    public function findByID(string $adminId)
    {
        $AdminModel = User::where('adminId', $adminId)->first();

        if (!$AdminModel) {
            return null;
        } else {
            return new Admin(
                $AdminModel->adminId,
                $AdminModel->firstName,
                $AdminModel->lastName,
                $AdminModel->branchName,
                $AdminModel->address,
                $AdminModel->email,
                $AdminModel->password,
            );
        }
    }
}
