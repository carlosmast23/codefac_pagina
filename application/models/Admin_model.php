<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Admin_model extends CI_Model {
    public function todos($filtro)
    {
        $query='select 
        p.prv_ruc as ruc,
        p.prv_nombres as nombres,
        p.prv_apellidos as apellidos,
        p.prv_razonsocial as razonSocial,
        p.prv_email AS email,
        p.prv_tipolicencia AS tipoLicencia,
        p.prv_fecha_maxima_pago AS fechaPago,
        p.prv_valor AS valor,
        p.prv_modulos As modulos,
        cast(p.prv_fecharegistro as date) as fechaRegistro
    FROM 
        proveedores p
    WHERE
        p.prv_ruc like "%'.$filtro.'%" or
        p.prv_nombres like "%'.$filtro.'%" or
        p.prv_apellidos like "%'.$filtro.'%" or
        p.prv_razonsocial like "%'.$filtro.'%" or
        p.prv_email like "%'.$filtro.'%" ; ';


        $result = $this->db->query($query);

            //$result = $this->db->get('producto_venta');
        return $result;
            //return $this->db->get('post');
    }
}
?>