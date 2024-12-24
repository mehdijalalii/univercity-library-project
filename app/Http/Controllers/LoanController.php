<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Member;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::query()
            ->with(['member', 'book'])
            ->get();

        return view('loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Member::all();
        $books = Book::query()
            ->where('is_borrowed', false)
            ->get();

        return view('loans.create', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
        ]);

        $book = Book::find($request->book_id);

        if ($book->is_borrowed) {
            return response()->json(['message' => 'Book is not available'], 400);
        }

        Loan::create([
            'member_id' => $request->member_id,
            'book_id' => $request->book_id,
            'due_date' => now()->addDays(7),
        ]);

        $book->update(['is_borrowed' => true]);

        return redirect('/loans')->with('success', 'loan added successfully!');
    }

    public function return(Request $request, Loan $loan)
    {
        if ($loan->is_returned) {
            return redirect()->route('loans.index')
                ->with('error', 'This book has already been returned.');
        }

        $loan->update(['is_returned' => true]);
        $loan->book->update(['is_borrowed' => false]);

        return redirect()->route('loans.index')
            ->with('success', 'Loan returned successfully!');
    }

}
