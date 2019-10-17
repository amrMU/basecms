<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ContactUsRequest;
class ContactUsController extends Controller
{
    public function store(ContactUsRequest $request)
    {

      return 'hi';
    }
}
