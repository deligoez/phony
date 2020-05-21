<?php

it('throws exception if file not found', function () {
    (new \Phonyland\Phony('invalid-locale'))->alphabet->uppercase_letter;
})->throws(RuntimeException::class);
