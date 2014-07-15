<?php if (!defined('APPLICATION')) exit;

$PluginInfo['livereload'] = array(
    'Name'        => "LiveReload",
    'Description' => "A simple LiveReload client plugin for Vanilla.",
    'Version'     => '1.0.0',
    'PluginUrl'   => 'https://github.com/kasperisager/vanilla-livereload',
    'Author'      => "Kasper Kronborg Isager",
    'AuthorEmail' => 'kasperisager@gmail.com',
    'AuthorUrl'   => 'https://github.com/kasperisager',
    'License'     => 'MIT'
);

/**
 * LiveReload Plugin
 *
 * @author    Kasper Kronborg Isager <kasperisager@gmail.com>
 * @copyright 2014 (c) Kasper Kronborg Isager
 * @license   MIT
 * @since     1.0.0
 */
class LivereloadPlugin extends Gdn_Plugin {
    /**
     * Add LiveReload snippet to all front-facing pages.
     *
     * @since  1.0.0
     * @access public
     * @param  Gdn_Controller $sender
     * @return void
     */
    public function base_render_before($sender) {
        if (inSection('Dashboard')) {
            return;
        }

        // Configuration options
        $host = c('livereload.host', 'localhost');
        $port = c('livereload.port', 35729);

        $sender->addJsFile('http://'.$host.':'.$port.'/livereload.js');
    }
}
