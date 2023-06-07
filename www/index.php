<?php
/**
 * JustNote
 * 
 */


$filename = '/tmp/justnote.db';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $t = isset($_POST['t']) ? $_POST['t'] : '';
    file_put_contents($filename, $t);
    exit;
}
?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="renderer" content="webkit" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>JustNote</title>
<link rel="stylesheet" href="editor.md/css/editormd.min.css" />
<link rel="apple-touch-icon-precomposed" href="editor.md/images/logos/editormd-logo-72x72.png">
<link rel="icon" href="editor.md/images/logos/editormd-logo-72x72.png" />
<style>
    html,body {
        background-color: #2C2827;
        margin: 0;
        padding: 0;
        height: 100%;
    }
    textarea, .editormd-container-mask {
        background: #2C2827;
    }
    .editormd {
        border: none;
    }
</style>
</head>
<body>
<div id="editormd">
    <textarea style="display:none;"><?php echo @file_get_contents($filename); ?></textarea>
</div>
<script src="jquery.min.js"></script>
<script src="editor.md/editormd.min.js"></script>
<script type="text/javascript">
    var editor;

    $(function() {
        editor = editormd("editormd", {
            width   : "100%",
            height  : "100%",
            syncScrolling : "single",
            path    : "editor.md/lib/",
            theme   : "dark",
            previewTheme : "dark",
            editorTheme : "pastel-on-dark",
            matchWordHighlight: false,
            placeholder: "",
            toolbarIcons: function() {
                return ["bold", "italic", "|", "h1", "h2", "h3", "list-ul", "list-ol", "hr", "|", "undo"]
            },
            watch: false,
            lineWrapping: false,
            onload: function () {
                this.cm.on("change",function() {
                    $.post("", {t: editor.getValue()});
                })
            },
        });
    });
</script>
</body>
</html>