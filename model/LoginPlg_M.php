<?php
class LoginPlg_M extends Model
{
    function DataPlg($email)
    {
        $dtadmin = $this->db->prepare("select user_plg076, Sandi076, nm_lngkp076
                                       from penyewa where user_plg076=?");
        $dtadmin->bind_param("s", $email);
        $dtadmin->execute();
        return $dtadmin->get_result()->fetch_assoc();
    }
}
