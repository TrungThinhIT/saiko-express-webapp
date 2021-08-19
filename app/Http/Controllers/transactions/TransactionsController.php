<?php

namespace App\Http\Controllers\transactions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\shipments\ShipmentsController as ShipmenstController;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $token = $this->getToken($request);
        $user_id = $this->getUserId($request);

        $param_search_transactions = [
            'search' => 'user_id:' . $user_id,
            'searchFields' => 'user_id:=',
            'orderBy' => 'created_at',
            'sortedBy' => 'desc',
            'page' => $request->page_transaction ?? 1,
            'with' => 'type',
        ];

        //ajax
        if ($request->wantsJson()) {
            if ($request->type_transaction != "all" && $request->type_money != "all") {
                $param_search_transactions = [
                    'search' => 'user_id:' . $user_id . ';currency_id:' . $request->type_money . ';type_id:' . $request->type_transaction,
                    'searchFields' => 'user_id:=;currency_id:=;type_id:=',
                    'searchJoin' => 'and',
                    'orderBy' => 'created_at',
                    'sortedBy' => 'desc',
                    'page' => $request->page_transaction ?? 1,
                    'with' => 'type',
                ];
            }

            if ($request->type_money != "all" && $request->type_transaction == "all") {
                $param_search_transactions = [
                    'search' => 'user_id:' . $user_id . ';currency_id:' . $request->type_money,
                    'searchFields' => 'user_id:=;currency_id:=',
                    'searchJoin' => 'and',
                    'orderBy' => 'created_at',
                    'sortedBy' => 'desc',
                    'page' => $request->page_transaction ?? 1,
                    'with' => 'type',
                ];
            }

            if ($request->type_transaction != "all" && $request->type_money == "all") {
                $param_search_transactions = [
                    'search' => 'user_id:' . $user_id . ';type_id:' . $request->type_transaction,
                    'searchFields' => 'user_id:=;type_id:=',
                    'searchJoin' => 'and',
                    'orderBy' => 'created_at',
                    'sortedBy' => 'desc',
                    'page' => $request->page_transaction ?? 1,
                    'with' => 'type',
                ];
            }
        }
        // dd($param_search_transactions);
        $transactions = Http::withHeaders([
            'Accept-Language' => 'vi',
            'Accept' => 'application/json',
            'X-Firebase-IdToken' => $token,
        ])->get('https://dev-accounting.tomonisolution.com/api/transactions', $param_search_transactions);

        if ($request->wantsJson()) {
            if ($transactions->status() == 401) {
                $this->deleteSession();
                $this->deleteCookie();
                return response()->json(['code' => 401]);
            }
        }
        if ($transactions->status() == 401) {
            return redirect()->route('auth.logout');
        }

        $transactions = json_decode($transactions, true);
        if ($request->transaction) {
            return response()->json(['transactions' => $transactions]);
        }
        $data = ['transactions' => $transactions];

        return view('transactions.transaction', compact('data'));
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
    public function show($id, Request $request)
    {
        $token  = $this->getToken($request);
        $user_id = $this->getUserId($request);

        $header = [
            'Accept-Language' => 'vi',
            'Accept' => 'application/json',
            'X-Firebase-IdToken' => $token,
        ];
        $param = [
            'search' => 'user_id:' . $id,
            'searchFields' => 'user_id:=',
            'with' => 'currency',
        ];

        $getAccount = Http::withHeaders($header)->get('https://dev-accounting.tomonisolution.com/api/accounts', $param);
        if ($getAccount->status() == 401) {
            return redirect()->route('auth.logout');
        }
        $data = json_decode($getAccount->body(), true);
        $data = collect(['transactions' => $data]);
        return view('transactions.index', compact('data'));
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
