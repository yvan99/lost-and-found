<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/lost-and-found/server/core/init.php';
if(!empty($_POST["keyword"])) {
$query = select('*','document_found',"doc_fullnames like '" .'%'. $_POST["keyword"] . "%' and doc_status='0'LIMIT 0,6");
if(!empty($query) && $query) {
?>
<table id="country-list" border="0">
<?php
foreach($query as $product) {
?>
<tr class="trs">

<td class="tds"><img class="searchProd" src="access/files/<?php echo $product['doc_photo']?>" alt=""></td>
<td class="tds"><a href="article?article=<?php echo actor($product['doc_id']); ?>" class="liste"><?php echo textWrap($product["doc_fullnames"],60).'  '.$product['doc_serialcode']; ?></a>
<br> <button href="" class="ClaimButton">Claim Document</button>
</td>
</tr>
<?php } ?>
</table>
<?php }
else  {
    ?>
<table id="country-list" border="0">
<tr class="trs">
<td class="tds"></td>
<td class="tds"><img src="assets/homepage/images/icons/sad.png" alt=""></td>
<td class="tds">No results related to your search found</td>
</tr>
</table>
<?php } } ?>

