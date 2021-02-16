<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
    private $genres = ['action', 'comedy', 'race', 'drama'];
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=> 'sometimes|string' ,
            'director' =>'sometimes|string',
            'imageUrl'=>'sometimes|url',
            'duration'=>'sometimes|integer|min:0',
            'genre'=> 'sometimes|string|in:', implode(',', $this->genres),
            'release_date'=>'sometimes|date',
        ];
    }
}
