<?php
                session_start();
                require_once("include/fct.inc.php");
                require_once("include/class.pdogsb.inc.php");
                include ("vues/v_head.php");
                include("vues/v_entete.php");

                $pdo = PdoGsb::getPdoGsb();
                $estConnecte = estConnecte();
                include("vues/v_sommaire.php");
                if (!isset($_REQUEST['uc']) || !$estConnecte) {
                    $_REQUEST['uc'] = 'connexion';
                }
                $uc = $_REQUEST['uc'];
                switch ($uc) {
                    case 'connexion': {
                        include("controleurs/c_connexion.php");
                        break;
                    }
                    case 'gererFrais' : {
                        if($_SESSION['type']=='vis')
                        {
                            include("controleurs/c_gererFrais.php"); break;
                        }
                        else
                        {
                            echo "<div class='alert alert-danger'>Vous n'avez pas accès à cette page !</div>";
                        }
                        break;
                    }
                    case 'etatFrais' : {
                        if($_SESSION['type']=='vis')
                        {
                            include("controleurs/c_etatFrais.php"); break;
                        }
                        else
                        {
                            echo "<div class='alert alert-danger'>Vous n'avez pas accès à cette page !</div>";
                        }
                        break;
                    }
                    case 'validerFrais' : {
                        if($_SESSION['type']=='com')
                        {
                            include("controleurs/c_validerFrais.php"); break;
                        }
                        else
                        {
                            echo "<div class='alert alert-danger'>Vous n'avez pas accès à cette page !</div>";
                        }
                        break;
                    }
                    default : {
                        include("controleurs/c_connexion.php");
                    }
                }
                include ("vues/v_foot.php");
                ?>