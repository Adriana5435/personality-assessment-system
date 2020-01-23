<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Questionnaire;
use App\Submit;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PaymentController extends Controller
{
    /**
     * Display the payment factor view.
     *
     * @param Questionnaire $questionnaire
     * @return View
     */
    public function factor(Questionnaire $questionnaire) : View
    {
        return view('front.payment.factor', compact('questionnaire'));
    }

    /**
     * Redirect to the payment gateway for payment processing.
     *
     * @param Questionnaire $questionnaire
     * @return RedirectResponse
     */
    public function redirect(Questionnaire $questionnaire): RedirectResponse
    {
        try {
            $submit = Submit::create([
                'user_id' => auth()->id(),
                'questionnaire_id' => $questionnaire->id,
            ]);

            $gateway = \Gateway::make('zarinpal');

            $gateway->setCallback(route('front.payment.callback', $submit->id));
            $gateway->price($questionnaire->price)->ready();
            $gateway->setDescription($questionnaire->title);

            $refId = $gateway->refId(); // Bank reference number
            $transID = $gateway->transactionId(); // Transaction ID

            $submit->update([
                'gateway_transaction_id' => $transID,
            ]);

            return $gateway->redirect();

        } catch (\Exception $e) {
            // Handle any exceptions and show an error message.
            return redirect()->route('front.payment.factor', $questionnaire)->with('error', $e->getMessage());
        }
    }

    /**
     * Handle the payment callback after successful payment.
     *
     * @param Submit $submit
     * @return RedirectResponse
     */
    public function callback(Submit $submit): RedirectResponse
    {
        try {
            $gateway = \Gateway::verify();
            $trackingCode = $gateway->trackingCode();
            $refId = $gateway->refId();
            $cardNumber = $gateway->cardNumber();

            // Update the submit status to Paid
            $submit->update(['status' => Submit::Paid]);

            return redirect(route('front.questionnaire.show', [$submit->questionnaire->id, $submit->id]))
                ->with('status', 'Payment successful. Your tracking code is ' . $trackingCode . '. You can now proceed to take the test.');

        } catch (\Larabookir\Gateway\Exceptions\RetryException $e) {
            // Handle retry exceptions and show appropriate message.
            return redirect()->route('front.payment.factor', $submit->questionnaire->id)->with('error', $e->getMessage());

        } catch (\Exception $e) {
            // Handle other exceptions and show error message.
            return redirect()->route('front.payment.factor', $submit->questionnaire->id)->with('error', $e->getMessage());
        }
    }
}
