<?php


namespace App\Imports;


class EntretienDetails
{
    private $date;
    private $code;
    private $sexe;
    private $profession;
    private $region;
    private $age;
    private $typeActivite;
    private $typeEntretien;
    private $statut;
    private $condomMasculin;
    private $condomFeminin;
    private $referer;

    function __construct( $date, $code, $sexe, $profession, $region, $age, $typeActivite,
                          $typeEntretien, $statut, $condomMasculin, $condomFeminin, $referer ) {
        $this->date = $date;
        $this->code = $code;
        $this->sexe = $sexe;
        $this->profession = $profession;
        $this->region = $region;
        $this->age = $age;
        $this->typeActivite = $typeActivite;
        $this->typeEntretien = $typeEntretien;
        $this->statut = $statut;
        $this->condomMasculin = $condomMasculin;
        $this->condomFeminin = $condomFeminin;
        $this->referer = $referer;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    /**
     * @return mixed
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * @param mixed $profession
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getTypeActivite()
    {
        return $this->typeActivite;
    }

    /**
     * @param mixed $typeActivite
     */
    public function setTypeActivite($typeActivite)
    {
        $this->typeActivite = $typeActivite;
    }

    /**
     * @return mixed
     */
    public function getTypeEntretien()
    {
        return $this->typeEntretien;
    }

    /**
     * @param mixed $typeEntretien
     */
    public function setTypeEntretien($typeEntretien)
    {
        $this->typeEntretien = $typeEntretien;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    /**
     * @return mixed
     */
    public function getCondomMasculin()
    {
        return $this->condomMasculin;
    }

    /**
     * @param mixed $condomMasculin
     */
    public function setCondomMasculin($condomMasculin)
    {
        $this->condomMasculin = $condomMasculin;
    }

    /**
     * @return mixed
     */
    public function getCondomFeminin()
    {
        return $this->condomFeminin;
    }

    /**
     * @param mixed $condomFeminin
     */
    public function setCondomFeminin($condomFeminin)
    {
        $this->condomFeminin = $condomFeminin;
    }

    /**
     * @return mixed
     */
    public function getReferer()
    {
        return $this->referer;
    }

    /**
     * @param mixed $referer
     */
    public function setReferer($referer)
    {
        $this->referer = $referer;
    }


}