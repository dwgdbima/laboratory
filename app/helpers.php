<?php 

if(!function_exists('formatRupiah')) {
    function formatRupiah($data){
        return 'Rp.' . number_format($data,2,",",".");
    }
}