<?php


function CzyJestModul($nazwa)
{
    $wynik = false;
    if (function_exists('apache_get_modules'))
    {
         $wynik = in_array($nazwa, apache_get_modules());
    }
    else
    {
         ob_start();
        phpinfo(INFO_MODULES);
        $contents = ob_get_contents();
        ob_end_clean();
        $wynik = (strpos($contents, $nazwa) !== false);
    }
    return $wynik;
}

function CzyJestModRewrite()
{
    return CzyJestModul("mod_rewrite");
}

echo CzyJestModRewrite() ? "Jest mod_rewrite!" : "Nie ma mod_rewrite";


?>