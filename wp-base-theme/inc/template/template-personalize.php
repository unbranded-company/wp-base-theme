<?php

function get_static( $path ) {
    return get_template_directory_uri() . '/static/' . $path;
}
