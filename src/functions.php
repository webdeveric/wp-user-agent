<?php

namespace webdeveric\WPUserAgent;

function useCustomUserAgent(array $args, $url)
{
    $args['user-agent'] = getCustomUserAgent();

    return $args;
}

function getCustomUserAgent()
{
    return \get_site_option(OPTION_NAME, '');
}

function getDefaultUserAgent()
{
    return ucwords( trim( \get_bloginfo('name') ) );
}

function filterCustomUserAgent($value)
{
    return $value ?: getDefaultUserAgent();
}

function activate()
{
    \add_site_option(OPTION_NAME, \get_site_option(OPTION_NAME));
}

function deactivate()
{
    \delete_site_option(OPTION_NAME);
}

function pluginMeta(array $meta, $file)
{
    if ($file === \plugin_basename(WP_USER_AGENT_FILE)) {
        $userAgent = getCustomUserAgent();

        if ($userAgent) {
            $meta[] = sprintf('User Agent: <code>%s</code>', $userAgent);
        }
    }

    return $meta;
}
