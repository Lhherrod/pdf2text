<?php

use Http\Forms\LoginForm;

test('example', function () {
    expect(true)->toBeTrue();
});

// password must be at least ten characters long
// test will fail as password requirements are not met.
it('login', function() {

    $form = LoginForm::validate($attributes = [
        'email' => 'example123@gmail.com',
        'password' => '123',
    ]);


    $result = $form->errors();

    expect($result)->toBeEmpty()->dd();
});