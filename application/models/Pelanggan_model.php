<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

    public function all()
   {
      $result = $this->db->get('pelanggan');
      return $result;
   }

   public function semuaBarang()
   {
      $result = $this->db->get('barang');
      return $result;
   }

   public function detailPelanggan($id)
   {
      $this->db->select('*');
      $this->db->from('users');
      $this->db->join('barang', 'users.user_code = barang.user_code');
      $this->db->where('barang.id', $id);

      $query = $this->db->get();
      return $query;
   }

   public function getBarangLainnya($id){
    $user = $this->detailPelanggan($id)->row();
    // echo "<pre>"; print_r($user->user_code); die;

      $this->db->select('*');
      $this->db->from('barang');
      $this->db->join('users', 'barang.user_code = users.user_code');
      $this->db->where('users.user_code', $user->user_code);
      $result = $this->db->get();
      // echo "<pre>"; print_r($result->result()); die;
      return $result;
   }

    public function listBarangLainnya($id){
        $user = $this->detailPelanggan($id)->row();

        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('user_code',$user->user_code);
        $link = $this->db->get();
        return $link;
    }

    public function find($id)
   {
      $row = $this->db->where('id',$id)->limit(1)->get('pelanggan');
      return $row;
   }

    public function detailBarang($id)
   {
      $data = $this->db->where('id',$id)->limit(1)->get('barang');
      return $data;
   }

    public function createPelanggan($data)
   {
      try{
         $this->db->insert('pelanggan', $data);
         return true;
      }catch(Exception $e){
         echo $e->getMessage();
      }
   }

    public function createBarang($data)
   {
      try{
         $this->db->insert('barang', $data);
         return true;
      }catch(Exception $e){
         echo $e->getMessage();
      }
   }

   public function update($id, $data)
   {
      try{
         $this->db->where('id',$id)->limit(1)->update('pelanggan', $data);
         return true;
      }catch(Exception $e){
         echo $e->getMessage();
      }
   }

   public function delete($id)
   {
      try {
         $this->db->where('id',$id)->delete('pelanggan');
         return true;
      }

      //catch exception
      catch(Exception $e) {
        echo $e->getMessage();
      }
   }

   public function getUser($id){
      $data = $this->db->where('id', $id)->limit(1)->get('users');
      return $data;
   }
}