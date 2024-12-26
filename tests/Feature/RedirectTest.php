<?php

test('Invalid URL redirects to welcome page', function () {
    $response = $this->get('/invalid%20url');

    $response->assertRedirect('/');
});
