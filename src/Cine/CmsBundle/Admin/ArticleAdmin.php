<?php

namespace Cine\CmsBundle\Admin;

use Cine\CinemaBundle\Entity\CourtMetrage;
use Cine\CinemaBundle\Entity\Film;
use Cine\CinemaBundle\Entity\Serie;
use Cine\CinemaBundle\Service\CinemaManager;
use Cine\CinemaBundle\Service\CourtMetrageManager;
use Cine\CinemaBundle\Service\FilmManager;
use Cine\CinemaBundle\Service\SerieManager;
use DateTime;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ArticleAdmin extends Admin
{
    protected $securityContext;
    protected $filmManager;
    protected $serieManager;
    protected $courtMetrageManager;
    protected $cinemaManager;


    public function setSecurityContext($secu) {
        $this->securityContext = $secu;
    }
    
    public function setFilmManager(FilmManager $filmManager) {
        $this->filmManager = $filmManager;
    }
    
    public function setSerieManager(SerieManager $serieManager) {
        $this->serieManager = $serieManager;
    }
    
    public function setCourtMetrageManager(CourtMetrageManager $courtMetrageManager) {
        $this->courtMetrageManager = $courtMetrageManager;
    }
    
    public function setCinemaManager(CinemaManager $cinemaManager) {
        $this->cinemaManager = $cinemaManager;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $choices = $this->constructChoicesArray();

        $formMapper
            ->with('Général')
                ->add('cinema', 'choice', array(
                    'mapped' => false,
                    'choices' => $choices
                ))
                ->add('titre', null, array(
                    'label' => 'Titre de l\'article'
                ))
                ->add('contenu', 'textarea', array(
                    'label' => 'Avis',
                    'attr' => array(
                        'class' => 'ckeditor'
                    )
                ))
                ->add('bonsPoints', null, array(
                    'label' => 'Bons Points',
                    'required' => false
                ))
                ->add('mauvaisPoints', null, array(
                    'label' => 'Mauvais Points',
                    'required' => false
                ))
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('titre')
            ->add('auteur');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('titre')
            ->add('auteur');
    }

    public function getTemplate($name)
    {
        switch ($name) {
            case 'edit':
                return 'CineCmsBundle:Admin:edit.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    public function prePersist($object)
    {
        $cinema = $this->cinemaManager->getCinemaById($this->getForm()->get('cinema')->getData());

        $user = $this->securityContext->getToken()->getUser();
        $object->setDateCreation(new DateTime());
        $object->setAuteur($user);
        
        if ( $cinema instanceof Film ) {
            $object->setFilm($cinema);
        } elseif ($cinema instanceof Serie ) {
            $object->setSerie($cinema);
        } elseif ($cinema instanceof CourtMetrage ) {
            $object->setCourtMetrage($cinema);
        }
    }

    public function preUpdate($object)
    {
        $object->setDateModification(new DateTime());
    }
    
    private function constructChoicesArray() {
        $films = $this->filmManager->getAllFilms();
        if ( count($films) !== 0 ) {
            $listFilm = array();
            foreach ( $films as $film ) {
                $listFilm[$film->getId()] = $film->getTitre();
            }
            $choices['Films'] = $listFilm;
        }
        
        $series = $this->serieManager->getAllSeries();
        if ( count($series) !== 0 ) {
            $listSeries = array();
            foreach ( $series as $serie ) {
                $listSeries[$serie->getId()] = $serie->getTitre();
            }
            $choices['Series'] = $listSeries;
        }

        $courtMetrages = $this->courtMetrageManager->getAllCourtMetrages();
        if ( count($courtMetrages) !== 0 ) {
            $listCm = array();
            foreach ( $courtMetrages as $cm ) {
                $listCm[$cm->getId()] = $cm->getTitre();
            }
            $choices['Court métrage'] = $listCm;
        }
        
        return $choices;
    }
}