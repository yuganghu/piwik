<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 * @category Piwik
 * @package Updates
 */
use Piwik\Common;
use Piwik\Piwik_Updater;
use Piwik\Updates;

/**
 * @package Updates
 */
class Piwik_Updates_1_9_b19 extends Updates
{
    static function getSql($schema = 'Myisam')
    {
        return array(
            'ALTER TABLE  `' . Common::prefixTable('log_link_visit_action') . '`
			CHANGE `idaction_url_ref` `idaction_url_ref` INT( 10 ) UNSIGNED NULL DEFAULT 0'
            => false,
            'ALTER TABLE  `' . Common::prefixTable('log_visit') . '`
			CHANGE `visit_exit_idaction_url` `visit_exit_idaction_url` INT( 10 ) UNSIGNED NULL DEFAULT 0'
            => false
        );
    }

    static function update()
    {
        Piwik_Updater::updateDatabase(__FILE__, self::getSql());


        try {
            \Piwik\PluginsManager::getInstance()->activatePlugin('Transitions');
        } catch (Exception $e) {
        }
    }
}

