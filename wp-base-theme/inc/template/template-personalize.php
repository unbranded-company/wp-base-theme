<?php

function load_static($path ) {
    return get_template_directory_uri() . '/static/' . $path;
}

function load_module($path ) {
    return get_template_directory_uri() . '/node_modules/' . $path;
}
