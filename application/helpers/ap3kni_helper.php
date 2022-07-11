<?php

function  is_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('Auth');
    } else {
        $role_id = $ci->session->userdata('role');
        $menu = $ci->uri->segment(1); //getmenu controller
        $queryMenu = $ci->db->get_where('menu_user', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('akses_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('Auth/blocked');
        }
    }
}
