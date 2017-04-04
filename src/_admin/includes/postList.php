<?php
include 'process/postListProcess.php';  
$user_role = getUserRole();
?>
<div class="wrapper">
    <h1>Post List</h1>
</div>
<div class="wrapper">
    <div id="listPost">
    <a href="<?php echo $base_url;?>">Back</a> &nbsp;
    <a href="<?php echo $base_url;?>/post">Add Post</a><br><br>
    <table border="1">
    <tr style="font-weight:bold">
                
                <td>Title</td>
                <td>Created Date</td>
                <td>Last Updated</td>
                <td>Content</td>
                <?php echo ($user_role==1)?"<td>Author</td>":"";?>
                <td>Status</td>
                <td colspan=3 align="center">Action</td>
                
    </tr>
        <?php
        foreach($rows as $row) {
            $post_id = $row['post_id'];
            $name = $row['name'];
            $title = $row['title'];
            $creted_date = date('d-M-Y', strtotime($row['created_date']));
            $content = $row['content'];
            $last_updated = date('d-M-Y', strtotime($row['last_updated']));
            $status = $row['status'];
            
            echo '<form method="post" action="'.$base_url.'/postlist/process" >
            <input type="hidden" name="_token" value="'.sha1(getUserId()).'" />
            <input type="hidden" name="_track" value="'.$post_id.'" />
            <tr>                
                <td>'.$title.'</td>
                <td>'.$creted_date.'</td>
                <td>'.$last_updated.'</td>                
                <td>'.$content.'</td>
                '.(($user_role==1)?'<td>'.$name.'</td>':"").'
                <td>'.$status.'</td>
                <td><input type="submit" name="delete" value="Delete" onclick="return confirm(\'Apakah Anda yakin menghapus post ini?\')"/></td>                
                <td><input type="submit" name="reset" value="'.((strcmp($status,"draft")==0) ?"Post":"Draft").'"" /></td>
                <td><input type="submit" name="edit" value="Edit" /></td>
            </tr>
            </form>'; 
        }
        
        ?>
        
        </table>
        
    </div>
</div>
<script type="text/javascript">
    function clicked() {
       if (confirm('Apakah Anda yakin menghapus post ini?')) {
           form.submit();
       } else {
           return false;
       }
    }
    </script>