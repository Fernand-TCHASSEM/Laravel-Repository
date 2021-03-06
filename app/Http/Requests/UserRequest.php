<?php

namespace App\Http\Requests;

use App\Extensions\Requests\APIRequest;

class UserRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $verb = $this->method();
        if ($verb === 'POST') {
            $routeURI = $this->route()->uri;

            if ($routeURI === 'api/login') {
                return [
                    'email' => 'bail|required|email',
                    'password' => 'bail|required|string'
                ];
            } elseif ($routeURI === 'api/register') {
                return [
                    'name' => 'bail|required|string',
                    'email' => 'bail|required|email|unique:users,email',
                    'password' => 'bail|required|string',
                    'c_password' => 'bail|required|string|same:password'
                ];
            }
        }
        return [];
    }
}
