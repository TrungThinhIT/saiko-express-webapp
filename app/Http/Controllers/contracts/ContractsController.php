<?php

namespace App\Http\Controllers\contracts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer_id = $this->getUserID($request);
        $token = $this->getToken($request);
        $header = [
            'Accept-Language' => 'vi',
            'Accept' => 'application/json',
            'X-Firebase-IDToken' => $token
        ];
        $params = [
            'search' => 'customer_id:' . $customer_id,
            'searchField' => '=',
            'orderBy' => 'created_at',
            'sortedBy' => 'desc',
            'page' => $request->page ?? 1,
        ];
        $send = Http::withHeaders($header)->get('https://dev-order.tomonisolution.com/api/contracts', $params);
        $data = json_decode($send->body(), true);
        if ($request->wantsJson()) {
            if ($send->status() == 401) {
                $this->deleteCookie();
                $this->deleteSession();
                return response()->json(['code' => 401]);
            }
            return response()->json(['list_contracts' => $data, 'code' => $send->status()]);
        }

        if ($send->status() == 401) {
            return redirect()->route('auth.logout');
        }


        $data = ['list_contracts' => $data, 'code' => $send->status()];
        return view('contract.index', compact('data'));
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

        return view('contract.detail');
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
