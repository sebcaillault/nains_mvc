<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 13:57
 */
namespace nains\controller\nain;

use nains\controller\coreController;
use nains\model\entities\Nain;
use nains\model\NainManager;

class NainController extends coreController
{
    public function __construct()
    {
        $this->className = 'nain';
    }



    public function getView($id)
    {
        $id = (int)$id;
        $manager = new NainManager();
        $nainData = new Nain($manager->getNain($id));
        $location = $manager->getVilleDepartArrivee($id);

        $this->showView($this->className, ['nain' => $nainData, 'depart' => $location[0], 'arrivee' => $location[1]]);

    }


}

/*
if (isset($_GET['choisir_nain'])) {

    $idNain = (int)$_GET['nain'];

    // Récuparation des infos sur le nain
    $info = getNainInfo($idNain);

    $villeDepartArrivee = getVilleDepartArriveeNain($info[0]['g_id']);

    $depart = "<a href='ville.php?v_id=".$villeDepartArrivee[0]['id']."'>".$villeDepartArrivee[0]['departArrivee']."</a>";
    $arrivee = "<a href='ville.php?v_id=".$villeDepartArrivee[1]['id']."'>".$villeDepartArrivee[1]['departArrivee']."</a>";

}

// Liste des groupes pour changement de group
if ($dataBase = connectDB()) {

    $req = $dataBase->query('SELECT `g_id` FROM `group` ORDER BY `g_id` ASC;');
    $data = $req->fetchAll(PDO::FETCH_ASSOC);

    $listeGroupes = '';
    foreach ($data as $g) {
        $listeGroupes .= "<option value='".$g['g_id']."' >".$g['g_id']."</option>";
    }
}

// Changer le nain de group
if (isset($_GET['change_groupe'])) {
    $idNain = (int)$_GET['id_nain'];
    $idGroupe = (int)$_GET['group'];

    changeGroupeNain($idNain, $idGroupe);

    // Récuparation des infos sur le nain
    $info = getNainInfo($idNain);

    $villeDepartArrivee = getVilleDepartArriveeNain($info[0]['g_id']);

    $depart = "<a href='ville.php?v_id=".$villeDepartArrivee[0]['id']."'>".$villeDepartArrivee[0]['departArrivee']."</a>";
    $arrivee = "<a href='ville.php?v_id=".$villeDepartArrivee[1]['id']."'>".$villeDepartArrivee[1]['departArrivee']."</a>";


    // Reaffichage de la page avec les infos à jour
    $info = getNainInfo($idNain);
    $msg='Changement effectué!';
    $msgClass='bg-success';
}*/