<?php
class Penyewa_M076 extends Model
{
    function datapenyewa()
    {
        $dtpenyewa = $this->db->prepare(
            "SELECT user_plg076, Sandi076, Nik076, nm_lngkp076, no_hp076,
            almt_lngkp076, ft_ktp, ft_sim_a FROM penyewa"
        );

        $dtpenyewa->execute();
        return $dtpenyewa->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}