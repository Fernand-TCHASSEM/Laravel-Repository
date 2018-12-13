<?php

namespace App\Http\Requests;

use App\Extensions\Requests\APIRequest;

class CommentRequest extends APIRequest
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
        return [
            'content' => 'bail|required|string',
            'film_id' => 'bail|required|numeric|exists:films,id'
        ];
    }
}
