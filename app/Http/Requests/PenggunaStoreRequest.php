<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PenggunaStoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::user()->level->id == 1)
            return true;
        else
            return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username'      => 'required|min:3|max:10|unique:user',
            'password'      => 'required|min:6',
            'confirmation'  => 'required|same:password',
            'nama'          => 'required',
            'jawatan'       => 'required',
            'cawangan_id'   => 'required',
            'level_id'      => 'required'
        ];
    }
}
