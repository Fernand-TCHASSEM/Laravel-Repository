<?php

namespace App\Http\Requests;

use App\Extensions\Requests\APIRequest;
use App\Rules\SlugCheck;


class FilmRequest extends APIRequest
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
            'name' => ['bail', 'required', 'string', 'max:255', 'unique:films,name', new SlugCheck],
            'description' => 'bail|string',
            'release_date' => 'bail|required|date',
            'rating' => 'bail|required|numeric|in:1, 2 ,3 ,4 ,5',
            'ticket_price' => 'bail|required|numeric|min:0.1',
            'country' => 'bail|required|string',
            'photo' => 'bail|required|string',
            'genres' => 'bail|required|array',
            'genres.*' => 'bail|required|numeric|distinct|exists:genres,id'
        ];
    }
}
