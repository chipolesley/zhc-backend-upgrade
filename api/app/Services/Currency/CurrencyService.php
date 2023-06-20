<?php
namespace App\Services\Currency;

class CurrencyService
{
    public function postCurrency($request)
    {
        $currency = new Currency();
        $currency->content = $request->input('content');
        $currency->save();
        return response()->json(['currency' => $currency], 201);
    }

    public function getCurrencies()
    {
        $currencies = Currency::all();
        $response = [
            'currencies' => $currencies
        ];
        return response()->json($response, 200);
    }

    public function getCurrency($currencyCurrencyID)
    {

        $currency = Currency::where('CurrencyID', '=', $CurrencyCurrencyID)->get();
        if ($currency) {
            return response()->json(['currency' => $currency], 200);


        }
        return response()->json(['message' => 'currency not found'], 404);


    }

    public function paginateCurrency($request)
    {

        $currCurrencyCurrencyID = $request->input('CurrencyCurrencyID');
        if($request->input('first')){
            $currency = Currency::OrderBy('CurrencyID','asc')->first();
        }else if($request->input('last')){
            $currency = Currency::OrderBy('CurrencyID','desc')->first();
        }else if($request->input('prior')){
            $currency = Currency::where('CurrencyID','<',$currCurrencyCurrencyID)->orderByDesc('CurrencyCurrencyID')->first();
        }else if($request->input('next')){
            $currency = Currency::where('CurrencyID','>',$currCurrencyCurrencyID)->orderBy('CurrencyCurrencyID','asc')->first();
        }else {
            $currency = Currency::where('CurrencyID', '=', $currCurrencyCurrencyID)->get();
        }
        if ($currency) {
            return response()->json(['currency' => $currency], 200);

        }
        return response()->json(['message' => 'currency not found'], 404);


    }

    public function putCurrency($request, $currencyCurrencyID)
    {
        $currency = Currency::where('CurrencyID','=',$CurrencyCurrencyID)->get();
        if (count($currency)!=0) {
            $currency->content = $request->input('content');
            $currency->save();
            return response()->json(['currency' => $currency], 200);

        }
        return response()->json(['message' => 'Document not found'], 404);

    }

    public function deleteCurrency($currencyCurrencyID)
    {
        $currency = Currency::where('CurrencyID','=',$CurrencyCurrencyID)->get();
        $currency->delete();
        return response()->json(['message' => 'Currency deleted'], 200);
    }
}
