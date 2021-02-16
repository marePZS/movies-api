<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueWithReleaseDate;

class CreateMovieRequest extends FormRequest
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

    private $genres = ['action', 'comedy', 'drama', 'race'];
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=> ['required', 'string' , new UniqueWithReleaseDate($this->release_date)],
            //'title' => 'required|string',
            'director' =>'required|string',
            'imageUrl'=>'required|url',
            'duration'=>'required|integer|min:0',
            'genre'=> 'required|string|in:', implode(',', $this->genres),
            'release_date'=>'required|date',
        ];
    }
}
