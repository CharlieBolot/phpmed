<?php
  require_once 'inc/header.php';
  $page=explode("?",strtolower($_SERVER['REQUEST_URI']));
  

  $page = explode('/', $page[0]);
  

  if($page[2] === 'connexion'){
    if(empty($page[3])){
      require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'acceuil.php';
    }
    elseif($page[3] === 'patient'){
      if(empty($page[4])){
        require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'patient'.DIRECTORY_SEPARATOR.'patientcon.php';
      }          
      elseif($page[4] === 'profil'){
        if(empty($page[5])){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'patient'.DIRECTORY_SEPARATOR.'patprofil.php';
        }
        elseif(($page[5]) === 'init'){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'patient'.DIRECTORY_SEPARATOR.'patprofil.php';
        }
        elseif(($page[5]) === 'connec'){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'function'.DIRECTORY_SEPARATOR.'connexion.php';
        }
        elseif(($page[5]) === 'newpat'){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'function'.DIRECTORY_SEPARATOR.'newpat.php';
        }
        elseif($page[5] === 'modif'){
          if(empty($page[6])){
            require_once 'connexion'.DIRECTORY_SEPARATOR.'function'.DIRECTORY_SEPARATOR.'update.php';
          }
          elseif($page[6] === 'update'){
            require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'patient'.DIRECTORY_SEPARATOR.'patprofil.php';
          }
        }
      }
      elseif($page[4] === 'dmdrdv'){
        if(empty($page[5])){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'patient'.DIRECTORY_SEPARATOR.'dmdrdv.php';
        }
        elseif($page[5] === 'create'){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'function'.DIRECTORY_SEPARATOR.'create.php';
        }
      }
      elseif($page[4] === 'calendrier'){
        if(empty($page[5])){
        require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'calendrier'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'calend.php';
        }
        elseif(($page[5]) === 'add'){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'calendrier'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'add.php';
        }
        elseif(($page[5]) === 'edit'){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'calendrier'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'edit.php';
        }
        elseif(($page[5]) === 'delete'){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'calendrier'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'delete.php';
        }
        elseif(($page[5]) === 'success'){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'calendrier'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'calend.php';
        }
      }
      else if($page[4] === 'wrong'){
        require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'patient'.DIRECTORY_SEPARATOR.'patientcon.php';
      }
      else if($page[4] === 'success'){
        require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'patient'.DIRECTORY_SEPARATOR.'patientcon.php';
      }   
    }
    elseif($page[3] === 'praticien'){
      if(empty($page[4])){
        require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'praticien'.DIRECTORY_SEPARATOR.'pratcon.php';
      }
      elseif($page[4] === 'connec'){
        require_once 'connexion'.DIRECTORY_SEPARATOR.'function'.DIRECTORY_SEPARATOR.'connexionprat.php';
      }
      elseif($page[4] === 'profil'){
        if(empty($page[5])){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'praticien'.DIRECTORY_SEPARATOR.'profil.php';
          }
          elseif(($page[5]) === 'fiche'){
            require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'praticien'.DIRECTORY_SEPARATOR.'fichepat.php';
          }
          elseif(($page[5]) === 'ordo'){
            require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'praticien'.DIRECTORY_SEPARATOR.'redacordo.php';
          }
          elseif(($page[5]) === 'redacordo'){
            require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'ordo'.DIRECTORY_SEPARATOR.'ordonnance.php';
          }
      }
      elseif($page[4] === 'wrong'){
        require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'praticien'.DIRECTORY_SEPARATOR.'pratcon.php';
      }
      elseif($page[4] === 'calendrier'){
        if(empty($page[5])){
        require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'calendrier'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'calend.php';
        }
        elseif(($page[5]) === 'add'){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'calendrier'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'add.php';
        }
        elseif(($page[5]) === 'edit'){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'calendrier'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'edit.php';
        }
        elseif(($page[5]) === 'delete'){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'calendrier'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'delete.php';
        }
        elseif(($page[5]) === 'success'){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'calendrier'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'calend.php';
        }
      }
      elseif($page[4] === 'mail'){
        require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'praticien'.DIRECTORY_SEPARATOR.'mail.php';
      }
      elseif($page[4] === 'recherchepatient'){
        if(empty($page[5])){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'function'.DIRECTORY_SEPARATOR.'rchpat'.DIRECTORY_SEPARATOR.'select.php';
        }
        elseif($page[5] === 'rch'){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'function'.DIRECTORY_SEPARATOR.'rchpat'.DIRECTORY_SEPARATOR.'select.php';
        }
        elseif($page[5] === 'rchspc'){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'function'.DIRECTORY_SEPARATOR.'rchpat'.DIRECTORY_SEPARATOR.'selectspc.php';
        }
        elseif($page[5] === 'fiche'){
          if(empty($page[6])){
            require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'praticien'.DIRECTORY_SEPARATOR.'profil.php';
          }
          elseif($page[6] === 'ordonnance'){
            require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'praticien'.DIRECTORY_SEPARATOR.'ordonnance.php';
          }      
        }
      }      
    }
    elseif($page[3] === 'admin'){
      if(empty($page[4])){
        require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'admin.php';
      }
      elseif($page[4] === 'calendrier'){
        if(empty($page[5])){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'calendrier.php';
        }
        elseif($page[5] === 'add'){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'calendrier'.DIRECTORY_SEPARATOR.'add.php';
        }
        elseif($page[5] === 'del'){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'calendrier'.DIRECTORY_SEPARATOR.'delete.php';
        }
        elseif($page[5] === 'update'){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'calendrier'.DIRECTORY_SEPARATOR.'update.php';
        }          
      }
      elseif($page[4] === 'recherchepatient'){
        if(empty($page[5])){
          require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'find.php';
        }
        elseif($page[5] === 'fiche'){
          if(empty($page[6])){
            require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'fichepatient.php';
          }
          elseif($page[6] === 'select'){
            require_once 'connexion'.DIRECTORY_SEPARATOR.'function'.DIRECTORY_SEPARATOR.'rchpat'.DIRECTORY_SEPARATOR.'select.php';
          }
          elseif($page[6] === 'update'){
            require_once 'connexion'.DIRECTORY_SEPARATOR.'function'.DIRECTORY_SEPARATOR.'rchpat'.DIRECTORY_SEPARATOR.'update.php';
          }
          elseif($page[6] === 'delete'){
            require_once 'connexion'.DIRECTORY_SEPARATOR.'function'.DIRECTORY_SEPARATOR.'rchpat'.DIRECTORY_SEPARATOR.'delete.php';
          }
          elseif($page[6] === 'dmdrdv'){
            if(empty($page[7])){
              require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'dmdrdv.php';
            }
            elseif($page[7] === 'create'){
              require_once 'connexion'.DIRECTORY_SEPARATOR.'function'.DIRECTORY_SEPARATOR.'create.php';
            }         
          }              
        }            
      }          
    }
   
  }
  
  elseif(empty($page[2])){
    require_once 'connexion'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'accueil.php';
  }
require_once 'inc'.DIRECTORY_SEPARATOR.'footer.php';
?>


