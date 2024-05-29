<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstallationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'app_name'              => 'required|string|max:50',
            'environment'           => 'required|string|max:50',
            'app_debug'             => 'required|boolean',
            'app_log_level'         => 'required|string|max:50',
            'app_url'               => 'required|url',
            'database_connection'   => 'required|string|max:50',
            'database_hostname'     => 'required|string|max:50',
            'database_port'         => 'required|numeric',
            'database_name'         => 'required|string|max:50',
            'database_username'     => 'required|string|max:50',
            'database_password'     => 'required|string|max:50',
            'broadcast_driver'      => 'required|string|max:50',
            'cache_driver'          => 'required|string|max:50',
            'session_driver'        => 'required|string|max:50',
            'queue_driver'          => 'required|string|max:50',
            'redis_hostname'        => 'required|string|max:50',
            'redis_password'        => 'required|string|max:50',
            'redis_port'            => 'required|numeric',
            'mail_driver'           => 'required|string|max:50',
            'mail_host'             => 'required|string|max:50',
            'mail_port'             => 'required|string|max:50',
            'mail_username'         => 'required|string|max:50',
            'mail_password'         => 'required|string|max:50',
            'mail_encryption'       => 'required|string|max:50'
        ];
    }
}
