<?php

namespace App\Services\DTO\Users;

use Spatie\LaravelData\Data;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Users\RegisterRequest;

class  CreateUserDTO extends Data
{
    public string $name;
    public ?int $age;
    public int $phone;
    public string $email;
    public string $password;

    public static function fromRequest(RegisterRequest $request): self
    {
        return self::from([
            'name' => $request->getName(),
            'age' => $request->getAge(),
            'phone' => $request->getPhone(),
            'email' => $request->getEmail(),
            'password' => Hash::make($request->getPassword()),
        ]);
    }
}
