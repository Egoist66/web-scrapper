<?php
function json_link(string $path): string | null
{
    if(file_exists($path)){
        return file_get_contents($path);
    }
    return null;
}