<?php
require 'inc/server.php';
if (!empty($_POST["keyword"])) {
    $query = select('*', 'document_found,claim', "doc_fullnames like '" . '%' . $_POST["keyword"] . "%' and doc_status='0' LIMIT 0,6");
    if (!empty($query) && $query) {
?>
        <table id="country-list" border="0">
            <?php
            foreach ($query as $product) {
            ?>
                <tr class="trs">

                    <td class="tds"><img class="searchProd" src="access/files/<?php echo $product['doc_photo'] ?>" alt=""></td>
                    <td class="tds"><a href="" class="liste"><?php echo textWrap($product["doc_fullnames"], 60) . '  ' . $product['doc_serialcode']; ?></a>
                        <?php
                        if (isset($_SESSION['clientIdLost'])) {
                        ?>
                            <br>
                            <button class="ClaimButton"><a href="claim?doc=<?php echo actor($product['doc_id']) ?>" style="color:#fff !important"> Claim Document</a< /button>
                                <?php } else { ?>
                                    <button class="ClaimButton"><a href="login" style="color:#fff !important">Login to Claim Document</a< /button>
                                        <?php } ?>

                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } else {
    ?>
        <table id="country-list" border="0">
            <tr class="trs">
                <td class="tds"></td>
                <td class="tds"><img src="assets/homepage/images/icons/sad.png" alt=""></td>
                <td class="tds">No results related to your search found</td>
            </tr>
        </table>
<?php }
} ?>