<?php

function slugify($input, $trimShortWords = true, $toLower = true)
{
    $shortWords = array(
        'to', 'the', 'and',
    );

    $input = preg_replace('/[\ \~\!\@\#\$\%\^&\*\(\)_\+\`\-\=\{\}\|\[\]\\\;\'\:\"\,\.\/\<\>\?\']/', '-', $input);

    foreach ($shortWords as $shortWord) {
        $input = str_replace($shortWord, '', $input);
    }

    while (preg_match('/--/', $input)) {
        $input = str_replace('--', '-', $input);
    }

    $input = $toLower === true ? strtolower($input) : $input;

    return trim($input, '-');
}
