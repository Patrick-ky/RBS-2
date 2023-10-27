<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumber implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Remove non-numeric characters from the value
        $numericValue = preg_replace('/[^0-9]/', '', $value);

        // Check if the value contains exactly 10 digits
        return strlen($numericValue) === 10;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid 10-digit phone number.';
    }
}
