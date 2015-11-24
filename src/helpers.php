<?php

if (!function_exists('forum_url')) {
    /**
     * Generate a URL to Vanilla forum
     *
     * @param string $uri Title to slug
     *
     * @return string
     */
    function forum_url($uri = '')
    {
        return config('vanilla-integration.sso') . ((!empty($uri)) ? '?Target=/' . $uri : '');
    }
}
