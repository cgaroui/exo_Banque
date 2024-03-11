
<?php

class Titulaire{
    private string $nom;
    private string $prenom;
    private DateTime $dateNaissance;
    private string $ville;
    private array $comptes;

    public function __construct(string $nom, string $prenom, string $dateNaissance, string $ville )
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = new datetime ($dateNaissance); //on accorde a la chaine de caracteres dateNaissance un type datetime (format de date )
        $this->ville = $ville;
        $this->comptes = [];    //declaration d'un tableau vide qu'on remplira par la suite 
        
    }

    public function getNom()
    {
        return $this->nom;
    }

   
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

  
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

   
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

 
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }


    public function getComptes()
    {
        return $this->comptes;
    }


    public function setComptes($comptes)
    {
        $this->comptes = $comptes;

        return $this;
    }

    public function getAge(){
        
        $today = new DateTime();                        //on initie la variable today à la date du jour actuel 
        $age = $today->diff($this->getDateNaissance());  // on calcul l'age à partir de la date actuel et la date de naissance qu'on recupére grace a getdateNaissance
        return $age->y;

    }

    public function addCompte(Compte $compte){ // fonction permettant d'ajouter à chaque fois un compte lié au meme titulaire à notre tableau de comptes 
        $this->comptes[] = $compte;
      
    }
    
    public function getInfos(){

        return "<h1>".$this->getNom()." ".$this->getPrenom()."</h1><br>"."né(e) le ".$this->getDateNaissance()->format("d-m-Y")." ".$this->getAge()."ans <br>".$this->getVille()."<br><h2>Liste des comptes</h2>".$this->afficherComptes();
    }
    
    public function afficherComptes(){
        $result = "<ul>";

        foreach($this->comptes as $compte){   
            $result .= "<li>$compte</li>";
        }
        $result .= "</ul>";
        return $result;
    }

    public function __toString()
    {
        return $this->nom." ".$this->prenom;    //permet d'afficher le nom et prenom ensembles 
    }
}