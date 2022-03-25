<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Helpers\Wallet as HelpersWallet;
use App\QueryBuilder\TransactionQueryBuilder;
use App\Services\Auth\AuthorizationService;

class TransactionController extends Controller
{
    public function index(Request $request) {
        AuthorizationService::hasPermissionTo("can_read_transactions");
        $transactions = TransactionQueryBuilder::filterIndex($request)->paginate(20)->appends($request->query());
        $sn = $transactions->firstItem();
        $types = [
            Constants::CREDIT_TRANSACTION,
            Constants::DEBIT_TRANSACTION
        ];
        return view("dashboards.admin.transactions.index", compact('transactions', 'sn' , 'types'));
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

    public function status(Request $request)
    {
        AuthorizationService::hasPermissionTo("can_edit_transactions");
        $status = $request->status;
        $transaction = Transaction::findOrFail($request->id);

        if (in_array($transaction->status, [Constants::PENDING])) {
            if (!in_array($status, [Constants::COMPLETED])) {
                return back()->with("error_message", "Allowed status is Completed!");
            }

            if($transaction->type == Constants::CREDIT_TRANSACTION){
                HelpersWallet::credit(
                    Constants::WALLET_DEFAULT,
                    $transaction->user,
                    $transaction->amount,
                    $transaction->description,
                    Constants::COMPLETED,
                    true,
                    false
                );
            }
        }

        if (in_array($transaction->status, [Constants::COMPLETED])) {
            return back()->with("error_message", "You cannot modify a completed request!");
        }

        $transaction->update([
            "status" => $status,
        ]);

        return back()->with("success_message", "Status updated successfully!");
    }

}
