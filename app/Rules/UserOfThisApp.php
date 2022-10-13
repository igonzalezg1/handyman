<?php

namespace App\Rules;

use App\Models\TBUsuario;
use Illuminate\Contracts\Validation\Rule;

class UserOfThisApp implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $user = TBUsuario::query()
            ->where('id_usuario', $value)
            ->where('id_empresa', 14) //Multiserle
            ->first();

        if (!$user) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.user_of_this_app');
    }
}
