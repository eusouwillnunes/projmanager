<?php
/**
 * Created by PhpStorm.
 * User: willn
 * Date: 25/07/2016
 * Time: 20:51
 */

namespace ProjManager\Validators;


use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{
    protected $rules = [
      'name' => 'required|max:255',
      'responsible' => 'required|max:255',
      'email' => 'required|email',
      'phone' => 'required',
      'address' => 'required',
    ];
}