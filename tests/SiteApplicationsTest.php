<?php

use BatNorton\Http\Controllers\SiteApplicationsController;
use BatNorton\SiteApplication;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SiteApplicationsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function visitor_can_send_messages()
    {
        $email = 'test@mail.com';
        $message = 'Сообщение на сайте от пользователя test';
        $buttonText = 'Отправить';

        $this->visit('/')
            ->seePageIs(route('site-applications.create'))
            ->type($email, 'email')
            ->type($message, 'message')
            ->press($buttonText)
            ->seeInDatabase('site_applications', [
                'email'   => $email,
                'message' => $message
            ]);


    }

    /**
     * @test
     */
    public function visitor_can_have_only_one_message_in_database()
    {
        SiteApplication::truncate();
        factory(SiteApplication::class)->create();

        $email = 'test@mail.com';
        $message = 'Сообщение на сайте от пользователя test';
        $email2 = 'email2@mail.ru';
        $message2 = 'новое сообщение';
        $buttonText = 'Отправить';

        $this->visit(route('site-applications.create'))
            ->type($email, 'email')
            ->type($message, 'message')
            ->press($buttonText)
            ->seeInDatabase('site_applications', [
                'email'   => $email,
                'message' => $message
            ]);

        $this->visit(route('site-applications.create'))
            ->type($email2, 'email')
            ->type($message2, 'message')
            ->press($buttonText)
            ->seeInDatabase('site_applications', [
                'email'   => $email2,
                'message' => $message2
            ])
            ->dontSeeInDatabase('site_applications', [
                'email'   => $email,
                'message' => $message
            ]);

        $this->assertEquals(2, SiteApplication::count());
    }
}
