<?php

namespace App\Controllers;


class User extends BaseController
{
public function index()
{

$data['title'] = ucfirst('user');


return  view('user_profile',$data);
}}