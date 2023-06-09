<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class MatchOldPassword implements Rule
{
    public function passes($attribute, $value)
    {
        return Hash::check($value,'password');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
         $msg= 'The : Attribute is match with old password!';
    }
}
