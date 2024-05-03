<?php
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'username',
    ];

    public function getLoginField($loginValue)
    {
        return filter_var($loginValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    }

    public function credentials(Request $request)
    {
        $loginField = $this->getLoginField($request->input($this->username()));

        return [
            $loginField => $request->input($this->username()),
            'password' => $request->input('password'),
            'active' => true, // Customize additional conditions if needed
        ];
    }
}
