<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\QuoteRepository as QuoteRepository;

class QuoteController extends Controller
{
    private $quotes;

    /**
    * Constructor
    * @param Repository
    * @return void
    */
    public function __construct(QuoteRepository $quotes)
    {
        $this->middleware("auth");
        $this->quotes = $quotes;
    }

    /**
    * Get all data
    *
    * @return JSON
    */
    public function getAll()
    {
        $response = $this->quotes->getAll();
        return response()->json($response);
    }

    /**
    * Create quote
    *
    * @param Array
    * @return Response
    */
    public function create(Request $request)
    {
        $this->validate($request, [
            'quotes' => 'required',
            'user_id' => 'required',
            'tags' => 'required'
        ]);

        return $this->quotes->create($request->all());
    }
}
