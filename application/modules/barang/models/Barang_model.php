<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{
	public function all($id = 0)
	{
		$filter = 0;
		if (!empty($this->input->get('filter'))) {
			$filter = $this->input->get('filter');
		}
		if (!empty($filter) && !empty($id)) {
			$value = $this->db->get_where('barang',['suplayer_id' => $id, 'jenis'=>$filter])->result_array();
		}elseif (!empty($filter)) {
			$value = $this->db->get_where('barang',['jenis'=>$filter])->result_array();
		}elseif (!empty($id)) {
			$value = $this->db->get_where('barang',['suplayer_id'=>$id])->result_array();
		}else{
			$value = $this->db->get('barang')->result_array();
		}
		return $value;
	}
	public function upload($file = '', $mode = '')
	{
		if(!empty($file['tmp_name']))
		{
			$dir = FCPATH.'assets/images/modules/barang/';
			if(!is_dir($dir))
			{
				mkdir($dir, 0777);
			}
			if(copy($file['tmp_name'] , $dir.$_SESSION[str_replace('/','_',base_url().'_logged_in')]['username'].$mode.'.xlsx'))
			{
				return $_SESSION[str_replace('/','_',base_url().'_logged_in')]['username'].'.xlsx';
			}
		}
	}
	public function save_sortir()
	{
		$msg = [];
		if(!empty($this->input->post()))
		{
			$data = $this->input->post();
			$this->db->where('id',$data['id']);
			if($this->db->update('sub_barang',['sortir'=>$data['sortir']]))
			{
				$msg = ['status'=>'success', 'msg'=>'status berhasil dirubah'];
			}
		}
		if(!empty($id))
		{
			$msg['data'] = $this->db->get_where('sub_barang',['id'=>$data['id']])->row_array();
		}
		return $msg;
	}
	public function save($id = 0)
	{
		$msg = [];
		if(!empty($this->input->post()))
		{
			$msg = ['status'=>'danger', 'msg'=>'Barang gagal inputkan'];
			$data = $this->input->post();
			$kode = random_string('numeric', 3);
			$kode_induk = "ADC-".$kode;
			$harga_satuan = preg_replace('/\D/', '', $data['harga_satuan']);
			$barang_input = [
				'nama'     => $data['nama'],
				'kode'     => $kode_induk,
				'jenis'     => $data['jenis_barang'],
				'harga_satuan' => $harga_satuan,
				'jumlah' => $data['jumlah'],
				'keterangan' => $data['ket'],
				'sumber_dana' => $data['sd'],
				'suplayer_id' => $data['suplayer'],
				'date' => date('Y-m-d'),
			];
			// die;
			if(!empty($id))
			{
				$this->db->select('id');
				$exist = $this->db->get_where('barang', ['nama'=>$data['nama'], 'date'=>date('Y-m-d')])->row_array();
				$current_user = $this->db->get_where('barang', ['id'=>$id])->row_array();
				if($current_user['id'] == $exist['id'] || empty($exist))
				{
					$barang_input['kode'] = $current_user['kode'];
					$this->db->where('id',$id);
					if($this->db->update('barang',$barang_input))
					{
						$count = $this->db->get_where('sub_barang', ['barang_id'=>$id])->num_rows();
						$jumlah = 0;
						if ($count != $data['jumlah']) {
							if ($count <= $data['jumlah']) {
								$jumlah = $data['jumlah'] - $count;
								$single_kode = substr($current_user['kode'], 4) + $current_user['kode'];
								for ($x = 1; $x <= $jumlah; $x++) {
									$sub_barang_input = [
										'sortir'	=> 1,
										'barang_id'	=> $id,
										'single_kode' => $current_user['kode'] . $single_kode
									];
									$single_kode++;
									$this->db->insert('sub_barang',$sub_barang_input);
								}
								$tambah_jumlah = $count + $jumlah;
								$this->db->where('id',$id);
								$this->db->update('barang',['jumlah' => $tambah_jumlah]);
							}elseif ($count >= $data['jumlah']) {
								$this->db->where('id',$id);
								$this->db->update('barang',['jumlah' => $count]);
								return ['status'=>'info','msg'=>'mohon delete data dan ulangi masukkan data.'];
							}
						}
						$msg = ['status'=>'success', 'msg'=>'barang berhasil dirubah'];
					}
				}else{
					$msg['msgs'][] = 'Barang sudah di inputkan';
				}
			}else{
				$this->db->select('id');
				$exist = $this->db->get_where('barang', ['nama'=>$data['nama'], 'date'=>date('Y-m-d')])->row_array();
				if(empty($exist))
				{
					if($this->db->insert('barang',$barang_input))
					{
						$id_induk = $this->db->insert_id();
						for ($x = 1; $x <= $data['jumlah']; $x++) {
							$single_kode = substr($barang_input['kode'], 4);
							$sub_barang_input = [
								'sortir'	=> @$data['sortir'],
								'barang_id'	=> $id_induk,
								'single_kode' => $kode_induk . $single_kode
							];
							$this->db->insert('sub_barang',$sub_barang_input);
							$single_kode++;
						}
						$msg = ['status'=>'success', 'msg'=>'barang berhasil inputkan'];
					}
				}else{
					$msg['msgs'][] = 'Barang sudah di inputkan';
				}
			}
		}
		if(!empty($id))
		{
			$msg['data'] = $this->db->get_where('barang',['id'=>$id])->row_array();
		}
		return $msg;
	}
	public function delete($id=0)
	{
		if(!empty($id))
		{
			if($this->db->delete('barang', ['id'=>$id]))
			{
				return ['status'=>'success','msg'=>'data berhasil dihapus'];
			}else{
				return ['status'=>'danger','msg'=>'data gagal dihapus'];
			}
		}
	}	
}