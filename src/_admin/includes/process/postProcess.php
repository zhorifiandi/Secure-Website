<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
include 'functionList.php';
    try { 
        $msg="";
        if (!fSessionCheck()){            
             header("Location: $base_url/login");
             exit;
        }else{
            if(isset($_SESSION['post_id'])){
                $statement = $db->prepare("SELECT content,title,DATE_FORMAT(created_date,'%d-%b-%Y') AS created_date FROM post WHERE SHA1(post_id)=?");
                $statement->execute(array(
                    $_SESSION['post_id']
                ));

                $rows = $statement->fetch(PDO::FETCH_ASSOC);
                
            }

            if ( isset($_POST["submit"]) || isset($_POST["draft"]) )            
            {
                $date =  date('Y-m-d', strtotime($_POST['post_date']));
                
                if (($_SESSION['captcha']['code']==$_POST['captcha']) 
                        && (!empty($_POST['content']) 
                        && (!empty($_POST['title']))
                )){

                    $userid=getUserId();
                    $title=$_POST["title"];
                    $content=$_POST["content"];
                    $status =(isset($_POST["submit"]))?"posted":"draft";
                    
                    
                    if (isset($_SESSION["post_id"])){                        
                        $statement = $db->prepare("UPDATE post
                                                    SET content=? , status=?, title=?, last_updated=now(),created_date=?
                                                    WHERE SHA1(post_id)=? 
                                                    AND user_id=?");
                                                   
                        $statement->execute(array(
                            $content,$status,$title,$date,$_SESSION['post_id'],$userid
                            )
                        );
                       
                        //$statement->debugDumpParams();
                    }else {                    
                        
                        $statement = $db->prepare("INSERT INTO POST(user_id,title,created_date,content,last_updated,status) 
                                                VALUES(?,?,?,?,now(),?)");
                        
                        $statement->execute(array(
                            $userid,$title,$date,$content,$status
                            )
                        );
                        //$statement->debugDumpParams();

                    }
                    unset($_SESSION['post_id']);     
                    header("Location: $base_url/postlist");
                    exit;
                }else {
                    $msg = "Captcha salah atau Judul artikel dan Konten kosong";
                    $rows['content'] = $_POST['content'];
                    $rows['title'] = $_POST['title'];
                    
                }
                
            
            }else if (isset($_POST["back"])){     
                unset($_SESSION['post_id']);                
                header("Location: $base_url");
                exit;
            }
               
            }
    }catch (PDOException $e){
        echo "Terjadi kesalahan!";
    }  