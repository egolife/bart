<?php

namespace BatNorton\Http\Controllers;

use BatNorton\Http\Requests\SiteApplicationRequest;
use BatNorton\SiteApplication;
use Illuminate\View\View;

class SiteApplicationsController extends Controller
{
    const ALREADY_SENT_SESSION_KEY = 'site_application_sent';

    /**
     * Форма заявки на сайте
     *
     * @return View
     */
    public function create()
    {
        return view('site_applications.create')->with([
            'message_max_length'   => SiteApplicationRequest::MESSAGE_LENGTH,
            'previous_application' => SiteApplication::find(session(self::ALREADY_SENT_SESSION_KEY))
        ]);
    }

    /**
     * Сохранение заявки пользователя, удаление предыдущей (если есть)
     *
     * @param SiteApplicationRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SiteApplicationRequest $request)
    {
        if (session()->has(self::ALREADY_SENT_SESSION_KEY)) {
            SiteApplication::destroy(session(self::ALREADY_SENT_SESSION_KEY));
        }

        $application = SiteApplication::create([
            'message' => $request->message,
            'email'   => $request->email
        ]);

        session([self::ALREADY_SENT_SESSION_KEY => $application->id]);

        return back();
    }
}
