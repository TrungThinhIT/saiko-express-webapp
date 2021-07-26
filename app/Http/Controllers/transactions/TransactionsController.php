<?php

namespace App\Http\Controllers\transactions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->cookie('token') == "") {
            $request->session()->flash('login', 'Vui lòng đăng nhập lại');
            if ($request->wantsJson()) {
                return 401;
            }
            return redirect()->route('auth.index');
        }
        $data = $request->cookie('token');
        $data = unserialize($data);

        $token = $data['token_type'] . ' ' . $data['access_token'];

        $param_search_transactions = [
            'search' => 'user_id:' . $data['id'],
            'searchFields' => 'user_id:=',
            'orderBy' => 'created_at',
            'sortedBy' => 'desc',
            'page' => $request->page_transaction ?? 1,
        ];

        $transactions = Http::withHeaders([
            'Accept-Language' => 'vi',
            'Accept' => 'application/json',
            'Authorization' => $token,
        ])->get('http://accounting.tomonisolution.com:82/api/transactions', $param_search_transactions);

        $transactions = json_decode($transactions, true);
        if ($request->transaction) {
            return response()->json(['transactions' => $transactions]);
        }
        $data = array_merge($data, ['transactions' => $transactions]);
        return view('manager.transaction', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
