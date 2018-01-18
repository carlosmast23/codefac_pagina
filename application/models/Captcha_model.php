<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Captcha_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert_captcha($cap){
        //insertamos el captcha en la bd
        $data = array(
            'captcha_time' => $cap['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $cap['word']
            );
        $query = $this->db->insert_string('captcha', $data);
        $this->db->query($query);

    }

    public function remove_old_captcha($expiration){
        //eliminamos los registros de la base de datos cuyo 
        //captcha_time sea menor a expiration
        $this->db->where('captcha_time <',$expiration);
        $this->db->delete('captcha');

    }

    public function check($ip,$expiration,$captcha){
        //comprobamos si existe un registro con los datos
        //envíados desde el formulario
        $this->db->where('word',$captcha);
        $this->db->where('ip_address',$ip);
        $this->db->where('captcha_time >',$expiration);

        $query = $this->db->get('captcha');
        //devolvemos el número de filas que coinciden
        return $query->num_rows();
    }


    public function validate(){
    // First, delete old captchas
$expiration = time() - 7200; // Two hour limit
$this->db->where('captcha_time < ', $expiration)
->delete('captcha');

// Then see if a captcha exists:
$sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
$query = $this->db->query($sql, $binds);
$row = $query->row();

if ($row->count == 0)
    return false;
else
    return true;

}


}
