<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Movie;

class UniqueWithReleaseDate implements Rule
{   
    private $releaseDate;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    
    public function __construct($release_date)
    {
        $this->release_date = $release_date;
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
        return Movie::where($attribute, $value)
        ->where('release_date', $this->release_date)
        ->count() == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'A movie with this title and release date already exists.';
    }
}
