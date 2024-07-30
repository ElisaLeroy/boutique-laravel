<?php
include 'header.php';
include 'data_base.php';
include 'clientsList.php';
?>
<div class="div_articles">
<h1 class="center_h">Liste des clients</h1>
</div>

<table>
<tr class="line">
                    <td class="title_case">Nom complet</td>
                    <td class="title_case">Id client</td>
                    <td class="title_case">Adresse</td>
                    <td class="title_case">Code postal</td>
                    <td class="title_case">Ville</td>
                </tr>

<?php 
        $objClients = new ClientsList($customers);
       
        foreach ($objClients->getClients() as $value) { 
            ?>
                <tr class="line">
                    <td class="case"><?php echo $value->getFirstName()?> <?php echo $value->getLastName()?> </td>
                    <td class="case"><?php echo $value->getId()?></td>
                    <td class="case"><?php echo $value->getAddress()?></td>
                    <td class="case"><?php echo $value->getCp()?></td>
                    <td class="case"><?php echo $value->getCity()?></td>
                </tr>
            <?php
        }
            ?>


</table>

