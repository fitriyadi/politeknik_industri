<?php
function label_status_pengajuan($jenis)
{
    switch ($jenis) {
        case 'Diajukan':
            return "<span class='badge badge-primary'>Diajukan</span>";
            break;

        case 'Diterima':
            return "<span class='badge badge-success'>Diterima</span>";
            break;

        case 'Ditolak':
            return "<span class='badge badge-danger'>Ditolak</span>";
            break;

        default:
            return "";
            break;
    }
}

function label_status_order($jenis)
{
    switch ($jenis) {
        case 'Persiapan Order':
            return "<span class='badge badge-secondary'>Persiapan Order</span>";
            break;

        case 'Order Diproses':
            return "<span class='badge badge-primary'>Order Diproses</span>";
            break;

        case 'Order Selesai':
            return "<span class='badge badge-success'>Order Selesai</span>";
            break;

        default:
            return "";
            break;
    }
}

function user_label_status_pengajuan($jenis)
{
    switch ($jenis) {
        case 'Diajukan':
            return "<span class='badge' style='background-color:blue;'>Diajukan</span>";
            break;

        case 'Diterima':
            return "<span class='badge' style='background-color:green;'>Diterima</span>";
            break;

        case 'Ditolak':
            return "<span class='badge' style='background-color:red;'>Ditolak</span>";
            break;

        default:
            return "";
            break;
    }
}

function user_label_status_order($jenis)
{
    switch ($jenis) {
        case 'Persiapan Order':
            return "<span class='badge' style='background-color:grey;'>Persiapan Order</span>";
            break;

        case 'Order Diproses':
            return "<span class='badge' style='background-color:blue;'>Order Diproses</span>";
            break;

        case 'Order Selesai':
            return "<span class='badge' style='background-color:green;'>Order Selesai</span>";
            break;

        default:
            return "";
            break;
    }
}
