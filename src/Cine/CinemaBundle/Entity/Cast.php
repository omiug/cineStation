<?php
namespace Cine\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Cine\CinemaBundle\Repository\CastRepository")
 * @ORM\Table(name="cin_cast")
 * @UniqueEntity("pseudo")
 */
class Cast{

	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

	/**
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     */
    protected $nom; 

    /**
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="prenom", type="string", length=50, nullable=false)
     */
    protected $prenom;

    /**
     * @ORM\Column(name="pseudo", type="string", length=50, nullable=true)
     */
    protected $pseudo; 

    /**
     * @ORM\Column(name="dateNaissance", type="datetime", nullable=true)
     */
    protected $dateNaissance; 

    /**
     * @ORM\Column(name="nationalite", type="string", length=50, nullable=true)
     */
    protected $nationalite;

    /**
     * @ORM\OneToMany(targetEntity="Participant", mappedBy="cast")
     */
    protected $participants; 

    /**
     * @ORM\OneToMany(targetEntity="CastRecompense", mappedBy="cast", cascade={"persist"})
     */
    protected $castRecompenses;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media",  cascade={"persist"})
     */
    private $photo;

    public function __construct(){
        $this->participants = new ArrayCollection();
        $this->castRecompenses = new ArrayCollection();
    }

    public function __toString()
    {
        if ( $this->pseudo ) {
            return $this->pseudo;
        }

        return $this->nom . ' ' . $this->prenom;
    }

    public function getId() {
        return $this->id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    public function getPseudo() {
        return $this->pseudo;
    }

    public function setDateNaissance(\DateTime $dateNaissance=null) {
        $this->dateNaissance = $dateNaissance;
    }

    public function getdateNaissance() {
        return $this->dateNaissance;
    }

    public function setNationalite($nationalite) {
        $this->nationalite = $nationalite;
    }

    public function getNationalite() {
        return $this->nationalite;
    }

    public function setParticipants($participants){
        foreach ($participants as $membre) {
            $this->addParticipant($membre);
        }
    }
    public function getParticipants() {
        return $this->participants;
    }

    public function addParticipant(Participant $membre) {
        $this->participants = $membre;
    }

    public function removeParticipant(Participant $membre) {
        $this->participants->removeElement($membre);
    }

    public function setPhoto($media) {
        $this->photo = $media;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function setCastRecompenses($recompenses) {
        foreach ( $recompenses as $rec ) {
            $this->addCastRecompense($rec);
        }
    }

    public function getCastRecompenses() {
        return $this->castRecompenses;
    }

    public function addCastRecompense(CastRecompense $rec) {
        $this->castRecompenses[] = $rec;
    }

    public function removeCastRecompense(CastRecompense $rec) {
        $this->castRecompenses->removeElement($rec);
    }
}
