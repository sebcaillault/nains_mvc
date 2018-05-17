<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 14:01
 */

namespace nains\model;

class TaverneManager extends HomepageManager
{

    /**
     * @param int $v_id
     * @return array|null
     */
    public function getTavernesInCity(int $v_id) : ? array
    {

        $sql = 'SELECT `t_nom`, `t_id`  FROM `taverne` INNER JOIN `ville` ON `t_ville_fk` = `v_id` WHERE `v_id` = :v_id';

        return DBManager::getInstance()->makeSelect($sql, [':v_id' => $v_id]);
    }

    /**
    * Récupération des infos sur la taverne
    * @param  int   $t_id [description]
    * @return array       [description]
    */
    public function getTaverneInfo( int $t_id) : ? array
    {

      $sql = 'SELECT `ville`.*, `n_nom` FROM `ville` INNER JOIN `nain` ON `v_id` = `n_ville_fk` WHERE `v_id` = :v_id';

      return DBManager::getInstance()->makeSelect($sql, [':v_id' => $v_id]);

    }

    /**
     * infos sur la taverne pour la page Taverne.php
     * @param  int   $t_id [description]
     * @return array       [description]
     */
    public function tavernePageInfo(int $id) : array {
      $sql = 'SELECT `taverne`.*, `v_nom`, (`t_chambres` - COUNT(`n_id`)) AS `chambresLibres`
              FROM `taverne`
              LEFT JOIN ville ON t_ville_fk = v_id
              LEFT JOIN `group` ON `t_id`=`g_taverne_fk`
              LEFT JOIN `nain` ON `g_id`=`n_groupe_fk`
              WHERE t_id = :id
              GROUP BY `t_id`';

      return DBManager::getInstance()->makeSelect($sql, [':id' => $id]);
    }



}
