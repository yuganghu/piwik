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
class Piwik_Updates_0_2_37 extends Updates
{
    static function getSql($schema = 'Myisam')
    {
        return array(
            'DELETE FROM `' . Common::prefixTable('user_dashboard') . "`
				WHERE layout LIKE '%.getLastVisitsGraph%'
				OR layout LIKE '%.getLastVisitsReturningGraph%'" => false,
        );
    }

    static function update()
    {
        Piwik_Updater::updateDatabase(__FILE__, self::getSql());
    }
}
