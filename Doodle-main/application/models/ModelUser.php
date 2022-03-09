<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelUser extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function create_contact($data){
        return $this->db->insert('users', $data);
    }

    public function create_event($data){
        return $this->db->insert('sondage', $data);
    }

    public function validateEvent($data,$numUniSondage) {
        $this->db->where("numUniSondage", $numUniSondage);
        return $this->db->update('sondage', $data);
    }

    public function searchEvent($cle) {
        $sql = "SELECT debutDate, debutHeure, finDate, finHeure FROM sondage WHERE cleSondage = ?";
        $req = $this->db->query($sql, array($cle));

        $res =$req->result_array();

        return $res;
    }

    public function connexion($login, $mdp){

        /* récupération du mdpHash*/
        $sql = "SELECT * FROM users WHERE login = ?";
        $req = $this->db->query($sql, array($login));
        $res = $req->num_rows();

        if($res == 1) {
            $row = $req->row();
            $mdpHash = $row->mdp;
            $sql = "SELECT * FROM users WHERE login = ? AND mdp = ?";
            $req = $this->db->query($sql, array($login, $mdpHash));
            $res = $req->num_rows();
            if($res == 1) {
                if (password_verify($mdp, $mdpHash)) {
                    $row = $req->row();
                    $login = $row->login;
                    return $mdp;
                } else {
                    return "0";
                }
            } else {
                return "0";
            }
        } else {
            return "0";
        }
    }

    public function getNom ($login) {
        $sql = "SELECT nom FROM users WHERE login = ?";
        $req = $this->db->query($sql, array($login));
        $res = $req->num_rows();
        
        $row = $req->row();
        $nom = $row->nom;
        
        return $nom;
    }

    public function getPrenom ($login) {
        $sql = "SELECT prenom FROM users WHERE login = ?";
        $req = $this->db->query($sql, array($login));
        $res = $req->num_rows();

        $row = $req->row();
        $prenom = $row->prenom;

        return $prenom;
    }

    public function getPswdHash($login) {
        $sql = "SELECT mdp FROM users WHERE login = ?";
        $req = $this->db->query($sql, array($login));
        $res = $req->num_rows();
        
        $row = $req->row();
        $mdpHash = $row->mdp;
        
        return $mdpHash;
    }

    public function getFermerSondage($login) {
        $sql = "SELECT titre, cleSondage FROM sondage WHERE login = ?";
        $req = $this->db->query($sql, array($login));
        $res =$req->result_array();
        return $res;
    }

    public function setFermerSondage($cle,$fermeture) {
        $sql="UPDATE sondage  set etat=? WHERE cleSondage=?";
		return $this->db->query($sql,array($fermeture,$cle));
    }

    public function setVote($cle) {
        return $this->db->insert('vote', $cle);
    }

    public function updateVote($reponse, $numUniSondage) {
        $this->db->where("numUniSondage", $numUniSondage);
        return $this->db->update('vote', $reponse);
    }

    public function getNumUniSondage ($cle) {
        $sql = "SELECT numUniSondage FROM vote WHERE cleSondage = ?";
        $req = $this->db->query($sql, array($cle));
        $res =$req->result_array();
        return $res;
    }

    public function getMesSondages($login) {
        $sql = "SELECT titre, numUniSondage, debutDate, debutHeure, finDate, finHeure FROM sondage WHERE login = ?";
        $req = $this->db->query($sql, array($login));
        $res =$req->result_array();
        return $res;
    }

    public function getParticipantRep($cle) {
        $sql = "SELECT loginParticipant, reponse FROM vote WHERE numUniSondage = ?";
        $req = $this->db->query($sql, array($cle));
        $res =$req->result_array();
        return $res;
    }

    public function verifVote($login, $cle) {
        $sql = "SELECT * FROM vote WHERE loginParticipant = ? AND cleSondage = ?";
        $req = $this->db->query($sql, array($login, $cle));
        $res =$req->result_array();
        return $res;
    }

    public function verifCloseSondage($cle) {
        $sql = "SELECT etat FROM sondage WHERE cleSondage = ?";
        $req = $this->db->query($sql, array($cle));
        $res =$req->result_array();
        return $res;
    }
}