<?php
session_start();
session_destroy();
echo ("<script LANGUAGE='JavaScript'>
            window.alert('Log Out');
            window.location.href = 'dashboardAdmin.php?page=logout';
        </script>");
