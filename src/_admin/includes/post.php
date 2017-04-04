<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
include 'process/postProcess.php';
session_start();
$_SESSION['captcha'] = simple_php_captcha();
?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset-min.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.js"></script>

  </head>
  <body>
    <div id="wysihtml5-editor-toolbar">
      <header>
        <ul class="commands">
          <li data-wysihtml5-command="bold" title="Make text bold (CTRL + B)" class="command"></li>
          <li data-wysihtml5-command="italic" title="Make text italic (CTRL + I)" class="command"></li>
          <li data-wysihtml5-command="insertUnorderedList" title="Insert an unordered list" class="command"></li>
          <li data-wysihtml5-command="insertOrderedList" title="Insert an ordered list" class="command"></li>
          <li data-wysihtml5-command="createLink" title="Insert a link" class="command"></li>
          <li data-wysihtml5-command="insertImage" title="Insert an image" class="command"></li>
          <li data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1" title="Insert headline 1" class="command"></li>
          <li data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2" title="Insert headline 2" class="command"></li>
          <li data-wysihtml5-command-group="foreColor" class="fore-color" title="Color the selected text" class="command">
            <ul>
              <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="silver"></li>
              <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="gray"></li>
              <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="maroon"></li>
              <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red"></li>
              <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="purple"></li>
              <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="green"></li>
              <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="olive"></li>
              <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="navy"></li>
              <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="blue"></li>
            </ul>
          </li>
          <li data-wysihtml5-command="insertSpeech" title="Insert speech" class="command"></li>
          <li data-wysihtml5-action="change_view" title="Show HTML" class="action"></li>
        </ul>
      </header>
      <div data-wysihtml5-dialog="createLink" style="display: none;">
        <label>
          Link:
          <input data-wysihtml5-dialog-field="href" value="http://">
        </label>
        <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
      </div>

      <div data-wysihtml5-dialog="insertImage" style="display: none;">
        <label>
          Image:
          <input data-wysihtml5-dialog-field="src" value="http://">
        </label>
        <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
      </div>
    </div>

    <form method="post" action="" >
      <br>
      <?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code" >';?>
      <input type="text" name="captcha" autofocus placeholder=" Captcha..."/>&nbsp;<font color="red"><?php echo (!empty($msg))?$msg:"";?></font>
      <section>
      
      <h5>Judul</h5>     
      <input value="<?php echo (!empty($rows))? $rows['title']:""; ?>" autofocus placeholder=" Judul Artikel..." type="text" name="title" size="50" maxlength="100" />
      <input  type="text" id="datepicker" value="<?php echo (!empty($rows))? $rows['created_date']:""; ?>" name="post_date" readonly autofocus placeholder=" Tanggal post...">    
      <!--<input value="<?php echo (!empty($rows))? $rows['post_date']:""; ?>" autofocus placeholder=" Tanggal posting..." type="date" name="post_date"  maxlength="100" />-->
      <input type="submit" name="submit" value="Post" />&nbsp;
      <input type="submit" name="draft" value="Draft" />&nbsp;&nbsp;
      <input type="submit" name="back" value="Back" /><br><br>
        <h5>Konten</h5>
        <textarea name="content" id="wysihtml5-editor" spellcheck="false" wrap="off" autofocus placeholder="Tulis artikel disini...">
        <?php echo (!empty($rows))? $rows['content']:""; ?>
        </textarea>      
      </section>    
    </form>

    <script>
      var editor = new wysihtml5.Editor("wysihtml5-editor", {
        toolbar:     "wysihtml5-editor-toolbar",
        stylesheets: ["css/reset-min.css", "css/editor.css"],
        parserRules: wysihtml5ParserRules
      });
      
      editor.on("load", function() {
        var composer = editor.composer;
        composer.selection.selectNode(editor.composer.element.querySelector("h1"));
      });

      $( function() {
          $( "#datepicker" ).datepicker({
            dateFormat: "dd-M-yy",
            minDate: 0            
          });
      } );

      
    </script>
  </body>
</html>
