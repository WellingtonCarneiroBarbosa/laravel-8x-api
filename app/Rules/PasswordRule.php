<?php

namespace App\Rules;

use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Rule;

class PasswordRule implements Rule
{
    /**
     * The validation error message.
     *
     * @var string
     */
    public string $message = "Your password must contain:";

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
        $passes = true;

        if(Str::length($value) < 8) {
            $passes = false;
            $this->addExceptionToMessage(__('errors.password.length'));
        }

        if(! preg_match("/\d/", $value) > 0) {
            $passes = false;
            $this->addExceptionToMessage(__('errors.password.numbers'));
        }

        if(! preg_match("/[A-Z]/", $value) > 0) {
            $passes = false;
            $this->addExceptionToMessage(__('errors.password.uppercase'));
        }

        if(! preg_match("/[a-z]/", $value) > 0) {
            $passes = false;
            $this->addExceptionToMessage(__('errors.password.lowercase'));
        }

        if(! str_has_special_char($value)) {
            $passes = false;
            $this->addExceptionToMessage(__('errors.password.special_chars'));
        }

        return $passes;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }

    /**
     * Add an exception to message
     *
     * @param string $exception
     * @return void
     */
    protected function addExceptionToMessage(string $exception): void
    {
        $this->message = $this->message . " " . $exception;
    }
}
