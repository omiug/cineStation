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
        
        $disabled = false;
        if ( $this->getSubject()->getId() ) {
            $disabled = true;
        }
        
        $formMapper
            ->with('Général', array('class' => 'col-xs-9 col-sm-9 col-md-9'))
                ->add('cinema', 'choice', array(
                    'mapped' => false,
                    'choices' => $choices,
                    'disabled' => $disabled
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
            ->end();
        
        $bonPoints = $this->getSubject()->getBonsPoints();
        $formMapper
            ->with('Mes bons points', array('class' => 'col-xs-3 col-sm-3 col-md-3'));
            for ($i=0; $i<5; $i++) {
                $formMapper
                    ->add('bonsPoint_' . $i, 'text', array(
                        'mapped' => false,
                        'label' => false,
                        'required' => false,
                        'attr' => array(
                            'placeholder' => 'Bon point ' . intval($i +1),
                        ),
                        'data' => isset($bonPoints[$i]) ? $bonPoints[$i] : ''
                    ));
            }
        $formMapper
            ->end();

        $mauvaisPoints = $this->getSubject()->getMauvaisPoints();
        $formMapper
            ->with('Mes mauvais points', array('class' => 'col-xs-3 col-sm-3 col-md-3'));
            for ($i=0; $i<5; $i++) {
                $formMapper
                    ->add('mauvaisPoint_' . $i, 'text', array(
                        'mapped' => false,
                        'label' => false,
                        'required' => false,
                        'attr' => array(
                            'placeholder' => 'Mauvais point ' . intval($i +1),
                        ),
                        'data' => isset($mauvaisPoints[$i]) ? $mauvaisPoints[$i] : ''
                    ));
            }
        $formMapper
            ->end()
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
        
        $bonPoints = array();
        $mauvaisPoints = array();
        for ($i=0; $i<5; $i++) {
            $data = $this->getForm()->get('bonsPoint_' . $i)->getData();
            if ( $data ) {
                $bonPoints[] = $data;
            }

            $data = $this->getForm()->get('mauvaisPoint_' . $i)->getData();
            if ( $data ) {
                $mauvaisPoints[] = $data;
            }
        }
        
        $object->setBonsPoints($bonPoints);
        $object->setMauvaisPoints($mauvaisPoints);
    }

    public function preUpdate($object)
    {
        $object->setDateModification(new DateTime());

        $bonPoints = array();
        $mauvaisPoints = array();
        for ($i=0; $i<5; $i++) {
            $data = $this->getForm()->get('bonsPoint_' . $i)->getData();
            if ( $data ) {
                $bonPoints[] = $data;
            }

            $data = $this->getForm()->get('mauvaisPoint_' . $i)->getData();
            if ( $data ) {
                $mauvaisPoints[] = $data;
            }
        }
        
        $object->setBonsPoints($bonPoints);
        $object->setMauvaisPoints($mauvaisPoints);        
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