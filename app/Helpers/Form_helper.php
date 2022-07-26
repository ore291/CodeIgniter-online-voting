<?php

use App\Libraries\Utils;

function display_form_errors($validation, $field)
{
    if($validation->hasError($field))
    {
        return $validation->getError($field);
    }
}

 function adminAuth()
    {
        if (Utils::adminCheck()) {
            return redirect()->to(base_url('login'))->with('fail', 'You are not an Admin');
        }
         return redirect()->to(base_url('admin'))->with('fail', 'You are not an Admin');;
    }