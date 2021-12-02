var script = document.createElement('script');
script.type = 'text/javascript';
script.src = "http://code.jquery.com/jquery-2.2.1.min.js";
/**********************************/
$('#selected-img').click(function() {
    var htmls = '<input id = "upload-img" class = "input-img_ac" type = "file" name = "image-ac" accept = "image/png, image/jpeg" onchange = "ImagesFileAsURL()" >';
    /*jQuery('#selected-img').append(htmls);*/
    jQuery('#selected-img').find('input[type="file"]').click();
});