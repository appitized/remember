<?php

namespace Appitized\Remember\Controllers;

use Appitized\Remember\Requests\ForgotPassword;
use Illuminate\Support\Facades\Password;
use Api;

class ForgotPasswordController
{

    public function sendResetLinkEmail(ForgotPassword $request)
    {
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
          $request->only('email')
        );

        if ($response === Password::RESET_LINK_SENT) {
            return Api::withMessage(trans($response));
        }

        // If an error was returned by the password broker, we will get this message
        // translated so we can notify a user of the problem. We'll redirect back
        // to where the users came from so they can attempt this process again.
        return Api::withError(trans($response));
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }

}
