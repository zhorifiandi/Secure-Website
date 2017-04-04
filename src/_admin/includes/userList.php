<?php
include 'process/userListProcess.php';
if(getUserRole()==1){
?>
<div class="wrapper">
    <h1>User List</h1>
</div>
<div class="wrapper">
    <div id="listPost">
    <a href="<?php echo $base_url;?>">Back</a><br><br>
    <table border="1">
    <tr style="font-weight:bold">
                
                <td>Display Name</td>
                <td>Username</td>
                <td>Password Expiry  date</td>
                <td>Status</td>
                <td>Action</td>
                
    </tr>
        <?php
        
        foreach($rows as $row) {
            $userid = $row['user_id'];
            $name = $row['name'];
            $username = $row['username'];
            $passexp = date('d-M-Y', strtotime($row['passwd_expdate']));
            $status = $row['status'];
            
            echo '<form method="post" action="'.$base_url.'/userlist/process" onsubmit="return confirm(\'Anda yakin?\');">
            <input type="hidden" name="_token" value="'.$userid.'" />
            <input type="hidden" name="_track" value="'.$status.'" />
            <tr>                
                <td>'.$name.'</td>
                <td>'.$username.'</td>                
                <td>'.$passexp.'</td>
                <td>'.(($status==1)?"Active":"Non Active").'</td>
                <td><input type="submit" name="active" value="'.(($status==1)?"Deactivate":"Activate").'""/></td>                
                <!--<td><input type="submit" name="reset" value="Reset Password" /></td>-->
            </tr>
            </form>'; 
        }
        ?>
        </table>
        
    </div>
</div>
<?php } else header("Location: $base_url/login"); ?>