<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 14:10
 */

namespace nains\model\entities;



use nains\model\VilleManager;

class Nain
{

    protected $id;
    protected $nom;
    protected $barbe;
    protected $groupe;
    protected $ville;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    // Hydratation
    public function hydrate(array $data){

        foreach ($data as $nain){
            foreach ($nain as $key => $val){
                $method = 'set' . ucfirst($key);

                if (method_exists($this, $method)){
                    $this->$method($val);
                }
            }
        }
    }



    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $barbe
     */
    public function setBarbe($barbe)
    {
        $this->barbe = $barbe;
    }

    /**
     * @param mixed $groupe
     */
    public function setGroupe($groupe)
    {
        $this->groupe = $groupe;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        // faire un new VilleManager, aller cherche les info de la ville dans la db
        // et hydrater entitees Ville et la stoker dans $ville

        $manager = new VilleManager();
        $data = $manager->getVilleInfo($ville);
        $this->ville = $data;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getBarbe()
    {
        return $this->barbe;
    }

    /**
     * @return mixed
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }




}