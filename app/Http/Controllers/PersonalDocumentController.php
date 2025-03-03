<?php

namespace App\Http\Controllers;

use App\Models\PersonalDocument;
use App\Models\User;
use Illuminate\Http\Request;

class PersonalDocumentController extends Controller
{
    protected $docs;
    protected $user;

    public function __construct(PersonalDocument $docs, User $user)
    {
        $this->docs = $docs;
        $this->user = $user;
    }

    public function index($userId)
    {
        if($user = $this->user->find($userId)){
            return redirect()->back();
        }
        $docs = $user->docs()->get();

        return view('users.index', compact('user', 'docs'));
    }
}
