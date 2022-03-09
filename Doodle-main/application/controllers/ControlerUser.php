<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controlerUser extends CI_Controller {

    public function loadPageAccueil() {
        session_destroy();
		$this->load->view('accueil');
	}

	public function loadPageConnection() {
		$erreur = "";
        $data["valeur"] = $erreur;
        $this->load->view('connection',$data);
	}

	public function loadPageCreateCompte() {
		$this->load->view('createCompte');
	}

	public function loadPageConnect() {
        $this->load->view('accueilCompte');
	}



	public function loadCreeEvent() {
        $this->load->view('creeEvenement');
	}

    public function loadCreeEvent2() {
        $this->form_validation->set_rules('titreSondage', 'Titre du sondage', 'trim|required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('lieuSondage', 'Lieu de l\'évènement', 'required|trim|max_length[50]');
		$this->form_validation->set_rules('descripSondage', 'Description du sondage', 'trim|required|max_length[300]');
        $this->form_validation->set_rules('nbdate', 'Nombre de dates');

        $this->form_validation->set_message('is_unique', '{field} déjà utilisé.');
        $this->form_validation->set_message('required', '{field} doit etre rempli');
        $this->form_validation->set_message('min_length', '%s doit faire %s caractères minimum');
        $this->form_validation->set_message('max_length', '%s doit faire %s caractères maximum');

        if ($this->form_validation->run() === FALSE){
            $this->load->view('creeEvenement');

		} else {

            $titreSondage = $this->input->post('titreSondage');
			$lieuSondage = $this->input->post('lieuSondage');
			$descripSondage = $this->input->post('descripSondage');
            $nbDate = $this->input->post('nbdate');
            $_SESSION['nbDate'] = $nbDate;
            $cle=uniqid("", FALSE);
            

            $tabNumUniSondage=array();
            

            for ($i=0;$i<$nbDate;$i++) {
                
                $numUniSondage=uniqid("numSondage", FALSE);

                array_unshift($tabNumUniSondage,$numUniSondage);

                $data1=array(
                    'titre'=>$titreSondage,
                    'lieu'=>$lieuSondage,
                    'description'=>$descripSondage,
                    'cleSondage'=>$cle,
                    'login'=>$_SESSION['login'],
                    'numUniSondage'=>$numUniSondage
                );

                $data2=array(
                    'numUniSondage'=>$numUniSondage,
                    'cleSondage'=>$cle
                );
                $this->ModelUser->setVote($data2);
                $this->ModelUser->create_event($data1);
            }

            $_SESSION["tabNumUniSondage"] = $tabNumUniSondage;
            $_SESSION["cle"] = $cle;

            $data["nbDate"] = $nbDate;
            $this->load->view('creeEvenementsuite',$data);
        }
    }

    public function loadVoirSondage() {
        $login = $_SESSION['login'];
        $sondage = $this->ModelUser->getMesSondages($login);
        $tabParticipant=array();
        for($i=0;$i<count($sondage);$i++) {
            $participant = $this->ModelUser->getParticipantRep($sondage[$i]['numUniSondage']);
            array_unshift($tabParticipant,$participant);
        }

        $data["sondages"]=$sondage;
        $data["participant"]=$tabParticipant;
        $this->load->view('voirSondage',$data);
    }

    public function loadPageFermerSondage() {

        $titreSondage=$this->ModelUser->getFermerSondage($_SESSION['login']);
        $data["titres"]=$titreSondage;
        $this->load->view('FermerSondage',$data);
    }

    public function validateEvent() {

        $debutDate = $this->input->post('debutDate');
        $debutHeure = $this->input->post('debutHeure');
        $finDate = $this->input->post('finDate');
        $finHeure = $this->input->post('finHeure');

        $tabNumUniSondage=$_SESSION["tabNumUniSondage"];

        for ($i = 0 ; $i < $_SESSION['nbDate'] ; $i++) {

            $data=array(
                'debutDate'=>$debutDate[$i],
                'debutHeure'=>$debutHeure[$i],
                'finDate'=>$finDate[$i],
                'finHeure'=>$finHeure[$i]
            );

            $NumUniSondage=$tabNumUniSondage[$i];
            $this->ModelUser->validateEvent($data,$NumUniSondage);
        }

        $data['cle'] = $_SESSION['cle'];
        $this->load->view('showID',$data);

    }

	public function loadjoinEvent() {
		$this->load->view('joinEvent');
	}

    public function addVote() {
        $numUniSondage=$_SESSION['tabNumUniSondage'];

        $verifVote = $this->ModelUser->verifVote($_SESSION['login'],$_SESSION['cle']);
        $verifCloseSondage = $this->ModelUser->verifCloseSondage($_SESSION['cle']);


        if (empty($verifVote) && ($verifCloseSondage[0]['etat']=="0")) {
            

            for ($i=0;$i<$_SESSION['nbDateInvite'];$i++) {
                $data = array(
                    'reponse' => $this->input->post("bouton".$i),
                    'loginParticipant' => $_SESSION['login'],
                    'idVote' => uniqid("ID",FALSE)
                );
                $tab = $numUniSondage[$i]['numUniSondage'];
                $this->ModelUser->updateVote($data,$tab);
            }
            $this->load->view('accueilCompte');
        } else {

            $erreur = "Vous avez deja voté ou le sondage a été cloturé";
            $data["day"]=array();
            $data['erreur']=$erreur;
            $this->load->view('repJoinSondage', $data);
        }
    }

    public function closeSondage() {
        $fermeture="1";
        var_dump($_SESSION['closeSondage']);
        $this->ModelUser->setFermerSondage($_SESSION['closeSondage'],$fermeture);
        #$this->load->view('accueilCompte');
    }

    public function joinEvent() {
        $this->form_validation->set_rules('cle', 'Clé', 'trim|required');
        $this->form_validation->set_message('required', '{field} doit etre rempli');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('createCompte');
        } else {
            $cle = $this->input->post('cle');
            $_SESSION['cle']=$cle;
            $date = $this->ModelUser->searchEvent($cle);
            $numUniSondage = $this->ModelUser->getNumUniSondage($cle);
            $longeurDate=count($date);

            $_SESSION["tabNumUniSondage"] = $numUniSondage;
            
            $data["day"]=$date;
            $data["longueurTab"]=$longeurDate;
            $erreur="";
            $data["erreur"]=$erreur;


            $this->load->view('repJoinSondage',$data);

        }
    }

    public function create() {
        $this->form_validation->set_rules('nom', 'Nom', 'trim|required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('prenom', 'Prénom', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('login', 'Login', 'required|trim|is_unique[users.login]');
        $this->form_validation->set_rules('mdp', 'Mot de passe', 'required|trim|min_length[3]|max_length[30]');

        $this->form_validation->set_message('is_unique', '{field} déjà utilisé.');
        $this->form_validation->set_message('required', '{field} doit etre rempli');
        $this->form_validation->set_message('min_length', '%s doit faire %s caractères minimum');
        $this->form_validation->set_message('max_length', '%s doit faire %s caractères maximum');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('createCompte');

		} else {
            unset($_SESSION['login']);
            unset($_SESSION['nbDate']);
            unset($_SESSION['tabNumUniSondage']);
            unset($_SESSION['cle']);
            unset($_SESSION['nbDateInvite']);
            unset($_SESSION['nbDateInvite']);
            unset($_SESSION['closeSondage']);


            $nom = $this->input->post('nom');
			$prenom = $this->input->post('prenom');
			$email = $this->input->post('email');
            $mdpS = $this->input->post('mdp');
            $mdp = password_hash($mdpS, PASSWORD_DEFAULT);
            $login = $this->input->post('login');
            
            $_SESSION['login']=$login;
            

            $data=array(
                'nom'=>$nom,
                'prenom'=>$prenom,
                'email'=>$email,
                'login'=>$login,
                'mdp'=>$mdp,
            );

            if	($this->ModelUser->create_contact($data)) {
                $this->load->view('accueilCompte');
			}
        }
    }

    public function identification() {
        if(!isset($_SESSION)){
            session_start();
        }
        unset($_SESSION['login']);
        unset($_SESSION['nbDate']);
        unset($_SESSION['tabNumUniSondage']);
        unset($_SESSION['cle']);
        unset($_SESSION['nbDateInvite']);
        unset($_SESSION['nbDateInvite']);
        unset($_SESSION['closeSondage']);
        
        $login = $this->input->post('login');
        $mdp = $this->input->post('mdp');
        $_SESSION['login']=$login;
        $mdpHash = $this->ModelUser->connexion($login,$mdp);
        
        if ($mdpHash==="0") {
            $erreur = "Login ou MDP incorrect";
            $data["valeur"] = $erreur;
            
            $this->load->view('connection',$data);

        } else {
            $this->load->view('accueilCompte');
        }
    }
}