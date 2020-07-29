<?php

namespace App\Http\Controllers;

use App\Model\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function getAll()
    {
        $todos = Note::all();

        return response()->json([
            'status' => 200,
            'message' => 'OK',
            'todos' => $todos
        ]);
    }
}
