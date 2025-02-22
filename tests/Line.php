<?php

use Termwind\Enums\Color;
use function Termwind\{line};

it('adds font bold', function () {
    $line = line('string');

    $line = $line->fontBold();

    expect($line->toString())->toBe('<bg=default;options=bold>string</>');
});

it('adds underline', function () {
    $line = line('string');

    $line = $line->underline();

    expect($line->toString())->toBe('<bg=default;options=underscore>string</>');
});

it('adds padding left', function () {
    $line = line('string');

    $line = $line->pl2();

    expect($line->toString())->toBe('<bg=default;options=>  string</>');
});

it('adds padding right', function () {
    $line = line('string');

    $line = $line->pr2();

    expect($line->toString())->toBe('<bg=default;options=>string  </>');
});

it('adds horizontal padding', function () {
    $line = line('string');

    $line = $line->px2();

    expect($line->toString())->toBe('<bg=default;options=>  string  </>');
});

it('adds background color', function () {
    $line = line('string');

    $line = $line->bg('red');

    expect($line->toString())->toBe('<bg=red;options=>string</>');
});

it('adds background color using color enum', function () {
    $line = line('string');

    $line = $line->bg(Color::RED_400);

    expect($line->toString())->toBe('<bg=#f87171;options=>string</>');
});

it('adds text color', function () {
    $line = line('string');

    $line = $line->textColor('red');

    expect($line->toString())->toBe('<bg=default;fg=red;options=>string</>');
});

it('adds text color using color enum', function () {
    $line = line('string');

    $line = $line->textColor(Color::RED_400);

    expect($line->toString())->toBe('<bg=default;fg=#f87171;options=>string</>');
});

it('truncates', function () {
    $truncated = line('string string');
    $normal = line('string string');

    $truncated = $truncated->truncate(5);
    $line = $normal->truncate(5);

    expect($truncated->toString())->toBe('<bg=default;options=>st...</>');
    expect($line->toString())->toBe('<bg=default;options=>st...</>');
});

it('adds width', function () {
    $truncated = line('string string');
    $normal = line('string');

    $truncated = $truncated->width(10);
    $line = $normal->width(10);

    expect($truncated->toString())->toBe('<bg=default;options=>string str</>');
    expect($line->toString())->toBe('<bg=default;options=>string    </>');
});

it('adds margin left', function () {
    $line = line('string');
    $lineWithBackground = line('string')->bg('white');

    $line = $line->ml2();
    $lineWithBackground = $lineWithBackground->ml2();

    expect($line->toString())->toBe('  <bg=default;options=>string</>');
    expect($lineWithBackground->toString())->toBe('  <bg=white;options=>string</>');
});

it('adds margin right', function () {
    $line = line('string');
    $lineWithBackground = line('string')->bg('white');

    $line = $line->mr2();
    $lineWithBackground = $lineWithBackground->mr2();

    expect($line->toString())->toBe('<bg=default;options=>string</>  ');
    expect($lineWithBackground->toString())->toBe('<bg=white;options=>string</>  ');
});

it('adds horizontal margin', function () {
    $line = line('string');
    $lineWithBackground = line('string')->bg('white');

    $line = $line->mx2();
    $lineWithBackground = $lineWithBackground->mx2();

    expect($line->toString())->toBe('  <bg=default;options=>string</>  ');
    expect($lineWithBackground->toString())->toBe('  <bg=white;options=>string</>  ');
});

it('sets the text uppercase', function () {
    $line = line('string');

    $line = $line->uppercase();

    expect($line->toString())->toBe('<bg=default;options=>STRING</>');
});

it('sets the text lowercase', function () {
    $line = line('STRing');

    $line = $line->lowercase();

    expect($line->toString())->toBe('<bg=default;options=>string</>');
});

it('sets the text in titlecase', function () {
    $line = line('STRING titlecase');

    $line = $line->titlecase();

    expect($line->toString())->toBe('<bg=default;options=>String Titlecase</>');
});

it('sets the text in snakecase', function () {
    $line = line('SnakeCase snakeCase snakeCASE SNAKECase');

    $line = $line->snakecase();

    expect($line->toString())->toBe('<bg=default;options=>snake_case snake_case snake_case snake_case</>');
});
