<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Admin_model extends CI_Model {

    public function construirQuery($filtro,$id,$filtroLicenciaPago,$filtroFechaPago)
    {
        $query='select 
        p.prv_id AS id,
        p.prv_ruc as ruc,
        p.prv_nombres as nombres,
        p.prv_apellidos as apellidos,
        p.prv_razonsocial as razonSocial,
        p.prv_email AS email,
        p.prv_tipolicencia AS tipoLicencia,
        p.prv_fecha_maxima_pago AS fechaPago,
        p.prv_valor AS valor,
        p.prv_modulos As modulos,
        p.prv_clave As clave,
        p.prv_licencia As licencia,
        p.prv_fecha_original_pago As fechaOriginalPago,
        p.prv_valor_adicional As valorAdicional,
        p.prv_numero_equipo As numeroEquipos,
        p.prv_observaciones As observaciones,
        cast(p.prv_fecharegistro as date) as fechaRegistro
    FROM 
        proveedores p';

        $query=$query.'
    WHERE
        ( p.prv_ruc like "%'.$filtro.'%" or
        p.prv_nombres like "%'.$filtro.'%" or
        p.prv_apellidos like "%'.$filtro.'%" or
        p.prv_razonsocial like "%'.$filtro.'%" or
        p.prv_email like "%'.$filtro.'%" )';

        if(!is_null($id))
        {
            $query=$query.' and p.prv_id='.$id.' ';
        }

        if(!is_null($filtroLicenciaPago))
        {
            $query=$query.' and p.prv_tipolicencia="'.$filtroLicenciaPago.'" ';
        }
        
        if(!is_null($filtroFechaPago))
        {
            $query=$query.' and p.prv_fecha_maxima_pago is not null ';
        }
        

        $query=$query.'
    ORDER BY
        p.prv_fecharegistro desc;';

        return $query;

    }

    public function todos($filtro,$filtroLicenciaPago,$filtroFechaPago)
    {
        $query=$this->construirQuery($filtro,NULL,$filtroLicenciaPago,$filtroFechaPago);


        $result = $this->db->query($query);

            //$result = $this->db->get('producto_venta');
        return $result;
            //return $this->db->get('post');
    }

    public function consultarPorId($id)
    {
        $queryStr=$this->construirQuery('',$id,NULL,NULL);
        $query=$this->db->query($queryStr);
        return $query->row_array();
    }

    public function editar($id,$nombres,$apellidos,$razonSocial,$email,$valor,$fechaPago,$tipoLicencia,$modulos,$licencia,$clave,$fechaOriginalPago,$valorAdicional,$numeroEquipos,$observaciones)
    {       
        //$fechaOriginalPago,$valorAdicional,$numeroEquipos,$observaciones
        if(empty($fechaPago))
        {
            $fechaPago=NULL;
        }
        $data = array(
            'prv_id' => $id,
            'prv_nombres' => $nombres,
            'prv_apellidos' => $apellidos,
            'prv_razonsocial' => $razonSocial,
            'prv_email'=>$email,
            'prv_valor'=>$valor,
            'prv_fecha_maxima_pago'=>$fechaPago,
            'prv_tipolicencia'=>$tipoLicencia,
            'prv_modulos'=>$modulos,
            'prv_licencia'=>$licencia,
            'prv_clave'=>$clave,
            'prv_fecha_original_pago'=>$fechaOriginalPago,
            'prv_valor_adicional'=>$valorAdicional,
            'prv_numero_equipo'=>$numeroEquipos,
            'prv_observaciones'=>$observaciones,
        );
        $this->db->where('prv_id', $id);
        return $this->db->update('proveedores', $data);
        
    }
}
?>