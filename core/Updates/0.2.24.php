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
class Piwik_Updates_0_2_24 extends Updates
{
    static function getSql($schema = 'Myisam')
    {
        return array(
            'CREATE INDEX index_type_name
                ON ' . Common::prefixTable('log_action') . ' (type, name(15))'                       => false,
            'CREATE INDEX index_idsite_date
                ON ' . Common::prefixTable('log_visit') . ' (idsite, visit_server_date)' => false,
            'DROP INDEX index_idsite ON ' . Common::prefixTable('log_visit')                         => false,
            'DROP INDEX index_visit_server_date ON ' . Common::prefixTable('log_visit')              => false,
        );
    }

    static function update()
    {
        Piwik_Updater::updateDatabase(__FILE__, self::getSql());
    }
}
