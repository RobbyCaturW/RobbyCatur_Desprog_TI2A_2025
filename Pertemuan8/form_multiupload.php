<!DOCTYPE html>
<html>

<head>
    <title>Multi Upload File Dokumen</title>
</head>

<body>
    <h3>Multi Upload Dokumen</h3>
    <form action="proses_upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="files[]" multiple="multiple" accept=".pdf, .doc, .docx">
        <input type="submit" value="Unggah">
    </form>
    
    <h3>Multi Upload Gambar</h3>
    <form action="proses_upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="files[]" multiple="multiple" accept=".jpg, .jpeg, .png, .gif">
        <input type="submit" value="Unggah">
    </form>
</body>

</html>