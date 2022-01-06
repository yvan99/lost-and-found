<?php

@$userSelect = select('*', 'client', "cli_id='$user'");
foreach ($userSelect as $key) {
    @$userStatus = $key['cli_status'];
    @$userToken  = $key['cli_token'];
}
if (@$userStatus != 1 && $userSelect) :
?>
    <script>
        window.location = 'verify?user=<?php echo actor(@$userToken) ?>';
    </script>
<?php endif;  ?>