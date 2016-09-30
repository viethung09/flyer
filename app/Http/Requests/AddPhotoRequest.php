<?php

namespace App\Http\Requests;

use Auth;
use App\Flyer;
use App\Http\Requests\Request;
use Illuminate\Contracts\Auth\Guard;

class AddPhotoRequest extends Request
{
    protected $guard;

    public function __construct(Guard $guard)
    {
        $this->guard = $guard;
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (! $this->guard->check()) {
            return false;
        }
        return Flyer::where([
            'zip' => $this->zip,
            'street' => $this->street,
            'user_id' => $this->user()->id
        ])->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'photo' => 'required|mimes:jpg,jpeg,png,bmp'
        ];
    }
}
