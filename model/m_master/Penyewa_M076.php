<?php
class Penyewa_M076 extends Model
{
    function datapenyewa()
    {
        $dtpenyewa = $this->db->prepare(
            "SELECT user_plg076, Sandi076, Nik076, nm_lngkp076, no_hp076,
            almt_lngkp076, ft_ktp076, ft_sim_a076 FROM penyewa"
        );

        $dtpenyewa->execute();
        return $dtpenyewa->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function cekuser($user_plg)
    {
        $sql = $this->db->prepare(
            "SELECT user_plg076 FROM penyewa WHERE user_plg076 = ?"
        );

        $sql->bind_param("s", $user_plg);
        $sql->execute();

        $hasil = $sql->get_result();
        return $hasil->num_rows > 0;
    }

    public function simpan($data)
    {
        $sql = $this->db->prepare("INSERT INTO penyewa (
            user_plg076, Sandi076, Nik076, nm_lngkp076,
            no_hp076, almt_lngkp076, ft_ktp076, ft_sim_a076
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $sql->bind_param(
            "ssssssss",
            $data['user_plg076'],
            $data['Sandi076'],
            $data['Nik076'],
            $data['nm_lngkp076'],
            $data['no_hp076'],
            $data['almt_lngkp076'],
            $data['ft_ktp076'],
            $data['ft_sim_a076']
        );

        return $sql->execute();
    }

    public function detailpenyewa($user_plg)
    {
        $sql = $this->db->prepare(
            "SELECT user_plg076, Sandi076, Nik076, nm_lngkp076,
                    no_hp076, almt_lngkp076, ft_ktp076, ft_sim_a076
            FROM penyewa
            WHERE user_plg076 = ?"
        );

        $sql->bind_param("s", $user_plg);
        $sql->execute();

        return $sql->get_result()->fetch_assoc();
    }

    
    public function UbahDtPenyewa($data)
    {
        $sql = $this->db->prepare(
            "UPDATE penyewa SET
                Sandi076 = ?,
                Nik076 = ?,
                nm_lngkp076 = ?,
                no_hp076 = ?,
                almt_lngkp076 = ?,
                ft_ktp076 = ?,
                ft_sim_a076 = ?
            WHERE user_plg076 = ?"
        );

        $sql->bind_param(
            "ssssssss",
            $data['Sandi076'],
            $data['Nik076'],
            $data['nm_lngkp076'],
            $data['no_hp076'],
            $data['almt_lngkp076'],
            $data['ft_ktp076'],
            $data['ft_sim_a076'],
            $data['user_plg076']
        );

        return $sql->execute();
    }

    public function hapus($user_plg076)
    {
        $sql = $this->db->prepare(
            "DELETE FROM penyewa WHERE user_plg076 = ?"
        );

        $sql->bind_param("s", $user_plg076);

        return $sql->execute();
    }
}