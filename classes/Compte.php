<?php

class Compte{
    private string $libelle;
    private float $solde;
    private string $devise;
    private Titulaire $titulaire;

    public function __construct(string $libelle, float $solde, string $devise, Titulaire $titulaire)
    {
        $this->libelle = $libelle;
        $this->solde = $solde;
        $this->devise = $devise;
        $this->titulaire = $titulaire;
        $this->titulaire->addCompte($this);
    }



    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getSolde()
    {
        return $this->solde;
    }

  
    public function setSolde($solde)
    {
        $this->solde = $solde;

        return $this;
    }

    public function getDevise()
    {
        return $this->devise;
    }

   
    public function setDevise($devise)
    {
        $this->devise = $devise;

        return $this;
    }

    
    public function getTitulaire()
    {
        return $this->titulaire;
    }

    
    public function setTitulaire($titulaire)
    {
        $this->titulaire = $titulaire;

        return $this;

    }
    
  
    public function debiter($montant){

       return $this->solde -= $montant;

    }
    public function crediter($montant){

        return $this->solde += $montant;

    }
    public function virement(Compte $compteSible, float $montant){

        $this->debiter($montant);

        $compteSible->crediter($montant);
        
    }

    public function __toString()
    {
        return $this->libelle." ".$this->solde." ".$this->devise."<br>";
    }
  
}