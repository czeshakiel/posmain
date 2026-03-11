<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Applicant Dashboard</title>
    <link rel="icon" href="<?=base_url();?>design/assets/images/medmatrix-logo.png" type="image/x-icon"> <!-- Favicon-->
    <!-- plugin css file  -->
    <link rel="stylesheet" href="<?=base_url('design/assets/plugin/nestable/jquery-nestable.css');?>"/>
    <link rel="stylesheet" href="<?=base_url('design/assets/plugin/datatables/responsive.dataTables.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('design/assets/plugin/datatables/dataTables.bootstrap5.min.css');?>">
    <!-- project css file  -->
    <link rel="stylesheet" href="<?=base_url('design/assets/css/my-task.style.min.css');?>">
    <style>
        .sidebar {
            top: 0;
            left: 0;
            bottom: 0;
            transition: all 0.3s ease;
            }

            @media (max-width: 575.98px) {
            .sidebar {transform: translateX(-100%);}
            }

            .sidebar.open {
            transform: translateX(0);
            }

            .hamburger {
            display: none;
            }

            @media (max-width: 1275.99px) {
            .hamburger {
            display: block;
            position: fixed; /* Make the hamburger button fixed so it's always visible */
            top: 1rem;
            right: 1rem;
            z-index: 200; /* Set a higher z-index than the sidebar to make sure it's above it */
            padding: 0px;
            }
            }

            .hamburger{
            width: 50px;
            height: 50px;
            background-color: #6d2344;
            border-radius: 30%;
            color: #fff;
            text-align: center;
            font-size: 20px;
            line-height: 1;
            cursor: pointer;
            }

            /* .select2-container .select2-selection--single {
            font-size: 15px;
            }



            .tablex {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            

            }
            .tablex tr th,
            .tablex tr td {
            border-right: 1px solid #bbb;
            border-bottom: 1px solid #bbb;
            padding: 5px;
            text-align: left;
            
                font-family: Arial, Helvetica, sans-serif;
            }
            .tablex tr th:first-child,
            .tablex tr td:first-child {
            border-left: 1px solid #bbb;
            }
            .tablex tr th {

            border-top: 1px solid #bbb;
            text-align: left;
            }

            
            .tablex tr:first-child th:first-child {
            }

            
            .tablex tr:first-child th:last-child {
            }

            
            .tablex tr:last-child td:first-child {
            }

            
            .tablex tr:last-child td:last-child {
            }

            .modal-content .eight {
                background: darkmagenta;
                color: white;
                border-radius: 5px;
                transition: transform 300ms;
                width: 200px;
                height: auto;
                font-size: 1.5em;
                letter-spacing: 1px;
                font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }

            .modal-content .eight:hover {
                transform: scale(0.9);
                box-shadow: 0px 0px 0 4px #fff, 0px 0px 0 6px #bc00d8 ; background:rgb(205, 1, 202);
            } */
    </style>
</head>
<body>
<button class='hamburger' onclick='sbview();'><i class='icofont-navigation-menu'></i></button>
<div id="mytask-layout" class="theme-indigo">