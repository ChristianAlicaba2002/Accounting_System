<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use LengthException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\application\Admin\RegisterAdmin;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    protected RegisterAdmin $registerAdmin;
    public function __construct(registerAdmin $registerAdmin)
    {
        return $this->registerAdmin = $registerAdmin;
    }

    public function CreateAdmin(Request $request)
    {
        Validator::make($request->all(), [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'branchName' => 'required|string',
            'address' => 'required|string',
            'email' => 'required',
            'password' => 'required|string',
            'confirmation_password' => 'required|string|same:password',
        ]);

        // dd($request->all());

        if (User::query()->where('branchName', $request->branchName)->exists()) {
            return redirect('/register')->with('branchNameExist', 'Branch Already used');
        }

        if (User::query()->where('email', $request->email)->exists()) {
            return redirect('/register')->with('emailExist', 'Email is already used');
        }
        if ($request->confirmation_password !== $request->password) {
            return redirect('/register')->with('passwordValidation', 'Password does not match');
        }

        if (strlen($request->password) < 8) {
            return redirect('/register')->with('passwordValidation', 'Password must be at least 8 characters');
        }

        if (strlen($request->password) > 16) {
            return redirect('/register')->with('passwordValidation', 'Password must be less than 16 characters');
        }

        if (!preg_match('/[A-Z]/', $request->password)) {
            return redirect('/register')->with('passwordValidation', 'Password must contain at least one uppercase letter');
        }

        if (!preg_match('/[a-z]/', $request->password)) {
            return redirect('/register')->with('passwordValidation', 'Password must contain at least one lowercase letter');
        }

        if (!preg_match('/[0-9]/', $request->password)) {
            return redirect('/register')->with('passwordValidation', 'Password must contain at least one number');
        }

        $id = $this->GetGenerateAdminID();

        $this->registerAdmin->create(
            $id,
            $request->firstName,
            $request->lastName,
            $request->branchName,
            $request->address,
            $request->email,
            $request->password,
        );

        return redirect('/')->with('registerd', 'Created Successfully');
    }


    public function GetGenerateAdminID(): string
    {
        do {
            $id = $this->GenerateRandomAdminID(6);
            // Check if the generated ID already exists
            $exists = $this->registerAdmin->findByID($id);
        } while ($exists !== null); // Ensure the ID is unique

        return $id;
    }

    public function GenerateRandomAdminID(int $length = 0): string
    {
        $result = substr(bin2hex(random_bytes(ceil($length / 2))), 0, $length);

        return $result;
    }

    public function LoginAdmin(Request $request)
    {
        // Validate and get the validation result
        $validator = Validator::make($request->all(), [
            'branchName' => 'required',
            'password' => 'required',
        ]);

        // 'remember' => 'nullable|boolean'


        // Check if validation fails
        if ($validator->fails()) {
            return redirect('/')->withErrors($validator)->withInput();
        }

        // $remember = (bool) $request->input('remember', false);

        // Attempt to authenticate with remember me
        if (Auth::attempt(['branchName' => $request->branchName, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect('/')->with('AccountFound', 'Welcome!!');
        }

        // Authentication failed
        return redirect('/')->with('notFound', 'Invalid credentials');
    }

    public function logoutAdmin(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
