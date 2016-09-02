<?php

namespace ProjManager\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{

    protected $rules = [
       'owner_id'=> 'required|numeric',
       'client_id'=> 'required|numeric',
       'name'=> 'required|min:10',
       'description'=> '',
       'progress'=> 'numeric',
       'status'=> 'numeric',
       'due_date'=> 'date'
   ];
}
