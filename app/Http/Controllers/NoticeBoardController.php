<?php

namespace App\Http\Controllers;

use App\Models\NoticeBoard;
use Illuminate\Http\Request;

class NoticeBoardController extends Controller
{
    public function index()
    {
        $notices = NoticeBoard::all();
        return view('notice_board.index', compact('notices'));
    }
    public function create()
    {
        return view('notice_board.create');
    }


    public function show($id)
    {
        $notice = NoticeBoard::findOrFail($id);
        return view('notice_board.show', compact('notice'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'views' => 'nullable|integer',
        ]);

        NoticeBoard::create($request->all());

        return redirect()->route('notice-board.index')->with('success', 'Notice added successfully!');
    }

    public function destroy($id)
{
    $notice = NoticeBoard::findOrFail($id);
    $notice->delete();

    return redirect()->route('notice-board.index')->with('success', 'Notice deleted successfully!');
}


    

}
